import java.util.ArrayList;
import java.util.List;

public class GerenciadorDeFormas {
    private List<Forma> formas;

    public GerenciadorDeFormas() {
        this.formas = new ArrayList<>();
    }

    public void adicionarForma(Forma forma) {
        formas.add(forma);
    }

    public void exibirDados() {
        for (Forma forma : formas) {
            System.out.println("Área: " + forma.calcularArea());
            System.out.println("Perímetro: " + forma.calcularPerimetro());
            System.out.println();
        }
    }
}
