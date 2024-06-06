<?php

function highestPalindrome($string, $k) {
    if ($k < 0) {
        return -1; // Aturan 1: Mengembalikan -1 jika k kurang dari 0
    }

    // Periksa jika string sudah merupakan palindrome
    if (isPalindrome($string)) {
        return $string;
    }

    // Konversi string ke array untuk mempermudah manipulasi karakter
    $stringArray = str_split($string);
    $length = strlen($string);

    // Panggil fungsi rekursif untuk mencari palindrome tertinggi
    return recursiveReplacement($stringArray, 0, $length - 1, $k);
}

function recursiveReplacement(&$stringArray, $left, $right, &$k) {
    // Jika pointer kiri melebihi pointer kanan, proses string selesai
    if ($left >= $right) {
        // Konversi array kembali ke string
        $palindrome = implode($stringArray);
        // Jika string bukan palindrome, kembalikan -1
        if (!isPalindrome($palindrome)) {
            return -1;
        }
        // Jika string adalah palindrome, kembalikan string tersebut
        return $palindrome;
    }

    // Jika karakter pada posisi kiri sama dengan karakter pada posisi kanan, lanjutkan ke karakter berikutnya
    if ($stringArray[$left] === $stringArray[$right]) {
        return recursiveReplacement($stringArray, $left + 1, $right - 1, $k);
    }

    // Ganti karakter pada posisi kiri dengan karakter yang lebih besar dari kedua karakter
    $stringArray[$left] = max($stringArray[$left], $stringArray[$right]);
    // Ganti karakter pada posisi kanan dengan karakter yang sama seperti posisi kiri
    $stringArray[$right] = $stringArray[$left];
    // Kurangi k karena satu penggantian karakter sudah dilakukan
    $k--;

    // Jika k menjadi negatif, kembalikan -1
    if ($k < 0) {
        return -1;
    }

    // Panggil fungsi rekursif untuk memproses karakter berikutnya
    return recursiveReplacement($stringArray, $left + 1, $right - 1, $k);
}

function isPalindrome($string, $left = 0, $right = null) {
    if ($right === null) {
        $right = strlen($string) - 1;
    }

    // Jika pointer kiri melebihi pointer kanan, string adalah palindrome
    if ($left >= $right) {
        return true;
    }

    // Periksa apakah karakter pada pointer saat ini cocok
    if ($string[$left] !== $string[$right]) {
        return false;
    }

    // Pindahkan pointer ke pusat dan lanjutkan memeriksa
    return isPalindrome($string, $left + 1, $right - 1);
}

// Input
$string = "422239";
$k = 1;

// Output
$output = highestPalindrome($string, $k);
echo $output === -1 ? $output : $output; // Output: -1
echo "\n";

?>
