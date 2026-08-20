import javax.swing.*;
import javax.swing.border.*;
import javax.swing.table.*;
import java.awt.*;
import java.awt.event.*;
import java.awt.geom.*;
import java.util.*;
import java.util.List;
import java.util.Timer;

public class GUI extends JFrame {

    private static final Color BG_DARK      = new Color(15, 20, 30);
    private static final Color BG_PANEL     = new Color(22, 30, 45);
    private static final Color BG_CARD      = new Color(28, 38, 58);
    private static final Color ACCENT_GREEN = new Color(80, 200, 120);
    private static final Color ACCENT_BLUE  = new Color(60, 140, 230);
    private static final Color ACCENT_AMBER = new Color(240, 180, 60);
    private static final Color ACCENT_RED   = new Color(230, 80, 80);
    private static final Color TEXT_PRIMARY = new Color(220, 230, 245);
    private static final Color TEXT_MUTED   = new Color(120, 140, 170);
    private static final Color BORDER_COLOR = new Color(45, 60, 85);
    private static final Font FONT_TITLE  = new Font("Segoe UI", Font.BOLD, 20);
    private static final Font FONT_LABEL  = new Font("Segoe UI", Font.BOLD, 13);
    private static final Font FONT_BODY   = new Font("Segoe UI", Font.PLAIN, 12);
    private static final Font FONT_MONO   = new Font("Consolas", Font.PLAIN, 11);
    private static final Font FONT_SMALL  = new Font("Segoe UI", Font.PLAIN, 11);

    private Perceptron perceptron;
    private List<Plant> allPlants = new ArrayList<>();
    private List<Plant> gardenPlants = new ArrayList<>();
    private List<Plant> saSequence = new ArrayList<>();
    private List<double[]> lossHistory = new ArrayList<>();
    private List<double[]> accuracyHistory = new ArrayList<>();
    private List<String> saLog = new ArrayList<>();
    private int selectedPlantIndex = -1;
    private boolean trained = false;
    private GardenPanel gardenPanel;
    private LearningCurvePanel learningCurvePanel;
    private JTextArea logArea;
    private JLabel statusLabel;
    private JSpinner epochSpinner, lrSpinner;
    private JLabel trainAccLabel, testAccLabel, w1Label, w2Label, w3Label, biasLabel;
    private JTextField moistureField, lastWateredField;
    private JComboBox<String> typeCombo;
    private JLabel predictionLabel;

    private JSpinner tempSpinner, coolSpinner, iterSpinner;
    private SpinnerNumberModel subsetCountModel;
    private JSpinner subsetCountSpinner;
    private JCheckBox prioritizeNeedWaterCheck;

    private JTextArea saLogArea;
    private JLabel saCostLabel;
    private JLabel saDistanceLabel;
    private JLabel saMissedLabel;
    private JLabel saExtraLabel;
    private JLabel saSelectedCountLabel;

    private JTabbedPane tabbedPane;
    private DefaultTableModel gardenTableModel;
    private JTable gardenTable;

    public GUI() {
        setTitle("🌿 Smart Plant Watering Scheduler — AI System");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(1300, 820);
        setMinimumSize(new Dimension(1100, 700));
        setLocationRelativeTo(null);
        getContentPane().setBackground(BG_DARK);
        setLayout(new BorderLayout(0, 0));

        buildUI();
        loadData();
    }
    private void buildUI() {
        add(buildHeader(), BorderLayout.NORTH);

        tabbedPane = new JTabbedPane();
        tabbedPane.setBackground(BG_DARK);
        tabbedPane.setForeground(TEXT_PRIMARY);
        tabbedPane.setFont(FONT_LABEL);
        styleTab(tabbedPane);

        tabbedPane.addTab("🧠  Perceptron Training", buildTrainingTab());
        tabbedPane.addTab("🌱  Garden & Plants",    buildGardenTab());
        tabbedPane.addTab("🔥  SA Optimization",   buildSATab());

        add(tabbedPane, BorderLayout.CENTER);
        add(buildStatusBar(), BorderLayout.SOUTH);
    }

    private JPanel buildHeader() {
        JPanel header = new JPanel(new BorderLayout());
        header.setBackground(BG_PANEL);
        header.setBorder(new MatteBorder(0, 0, 1, 0, BORDER_COLOR));
        header.setPreferredSize(new Dimension(0, 58));

        JLabel title = new JLabel("  🌿  Smart Plant Watering Scheduler");
        title.setFont(FONT_TITLE);
        title.setForeground(ACCENT_GREEN);

        JLabel sub = new JLabel("Perceptron + Simulated Annealing  ");
        sub.setFont(FONT_BODY);
        sub.setForeground(TEXT_MUTED);

        header.add(title, BorderLayout.WEST);
        header.add(sub, BorderLayout.EAST);
        return header;
    }
    private JPanel buildStatusBar() {
        JPanel bar = new JPanel(new BorderLayout());
        bar.setBackground(BG_PANEL);
        bar.setBorder(new MatteBorder(1, 0, 0, 0, BORDER_COLOR));
        bar.setPreferredSize(new Dimension(0, 30));

        statusLabel = new JLabel("  Ready — Load data and train the Perceptron to begin.");
        statusLabel.setFont(FONT_SMALL);
        statusLabel.setForeground(TEXT_MUTED);
        bar.add(statusLabel, BorderLayout.WEST);
        return bar;
    }


    private JPanel buildTrainingTab() {
        JPanel root = new JPanel(new BorderLayout(10, 10));
        root.setBackground(BG_DARK);
        root.setBorder(new EmptyBorder(12, 12, 12, 12));

        // Left column: controls + metrics
        JPanel left = new JPanel();
        left.setLayout(new BoxLayout(left, BoxLayout.Y_AXIS));
        left.setBackground(BG_DARK);
        left.setPreferredSize(new Dimension(310, 0));

        left.add(buildTrainingControls());
        left.add(Box.createVerticalStrut(10));
        left.add(buildModelMetrics());
        left.add(Box.createVerticalStrut(10));
        left.add(buildTestPanel());
        left.add(Box.createVerticalGlue());

        JPanel right = new JPanel(new BorderLayout());
        right.setBackground(BG_DARK);

        learningCurvePanel = new LearningCurvePanel();
        right.add(card("📈  Learning Curve", learningCurvePanel, 0), BorderLayout.CENTER);

        root.add(left, BorderLayout.WEST);
        root.add(right, BorderLayout.CENTER);
        return root;
    }

