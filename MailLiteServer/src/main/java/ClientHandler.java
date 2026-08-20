package maillite;

import java.io.*;
import java.net.Socket;
import java.util.*;
import java.util.stream.Collectors;

public class ClientHandler implements Runnable {
    private final Socket socket;
    private BufferedReader in;
    private PrintWriter out;
    private String currentUser = null;
    private int udpPort = 0;
    private String udpIp = "";

    public ClientHandler(Socket socket) {
        this.socket = socket;
    }

    @Override
    public void run() {
        try {
            in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
            out = new PrintWriter(socket.getOutputStream(), true);

            String line;
            while ((line = in.readLine()) != null) {
                if (line.startsWith("HELO ")) handleHelo(line);
                else if (currentUser == null) out.println("503 Login first");
                else if (line.startsWith("AUTH ")) handleAuth(line);
                else if (line.startsWith("SETSTAT ")) handleSetStat(line);
                else if (line.equals("WHO")) handleWho();
                else if (line.startsWith("LIST")) handleList(line);
                else if (line.startsWith("RETR ")) handleRetr(line);
                else if (line.equals("SEND")) handleSend();
                else if (line.startsWith("DELE ")) handleDele(line);
                else if (line.startsWith("RESTORE ")) handleRestore(line);
                else if (line.equals("STAT")) handleStat();
                else if (line.equals("QUIT")) break;
                else out.println("500 Unknown command");
            }
        } catch (Exception e) {
            // silent
        } finally {
            cleanup();
        }
    }

    private void handleHelo(String line) {
        String[] parts[] = line.split(" ");
        if (parts.length != 3 || !parts[2].startsWith("UDP:")) {
            out.println("501 Syntax error in HELO");
            return;
        }
        String username = parts[1].toLowerCase();
        try {
            udpPort = Integer.parseInt(parts[2].substring(4));
            udpIp = socket.getInetAddress().getHostAddress();
        } catch (Exception e) {
            out.println("501 Bad UDP port");
            return;
        }

        if (!MailLiteServer.users.containsKey(username)) {
            out.println("550 Unknown user");
            return;
        }

        currentUser = username;
        ClientConnection conn = new ClientConnection(username, out,
                socket.getInetAddress().getHostAddress(), socket.getPort());
        conn.udpIp = udpIp;
        conn.udpPort = udpPort;
        MailLiteServer.activeClients.put(username, conn);

        User u = MailLiteServer.users.get(username);
        u.status = "ACTIVE";
        u.lastSeen = System.currentTimeMillis();

        out.println("250 READY");
        MailLiteServer.getInstance().log("Login: " + username + " from " + udpIp);
        MailLiteServer.getInstance().updateOnlineTable();
    }

    private void handleAuth(String line) {
        String[] p = line.split(" ", 3);
        if (p.length < 3) {
            out.println("501 Syntax");
            return;
        }
        User u = MailLiteServer.users.get(currentUser);
        if (u.password.equals(p[2])) {
            out.println("235 OK");
        } else {
            out.println("535 AUTH FAILED");
            cleanup();
        }
    }

    private void handleSetStat(String line) {
        String stat = line.substring(8).trim().toUpperCase();
        if (List.of("ACTIVE","BUSY","AWAY").contains(stat)) {
            MailLiteServer.users.get(currentUser).status = stat;
            out.println("250 OK");
            MailLiteServer.getInstance().updateOnlineTable();
        } else {
            out.println("501 Invalid status");
        }
    }

    private void handleWho() {
        out.println("212 " + MailLiteServer.activeClients.size());
        for (ClientConnection c : MailLiteServer.activeClients.values()) {
            User u = MailLiteServer.users.get(c.username);
            out.println("212U " + c.username + " " + u.status + " " + c.ip + " " + u.lastSeen);
        }
        out.println("212 END");
    }

