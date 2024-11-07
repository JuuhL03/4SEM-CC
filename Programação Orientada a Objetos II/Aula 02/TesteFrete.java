public class TesteFrete {
    public static void main(String[] args) {
        Transporte terrestre = new TransporteTerrestre();
        Transporte aereo = new TransporteAereo();
        Transporte maritimo = new TransporteMaritimo();

        Frete frete = new Frete();

        double massa = 100;
        double percurso = 200;

        System.out.println("Frete Terrestre: " + frete.calcular(massa, percurso, terrestre));
        System.out.println("Frete Aéreo: " + frete.calcular(massa, percurso, aereo));
        System.out.println("Frete Marítimo: " + frete.calcular(massa, percurso, maritimo));
    }
}