    private JPanel buildTrainingControls() {
        JPanel p = card("⚙️  Training Parameters", null, 0);
        p.setLayout(new GridBagLayout());
        GridBagConstraints c = new GridBagConstraints();
        c.insets = new Insets(5, 8, 5, 8);
        c.fill = GridBagConstraints.HORIZONTAL;

        c.gridx = 0; c.gridy = 0; c.weightx = 0.5;
        p.add(label("Epochs:"), c);
        c.gridx = 1; c.weightx = 1.0;
        epochSpinner = spinner(100, 1, 5000, 50);
        p.add(epochSpinner, c);

        c.gridx = 0; c.gridy = 1; c.weightx = 0.5;
        p.add(label("Learning Rate:"), c);
        c.gridx = 1; c.weightx = 1.0;
        lrSpinner = new JSpinner(new SpinnerNumberModel(0.1, 0.001, 1.0, 0.01));
        styleSpinner(lrSpinner);
        p.add(lrSpinner, c);

        c.gridx = 0; c.gridy = 2; c.gridwidth = 2; c.weightx = 1.0;
        JButton trainBtn = accentButton("▶  Train Perceptron", ACCENT_GREEN);
        trainBtn.addActionListener(e -> trainPerceptron());
        p.add(trainBtn, c);

        return p;
    }

    private JPanel buildModelMetrics() {
        JPanel p = card("📊  Model Metrics", null, 0);
        p.setLayout(new GridLayout(6, 2, 6, 6));
        p.setBorder(new CompoundBorder(p.getBorder(), new EmptyBorder(8, 10, 8, 10)));

        trainAccLabel = metricLabel("—");
        testAccLabel  = metricLabel("—");
        w1Label       = metricLabel("—");
        w2Label       = metricLabel("—");
        w3Label       = metricLabel("—");
        biasLabel     = metricLabel("—");

        p.add(label("Train Accuracy:")); p.add(trainAccLabel);
        p.add(label("Test Accuracy:"));  p.add(testAccLabel);
        p.add(label("W1 (moisture):")); p.add(w1Label);
        p.add(label("W2 (last wtrd):")); p.add(w2Label);
        p.add(label("W3 (type):"));     p.add(w3Label);
        p.add(label("Bias:"));           p.add(biasLabel);

        return p;
    }

    private JPanel buildTestPanel() {
        JPanel p = card("🔍  Test Perceptron", null, 0);
        p.setLayout(new GridBagLayout());
        GridBagConstraints c = new GridBagConstraints();
        c.insets = new Insets(4, 8, 4, 8);
        c.fill = GridBagConstraints.HORIZONTAL;

        c.gridx = 0; c.gridy = 0; c.weightx = 0.5;
        p.add(label("Moisture (0-100):"), c);
        c.gridx = 1; c.weightx = 1.0;
        moistureField = styledField("45");
        p.add(moistureField, c);

        c.gridx = 0; c.gridy = 1;
        p.add(label("Last Watered (hrs):"), c);
        c.gridx = 1;
        lastWateredField = styledField("12");
        p.add(lastWateredField, c);

        c.gridx = 0; c.gridy = 2;
        p.add(label("Plant Type:"), c);
        c.gridx = 1;
        typeCombo = new JComboBox<>(new String[]{"0 - Cactus", "1 - Flower", "2 - Herb"});
        styleCombo(typeCombo);
        p.add(typeCombo, c);

        c.gridx = 0; c.gridy = 3; c.gridwidth = 2;
        JButton predictBtn = accentButton("🔮  Predict", ACCENT_BLUE);
        predictBtn.addActionListener(e -> runPrediction());
        p.add(predictBtn, c);

        c.gridy = 4;
        predictionLabel = new JLabel("Result: —", SwingConstants.CENTER);
        predictionLabel.setFont(new Font("Segoe UI", Font.BOLD, 14));
        predictionLabel.setForeground(TEXT_MUTED);
        predictionLabel.setOpaque(true);
        predictionLabel.setBackground(BG_DARK);
        predictionLabel.setBorder(new EmptyBorder(8, 0, 8, 0));
        p.add(predictionLabel, c);

        return p;
    }

 
    private JPanel buildGardenTab() {
        JPanel root = new JPanel(new BorderLayout(10, 10));
        root.setBackground(BG_DARK);
        root.setBorder(new EmptyBorder(12, 12, 12, 12));

        gardenPanel = new GardenPanel();
        gardenPanel.setPreferredSize(new Dimension(500, 500));
        JPanel gardenCard = card("🗺️  Garden Map  (Click to place plant)", gardenPanel, 0);
        root.add(gardenCard, BorderLayout.CENTER);

  
        JPanel right = new JPanel();
        right.setLayout(new BoxLayout(right, BoxLayout.Y_AXIS));
        right.setBackground(BG_DARK);
        right.setPreferredSize(new Dimension(380, 0));

        right.add(buildPlantInputPanel());
        right.add(Box.createVerticalStrut(10));
        right.add(buildPlantTablePanel());

        root.add(right, BorderLayout.EAST);
        return root;
    }

    private JPanel buildPlantInputPanel() {
        JPanel p = card("➕  Add New Plant", null, 0);
        p.setLayout(new GridBagLayout());
        GridBagConstraints c = new GridBagConstraints();
        c.insets = new Insets(5, 8, 5, 8);
        c.fill = GridBagConstraints.HORIZONTAL;
        c.weightx = 1.0;

        JTextField gMoisture    = styledField("50");
        JTextField gLastWatered = styledField("24");
        JComboBox<String> gType = new JComboBox<>(new String[]{"0 - Cactus", "1 - Flower", "2 - Herb"});
        styleCombo(gType);

        int row = 0;
        c.gridx = 0; c.gridy = row; c.gridwidth = 1; c.weightx = 0.4;
        p.add(label("Moisture:"), c);
        c.gridx = 1; c.weightx = 0.6;
        p.add(gMoisture, c);

        row++;
        c.gridx = 0; c.gridy = row; c.weightx = 0.4;
        p.add(label("Last Watered (h):"), c);
        c.gridx = 1; c.weightx = 0.6;
        p.add(gLastWatered, c);

        row++;
        c.gridx = 0; c.gridy = row; c.weightx = 0.4;
        p.add(label("Plant Type:"), c);
        c.gridx = 1; c.weightx = 0.6;
        p.add(gType, c);

        row++;
        c.gridx = 0; c.gridy = row; c.gridwidth = 2; c.weightx = 1.0;
        JLabel hint = new JLabel("  ⬅  Click on the garden map to place plant");
        hint.setFont(FONT_SMALL);
        hint.setForeground(ACCENT_AMBER);
        p.add(hint, c);

        row++;
        c.gridy = row;
        JButton addBtn = accentButton("📌  Place on Map & Add", ACCENT_GREEN);
        addBtn.addActionListener(e -> {
            gardenPanel.setPendingPlantData(gMoisture, gLastWatered, gType);
            setStatus("Click on the garden map to place the plant...");
        });
        p.add(addBtn, c);

        row++;
        c.gridy = row;
        JButton removeBtn = accentButton("🗑️  Remove Selected Plant", ACCENT_RED);
        removeBtn.addActionListener(e -> removeSelectedPlant());
        p.add(removeBtn, c);

        row++;
        c.gridy = row;
        JButton predictAllBtn = accentButton("🤖  Predict All Plants", ACCENT_BLUE);
        predictAllBtn.addActionListener(e -> predictAllGardenPlants());
        p.add(predictAllBtn, c);

        return p;
    }

