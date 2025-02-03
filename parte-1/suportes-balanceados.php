<?php
function suportesBalanceados($s) {
    $pilha = [];
    $pares = [')' => '(', '}' => '{', ']' => '['];
    
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        
        if (in_array($char, ['(', '{', '['])) {
            array_push($pilha, $char);
        } elseif (isset($pares[$char])) {
            if (empty($pilha) || array_pop($pilha) !== $pares[$char]) {
                return false;
            }
        }
    }
    
    return empty($pilha);
}

echo "Digite a sequência de colchetes: ";
$entrada = trim(fgets(STDIN));

$resultado = suportesBalanceados($entrada) ? 'é válido' : 'não é válido';
echo "$resultado";
?>