
def abrir_arquivo(nome):
    lista_alunos = []
    try:
        with open(nome, 'r') as arq:
            for linha in arq:
                dados = linha.strip().split(', ')
                nome_aluno = dados[0]
                notas_aluno = list(map(float, dados[1:]))
                lista_alunos.append((nome_aluno, notas_aluno))
    except FileNotFoundError:
        print(f"Arquivo '{nome}' não encontrado.")
    return lista_alunos

def calcular_media_aluno(notas):
    return sum(notas) / len(notas) if notas else 0

def salvar_relatorio(lista_alunos, nome_relatorio='relatorio.txt'):
    with open(nome_relatorio, 'w') as arq:
        for nome, notas in lista_alunos:
            media = calcular_media_aluno(notas)
            notas_texto = ', '.join(f"{nota:.1f}" for nota in notas)
            arq.write(f"{nome}, Notas: {notas_texto}, Média: {media:.2f}\n")
    print(f"Relatório salvo em '{nome_relatorio}'.")

def media_turma(lista_alunos):
    total_notas = 0
    total_alunos = 0
    for _, notas in lista_alunos:
        total_notas += sum(notas)
        total_alunos += len(notas)
    return total_notas / total_alunos if total_alunos > 0 else 0

def main():
    nome_arquivo = 'alunos.txt'
    lista_alunos = abrir_arquivo(nome_arquivo)
    
    if lista_alunos:
        salvar_relatorio(lista_alunos)
        media_geral = media_turma(lista_alunos)
        print(f"Média geral da turma: {media_geral:.2f}")

if __name__ == "__main__":
    main()
