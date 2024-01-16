<?php

namespace Database\Seeders;

use App\Models\FinalTestQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinalTestQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Aplikasi dibawah ini yang bukan merupakan Integrated Development Environment adalah :',
            'jawaban_a' => 'Dev-C',
            'jawaban_b' => 'Codeblocks',
            'jawaban_c' => 'Visual Studio Code',
            'jawaban_d' => 'Visual Studio',
            'jawaban_benar' => 'C',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Bahasa C pada umumnya digunakan untuk pemrograman di bidang  berikut, kecuali :',
            'jawaban_a' => 'Sistem Operasi',
            'jawaban_b' => 'Embedded Systems',
            'jawaban_c' => 'Networking',
            'jawaban_d' => 'Web Development',
            'jawaban_benar' => 'D',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Untuk melakukan multi-line comment di C, digunakan simbol :',
            'jawaban_a' => '/*',
            'jawaban_b' => '//',
            'jawaban_c' => '#',
            'jawaban_d' => '- -',
            'jawaban_benar' => 'A',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Untuk menampung sebuah kata atau kalimat (seperti “ikan”) pada C, digunakan tipe data:',
            'jawaban_a' => 'var',
            'jawaban_b' => 'string',
            'jawaban_c' => 'char',
            'jawaban_d' => 'char array[]',
            'jawaban_benar' => 'D',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Pada suatu program, terdapat variable
            char num = ‘3’;
            Untuk print variable tersebut, digunakan sintaks :',
            'jawaban_a' => '%int',
            'jawaban_b' => '%c',
            'jawaban_c' => '%d',
            'jawaban_d' => '%num',
            'jawaban_benar' => 'B',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Operator pada bahasa C yang digunakan untuk memberikan operasi “Atau” adalah',
            'jawaban_a' => '/',
            'jawaban_b' => '||',
            'jawaban_c' => 'OR',
            'jawaban_d' => '?:',
            'jawaban_benar' => 'B',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Operator pada bahasa C yang digunakan untuk memberikan operasi “Atau” adalah',
            'question_img'=> 'finaltest1_question7.png',
            'jawaban_a' => 'User menginput angka 0',
            'jawaban_b' => 'Sum program dibawah 0',
            'jawaban_c' => 'Sum program diatas 0',
            'jawaban_d' => 'User menginput angka desimal',
            'jawaban_benar' => 'A',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Apabila kita menginput integer bernilai 9 pada program ini, berapakah nilai dari variabel sum pada aplikasi?',
            'question_img'=> 'finaltest1_question8.png',
            'jawaban_a' => '10',
            'jawaban_b' => '36',
            'jawaban_c' => '45',
            'jawaban_d' => '24',
            'jawaban_benar' => 'C',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Berikut merupakan contoh import function built-in untuk bahasa C adalah :',
            'jawaban_a' => 'import Game.Level.start',
            'jawaban_b' => '#include <stdio.h>',
            'jawaban_c' => 'use Illuminate\Support\Facades\Storage',
            'jawaban_d' => 'import java.util.ArrayList;',
            'jawaban_benar' => 'B',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Berikut merupakan keyword yang valid untuk mendeklarasikan sebuah function di C :',
            'jawaban_a' => 'define',
            'jawaban_b' => 'func',
            'jawaban_c' => 'function',
            'jawaban_d' => 'void',
            'jawaban_benar' => 'D',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Dibawah ini manakah yang merupakan cara tepat untuk memberikan nilai 0 untuk seluruh elemen pada array?',
            'jawaban_a' => 'int arr[5] = {0}',
            'jawaban_b' => 'int arr[5] = 0',
            'jawaban_c' => 'int arr[5] = {0, 0, 0, 0, 0}',
            'jawaban_d' => 'int arr[5];',
            'jawaban_benar' => 'C',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Yang terjadi apabila sebuah fungsi recursion tidak memiliki if-else atau default case (contohnya seperti n!=0 pada kode diatas) adalah:',
            'question_img'=> 'finaltest1_question12.png',
            'jawaban_a' => 'Program akan masuk ke infinite-loop',
            'jawaban_b' => 'Program akan mengembalikan nilai error',
            'jawaban_c' => 'Program akan berjalan seperti biasa',
            'jawaban_d' => 'Program akan menutup secara otomatis',
            'jawaban_benar' => 'A',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Terdapat sebuah array
            int matrix[2][4] = {{1, 5, 12, 5}, {4, 7, 10, 14}};

            Untuk mengambil nilai perkalian dari 12 dan 7 dari array tersebut, kode yang tepat adalah:',
            'jawaban_a' => 'matrix[0][2]*matrix[1][1]',
            'jawaban_b' => 'matrix[1][3]*matrix[2][2]',
            'jawaban_c' => 'matrix[0][2]*matrix[1][5]',
            'jawaban_d' => 'matrix[12]*matrix[7]',
            'jawaban_benar' => 'A',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Algoritma Linear Search memiliki kompleksitas waktu :',
            'jawaban_a' => 'O(n * log(n))',
            'jawaban_b' => 'O(n)',
            'jawaban_c' => 'O(log(n))',
            'jawaban_d' => 'O(log(n^2))',
            'jawaban_benar' => 'B',
        ]);

        FinalTestQuestions::create([
            'material_id' => 11,
            'questions' => 'Algoritma sorting yang menggunakan prinsip membagi list menjadi dua untuk menjalankan algoritmanya adalah :',
            'jawaban_a' => 'Quick sort',
            'jawaban_b' => 'Merge sort',
            'jawaban_c' => 'Selection sort',
            'jawaban_d' => 'Bubble sort',
            'jawaban_benar' => 'B',
        ]);

        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Apa yang dimaksud dengan Struktur Data?',
            'jawaban_a' => 'Program untuk menyimpan data',
            'jawaban_b' => 'Cara menyusun dan menyimpan data',
            'jawaban_c' => 'Data yang disusun secara acak',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'B',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Apa tujuan penggunaan Struktur Data?',
            'jawaban_a' => 'Meningkatkan efisiensi operasi data',
            'jawaban_b' => 'Menghemat ruang memori',
            'jawaban_c' => 'Mempermudah pencarian data',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'D',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Apa perbedaan utama antara Array dan Linked List?',
            'jawaban_a' => 'Array memiliki ukuran tetap, sedangkan Linked List dinamis',
            'jawaban_b' => 'Linked List memiliki indeks, sedangkan Array tidak',
            'jawaban_c' => 'Array lebih efisien dalam penyimpanan',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'A',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Keuntungan Linked List dibandingkan dengan Array adalah...',
            'jawaban_a' => 'Akses elemen yang cepat',
            'jawaban_b' => 'Ukuran tetap',
            'jawaban_c' => 'Penyisipan dan penghapusan elemen yang fleksibel',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'C',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Prinsip Last In First Out (LIFO) terkait dengan struktur data apa?',
            'jawaban_a' => 'Stack',
            'jawaban_b' => 'Queue',
            'jawaban_c' => 'Array',
            'jawaban_d' => 'Linked List',
            'jawaban_benar' => 'A',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Queue mengikuti prinsip apa?',
            'jawaban_a' => 'Last In First Out (LIFO)',
            'jawaban_b' => 'First In First Out (FIFO)',
            'jawaban_c' => 'Random In Random Out (RIRO)',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'B',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Apa tujuan dari fungsi hash dalam struktur data Hash?',
            'jawaban_a' => 'Mengenkripsi data',
            'jawaban_b' => 'Mendeklarasikan variabel',
            'jawaban_c' => 'Memetakan data ke indeks tertentu',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'C',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Collision dalam struktur data Hash terjadi ketika...',
            'jawaban_a' => 'Data tidak ditemukan dalam tabel hash',
            'jawaban_b' => 'Terdapat dua atau lebih data yang dipetakan ke indeks yang sama',
            'jawaban_c' => 'Data terlalu besar untuk disimpan',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'B',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Node dalam tree yang memiliki cabang-cabang di bawahnya disebut sebagai...',
            'jawaban_a' => 'Root',
            'jawaban_b' => 'Leaf',
            'jawaban_c' => ' Internal Node',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'C',
        ]);

        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Binary Search Tree (BST) memiliki sifat khusus yang memastikan...',
            'jawaban_a' => 'Setiap node memiliki maksimal dua anak',
            'jawaban_b' => 'Setiap node lebih dari dua anak',
            'jawaban_c' => 'Tidak memiliki node anak',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'A',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Simbol yang digunakan untuk merepresentasikan hubungan antara dua node dalam graph disebut...',
            'jawaban_a' => 'Vertex',
            'jawaban_b' => 'Edge',
            'jawaban_c' => 'Root',
            'jawaban_d' => 'Leaf',
            'jawaban_benar' => 'B',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Apa jenis graph yang setiap Edge memiliki arah?',
            'jawaban_a' => 'Directed Graph',
            'jawaban_b' => 'Undirected Graph',
            'jawaban_c' => 'Weighted Graph',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'A',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Manakah dari struktur data berikut yang paling cocok untuk mencari elemen secara efisien?',
            'jawaban_a' => 'Linked List',
            'jawaban_b' => 'Queue',
            'jawaban_c' => 'Hash Table',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'C',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Apa kompleksitas waktu rata-rata untuk mencari elemen dalam binary search tree?',
            'jawaban_a' => 'O(1)',
            'jawaban_b' => 'O(log n)',
            'jawaban_c' => 'O(n)',
            'jawaban_d' => 'O(n^2)',
            'jawaban_benar' => 'B',
        ]);
        FinalTestQuestions::create([
            'material_id' => 21,
            'questions' => 'Apa yang dimaksud dengan traversal dalam struktur data tree?',
            'jawaban_a' => 'Proses mencari elemen tertentu',
            'jawaban_b' => 'Proses mengunjungi setiap node dalam tree',
            'jawaban_c' => 'Proses menyisipkan elemen baru',
            'jawaban_d' => 'Semua di atas',
            'jawaban_benar' => 'B',
        ]);

    }
}