    private JPanel buildPlantTablePanel() {
        String[] cols = {"#", "Type", "Moisture", "Last W.", "X", "Y", "Prediction"};
        gardenTableModel = new DefaultTableModel(cols, 0) {
            @Override public boolean isCellEditable(int r, int c) { return false; }
        };
        gardenTable = new JTable(gardenTableModel);
        styleTable(gardenTable);
        gardenTable.getSelectionModel().addListSelectionListener(e -> {
            selectedPlantIndex = gardenTable.getSelectedRow();
            gardenPanel.setSelectedIndex(selectedPlantIndex);
            gardenPanel.repaint();
        });

        JScrollPane scroll = new JScrollPane(gardenTable);
        styleScrollPane(scroll);
        scroll.setPreferredSize(new Dimension(0, 220));

        JPanel p = card("📋  Plant List", scroll, 0);
        return p;
    }

  
    private JPanel buildSATab() {
        JPanel root = new JPanel(new BorderLayout(10, 10));
        root.setBackground(BG_DARK);
        root.setBorder(new EmptyBorder(12, 12, 12, 12));

        JPanel left = new JPanel();
        left.setLayout(new BoxLayout(left, BoxLayout.Y_AXIS));
        left.setBackground(BG_DARK);
        left.setPreferredSize(new Dimension(310, 0));

        left.add(buildSAControls());
        left.add(Box.createVerticalStrut(10));
        left.add(buildSAResultPanel());
        left.add(Box.createVerticalGlue());

        JPanel right = new JPanel(new GridLayout(1, 2, 10, 0));
        right.setBackground(BG_DARK);

        saLogArea = new JTextArea();
        saLogArea.setFont(FONT_MONO);
        saLogArea.setBackground(BG_CARD);
        saLogArea.setForeground(ACCENT_GREEN);
        saLogArea.setEditable(false);
        saLogArea.setBorder(new EmptyBorder(6, 8, 6, 8));
        JScrollPane saScroll = new JScrollPane(saLogArea);
        styleScrollPane(saScroll);
        right.add(card("📜  SA Optimization Log", saScroll, 0));

        SAGardenPanel saGarden = new SAGardenPanel();
        right.add(card("🗺️  Optimal Route Visualization", saGarden, 0));

        root.add(left, BorderLayout.WEST);
        root.add(right, BorderLayout.CENTER);
        return root;
    }

    private JPanel buildSAControls() {
        JPanel p = card("⚙️  SA Parameters", null, 0);
        p.setLayout(new GridBagLayout());
        GridBagConstraints c = new GridBagConstraints();
        c.insets = new Insets(5, 8, 5, 8);
        c.fill = GridBagConstraints.HORIZONTAL;

        c.gridx = 0; c.gridy = 0; c.weightx = 0.5;
        p.add(label("Initial Temperature:"), c);
        c.gridx = 1; c.weightx = 1.0;
        tempSpinner = spinner(1000, 100, 100000, 100);
        p.add(tempSpinner, c);

        c.gridx = 0; c.gridy = 1; c.weightx = 0.5;
        p.add(label("Cooling Rate:"), c);
        c.gridx = 1; c.weightx = 1.0;
        coolSpinner = new JSpinner(new SpinnerNumberModel(0.95, 0.50, 0.999, 0.005));
        styleSpinner(coolSpinner);
        p.add(coolSpinner, c);

        c.gridx = 0; c.gridy = 2; c.weightx = 0.5;
        p.add(label("Iterations / Temp:"), c);
        c.gridx = 1; c.weightx = 1.0;
        iterSpinner = spinner(10, 1, 500, 5);
        p.add(iterSpinner, c);

        c.gridx = 0; c.gridy = 3; c.weightx = 0.5;
        p.add(label("Plants To Select:"), c);
        c.gridx = 1; c.weightx = 1.0;
        subsetCountModel = new SpinnerNumberModel(1, 1, 1, 1);
        subsetCountSpinner = new JSpinner(subsetCountModel);
        styleSpinner(subsetCountSpinner);
        p.add(subsetCountSpinner, c);

        c.gridx = 0; c.gridy = 4; c.gridwidth = 2;
        prioritizeNeedWaterCheck = new JCheckBox("Prioritize plants predicted as NEEDS WATER");
        prioritizeNeedWaterCheck.setOpaque(false);
        prioritizeNeedWaterCheck.setForeground(TEXT_PRIMARY);
        prioritizeNeedWaterCheck.setFont(FONT_SMALL);
        prioritizeNeedWaterCheck.setSelected(true);
        p.add(prioritizeNeedWaterCheck, c);

        c.gridx = 0; c.gridy = 5; c.gridwidth = 2;
        JPanel costInfo = new JPanel(new GridLayout(3, 1, 2, 2));
        costInfo.setBackground(BG_DARK);
        costInfo.setBorder(new TitledBorder(new LineBorder(BORDER_COLOR), "Cost Function",
                TitledBorder.LEFT, TitledBorder.TOP, FONT_SMALL, TEXT_MUTED));
        costInfo.add(smallInfo("• Missed plants × 100"));
        costInfo.add(smallInfo("• Total walk distance"));
        costInfo.add(smallInfo("• Extra watering × 25"));
        p.add(costInfo, c);

        c.gridy = 6;
        JButton runBtn = accentButton("🔥  Run SA Optimization", ACCENT_AMBER);
        runBtn.addActionListener(e -> runSA());
        p.add(runBtn, c);

        return p;
    }

