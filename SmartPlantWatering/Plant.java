import java.util.Objects;

public class Plant {
    private static int NEXT_ID = 1;

    private final int id;
    private double[] features;
    private int actualLabel;
    private int predictedLabel;
    private int x, y;
    private double rawMoisture, rawLastWatered;
    private int rawType;

    public Plant(double[] features, int actualLabel, int x, int y,
                 double rawMoisture, double rawLastWatered, int rawType) {
        this.id = NEXT_ID++;
        this.features = features;
        this.actualLabel = actualLabel;
        this.predictedLabel = -1;
        this.x = x;
        this.y = y;
        this.rawMoisture = rawMoisture;
        this.rawLastWatered = rawLastWatered;
        this.rawType = rawType;
    }

    public int getId() {
        return id;
    }

    public double[] getFeatures() {
        return features;
    }

    public int getActualLabel() {
        return actualLabel;
    }

    public void setActualLabel(int actualLabel) {
        this.actualLabel = actualLabel;
    }

    public int getPredictedLabel() {
        return predictedLabel;
    }

    public void setPredictedLabel(int predictedLabel) {
        this.predictedLabel = predictedLabel;
    }

    public int getX() {
        return x;
    }

    public int getY() {
        return y;
    }

    public double getRawMoisture() {
        return rawMoisture;
    }

    public double getRawLastWatered() {
        return rawLastWatered;
    }

    public int getRawType() {
        return rawType;
    }

    public String getTypeName() {
        switch (rawType) {
            case 0: return "Cactus";
            case 1: return "Flower";
            case 2: return "Herb";
            default: return "Unknown";
        }
    }

    public double distanceTo(Plant other) {
        int dx = x - other.x;
        int dy = y - other.y;
        return Math.sqrt(dx * dx + dy * dy);
    }

    public String getPredictionText() {
        if (predictedLabel == 1) return "Needs Water";
        if (predictedLabel == 0) return "No Water Needed";
        return "Not Predicted";
    }

    @Override
    public String toString() {
        return "Plant{id=" + id +
                ", type=" + getTypeName() +
                ", moisture=" + rawMoisture +
                ", lastWatered=" + rawLastWatered +
                ", predicted=" + predictedLabel +
                ", x=" + x +
                ", y=" + y + "}";
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (!(o instanceof Plant)) return false;
        Plant plant = (Plant) o;
        return id == plant.id;
    }

    @Override
    public int hashCode() {
        return Objects.hash(id);
    }
}