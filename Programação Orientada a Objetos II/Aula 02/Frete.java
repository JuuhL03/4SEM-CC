public class Frete {
    public double calcular(double massa, double percurso, Transporte transporte) {
        return transporte.calcularFrete(massa, percurso);
    }
}