    private JPanel buildSAResultPanel() {
        JPanel p = card("🏆  Best Result", null, 0);
        p.setLayout(new GridLayout(7, 1, 5, 5));
        p.setBorder(new CompoundBorder(p.getBorder(), new EmptyBorder(8, 10, 8, 10)));

        saCostLabel = new JLabel("Best Cost: —", SwingConstants.CENTER);
        saCostLabel.setFont(new Font("Segoe UI", Font.BOLD, 16));
        saCostLabel.setForeground(ACCENT_AMBER);

        saDistanceLabel = new JLabel("Total Distance: —", SwingConstants.CENTER);
        saDistanceLabel.setFont(FONT_SMALL);
        saDistanceLabel.setForeground(TEXT_PRIMARY);

        saMissedLabel = new JLabel("Missed Plants: —", SwingConstants.CENTER);
        saMissedLabel.setFont(FONT_SMALL);
        saMissedLabel.setForeground(TEXT_PRIMARY);

        saExtraLabel = new JLabel("Extra Watering: —", SwingConstants.CENTER);
        saExtraLabel.setFont(FONT_SMALL);
        saExtraLabel.setForeground(TEXT_PRIMARY);

        saSelectedCountLabel = new JLabel("Selected Count: —", SwingConstants.CENTER);
        saSelectedCountLabel.setFont(FONT_SMALL);
        saSelectedCountLabel.setForeground(TEXT_PRIMARY);

        JLabel seqTitle = new JLabel("Optimal Sequence:", SwingConstants.CENTER);
        seqTitle.setFont(FONT_SMALL);
        seqTitle.setForeground(TEXT_MUTED);

        logArea = new JTextArea(5, 1);
        logArea.setFont(FONT_MONO);
        logArea.setBackground(BG_DARK);
        logArea.setForeground(ACCENT_GREEN);
        logArea.setEditable(false);
        logArea.setWrapStyleWord(true);
        logArea.setLineWrap(true);

        JScrollPane seqScroll = new JScrollPane(logArea);
        styleScrollPane(seqScroll);

        p.add(saCostLabel);
        p.add(saDistanceLabel);
        p.add(saMissedLabel);
        p.add(saExtraLabel);
        p.add(saSelectedCountLabel);
        p.add(seqTitle);
        p.add(seqScroll);

        return p;
    }

    private void loadData() {
        try {
            allPlants = DataLoader.loadData("plants.txt");
            syncSubsetSpinnerLimit();
            setStatus("✅  Loaded " + allPlants.size() + " plants from plants.txt — Ready to train.");
        } catch (Exception ex) {
            setStatus("⚠️  Could not load plants.txt — " + ex.getMessage());
            JOptionPane.showMessageDialog(this,
                    "Could not load plants.txt:\n" + ex.getMessage(),
                    "Data Load Error", JOptionPane.WARNING_MESSAGE);
        }
    }

    private void trainPerceptron() {
        if (allPlants.isEmpty()) { setStatus("⚠️  No data loaded."); return; }

        int epochs = (int) epochSpinner.getValue();
        double lr  = (double) lrSpinner.getValue();

        List<List<Plant>> split = DataLoader.splitData(allPlants, 0.8);
        List<Plant> train = split.get(0);
        List<Plant> test  = split.get(1);

        perceptron = new Perceptron(3, lr);

        SwingWorker<Void, Void> worker = new SwingWorker<Void, Void>() {
            @Override protected Void doInBackground() {
                perceptron.train(train, epochs);
                return null;
            }
            @Override protected void done() {
      
                lossHistory.clear();
                accuracyHistory.clear();
                List<Double> errors  = perceptron.getEpochErrors();
                List<Double> accs    = perceptron.getEpochAccuracies();
                for (int i = 0; i < errors.size(); i++) {
                    lossHistory.add(new double[]{i + 1, errors.get(i)});
                    accuracyHistory.add(new double[]{i + 1, accs.get(i)});
                }

                double trainAcc = perceptron.evaluateAccuracy(train);
                double testAcc  = perceptron.evaluateAccuracy(test);
                double[] w = perceptron.getWeights();

                trainAccLabel.setText(String.format("%.2f%%", trainAcc * 100));
                testAccLabel.setText(String.format("%.2f%%", testAcc  * 100));
                w1Label.setText(String.format("%.4f", w[0]));
                w2Label.setText(String.format("%.4f", w[1]));
                w3Label.setText(String.format("%.4f", w[2]));
                biasLabel.setText(String.format("%.4f", perceptron.getBias()));

                trainAccLabel.setForeground(trainAcc > 0.8 ? ACCENT_GREEN : ACCENT_AMBER);
                testAccLabel.setForeground(testAcc  > 0.8 ? ACCENT_GREEN : ACCENT_AMBER);

                learningCurvePanel.setData(lossHistory, accuracyHistory);
                learningCurvePanel.repaint();

                trained = true;
                setStatus("✅  Training complete — Train: " +
                        String.format("%.1f%%", trainAcc*100) +
                        "  |  Test: " + String.format("%.1f%%", testAcc*100));

                tabbedPane.setSelectedIndex(1);
            }
        };
        setStatus("⏳  Training Perceptron for " + epochs + " epochs...");
        worker.execute();
    }

    private void runPrediction() {
        if (!trained) {
            predictionLabel.setText("⚠️  Train first!");
            predictionLabel.setForeground(ACCENT_RED);
            return;
        }
        try {
            double moisture    = Double.parseDouble(moistureField.getText().trim());
            double lastWatered = Double.parseDouble(lastWateredField.getText().trim());
            int    type        = typeCombo.getSelectedIndex();
            double[] features  = DataLoader.normalize(moisture, lastWatered, type);
            int result         = perceptron.predict(features);

            if (result == 1) {
                predictionLabel.setText("💧  NEEDS WATER");
                predictionLabel.setForeground(ACCENT_BLUE);
            } else {
                predictionLabel.setText("✅  NO WATER NEEDED");
                predictionLabel.setForeground(ACCENT_GREEN);
            }
        } catch (NumberFormatException ex) {
            predictionLabel.setText("⚠️  Invalid input");
            predictionLabel.setForeground(ACCENT_RED);
        }
    }

 
    void addPlantToGarden(Plant p) {
        gardenPlants.add(p);
        refreshGardenTable();
        syncSubsetSpinnerLimit();
        clearSAVisualization();
        gardenPanel.repaint();
        setStatus("📌  Plant added at (" + p.getX() + ", " + p.getY() + ")");
    }

