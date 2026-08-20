import java.util.*;
public class Perceptron {
    private double[] weights;
    private double bias;
    private double learningRate;
    private List<Double> epochErrors = new ArrayList<>();
    private List<Double> epochAccuracies = new ArrayList<>();

    public Perceptron(int inputSize) { this(inputSize, 0.1); }
    public Perceptron(int inputSize, double learningRate) {
        this.weights = new double[inputSize];
        this.learningRate = learningRate;
        this.bias = 0.0;
        Random random = new Random();
        for(int i=0;i<inputSize;i++) weights[i] = random.nextDouble()-0.5;
    }
    public int predict(double[] inputs) {
        double sum = bias;
        for(int i=0;i<inputs.length;i++) sum += inputs[i]*weights[i];
        return sum >= 0 ? 1 : 0;
    }
    public void train(List<Plant> data, int epochs) {
        epochErrors.clear(); epochAccuracies.clear();
        for(int epoch=0;epoch<epochs;epoch++) {
            Collections.shuffle(data);
            int totalErrors=0, correct=0;
            for(Plant plant : data) {
                int prediction = predict(plant.getFeatures());
                int error = plant.getActualLabel() - prediction;
                if(error==0) correct++; else totalErrors++;
                for(int i=0;i<weights.length;i++)
                    weights[i] += learningRate * error * plant.getFeatures()[i];
                bias += learningRate * error;
            }
            epochErrors.add((double)totalErrors);
            epochAccuracies.add((double)correct/data.size());
        }
    }
    public double evaluateAccuracy(List<Plant> data) {
        if(data==null||data.isEmpty()) return 0.0;
        int correct=0;
        for(Plant plant:data) if(predict(plant.getFeatures())==plant.getActualLabel()) correct++;
        return (double)correct/data.size();
    }
    public double[] getWeights()            { return weights; }
    public double getBias()                 { return bias; }
    public double getLearningRate()         { return learningRate; }
    public List<Double> getEpochErrors()    { return epochErrors; }
    public List<Double> getEpochAccuracies(){ return epochAccuracies; }
    public String getModelSummary() {
        StringBuilder sb = new StringBuilder("Weights: ");
        for(int i=0;i<weights.length;i++) sb.append(String.format("w%d=%.4f ",i+1,weights[i]));
        sb.append(String.format("| Bias=%.4f",bias));
        return sb.toString();
    }
}
