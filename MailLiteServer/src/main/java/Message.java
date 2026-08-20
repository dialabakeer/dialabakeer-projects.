package maillite;

import java.util.List;
import java.util.UUID;

public class Message {
    public String msgId = UUID.randomUUID().toString();
    public String from;
    public List<String> to;
    public String subject;
    public String body;
    public long timestamp = System.currentTimeMillis();
    public boolean isArchived = false;

    public Message() {}
    public Message(String from, List<String> to, String subject, String body) {
        this.from = from; this.to = to; this.subject = subject; this.body = body;
    }
}