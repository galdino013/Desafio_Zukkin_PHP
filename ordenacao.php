<?php

/*
Nome: Igor Galdino dos Santos
Email: igor.galdino@zuukin.com
Data: 02/04/2024
*/

//Abre o arquivo gerador_de_numeros.php, para gerar os números aleatórios.
include ('gerador_de_numeros.php');

//Define que a varivável $numeros abra o arquivo numeros.txt gerado pelo gerador de numeros.
$numeros = file('numeros.txt');

//Define a função de ordenação, foi utilizado o algoritimo QuickSort.
function quicksort($numeros) {
    if(count($numeros) < 2) {
        return $numeros;
    }
    $esquerda = $direita = array();
    reset($numeros);
    $chave = key($numeros);
    $pivo = array_shift($numeros);
    foreach($numeros as $k => $v) {
        if($v < $pivo) /* Colocar o sinal de menor ( < ) caso queira que a ordenação seja feita do menor para o maior,
        ou colocar o sinal de maior ( > ), caso queira que a ordenação seja feita do maior para o menor.*/
            $esquerda[$k] = $v;
        else
            $direita[$k] = $v;
    }
    return array_merge(quicksort($esquerda), array($chave => $pivo), quicksort($direita));
}
// É chamada a função quicksort e armazenado os números ordenados.
$numeros_ordenados = quicksort($numeros);

// Abre o arquivo no modo de gravação ou criará um arquivo se ele não existir.
$arquivo = fopen('numeros_ordenados.txt', 'w');

// Escreve os numeros ordenados no arquivo.
foreach($numeros_ordenados as $numeros_ord) {
    fwrite($arquivo, $numeros_ord . PHP_EOL);
}

// Fecha o arquivo
fclose($arquivo);

// Mostra ao usúario que o arquivo foi ordenado e criado com sucesso ou se deu erro na criação.
if (file_exists('numeros_ordenados.txt')) {
    print("Arquivo ordenado com sucesso: numeros_ordenados.txt");
    echo "<br> </br>";
} else {
    echo "Houve um erro ao criar o arquivo.";
}
