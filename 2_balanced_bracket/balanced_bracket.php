<?php

function isBalanced($input) {
    $stack = [];
    // Mapping untuk pasangan bracket buka dan tutup
    $brackets = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    
    // Iterasi setiap karakter dalam input
    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];
        
        // Jika karakter adalah bracket buka, masukkan ke dalam stack
        if (in_array($char, $brackets)) {
            array_push($stack, $char);
        } elseif (isset($brackets[$char])) {
            // Jika karakter adalah bracket tutup, cek apakah stack kosong atau top stack tidak sesuai
            if (empty($stack) || array_pop($stack) != $brackets[$char]) {
                return "NO";
            }
        }
    }
    
    // Jika stack kosong, berarti semua bracket seimbang
    return empty($stack) ? "YES" : "NO";
}
// Input
// $inputs = [
//     "{[()]}",
//     "{[(])}",
//     "{(([])[[]])[]}"
// ];

// Output hasil
// foreach ($inputs as $input) {
//     echo isBalanced($input) . PHP_EOL;
// }

// Input
$input = "{(([])[[]])[]}";

// Output hasil
echo isBalanced($input) . PHP_EOL;