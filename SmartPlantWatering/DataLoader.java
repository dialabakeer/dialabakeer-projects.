import java.io.*;
import java.util.*;
public class DataLoader {
    public static List<Plant> loadData(String filename) throws Exception {
        List<Plant> data = new ArrayList<>();
        File file = resolveFile(filename);
        try(BufferedReader br = new BufferedReader(new FileReader(file))) {
            String line = br.readLine();
            while((line=br.readLine())!=null) {
                line = line.trim();
                if(line.isEmpty()) continue;
                String[] parts = line.split("\\s+");
                if(parts.length<4) continue;
                double rawMoisture    = Double.parseDouble(parts[0]);
                double rawLastWatered = Double.parseDouble(parts[1]);
                int    rawType        = (int)Double.parseDouble(parts[2]);
                int    label          = Integer.parseInt(parts[3]);
                double[] features     = normalize(rawMoisture, rawLastWatered, rawType);
                data.add(new Plant(features, label, 0, 0, rawMoisture, rawLastWatered, rawType));
            }
        }
        return data;
    }
    public static List<List<Plant>> splitData(List<Plant> data, double trainRatio) {
        List<Plant> shuffled = new ArrayList<>(data);
        Collections.shuffle(shuffled, new Random(42));
        int trainSize = (int)(shuffled.size()*trainRatio);
        List<List<Plant>> result = new ArrayList<>();
        result.add(new ArrayList<>(shuffled.subList(0,trainSize)));
        result.add(new ArrayList<>(shuffled.subList(trainSize,shuffled.size())));
        return result;
    }
    public static double[] normalize(double moisture, double lastWatered, int type) {
        return new double[]{ moisture/100.0, lastWatered/48.0, type/2.0 };
    }
    private static File resolveFile(String filename) throws FileNotFoundException {
        String[] candidates = { filename, "./"+filename, "src/"+filename,
                System.getProperty("user.dir")+File.separator+filename };
        for(String path:candidates) { File f=new File(path); if(f.exists()) return f; }
        throw new FileNotFoundException("Could not find file: "+filename);
    }
}