    private void handleList(String line) {
        boolean unreadOnly = line.endsWith("UNREAD");
        List<Message> box = MailLiteServer.users.get(currentUser).mailbox;
        for (Message m : box) {
            if (m.isArchived) continue;
            if (unreadOnly && readMessages.contains(m.msgId)) continue; // مثال بسيط
            out.println("213 " + m.msgId + " " + m.from + " " + m.body.length() + " " + m.timestamp);
        }
        out.println("213 END");
    }

    private void handleRetr(String line) {
        String msgId = line.substring(5).trim();
        Message m = MailLiteServer.users.get(currentUser).mailbox.stream()
                .filter(msg -> msg.msgId.equals(msgId)).findFirst().orElse(null);
        if (m == null) {
            out.println("550 No such message");
            return;
        }
        out.println("214 FROM:" + m.from + " TO:" + String.join(",", m.to) + " SUBJ:" + m.subject);
        out.println("214 BODYLEN " + m.body.length());
        out.println("214 BODY");
        out.print(m.body);
        out.println();
        out.println("214 END");
        readMessages.add(msgId);
    }

    private void handleSend() throws IOException {
        out.println("354 FROM? TO? SUBJECT? BODYLEN?");
        String header = in.readLine();
        if (header == null) return;
        String[] h = header.split(" ");
        String from = "", toList = "", subject = "";
        int bodyLen = 0;
        for (String part : h) {
            if (part.startsWith("FROM:")) from = part.substring(5);
            if (part.startsWith("TO:")) toList = part.substring(3);
            if (part.startsWith("SUBJ:")) subject = part.substring(5);
            if (part.startsWith("BODYLEN:")) bodyLen = Integer.parseInt(part.substring(9));
        }
        out.println("354 BODY");
        char[] bodyChars = new char[bodyLen];
        in.read(bodyChars, 0, bodyLen);
        String body = new String(bodyChars);

        List<String> recipients = Arrays.asList(toList.split(","));
        Message msg = new Message(currentUser, recipients, subject, body);

        for (String recip : recipients) {
            recip = recip.trim().toLowerCase();
            if (MailLiteServer.users.containsKey(recip)) {
                MailLiteServer.users.get(recip).mailbox.add(msg);
                MailLiteServer.users.get(recip).saveMailbox();
                MailLiteServer.sendUdpNotification(recip, 1);
            }
        }
        out.println("250 MSGID " + msg.msgId);
    }

    private void handleDele(String line) {
        String msgId = line.substring(5).trim();
        Message m = MailLiteServer.users.get(currentUser).mailbox.stream()
                .filter(msg -> msg.msgId.equals(msgId)).findFirst().orElse(null);
        if (m != null) {
            m.isArchived = true;
            MailLiteServer.users.get(currentUser).saveMailbox();
            out.println("250 OK");
        }
    }

    private void handleRestore(String line) {
        String msgId = line.substring(8).trim();
        Message m = MailLiteServer.users.get(currentUser).mailbox.stream()
                .filter(msg -> msg.msgId.equals(msgId) && msg.isArchived).findFirst().orElse(null);
        if (m != null) {
            m.isArchived = false;
            MailLiteServer.users.get(currentUser).saveMailbox();
            out.println("250 OK");
        }
    }

    private void handleStat() {
        int unread = (int) MailLiteServer.users.get(currentUser).mailbox.stream()
                .filter(m -> !m.isArchived && !readMessages.contains(m.msgId)).count();
        long size = MailLiteServer.users.get(currentUser).mailbox.stream()
                .filter(m -> !m.isArchived).mapToLong(m -> m.body.length()).sum();
        int online = MailLiteServer.activeClients.size();
        out.println("211 M:" + unread + " S:" + size + " U:" + online);
    }

    private void cleanup() {
        if (currentUser != null) {
            MailLiteServer.activeClients.remove(currentUser);
            User u = MailLiteServer.users.get(currentUser);
            if (u != null) u.status = "OFFLINE";
            MailLiteServer.getInstance().updateOnlineTable();
            MailLiteServer.getInstance().log("Logout: " + currentUser);
        }
        try { socket.close(); } catch (Exception ignored) {}
    }
}