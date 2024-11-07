public class Main {
    public static void main(String[] args) {
        SistemaCotacao sistema = new SistemaCotacao();

        CotacaoMoeda dolar = new ConversaoDolar();
        CotacaoMoeda euro = new ConversaoEuro();
        CotacaoMoeda libra = new ConversaoLibra();
        CotacaoMoeda iene = new ConversaoIene();

        double valor = 100;

        System.out.println("Valor em Dólar: " + sistema.realizarConversao(dolar, valor));
        System.out.println("Valor em Euro: " + sistema.realizarConversao(euro, valor));
        System.out.println("Valor em Libra: " + sistema.realizarConversao(libra, valor));
        System.out.println("Valor em Iene: " + sistema.realizarConversao(iene, valor));
    }
}
