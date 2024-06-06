# gits-bri-test

## Penjelasan jawaban Soal No.2

## Deskripsi
Program ini memeriksa apakah setiap _bracket_ seimbang, dalam sebuah string antara _bracket_ buka dan _bracket_ tutup. _Bracket_ yang diperbolehkan adalah `()`, `{}`, `[]`.

## Kompleksitas (_Complexity_)
- **Time complexity**: O(n) - Program melakukan satu iterasi melalui string input yang memiliki panjang n.
- **Space complexity**: O(n) - Dalam kasus terburuk, kita menyimpan semua _bracket_ buka di dalam stack.

## Penjelasan Kode
1. Menggunakan stack untuk menyimpan _bracket_ buka.
2. Mapping pasangan _bracket_ buka dan tutup menggunakan array asosiatif.
3. Melakukan iterasi karakter dalam string:
   - Jika karakter adalah _bracket_ buka, tambahkan ke stack.
   - Jika karakter adalah _bracket_ tutup, cek apakah top stack sesuai dengan pasangan _bracket_ buka yang diharapkan.
4. Setelah iterasi selesai, cek apakah stack kosong untuk menentukan apakah _bracket_ seimbang.