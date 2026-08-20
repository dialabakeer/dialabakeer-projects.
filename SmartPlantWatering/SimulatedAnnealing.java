import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Random;

public class SimulatedAnnealing {

    private static final double MISSED_PLANT_PENALTY = 100.0;
    private static final double EXTRA_WATERING_PENALTY = 25.0;

    public static class Metrics {
        private final double distance;
        private final int missedPlants;
        private final int extraWatering;
        private final double totalCost;

        public Metrics(double distance, int missedPlants, int extraWatering) {
            this.distance = distance;
            this.missedPlants = missedPlants;
            this.extraWatering = extraWatering;
            this.totalCost = distance
                    + missedPlants * MISSED_PLANT_PENALTY
                    + extraWatering * EXTRA_WATERING_PENALTY;
        }

        public double getDistance() {
            return distance;
        }

        public int getMissedPlants() {
            return missedPlants;
        }

        public int getExtraWatering() {
            return extraWatering;
        }

        public double getTotalCost() {
            return totalCost;
        }
    }

    public static class Result {
        private final List<Plant> bestSequence;
        private final double bestCost;
        private final double totalDistance;
        private final int missedPlants;
        private final int extraWatering;
        private final int selectedCount;
        private final List<String> steps;

        public Result(List<Plant> bestSequence,
                      double bestCost,
                      double totalDistance,
                      int missedPlants,
                      int extraWatering,
                      int selectedCount,
                      List<String> steps) {
            this.bestSequence = bestSequence;
            this.bestCost = bestCost;
            this.totalDistance = totalDistance;
            this.missedPlants = missedPlants;
            this.extraWatering = extraWatering;
            this.selectedCount = selectedCount;
            this.steps = steps;
        }

        public List<Plant> getBestSequence() {
            return bestSequence;
        }

        public double getBestCost() {
            return bestCost;
        }

        public double getTotalDistance() {
            return totalDistance;
        }

        public int getMissedPlants() {
            return missedPlants;
        }

        public int getExtraWatering() {
            return extraWatering;
        }

        public int getSelectedCount() {
            return selectedCount;
        }

        public List<String> getSteps() {
            return steps;
        }
    }

    public Result optimize(List<Plant> allPlants,
                           int selectedCount,
                           boolean prioritizeNeedWater,
                           double initialTemperature,
                           double coolingRate,
                           int iterationsPerTemp) {

        if (allPlants == null || allPlants.isEmpty()) {
            throw new IllegalArgumentException("No plants available for optimization.");
        }
        if (selectedCount < 1 || selectedCount > allPlants.size()) {
            throw new IllegalArgumentException(
                    "Selected count must be between 1 and " + allPlants.size() + "."
            );
        }
        if (initialTemperature <= 0) {
            throw new IllegalArgumentException("Initial temperature must be > 0.");
        }
        if (coolingRate <= 0 || coolingRate >= 1) {
            throw new IllegalArgumentException("Cooling rate must be between 0 and 1.");
        }
        if (iterationsPerTemp < 1) {
            throw new IllegalArgumentException("Iterations per temperature must be >= 1.");
        }

        Random random = new Random();

        List<Plant> current = buildInitialCandidate(allPlants, selectedCount, prioritizeNeedWater, random);
        Metrics currentMetrics = evaluate(allPlants, current);

        List<Plant> best = new ArrayList<>(current);
        Metrics bestMetrics = currentMetrics;

        double temperature = initialTemperature;
        int stepCount = 1;
        List<String> steps = new ArrayList<>();

        steps.add("=== SA START ===");
        steps.add("Initial candidate size = " + selectedCount);
        steps.add("Initial Temperature = " + String.format("%.2f", initialTemperature));
        steps.add("Cooling Rate = " + String.format("%.3f", coolingRate));
        steps.add("Iterations / Temp = " + iterationsPerTemp);
        steps.add(formatMetrics("Initial", currentMetrics));

        while (temperature > 1.0) {
            for (int i = 0; i < iterationsPerTemp; i++) {
                List<Plant> neighbor = generateNeighbor(allPlants, current, random);
                Metrics neighborMetrics = evaluate(allPlants, neighbor);

                double delta = neighborMetrics.getTotalCost() - currentMetrics.getTotalCost();

                boolean accept;
                String reason;

                if (delta < 0) {
                    accept = true;
                    reason = "better";
                } else {
                    double probability = Math.exp(-delta / temperature);
                    double roll = random.nextDouble();
                    accept = roll < probability;
                    reason = accept
                            ? String.format("probabilistic accept (p=%.4f, r=%.4f)", probability, roll)
                            : String.format("rejected (p=%.4f, r=%.4f)", probability, roll);
                }

                if (accept) {
                    current = neighbor;
                    currentMetrics = neighborMetrics;
                }

                if (currentMetrics.getTotalCost() < bestMetrics.getTotalCost()) {
                    best = new ArrayList<>(current);
                    bestMetrics = currentMetrics;
                    steps.add("Step " + stepCount + " -> New Best | " +
                            formatMetrics("Best", bestMetrics) +
                            " | reason: " + reason);
                }

                stepCount++;
            }

            temperature *= coolingRate;
        }

        steps.add("=== SA END ===");
        steps.add(formatMetrics("Final Best", bestMetrics));

        return new Result(
                best,
                bestMetrics.getTotalCost(),
                bestMetrics.getDistance(),
                bestMetrics.getMissedPlants(),
                bestMetrics.getExtraWatering(),
                best.size(),
                steps
        );
    }

