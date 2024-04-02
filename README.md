# Sistema de Ordenação simples utilizando QuickSort - Desafio Zukkin 

Apresento um simples sistema de ordenação de números utilizando o algoritmo QuickSort na linguagem PHP, conforme solicitado no desafio/teste proposto.

## Como utilizar:
1. **Gerar números aleatórios:**
   Certifique-se de ter o arquivo `gerador_de_numeros.php` no mesmo diretório do script `ordenacao.php`. Este arquivo é responsável por gerar números aleatórios e armazená-los no arquivo `numeros.txt`.

2. **Executar o script de ordenação:**
   Execute o script PHP `ordenacao.php`. Ele primeiro incluirá o arquivo `gerador_de_numeros.php` para gerar os números aleatórios e, em seguida, ordenará esses números utilizando o algoritmo.

3. **Verificar o resultado:**
   Após a execução do script, o sistema irá gerar um arquivo `numeros_ordenados.txt` contendo os números ordenados. Você pode verificar este arquivo para confirmar se os números foram ordenados corretamente.

4. **Observação sobre a ordenação:**
   No código fornecido, a ordenação é feita em ordem crescente. Se desejar ordenar em ordem decrescente, basta alterar o sinal na linha onde é feita a comparação no algoritmo QuickSort, há uma explicação mais detalhada no comentário dentro do código.

   ```php
   if($v < $pivo) // Altere para $v > $pivo para ordem decrescente
   ```

## Contato:

- **Nome:** Igor Galdino dos Santos
- **Email:** igor.galdino@zuukin.com
