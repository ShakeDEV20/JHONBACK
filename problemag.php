<?php

$n = 3; 
$matriz = [
    [70, 60, 80],  
    [90, 85, 75],  
    [60, 80, 90]   
];


$indices = range(0, $n - 1);
$permutacoes = [];
$stack = [[]]; 
while ($stack) {
    $current = array_pop($stack);
    if (count($current) == $n) {
        $permutacoes[] = $current;
    } else {
        for ($i = 0; $i < $n; $i++) {
            if (!in_array($i, $current)) {
                $newPermutacao = array_merge($current, [$i]);
                $stack[] = $newPermutacao;
            }
        }
    }
}


$maxConfiança = 0;
$melhorPermutacao = [];


foreach ($permutacoes as $permutacao) {
    $confiançaTotal = 1;
    for ($i = 0; $i < $n; $i++) {
        $confiançaTotal *= $matriz[$i][$permutacao[$i]];
    }

    if ($confiançaTotal > $maxConfiança) {
        $maxConfiança = $confiançaTotal;
        $melhorPermutacao = $permutacao;
    }
}


echo implode(' ', array_map(function($item) { return $item + 1; }, $melhorPermutacao)) . "\n";
?>