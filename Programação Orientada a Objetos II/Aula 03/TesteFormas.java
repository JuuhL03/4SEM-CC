public class TesteFormas {
    public static void main(String[] args) {
        GerenciadorDeFormas gerenciador = new GerenciadorDeFormas();

        Forma bola = new Circulo(5);
        Forma quadro = new Retangulo(4, 7);
        Forma piramide = new Triangulo(3, 4);

        gerenciador.adicionarForma(bola);
        gerenciador.adicionarForma(quadro);
        gerenciador.adicionarForma(piramide);

        gerenciador.exibirDados();
    }
}
