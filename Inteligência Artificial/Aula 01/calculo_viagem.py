
preco_combustivel = float(input("Digite o preço do combustível por litro: "))
gasto_medio = float(input("Digite o gasto médio de combustível do carro (km/l): "))
distancia = float(input("Digite a distância da viagem em km: "))

valor_viagem = (distancia / gasto_medio) * preco_combustivel

print(f"O valor gasto de combustível para a viagem será: R${valor_viagem:.2f}")

if valor_viagem > 100:
    print("Será uma viagem cara.")
else:
    print("Desejamos uma boa viagem!")
