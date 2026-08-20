package maillite;

import java.util.ArrayList;
import java.util.List;
import static maillite.MailLiteServer.*;

public class User {
    public String username;
    public String password;
    public String status = "OFFLINE";
    public long lastSeen = System.currentTimeMillis();
    public List<Message> mailbox = new ArrayList<>();

    public User() {}
    public User(String username, String password) {
        this.username = username;
        this.password = password;
    }

    public void loadMailbox() {
        try {
            mailbox = gson.fromJson(new java.io.FileReader(MAILBOX_DIR + "/" + username + ".json"),
                    new com.google.gson.reflect.TypeToken<List<Message>>(){}.getType());
            if (mailbox == null) mailbox = new ArrayList<>();
        } catch (Exception e) { mailbox = new ArrayList<>(); }
    }

    public void saveMailbox() {
        try {
            gson.toJson(mailbox, new java.io.FileWriter(MAILBOX_DIR + "/" + username + ".json"));
        } catch (Exception ignored) {}
    }
}