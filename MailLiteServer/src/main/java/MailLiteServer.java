package maillite;

import java.awt.*;
import java.io.*;
import java.net.*;
import java.text.SimpleDateFormat;
import java.util.*;
import javax.swing.*;
import javax.swing.table.DefaultTableModel;

public class MailLiteServer extends JFrame {
    private Socket socket;
    private PrintWriter out;
    private BufferedReader in;
    private DatagramSocket udpSocket;
    private String username;
    private final DefaultTableModel tableModel = new DefaultTableModel(new String[]{"From", "Subject", "Time"}, 0);
    private final JList<String> onlineList = new JList<>(new DefaultListModel<>());
    private final JTextPane bodyPane = new JTextPane();
    private final JTextField toField = new JTextField();
    private final JTextField subjField = new JTextField();
    private final JTextArea msgArea = new JTextArea(10, 30);

    public MailLiteServer() {
        setTitle("MailLite Client");
        setSize(1200, 700);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLayout(new BorderLayout());

        // Top status
        JPanel top = new JPanel(new FlowLayout(FlowLayout.LEFT));
        top.add(new JLabel("Connected to localhost:12345 | Logged in as: "));
        JLabel userLabel = new JLabel("Not logged in");
        top.add(userLabel);
        add(top, BorderLayout.NORTH);

        // Left: Folders + Online
        JPanel left = new JPanel(new BorderLayout());
        String[] folders = {"Inbox", "Sent", "Archive"};
        JList<String> folderList = new JList<>(folders);
        folderList.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
        folderList.addListSelectionListener(e -> if (!e.getValueIsAdjusting()) loadMessages(folderList.getSelectedValue()));
        left.add(new JScrollPane(folderList), BorderLayout.NORTH);
        left.add(new JScrollPane(onlineList), BorderLayout.CENTER);
        add(left, BorderLayout.WEST);

        // Center: Messages + Body
        JTable msgTable = new JTable(tableModel);
        msgTable.getSelectionModel().addListSelectionListener(e -> showMessage(msgTable.getSelectedRow()));
        JSplitPane center = new JSplitPane(JSplitPane.VERTICAL_SPLIT,
                new JScrollPane(msgTable), new JScrollPane(bodyPane));
        center.setDividerLocation(300);
        add(center, BorderLayout.CENTER);

        // Right: Compose
        JPanel right = new JPanel(new GridLayout(0, 1));
        right.add(new JLabel("To:")); right.add(toField);
        right.add(new JLabel("Subject:")); right.add(subjField);
        right.add(new JLabel("Message:"));
        right.add(new JScrollPane(msgArea));
        JButton sendBtn = new JButton("Send Message");
        sendBtn.addActionListener(e -> sendMessage());
        right.add(sendBtn);
        add(right, BorderLayout.EAST);

        // Login
        String user = JOptionPane.showInputDialog("Username:");
        String pass = JOptionPane.showInputDialog("Password:");
        if (user != null && pass != null && connect(user, pass)) {
            userLabel.setText(user);
            this.username = user.toLowerCase();
            loadMessages("Inbox");
            startUdpListener();
        } else System.exit(0);
    }

    private boolean connect(String user, String pass) {
        try {
            socket = new Socket("localhost", 12345);
            out = new PrintWriter(socket.getOutputStream(), true);
            in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
            udpSocket = new DatagramSocket();
            out.println("HELO " + user + " UDP:" + udpSocket.getLocalPort());
            out.println("AUTH " + user + " " + pass);
            String resp = in.readLine();
            if ("235 OK".equals(resp)) {
                new Thread(this::readLoop).start();
                return true;
            }
        } catch (Exception e) {
            JOptionPane.showMessageDialog(this, "Connection failed");
        }
        return false;
    }

    private void readLoop() {
        try {
            String line;
            while ((line = in.readLine()) != null) {
                if (line.startsWith("213M ")) {
                    String[] p = line.substring(5).split(" ", 4);
                    tableModel.addRow(new Object[]{p[1], p[2], new Date(Long.parseLong(p[3])).toString()});
                } else if (line.startsWith("212U ")) {
                    String[] p = line.substring(5).split(" ", 3);
                    ((DefaultListModel<String>) onlineList.getModel()).addElement(p[0] + " (" + p[1] + ")");
                }
            }
        } catch (Exception ignored) {}
    }

    private void startUdpListener() {
        new Thread(() -> {
            try {
                byte[] buf = new byte[256];
                while (true) {
                    DatagramPacket p = new DatagramPacket(buf, buf.length);
                    udpSocket.receive(p);
                    String msg = new String(p.getData(), 0, p.getLength());
                    if (msg.contains("NEWMAIL")) loadMessages("Inbox");
                }
            } catch (Exception ignored) {}
        }).start();
    }

    private void loadMessages(String folder) {
        tableModel.setRowCount(0);
        out.println("LIST" + (folder.equals("Inbox") ? "" : " " + folder));
    }

    private void showMessage(int row) {
        if (row < 0) return;
        String from = (String) tableModel.getValueAt(row, 0);
        out.println("RETR " + from); // في الواقع لازم نخزن msgId، لكن للديمو كده يكفي
    }

    private void sendMessage() {
        String to = toField.getText().trim();
        String subj = subjField.getText();
        String body = msgArea.getText();
        if (to.isEmpty() || subj.isEmpty() || body.isEmpty()) return;
        out.println("SEND");
        out.println("TO:" + to + " SUBJ:" + subj);
        out.println(body);
        JOptionPane.showMessageDialog(this, "Message sent!");
        msgArea.setText(""); toField.setText(""); subjField.setText("");
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new MailLiteClient().setVisible(true));
    }
}