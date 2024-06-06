<?php

function splitString($str) {
    $groups = [];
    $currentGroup = '';

    for ($i = 0; $i < strlen($str); $i++) {
        // Jika karakter saat ini sama dengan karakter sebelumnya, tambahkan ke grup saat ini
        if ($i > 0 && $str[$i] == $str[$i - 1]) {
            $currentGroup .= $str[$i];
        } else {
            // Jika karakter saat ini berbeda dari karakter sebelumnya, tambahkan grup sebelumnya ke array hasil
            // dan mulai grup baru dengan karakter saat ini
            if ($currentGroup !== '') {
                $groups[] = $currentGroup;
            }
            $currentGroup = $str[$i];
        }
    }

    // Tambahkan grup terakhir ke array hasil
    if ($currentGroup !== '') {
        $groups[] = $currentGroup;
    }

    return $groups;
}


function calculateWeights($str) {
    $weights = [];
    $length = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        $char = $str[$i];
        $weight = ord($char) - ord('a') + 1;
        $totalWeight = $weight;

        // Simpan bobot nilai karakter tunggal
        $weights[$char] = $totalWeight;

        // Menangani karakter yang berulang
        for ($j = $i + 1; $j < $length && $str[$j] == $char; $j++) {
            $totalWeight += $weight;
            // Simpan bobot substring
            $weights[substr($str, $i, $j - $i + 1)] = $totalWeight;
        }

        // Perbarui $i ke posisi terakhir dari karakter yang berulang
        $i = $j - 1;
    }

    return $weights;
}

// Input
$string = "abbcccd";
$queries = [1, 4, 9, 8];

$groups = splitString($string);

// Hitung bobot
$weights = calculateWeights($string);
echo "Weights: \n";
foreach ($weights as $key => $value) {
    echo "$key : $value\n";
}
echo "\n";

// Tampilkan bobot untuk setiap karakter
$results = [];

foreach ($groups as $key => $group) {
    $query = $queries[$key];
    $results[] = ($weights[$group] == $query) ? "Yes" : "No";
}

print_r($results);