    private List<Plant> buildInitialCandidate(List<Plant> allPlants,
                                              int selectedCount,
                                              boolean prioritizeNeedWater,
                                              Random random) {
        List<Plant> candidate = new ArrayList<>();

        if (prioritizeNeedWater) {
            List<Plant> needWater = new ArrayList<>();
            List<Plant> others = new ArrayList<>();

            for (Plant p : allPlants) {
                if (p.getPredictedLabel() == 1) {
                    needWater.add(p);
                } else {
                    others.add(p);
                }
            }

            Collections.shuffle(needWater, random);
            Collections.shuffle(others, random);

            for (Plant p : needWater) {
                if (candidate.size() >= selectedCount) break;
                candidate.add(p);
            }
            for (Plant p : others) {
                if (candidate.size() >= selectedCount) break;
                candidate.add(p);
            }
        } else {
            List<Plant> shuffled = new ArrayList<>(allPlants);
            Collections.shuffle(shuffled, random);
            candidate.addAll(shuffled.subList(0, selectedCount));
        }

        Collections.shuffle(candidate, random);
        return candidate;
    }

    private List<Plant> generateNeighbor(List<Plant> allPlants, List<Plant> current, Random random) {
        List<Plant> neighbor = new ArrayList<>(current);

        if (neighbor.isEmpty()) return neighbor;

        double moveType = random.nextDouble();

        if (moveType < 0.50 && neighbor.size() > 1) {
            // swap two plants inside the selected sequence
            int i = random.nextInt(neighbor.size());
            int j = random.nextInt(neighbor.size());
            while (j == i && neighbor.size() > 1) {
                j = random.nextInt(neighbor.size());
            }
            Collections.swap(neighbor, i, j);
        } else if (moveType < 0.85) {
            // replace one selected plant with one outside the sequence
            List<Plant> outside = new ArrayList<>();
            for (Plant p : allPlants) {
                if (!neighbor.contains(p)) {
                    outside.add(p);
                }
            }

            if (!outside.isEmpty()) {
                int removeIndex = random.nextInt(neighbor.size());
                Plant newPlant = outside.get(random.nextInt(outside.size()));
                neighbor.set(removeIndex, newPlant);
            }
        } else if (neighbor.size() > 2) {
    
            int i = random.nextInt(neighbor.size());
            int j = random.nextInt(neighbor.size());
            if (i > j) {
                int temp = i;
                i = j;
                j = temp;
            }
            while (i < j) {
                Collections.swap(neighbor, i, j);
                i++;
                j--;
            }
        }

        return neighbor;
    }

    private Metrics evaluate(List<Plant> allPlants, List<Plant> sequence) {
        double distance = calculateDistance(sequence);
        int missed = calculateMissedPlants(allPlants, sequence);
        int extra = calculateExtraWatering(sequence);
        return new Metrics(distance, missed, extra);
    }

    private double calculateDistance(List<Plant> sequence) {
        double total = 0.0;
        for (int i = 0; i < sequence.size() - 1; i++) {
            total += sequence.get(i).distanceTo(sequence.get(i + 1));
        }
        return total;
    }

    private int calculateMissedPlants(List<Plant> allPlants, List<Plant> sequence) {
        int missed = 0;
        for (Plant p : allPlants) {
            if (p.getPredictedLabel() == 1 && !sequence.contains(p)) {
                missed++;
            }
        }
        return missed;
    }

    private int calculateExtraWatering(List<Plant> sequence) {
        int extra = 0;
        for (Plant p : sequence) {
            if (p.getPredictedLabel() == 0) {
                extra++;
            }
        }
        return extra;
    }

    private String formatMetrics(String label, Metrics metrics) {
        return label +
                " -> Cost=" + String.format("%.2f", metrics.getTotalCost()) +
                ", Distance=" + String.format("%.2f", metrics.getDistance()) +
                ", Missed=" + metrics.getMissedPlants() +
                ", Extra=" + metrics.getExtraWatering();
    }
}