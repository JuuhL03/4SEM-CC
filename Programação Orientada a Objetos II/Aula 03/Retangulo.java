public class Retangulo implements Forma {
    private double largura;
    private double altura;

    public Retangulo(double largura, double altura) {
        this.largura = largura;
        this.altura = altura;
    }

    @Override
    public double calcularArea() {
        return largura * altura;
    }

    @Override
    public double calcularPerimetro() {
        return 2 * (largura + altura);
    }
}
