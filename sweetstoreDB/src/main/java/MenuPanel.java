import javax.swing.*;
import java.awt.*;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class MenuPanel extends JPanel {

    public MenuPanel() {
        setLayout(new GridLayout(0, 3, 10, 10)); // GridLayout for menu items
        populateMenu();
    }

    public void populateMenu() {
        removeAll(); // Clear current items

        List<Item> items = getAllItems();
        for (Item item : items) {
            JButton button = new JButton("<html>" +
                    "<b>" + item.getName() + "</b><br>" +
                    "Price: $" + item.getPrice() + "<br>" +
                    "Available: " + item.getQuantity() +
                    "</html>");

            button.setFont(new Font("Arial", Font.PLAIN, 14));
            add(button);
        }

        revalidate();
        repaint();
    }

    private List<Item> getAllItems() {
        List<Item> items = new ArrayList<>();
        try {
            DriverManager.registerDriver(new org.postgresql.Driver());
            String url = "jdbc:postgresql://localhost:5432/postgres";
            String user = "store";
            String password = "2004";
            Connection con = DriverManager.getConnection(url, user, password);

            String sql = "SELECT dessertname, price, quantity FROM inventory WHERE status = 'Available'";
            try (PreparedStatement pstmt = con.prepareStatement(sql);
                 ResultSet rs = pstmt.executeQuery()) {
                while (rs.next()) {
                    items.add(new Item(rs.getString("dessertname"), rs.getDouble("price"), rs.getInt("quantity")));
                }
            }
            con.close();
        } catch (Exception ex) {
            ex.printStackTrace();
        }
        return items;
    }
}

class Item {
    private String name;
    private double price;
    private int quantity;

    public Item(String name, double price, int quantity) {
        this.name = name;
        this.price = price;
        this.quantity = quantity;
    }

    public String getName() {
        return name;
    }

    public double getPrice() {
        return price;
    }

    public int getQuantity() {
        return quantity;
    }
}
