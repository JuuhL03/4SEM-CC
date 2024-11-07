
class Conta:
    def __init__(self, numero, titular, saldo=0):
        self.numero = numero
        self.titular = titular
        self.saldo = saldo

    def sacar(self, valor):
        if valor <= self.saldo:
            self.saldo -= valor
            print(f"Saque de R${valor} realizado com sucesso.")
        else:
            print("Saldo insuficiente.")

    def depositar(self, valor):
        self.saldo += valor
        print(f"Depósito de R${valor} realizado com sucesso.")


class ContaCorrente(Conta):
    def __init__(self, numero, titular, saldo=0, limite_cheque_especial=500):
        super().__init__(numero, titular, saldo)
        self.limite_cheque_especial = limite_cheque_especial

    def sacar(self, valor):
        if valor <= self.saldo + self.limite_cheque_especial:
            self.saldo -= valor
            print(f"Saque de R${valor} realizado com sucesso.")
        else:
            print("Saldo insuficiente, mesmo com o cheque especial.")


class ContaPoupanca(Conta):
    def __init__(self, numero, titular, saldo=0, taxa_juros=0.01):
        super().__init__(numero, titular, saldo)
        self.taxa_juros = taxa_juros

    def calcular_rendimento(self):
        rendimento = self.saldo * self.taxa_juros
        print(f"Rendimento calculado: R${rendimento}")
        return rendimento


class Cliente:
    def __init__(self, nome, cpf):
        self.nome = nome
        self.cpf = cpf
        self.contas = []

    def adicionar_conta(self, conta):
        self.contas.append(conta)
        print(f"Conta adicionada para o cliente {self.nome}.")


class Banco:
    def __init__(self):
        self.clientes = []

    def adicionar_cliente(self, cliente):
        self.clientes.append(cliente)
        print(f"Cliente {cliente.nome} adicionado ao banco.")

    def criar_conta(self, cliente, tipo_conta, numero, saldo=0):
        if tipo_conta == "corrente":
            conta = ContaCorrente(numero, cliente.nome, saldo)
        elif tipo_conta == "poupanca":
            conta = ContaPoupanca(numero, cliente.nome, saldo)
        else:
            print("Tipo de conta inválido.")
            return
        cliente.adicionar_conta(conta)

    def transferir(self, conta_origem, conta_destino, valor):
        if conta_origem.saldo + (conta_origem.limite_cheque_especial if isinstance(conta_origem, ContaCorrente) else 0) >= valor:
            conta_origem.sacar(valor)
            conta_destino.depositar(valor)
            print(f"Transferência de R${valor} realizada com sucesso.")
        else:
            print("Saldo insuficiente para transferência.")

    def gerar_relatorio(self):
        for cliente in self.clientes:
            print(f"Cliente: {cliente.nome}, CPF: {cliente.cpf}")
            for conta in cliente.contas:
                tipo_conta = "Corrente" if isinstance(conta, ContaCorrente) else "Poupança"
                print(f" - Conta {tipo_conta}: {conta.numero}, Saldo: R${conta.saldo}")


banco = Banco()
cliente1 = Cliente("João Silva", "123.456.789-00")
cliente2 = Cliente("Maria Souza", "987.654.321-00")
banco.adicionar_cliente(cliente1)
banco.adicionar_cliente(cliente2)
banco.criar_conta(cliente1, "corrente", 1001, 1000)
banco.criar_conta(cliente1, "poupanca", 1002, 500)
banco.criar_conta(cliente2, "corrente", 1003, 2000)
cliente1.contas[0].depositar(200)
cliente1.contas[1].calcular_rendimento()
banco.transferir(cliente1.contas[0], cliente2.contas[0], 300)
banco.gerar_relatorio()