    private void removeSelectedPlant() {
        if (selectedPlantIndex >= 0 && selectedPlantIndex < gardenPlants.size()) {
            gardenPlants.remove(selectedPlantIndex);
            selectedPlantIndex = -1;
            gardenPanel.setSelectedIndex(-1);
            refreshGardenTable();
            syncSubsetSpinnerLimit();
            clearSAVisualization();
            gardenPanel.repaint();
            setStatus("🗑️  Plant removed.");
        }
    }

    private void predictAllGardenPlants() {
        if (!trained) { setStatus("⚠️  Train the Perceptron first!"); return; }
        for (Plant p : gardenPlants) {
            p.setPredictedLabel(perceptron.predict(p.getFeatures()));
        }
        refreshGardenTable();
        gardenPanel.repaint();
        long needWater = gardenPlants.stream().filter(p -> p.getPredictedLabel() == 1).count();
        setStatus("🤖  Predictions done — " + needWater + "/" + gardenPlants.size() + " plants need water.");
    }

    private void refreshGardenTable() {
        gardenTableModel.setRowCount(0);
        for (int i = 0; i < gardenPlants.size(); i++) {
            Plant p = gardenPlants.get(i);
            String pred = p.getPredictedLabel() == 1 ? "💧 Needs Water"
                         : p.getPredictedLabel() == 0 ? "✅ No Water"
                         : "?";
            gardenTableModel.addRow(new Object[]{
                i + 1, p.getTypeName(),
                String.format("%.0f", p.getRawMoisture()),
                String.format("%.0f", p.getRawLastWatered()),
                p.getX(), p.getY(), pred
            });
        }
    }

    private void syncSubsetSpinnerLimit() {
        if (subsetCountModel == null) return;

        int max = Math.max(1, gardenPlants.size());
        subsetCountModel.setMaximum(max);

        int currentValue = ((Number) subsetCountModel.getValue()).intValue();
        if (currentValue > max) {
            subsetCountModel.setValue(max);
        }
    }

    private void clearSAVisualization() {
        saSequence.clear();

        if (gardenPanel != null) {
            gardenPanel.setSASequence(Collections.emptyList());
            gardenPanel.repaint();
        }

        if (saLogArea != null) saLogArea.setText("");
        if (logArea != null) logArea.setText("");

        if (saCostLabel != null) saCostLabel.setText("Best Cost: —");
        if (saDistanceLabel != null) saDistanceLabel.setText("Total Distance: —");
        if (saMissedLabel != null) saMissedLabel.setText("Missed Plants: —");
        if (saExtraLabel != null) saExtraLabel.setText("Extra Watering: —");
        if (saSelectedCountLabel != null) saSelectedCountLabel.setText("Selected Count: —");
    }

