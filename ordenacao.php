<?php

/*
Nome: Igor Galdino dos Santos
Email: igor.galdino@zuukin.com
Data: 02/04/2024
*/

//Abre o arquivo gerador_de_numeros.php, para gerar os números aleatórios.
include 'gerador_de_numeros.php';

//Define a função de ordenação, foi utilizado o algoritimo QuickSort.
function quicksort($numeros) {
    if (count($numeros) < 2) {
        return $numeros;
    }
    $esquerda = $direita = array();
    reset($numeros);
    $chave = key($numeros);
    $pivo = array_shift($numeros);
    foreach($numeros as $k => $v) {
        if ($v < $pivo)/* Colocar o sinal de menor ( < ) caso queira que a ordenação seja feita do menor para o maior,
        ou colocar o sinal de maior ( > ), caso queira que a ordenação seja feita do maior para o menor.*/
            $esquerda[$k] = $v;
        else
            $direita[$k] = $v;
    }
    return array_merge(quicksort($esquerda), array($chave => $pivo), quicksort($direita));
}

// Nome do arquivo de entrada e saída
$arquivo_entrada = 'numeros_desordenados.txt'; //Nome do arquivo de entrada, gerado pelo gerador_de_numeros.php
$arquivo_saida = 'numeros_ordenados.txt'; 

// Abre o arquivo de entrada
$handle_entrada = fopen($arquivo_entrada, "r");

// Verifica se o arquivo de entrada foi aberto corretamente
if ($handle_entrada) {
    // Inicializa um buffer para armazenar os números
    $buffer = array();

    // Loop para ler o arquivo de entrada linha por linha
    while (($linha = fgets($handle_entrada)) !== false) {
        // Adiciona o número ao buffer
        $buffer[] = intval($linha);

        // Verifica se o buffer atingiu um tamanho máximo - O Buffer pode ser alterado conforme a necessidade, coloquei 10 mil, pois o gerador de números gera 100 mil números.
        if (count($buffer) >= 10000) {
            // Ordena o buffer
            $buffer = quicksort($buffer);

            // Escreve os números ordenados no arquivo de saída
            file_put_contents($arquivo_saida, implode(PHP_EOL, $buffer) . PHP_EOL, FILE_APPEND);

            // Limpa o buffer
            $buffer = array();
        }
    }

    // Ordena e escreve os números restantes no buffer
    if (!empty($buffer)) {
        $buffer = quicksort($buffer);
        file_put_contents($arquivo_saida, implode(PHP_EOL, $buffer) . PHP_EOL, FILE_APPEND);
    }

    // Fecha o arquivo de entrada
    fclose($handle_entrada);

    // Exibe mensagem de sucesso
    echo "Arquivo ordenado com sucesso: $arquivo_saida\n";
} else  
{
    // Exibe mensagem de erro se o arquivo de entrada não pôde ser aberto
    echo "Erro ao abrir o arquivo de entrada: $arquivo_entrada\n";
}
?>
