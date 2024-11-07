
numeros = list(range(1, 11))
for numero in numeros:
    print(numero ** 2)

frutas = ('banana', 'maçã', 'laranja', 'uva', 'manga')
if 'maçã' in frutas:
    print("A fruta 'maçã' está na tupla.")
else:
    print("A fruta 'maçã' não está na tupla.")

conjunto1 = {1, 2, 3, 4, 5}
conjunto2 = {4, 5, 6, 7, 8}
intersecao = conjunto1.intersection(conjunto2)
print("A interseção entre os conjuntos é:", intersecao)

alunos = {
    'Ana': 8.5,
    'Bruno': 7.0,
    'Carlos': 9.2
}
alunos['Diana'] = 8.0
print("Dicionário de alunos e suas notas:", alunos)