    private String buildSequenceSummary(List<Plant> sequence) {
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < sequence.size(); i++) {
            Plant p = sequence.get(i);
            sb.append(i + 1)
              .append(". ")
              .append(p.getTypeName())
              .append(" | M=")
              .append((int) p.getRawMoisture())
              .append(" | LW=")
              .append((int) p.getRawLastWatered())
              .append(" | Pred=")
              .append(p.getPredictionText())
              .append(" | (")
              .append(p.getX())
              .append(", ")
              .append(p.getY())
              .append(")")
              .append("\n");
        }
        return sb.toString();
    }

   
    private void runSA() {
        if (gardenPlants.isEmpty()) {
            setStatus("⚠️  Add plants to the garden first.");
            return;
        }

        if (!trained) {
            setStatus("⚠️  Train the Perceptron first!");
            return;
        }

        predictAllGardenPlants();

        int selectedCount = ((Number) subsetCountSpinner.getValue()).intValue();
        if (selectedCount < 1 || selectedCount > gardenPlants.size()) {
            setStatus("⚠️  Selected count must be between 1 and " + gardenPlants.size());
            return;
        }

        final boolean prioritizeNeedWater = prioritizeNeedWaterCheck.isSelected();
        final double initTemp = ((Number) tempSpinner.getValue()).doubleValue();
        final double coolRate = ((Number) coolSpinner.getValue()).doubleValue();
        final int itersPerT = ((Number) iterSpinner.getValue()).intValue();

        saLogArea.setText("");
        logArea.setText("");

        SwingWorker<SimulatedAnnealing.Result, String> worker =
                new SwingWorker<SimulatedAnnealing.Result, String>() {

            @Override
            protected SimulatedAnnealing.Result doInBackground() {
                SimulatedAnnealing sa = new SimulatedAnnealing();
                return sa.optimize(
                        gardenPlants,
                        selectedCount,
                        prioritizeNeedWater,
                        initTemp,
                        coolRate,
                        itersPerT
                );
            }

            @Override
            protected void done() {
                try {
                    SimulatedAnnealing.Result result = get();
                    saSequence = result.getBestSequence();

                    StringBuilder stepsText = new StringBuilder();
                    for (String s : result.getSteps()) {
                        stepsText.append(s).append("\n");
                    }
                    saLogArea.setText(stepsText.toString());
                    saLogArea.setCaretPosition(saLogArea.getDocument().getLength());

                    saCostLabel.setText(String.format("Best Cost: %.2f", result.getBestCost()));
                    saDistanceLabel.setText(String.format("Total Distance: %.2f", result.getTotalDistance()));
                    saMissedLabel.setText("Missed Plants: " + result.getMissedPlants());
                    saExtraLabel.setText("Extra Watering: " + result.getExtraWatering());
                    saSelectedCountLabel.setText("Selected Count: " + result.getSelectedCount());

                    logArea.setText(buildSequenceSummary(saSequence));

                    gardenPanel.setSASequence(saSequence);
                    gardenPanel.repaint();

                    setStatus("✅  SA complete — Best cost: " +
                            String.format("%.2f", result.getBestCost()) +
                            " | Distance: " + String.format("%.2f", result.getTotalDistance()) +
                            " | Missed: " + result.getMissedPlants() +
                            " | Extra: " + result.getExtraWatering());
                } catch (Exception ex) {
                    setStatus("❌  SA error: " + ex.getMessage());
                    JOptionPane.showMessageDialog(
                            GUI.this,
                            "SA failed:\n" + ex.getMessage(),
                            "Optimization Error",
                            JOptionPane.ERROR_MESSAGE
                    );
                }
            }
        };

        setStatus("🔥  Running Simulated Annealing...");
        worker.execute();
    }

   
    class GardenPanel extends JPanel {
        private JTextField pendingMoisture, pendingLastWatered;
        private JComboBox<String> pendingType;
        private boolean awaitingClick = false;
        private int hoveredIndex = -1;
        private int selectedIndex = -1;
        private List<Plant> saSeq = new ArrayList<>();

        GardenPanel() {
            setBackground(new Color(18, 28, 18));
            setDoubleBuffered(true);
            addMouseListener(new MouseAdapter() {
                @Override public void mouseClicked(MouseEvent e) {
                    if (awaitingClick) placeNewPlant(e.getX(), e.getY());
                    else selectNearestPlant(e.getX(), e.getY());
                }
            });
            addMouseMotionListener(new MouseMotionAdapter() {
                @Override public void mouseMoved(MouseEvent e) {
                    hoveredIndex = findNearest(e.getX(), e.getY(), 20);
                    repaint();
                }
            });
            setCursor(Cursor.getPredefinedCursor(Cursor.CROSSHAIR_CURSOR));
        }

        void setPendingPlantData(JTextField m, JTextField lw, JComboBox<String> t) {
            pendingMoisture = m; pendingLastWatered = lw; pendingType = t;
            awaitingClick = true;
            setCursor(Cursor.getPredefinedCursor(Cursor.HAND_CURSOR));
        }

        void setSelectedIndex(int i) { selectedIndex = i; }
        void setSASequence(List<Plant> seq) {
            saSeq = new ArrayList<>(seq);
        }

        private void placeNewPlant(int px, int py) {
            try {
                double moisture    = Double.parseDouble(pendingMoisture.getText().trim());
                double lastWatered = Double.parseDouble(pendingLastWatered.getText().trim());
                int    type        = pendingType.getSelectedIndex();
                double[] features  = DataLoader.normalize(moisture, lastWatered, type);
                int label = trained ? perceptron.predict(features) : -1;

                Plant p = new Plant(features, label, px, py, moisture, lastWatered, type);
                if (trained) p.setPredictedLabel(label);
                addPlantToGarden(p);
            } catch (NumberFormatException ex) {
                setStatus("⚠️  Invalid plant data.");
            }
            awaitingClick = false;
            setCursor(Cursor.getPredefinedCursor(Cursor.CROSSHAIR_CURSOR));
        }

        private void selectNearestPlant(int px, int py) {
            int idx = findNearest(px, py, 20);
            selectedIndex = idx;
            if (idx >= 0) gardenTable.setRowSelectionInterval(idx, idx);
            repaint();
        }

        private int findNearest(int px, int py, int threshold) {
            int nearest = -1;
            double minDist = threshold;
            for (int i = 0; i < gardenPlants.size(); i++) {
                Plant p = gardenPlants.get(i);
                double d = Math.hypot(px - p.getX(), py - p.getY());
                if (d < minDist) { minDist = d; nearest = i; }
            }
            return nearest;
        }

        @Override protected void paintComponent(Graphics g) {
            super.paintComponent(g);
            Graphics2D g2 = (Graphics2D) g;
            g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);

            drawGrid(g2);
            drawSARoute(g2);
            drawPlants(g2);
        }

        private void drawGrid(Graphics2D g2) {
            g2.setColor(new Color(40, 60, 40, 80));
            g2.setStroke(new BasicStroke(0.5f));
            for (int x = 0; x < getWidth(); x += 50)
                g2.drawLine(x, 0, x, getHeight());
            for (int y = 0; y < getHeight(); y += 50)
                g2.drawLine(0, y, getWidth(), y);
        }

        private void drawSARoute(Graphics2D g2) {
            if (saSeq.size() < 2) return;
            g2.setColor(new Color(240, 180, 60, 120));
            g2.setStroke(new BasicStroke(2f, BasicStroke.CAP_ROUND, BasicStroke.JOIN_ROUND,
                    0, new float[]{8, 5}, 0));
            for (int i = 0; i < saSeq.size() - 1; i++) {
                Plant a = saSeq.get(i), b = saSeq.get(i+1);
                g2.drawLine(a.getX(), a.getY(), b.getX(), b.getY());
                // Arrow
                drawArrow(g2, a.getX(), a.getY(), b.getX(), b.getY());
            }
            // Order labels
            g2.setFont(new Font("Segoe UI", Font.BOLD, 10));
            for (int i = 0; i < saSeq.size(); i++) {
                Plant p = saSeq.get(i);
                g2.setColor(ACCENT_AMBER);
                g2.drawString(String.valueOf(i+1), p.getX() + 12, p.getY() - 8);
            }
        }

        private void drawArrow(Graphics2D g2, int x1, int y1, int x2, int y2) {
            double angle = Math.atan2(y2 - y1, x2 - x1);
            int mx = (x1 + x2) / 2, my = (y1 + y2) / 2;
            int len = 7;
            double spread = Math.PI / 6;
            g2.setStroke(new BasicStroke(1.5f));
            g2.drawLine(mx, my,
                mx - (int)(len * Math.cos(angle - spread)),
                my - (int)(len * Math.sin(angle - spread)));
            g2.drawLine(mx, my,
                mx - (int)(len * Math.cos(angle + spread)),
                my - (int)(len * Math.sin(angle + spread)));
        }

        private void drawPlants(Graphics2D g2) {
            for (int i = 0; i < gardenPlants.size(); i++) {
                Plant p = gardenPlants.get(i);
                int px = p.getX(), py = p.getY();
                int r = 12;
                boolean hov = (i == hoveredIndex);
                boolean sel = (i == selectedIndex);

                if (hov || sel) {
                    Color glow = sel ? new Color(60, 140, 230, 60)
                                     : new Color(255, 255, 255, 30);
                    g2.setColor(glow);
                    g2.fillOval(px - r - 6, py - r - 6, (r + 6) * 2, (r + 6) * 2);
                }

                Color fill = p.getPredictedLabel() == 1 ? new Color(60, 120, 230)
                           : p.getPredictedLabel() == 0 ? new Color(60, 180, 90)
                           : new Color(100, 100, 130);
                g2.setColor(fill);
                g2.fillOval(px - r, py - r, r * 2, r * 2);

        
                g2.setColor(sel ? Color.WHITE : fill.brighter());
                g2.setStroke(new BasicStroke(sel ? 2.5f : 1.5f));
                g2.drawOval(px - r, py - r, r * 2, r * 2);

          
                String icon = p.getRawType() == 0 ? "🌵"
                            : p.getRawType() == 1 ? "🌸" : "🌿";
                g2.setFont(new Font("Segoe UI Emoji", Font.PLAIN, 10));
                g2.setColor(Color.WHITE);
                FontMetrics fm = g2.getFontMetrics();
                g2.drawString(icon, px - fm.stringWidth(icon) / 2, py + 4);

                if (hov || sel) {
                    g2.setFont(FONT_SMALL);
                    g2.setColor(TEXT_PRIMARY);
                    String info = "#" + (i+1) + " " + p.getTypeName() +
                                  " M:" + (int)p.getRawMoisture();
                    g2.setColor(new Color(0, 0, 0, 160));
                    g2.fillRoundRect(px + r + 2, py - 10, fm.stringWidth(info) + 8, 18, 6, 6);
                    g2.setColor(TEXT_PRIMARY);
                    g2.drawString(info, px + r + 6, py + 3);
                }
            }
        }
    }

  
    class SAGardenPanel extends JPanel {
        SAGardenPanel() { setBackground(new Color(18, 18, 28)); }

        @Override protected void paintComponent(Graphics g) {
            super.paintComponent(g);
            Graphics2D g2 = (Graphics2D) g;
            g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);

            if (saSequence.isEmpty()) {
                g2.setColor(TEXT_MUTED);
                g2.setFont(FONT_BODY);
                g2.drawString("Run SA to see optimized route", 30, getHeight() / 2);
                return;
            }

            double scaleX = getWidth()  / 600.0;
            double scaleY = getHeight() / 600.0;

 
            g2.setColor(new Color(240, 180, 60, 150));
            g2.setStroke(new BasicStroke(2f));
            for (int i = 0; i < saSequence.size() - 1; i++) {
                Plant a = saSequence.get(i), b = saSequence.get(i+1);
                g2.drawLine((int)(a.getX()*scaleX), (int)(a.getY()*scaleY),
                            (int)(b.getX()*scaleX), (int)(b.getY()*scaleY));
            }

     
            for (int i = 0; i < saSequence.size(); i++) {
                Plant p = saSequence.get(i);
                int sx = (int)(p.getX() * scaleX);
                int sy = (int)(p.getY() * scaleY);
                Color c = p.getPredictedLabel() == 1 ? ACCENT_BLUE : ACCENT_GREEN;
                g2.setColor(c);
                g2.fillOval(sx - 8, sy - 8, 16, 16);
                g2.setColor(Color.WHITE);
                g2.setFont(new Font("Segoe UI", Font.BOLD, 9));
                g2.drawString(String.valueOf(i+1), sx - 3, sy + 4);
            }
        }
    }


    class LearningCurvePanel extends JPanel {
        private List<double[]> loss = new ArrayList<>();
        private List<double[]> acc  = new ArrayList<>();
        private int pad = 50;

        LearningCurvePanel() { setBackground(BG_CARD); }

        void setData(List<double[]> loss, List<double[]> acc) {
            this.loss = loss; this.acc = acc;
        }

        @Override protected void paintComponent(Graphics g) {
            super.paintComponent(g);
            if (loss.isEmpty()) {
                Graphics2D g2 = (Graphics2D) g;
                g2.setColor(TEXT_MUTED);
                g2.setFont(FONT_BODY);
                g2.drawString("Train the Perceptron to see learning curve", 30, getHeight() / 2);
                return;
            }
            Graphics2D g2 = (Graphics2D) g;
            g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);

            int w = getWidth() - pad * 2;
            int h = getHeight() - pad * 2;

      
            g2.setColor(BORDER_COLOR);
            g2.setStroke(new BasicStroke(1f));
            g2.drawLine(pad, pad, pad, pad + h);
            g2.drawLine(pad, pad + h, pad + w, pad + h);

      
            g2.setColor(new Color(45, 60, 85, 120));
            for (int i = 1; i <= 5; i++) {
                int y = pad + h - (h * i / 5);
                g2.drawLine(pad, y, pad + w, y);
                g2.setColor(TEXT_MUTED);
                g2.setFont(FONT_SMALL);
                g2.drawString(String.format("%.1f", i / 5.0), 2, y + 4);
                g2.setColor(new Color(45, 60, 85, 120));
            }

            int epochs = loss.size();
            double maxLoss = loss.stream().mapToDouble(d -> d[1]).max().orElse(1);

            drawLine(g2, loss, w, h, maxLoss, ACCENT_AMBER, "Loss");

            drawLine(g2, acc, w, h, 1.0, ACCENT_GREEN, "Accuracy");

            int lx = pad + w - 120;
            g2.setFont(FONT_SMALL);
            g2.setColor(ACCENT_AMBER);
            g2.fillRect(lx, pad + 6, 12, 12);
            g2.setColor(TEXT_PRIMARY);
            g2.drawString("Loss", lx + 16, pad + 16);
            g2.setColor(ACCENT_GREEN);
            g2.fillRect(lx, pad + 24, 12, 12);
            g2.setColor(TEXT_PRIMARY);
            g2.drawString("Accuracy", lx + 16, pad + 34);

            g2.setColor(TEXT_MUTED);
            g2.drawString("Epoch", pad + w / 2 - 15, pad + h + 35);
        }

        private void drawLine(Graphics2D g2, List<double[]> data,
                              int w, int h, double maxY, Color color, String name) {
            if (data.isEmpty()) return;
            int n = data.size();
            if (n <= 1) return;
            g2.setColor(color);
            g2.setStroke(new BasicStroke(2f, BasicStroke.CAP_ROUND, BasicStroke.JOIN_ROUND));

            Path2D path = new Path2D.Double();
            for (int i = 0; i < n; i++) {
                int x = pad + (int)((double) i / (n - 1) * w);
                int y = pad + h - (int)(data.get(i)[1] / maxY * h);
                y = Math.max(pad, Math.min(pad + h, y));
                if (i == 0) path.moveTo(x, y);
                else path.lineTo(x, y);
            }
            g2.draw(path);
        }
    }

    private void setStatus(String msg) {
        SwingUtilities.invokeLater(() -> statusLabel.setText("  " + msg));
    }

    private JPanel card(String title, JComponent content, int extraPad) {
        JPanel p = new JPanel(new BorderLayout(0, 6));
        p.setBackground(BG_CARD);
        p.setBorder(new CompoundBorder(
                new LineBorder(BORDER_COLOR, 1, true),
                new EmptyBorder(8 + extraPad, 10 + extraPad, 8 + extraPad, 10 + extraPad)));
        JLabel lbl = new JLabel(title);
        lbl.setFont(FONT_LABEL);
        lbl.setForeground(TEXT_PRIMARY);
        lbl.setBorder(new MatteBorder(0, 0, 1, 0, BORDER_COLOR));
        lbl.setPreferredSize(new Dimension(0, 28));
        p.add(lbl, BorderLayout.NORTH);
        if (content != null) p.add(content, BorderLayout.CENTER);
        return p;
    }

    private JLabel label(String text) {
        JLabel l = new JLabel(text);
        l.setFont(FONT_BODY);
        l.setForeground(TEXT_MUTED);
        return l;
    }

    private JLabel metricLabel(String text) {
        JLabel l = new JLabel(text, SwingConstants.RIGHT);
        l.setFont(new Font("Consolas", Font.BOLD, 12));
        l.setForeground(ACCENT_GREEN);
        return l;
    }

    private JLabel smallInfo(String text) {
        JLabel l = new JLabel(text);
        l.setFont(FONT_SMALL);
        l.setForeground(TEXT_MUTED);
        return l;
    }

    private JTextField styledField(String placeholder) {
        JTextField f = new JTextField(placeholder);
        f.setBackground(BG_DARK);
        f.setForeground(TEXT_PRIMARY);
        f.setFont(FONT_BODY);
        f.setBorder(new CompoundBorder(
                new LineBorder(BORDER_COLOR, 1, true),
                new EmptyBorder(4, 8, 4, 8)));
        f.setCaretColor(TEXT_PRIMARY);
        return f;
    }

    private JSpinner spinner(int val, int min, int max, int step) {
        JSpinner s = new JSpinner(new SpinnerNumberModel(val, min, max, step));
        styleSpinner(s);
        return s;
    }

    private void styleSpinner(JSpinner s) {
        s.setBackground(BG_DARK);
        s.setForeground(TEXT_PRIMARY);
        s.setFont(FONT_BODY);
        JComponent editor = s.getEditor();
        if (editor instanceof JSpinner.DefaultEditor) {
            JTextField tf = ((JSpinner.DefaultEditor) editor).getTextField();
            tf.setBackground(BG_DARK);
            tf.setForeground(TEXT_PRIMARY);
            tf.setFont(FONT_BODY);
            tf.setBorder(new EmptyBorder(3, 6, 3, 6));
            tf.setCaretColor(TEXT_PRIMARY);
        }
        s.setBorder(new LineBorder(BORDER_COLOR, 1, true));
    }

    private void styleCombo(JComboBox<?> cb) {
        cb.setBackground(BG_DARK);
        cb.setForeground(TEXT_PRIMARY);
        cb.setFont(FONT_BODY);
        cb.setBorder(new LineBorder(BORDER_COLOR, 1, true));
        cb.setRenderer(new DefaultListCellRenderer() {
            @Override public Component getListCellRendererComponent(
                    JList<?> l, Object v, int i, boolean sel, boolean focus) {
                super.getListCellRendererComponent(l, v, i, sel, focus);
                setBackground(sel ? ACCENT_BLUE.darker() : BG_CARD);
                setForeground(TEXT_PRIMARY);
                setFont(FONT_BODY);
                setBorder(new EmptyBorder(3, 8, 3, 8));
                return this;
            }
        });
    }

    private JButton accentButton(String text, Color accent) {
        JButton btn = new JButton(text) {
            @Override protected void paintComponent(Graphics g) {
                Graphics2D g2 = (Graphics2D) g;
                g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);
                Color bg = getModel().isPressed()  ? accent.darker().darker()
                         : getModel().isRollover() ? accent.darker()
                         : new Color(accent.getRed(), accent.getGreen(), accent.getBlue(), 30);
                g2.setColor(bg);
                g2.fillRoundRect(0, 0, getWidth(), getHeight(), 8, 8);
                g2.setColor(accent);
                g2.setStroke(new BasicStroke(1.5f));
                g2.drawRoundRect(0, 0, getWidth()-1, getHeight()-1, 8, 8);
                g2.setColor(getModel().isRollover() || getModel().isPressed()
                        ? Color.WHITE : accent);
                g2.setFont(getFont());
                FontMetrics fm = g2.getFontMetrics();
                g2.drawString(getText(),
                        (getWidth()  - fm.stringWidth(getText())) / 2,
                        (getHeight() + fm.getAscent() - fm.getDescent()) / 2);
            }
        };
        btn.setFont(FONT_LABEL);
        btn.setForeground(accent);
        btn.setBackground(BG_CARD);
        btn.setBorderPainted(false);
        btn.setContentAreaFilled(false);
        btn.setFocusPainted(false);
        btn.setCursor(Cursor.getPredefinedCursor(Cursor.HAND_CURSOR));
        btn.setPreferredSize(new Dimension(0, 36));
        return btn;
    }

    private void styleTable(JTable table) {
        table.setBackground(BG_CARD);
        table.setForeground(TEXT_PRIMARY);
        table.setFont(FONT_BODY);
        table.setRowHeight(26);
        table.setGridColor(BORDER_COLOR);
        table.setSelectionBackground(ACCENT_BLUE.darker());
        table.setSelectionForeground(Color.WHITE);
        table.setShowGrid(true);
        table.setIntercellSpacing(new Dimension(1, 1));
        JTableHeader header = table.getTableHeader();
        header.setBackground(BG_PANEL);
        header.setForeground(TEXT_PRIMARY);
        header.setFont(FONT_LABEL);
        header.setBorder(new MatteBorder(0, 0, 1, 0, BORDER_COLOR));
    }

    private void styleScrollPane(JScrollPane sp) {
        sp.setBorder(new LineBorder(BORDER_COLOR, 1));
        sp.setBackground(BG_CARD);
        sp.getViewport().setBackground(BG_CARD);
        sp.getVerticalScrollBar().setBackground(BG_DARK);
        sp.getHorizontalScrollBar().setBackground(BG_DARK);
    }

    private void styleTab(JTabbedPane tp) {
        tp.setBackground(BG_DARK);
        tp.setForeground(TEXT_PRIMARY);
        tp.setBorder(new EmptyBorder(0, 0, 0, 0));
        UIManager.put("TabbedPane.selected", BG_CARD);
        UIManager.put("TabbedPane.background", BG_DARK);
        UIManager.put("TabbedPane.foreground", TEXT_PRIMARY);
        UIManager.put("TabbedPane.focus", new Color(0, 0, 0, 0));
    }
}