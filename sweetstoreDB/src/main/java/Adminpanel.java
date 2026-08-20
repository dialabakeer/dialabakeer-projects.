
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ButtonGroup;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JRadioButton;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;
import javax.swing.table.DefaultTableModel;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */

/**
 *
 * @author Zain
 */
public class Adminpanel extends javax.swing.JFrame {

    /**
     * Creates new form Adminpanel
     */
    public Adminpanel() {
        initComponents();
    }
public class Admin extends JPanel {
    private JTextField dessertname, price, quantity;
    private JRadioButton available, outOfStock;
    private JTable invetable;
    private MenuPanel menuPanel;

    public Admin(MenuPanel menuPanel) {
        this.menuPanel = menuPanel;
        setLayout(new BorderLayout());

        // Form inputs
        JPanel formPanel = new JPanel(new GridLayout(5, 2));
        formPanel.add(new JLabel("Dessert Name:"));
        dessertname = new JTextField();
        formPanel.add(dessertname);

        formPanel.add(new JLabel("Price:"));
        price = new JTextField();
        formPanel.add(price);

        formPanel.add(new JLabel("Quantity:"));
        quantity = new JTextField();
        formPanel.add(quantity);

        formPanel.add(new JLabel("Status:"));
        available = new JRadioButton("Available");
        outOfStock = new JRadioButton("Out of Stock");
        ButtonGroup statusGroup = new ButtonGroup();
        statusGroup.add(available);
        statusGroup.add(outOfStock);

        JPanel statusPanel = new JPanel(new FlowLayout());
        statusPanel.add(available);
        statusPanel.add(outOfStock);
        formPanel.add(statusPanel);

        JButton addButton = new JButton("Add Dessert");
        formPanel.add(addButton);

        add(formPanel, BorderLayout.NORTH);

        // Table
        invetable = new JTable(new DefaultTableModel(new Object[]{"ID", "Name", "Price", "Quantity", "Status"}, 0));
        add(new JScrollPane(invetable), BorderLayout.CENTER);

        // Button action
        addButton.addActionListener(this::addDessert);
    }

    private void addDessert(ActionEvent e) {
        try {
            DriverManager.registerDriver(new org.postgresql.Driver());
            String url = "jdbc:postgresql://localhost:5432/postgres";
            String user = "store";
            String password = "2004";
            Connection con = DriverManager.getConnection(url, user, password);
            con.setAutoCommit(false);

            String name = dessertname.getText();
            Double pric1 = Double.parseDouble(price.getText());
            Integer quantityValue = Integer.parseInt(quantity.getText());
            String selec = available.isSelected() ? "Available" : "Out of Stock";

            String sql = "INSERT INTO inventory (dessertname, price, quantity, status) VALUES (?, ?, ?, ?)";
            try (PreparedStatement pstmt = con.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS)) {
                pstmt.setString(1, name);
                pstmt.setDouble(2, pric1);
                pstmt.setInt(3, quantityValue);
                pstmt.setString(4, selec);
                pstmt.executeUpdate();

                // Get generated ID
                ResultSet keys = pstmt.getGeneratedKeys();
                keys.next();
                int id = keys.getInt(1);

                // Add to table
                DefaultTableModel model = (DefaultTableModel) invetable.getModel();
                model.addRow(new Object[]{id, name, pric1, quantityValue, selec});
                invetable.setModel(model);

                // Clear form
                dessertname.setText(null);
                price.setText(null);
                quantity.setText(null);
                available.setSelected(false);
                outOfStock.setSelected(false);

                JOptionPane.showMessageDialog(null, "Dessert created successfully!");

                // Update menu
                if (menuPanel != null) {
                    menuPanel.populateMenu();
                }
            }

            con.commit();
            con.close();

        } catch (Exception ex) {
            Logger.getLogger(Admin.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "Error: " + ex.getMessage(), "Database Error", JOptionPane.ERROR_MESSAGE);
        }
    }
}
    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 400, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 300, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Adminpanel.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Adminpanel.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Adminpanel.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Adminpanel.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Adminpanel().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    // End of variables declaration//GEN-END:variables
}
