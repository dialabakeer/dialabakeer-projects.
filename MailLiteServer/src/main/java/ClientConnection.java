package maillite;

import java.io.PrintWriter;

public class ClientConnection {
    public String username;
    public PrintWriter out;
    public String ip;
    public int tcpPort;
    public String udpIp;
    public int udpPort = 0;

    public ClientConnection(String username, PrintWriter out, String ip, int tcpPort) {
        this.username = username;
        this.out = out;
        this.ip = ip;
        this.tcpPort = tcpPort;
    }
}