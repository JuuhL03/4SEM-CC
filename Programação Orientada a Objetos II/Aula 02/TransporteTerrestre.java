public class TransporteTerrestre extends Transporte {
    @Override
    public double calcularFrete(double peso, double distancia) {
        return peso * distancia * 0.2;
    }
}
