
# Exercício 1
# Faça um programa que peça uma nota, entre zero e dez. Mostre uma mensagem caso o valor seja inválido e continue pedindo até que o usuário informe um valor válido.

while True:
    nota = float(input("Digite uma nota entre 0 e 10: "))
    if 0 <= nota <= 10:
        print("Nota válida!")
        break
    else:
        print("Valor inválido! Tente novamente.")

# Exercício 2
# Faça um programa que leia um nome de usuário e sua senha e não aceite a senha igual ao nome do usuário, mostrando uma mensagem de erro e voltando a pedir as informações.

while True:
    nome = input("Digite o nome de usuário: ")
    senha = input("Digite a senha: ")
    if senha == nome:
        print("Erro! A senha não pode ser igual ao nome do usuário.")
    else:
        print("Usuário e senha aceitos!")
        break

# Exercício 3
# Supondo que a população de um país A seja da ordem de 80.000 habitantes com uma taxa anual de crescimento de 3% e que a população de B seja 200.000 habitantes com uma taxa de crescimento de 1.5%.
# Faça um programa que calcule e escreva o número de anos necessários para que a população do país A ultrapasse ou iguale a população do país B.

populacao_a = 80000
populacao_b = 200000
anos = 0

while populacao_a <= populacao_b:
    populacao_a += populacao_a * 0.03
    populacao_b += populacao_b * 0.015
    anos += 1

print(f"Serão necessários {anos} anos para que a população do país A ultrapasse ou iguale a população do país B.")

# Exercício 4
# Faça um programa que imprima na tela apenas os números ímpares entre 1 e 50.

for numero in range(1, 51):
    if numero % 2 != 0:
        print(numero)

# Exercício 5
# Faça um programa que mostre a tabuada de um número informado pelo usuário.

numero = int(input("Digite um número para ver sua tabuada: "))

for i in range(1, 11):
    print(f"{numero} x {i} = {numero * i}")
