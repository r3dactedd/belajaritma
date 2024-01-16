<?php

namespace Database\Seeders;

use App\Models\AssignmentQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        AssignmentQuestions::create([
            'material_id' => 5,
            'questions' => 'Aplikasi seperti Dev-C dan Codeblocks yang akan digunakan pada pembelajaran kursus ini adalah contoh dari:',
            'jawaban_a' => 'Program Constructor',
            'jawaban_b' => 'Integrated Development Environment',
            'jawaban_c' => 'Algorithm Explorer',
            'jawaban_d' => 'Code Editing Program',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 5,
            'questions' => 'Bahasa C dikembangkan oleh :',
            'jawaban_a' => 'Guido van Rossum',
            'jawaban_b' => 'Steve Wozniak',
            'jawaban_c' => 'Dennis Ritchie',
            'jawaban_d' => 'Bjarne Stroustrup',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 5,
            'questions' => 'Untuk menampung variabel angka yang memiliki titik desimal, digunakan tipe data:',
            'jawaban_a' => 'string',
            'jawaban_b' => 'char',
            'jawaban_c' => 'int',
            'jawaban_d' => 'double',
            'jawaban_benar' => 'D',
        ]);
        AssignmentQuestions::create([
            'material_id' => 5,
            'questions' => 'Pada suatu program, terdapat variable
            int test = 21;
            Untuk print variable tersebut, digunakan sintaks :',
            'jawaban_a' => '%int',
            'jawaban_b' => '%f',
            'jawaban_c' => '%test',
            'jawaban_d' => '%d',
            'jawaban_benar' => 'D',
        ]);
        AssignmentQuestions::create([
            'material_id' => 5,
            'questions' => 'Operator pada bahasa C yang digunakan untuk memberikan nilai suatu variabel ke variabel lain adalah :',
            'jawaban_a' => '==',
            'jawaban_b' => '=',
            'jawaban_c' => 'EQUAL',
            'jawaban_d' => '=>',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 5,
            'questions' => 'Yang akan terjadi apabila kita mengetik % pada aplikasi ini',
            'question_img'=> 'assignment1_question6.png',
            'jawaban_a' => 'Program akan crash karena tidak dapat memproses karakter % pada switch statement tersebut.',
            'jawaban_b' => 'Program akan menampilkan pesan Error! operator is not correct.',
            'jawaban_c' => 'Program akan menampilkan hasil pembagian dari 15/12.',
            'jawaban_d' => 'Program akan menampilkan sisa pembagian dari 15/12.',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 5,
            'question_img'=> 'assignment1_question7.png',
            'questions' => 'Apabila kita menginput integer bernilai 6 pada program ini, berapakah nilai dari variabel sum pada aplikasi?',
            'jawaban_a' => '21',
            'jawaban_b' => '15',
            'jawaban_c' => '36',
            'jawaban_d' => '24',
            'jawaban_benar' => 'A',
        ]);
        AssignmentQuestions::create([
            'material_id' => 10,
            'questions' => 'Suatu fungsi yang bekerja dengan memanggil dirinya sendiri disebut dengan',
            'jawaban_a' => 'Self-calling Function',
            'jawaban_b' => 'Independent Function',
            'jawaban_c' => 'Recursive Function',
            'jawaban_d' => 'Standard Function',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 10,
            'question_img'=> 'assignment2_question2.png',
            'questions' => 'Function addNumbers pada baris 16 di atas akan menghasilkan error, karena',
            'jawaban_a' => 'Variabel result harusnya diganti dengan variabel sum',
            'jawaban_b' => 'Variabel result belum di-declare',
            'jawaban_c' => 'Fungsi addNumbers seharusnya berada di atas main()',
            'jawaban_d' => 'Kesalahan tipe data pada variabel result',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 10,
            'questions' => 'int array[8] = {2,7,8,13,19,22,49,57};

            Untuk mengambil nilai 22 dari array tersebut, kode yang tepat adalah:',
            'jawaban_a' => 'array[8] WHERE 22;',
            'jawaban_b' => 'array[5];',
            'jawaban_c' => 'array[8]=22;',
            'jawaban_d' => 'array[6];',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 10,
            'questions' => 'Algoritma Binary Search memiliki kompleksitas waktu :',
            'jawaban_a' => 'O(n * log(n))',
            'jawaban_b' => 'O(n)',
            'jawaban_c' => 'O(log(n))',
            'jawaban_d' => 'O(n^2)',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 10,
            'questions' => 'Algoritma sorting yang menggunakan prinsip elemen pivot untuk menjalankan algoritmanya adalah :',
            'jawaban_a' => 'Quick sort',
            'jawaban_b' => 'Merge sort',
            'jawaban_c' => 'Selection sort',
            'jawaban_d' => 'Bubble sort',
            'jawaban_benar' => 'A',
        ]);

        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Apa yang dimaksud dengan Struktur Data?',
            'jawaban_a' => 'Urutan data dalam memori',
            'jawaban_b' => 'Algoritma sorting',
            'jawaban_c' => 'Jaringan komputer',
            'jawaban_d' => 'Bahasa pemrograman',
            'jawaban_benar' => 'A',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Apa perbedaan utama antara Array dan Linked List?',
            'jawaban_a' => 'Array memiliki ukuran tetap, sedangkan Linked List dapat dinamis',
            'jawaban_b' => 'Linked List memiliki indeks, sedangkan Array tidak',
            'jawaban_c' => 'Array bersifat dinamis, sedangkan Linked List bersifat statis',
            'jawaban_d' => 'Tidak ada perbedaan antara keduanya',
            'jawaban_benar' => 'A',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Keuntungan menggunakan Linked List dibandingkan dengan Array adalah:',
            'jawaban_a' => 'Akses elemen dengan indeks',
            'jawaban_b' => 'Penggunaan memori lebih efisien',
            'jawaban_c' => 'Implementasi yang lebih sederhana',
            'jawaban_d' => 'Tidak ada keuntungan khusus',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Apa fungsi utama dari Stack?',
            'jawaban_a' => 'Penyimpanan data dengan indeks',
            'jawaban_b' => 'Penyimpanan data dengan prinsip LIFO (Last In, First Out)',
            'jawaban_c' => 'Penyimpanan data dengan prinsip FIFO (First In, First Out)',
            'jawaban_d' => 'Penyimpanan data dalam urutan acak',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Queue mirip dengan Stack, tetapi menggunakan prinsip:',
            'jawaban_a' => 'LIFO (Last In, First Out)',
            'jawaban_b' => 'Random Access',
            'jawaban_c' => 'FIFO (First In, First Out)',
            'jawaban_d' => 'Statis',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Operasi utama pada Array adalah:',
            'jawaban_a' => 'Read dan Write',
            'jawaban_b' => 'Enqueue dan Dequeue',
            'jawaban_c' => 'Insert dan Delete',
            'jawaban_d' => 'Push dan Pop',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Linked List dapat digunakan untuk:',
            'jawaban_a' => 'Implementasi antrian (Queue)',
            'jawaban_b' => 'Representasi struktur data berhirarki',
            'jawaban_c' => 'Implementasi tumpukan (Stack)',
            'jawaban_d' => 'Semua jawaban benar',
            'jawaban_benar' => 'D',
        ]);

        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Apa tujuan utama dari penggunaan fungsi hash dalam struktur data?',
            'jawaban_a' => 'Mengurutkan data',
            'jawaban_b' => 'Menyimpan data secara terstruktur',
            'jawaban_c' => 'Mengubah data menjadi nilai tetap untuk menghindari tabrakan data',
            'jawaban_d' => 'Mempercepat pencarian data',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Dalam struktur Tree, simpul yang tidak memiliki anak disebut:',
            'jawaban_a' => 'Leaf',
            'jawaban_b' => 'Root',
            'jawaban_c' => 'Child',
            'jawaban_d' => 'Branch',
            'jawaban_benar' => 'A',
        ]);
        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Jenis struktur data apa yang paling tepat digunakan untuk merepresentasikan hubungan yang kompleks antara entitas?',
            'jawaban_a' => 'Hash Table',
            'jawaban_b' => 'Tree',
            'jawaban_c' => 'Graph',
            'jawaban_d' => 'Stack',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Apa perbedaan utama antara Binary Tree dan Binary Search Tree?',
            'jawaban_a' => 'Binary Tree hanya memiliki dua tingkatan, sedangkan Binary Search Tree  memiliki lebih dari dua tingkatan.',
            'jawaban_b' => 'Binary Tree tidak memerlukan urutan tertentu, sedangkan Binary Search Tree  mengikuti urutan tertentu.',
            'jawaban_c' => 'Binary Search Tree  memiliki akar, sedangkan Binary Tree tidak.',
            'jawaban_d' => 'Tidak ada perbedaan antara keduanya.',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Jenis graf mana yang setiap Edge memiliki arah atau panah yang menunjukkan satu arah saja?',
            'jawaban_a' => 'Directed Graph',
            'jawaban_b' => 'Undirected Graph',
            'jawaban_c' => 'Connected Graph',
            'jawaban_d' => 'Cyclic Graph',
            'jawaban_benar' => 'A',
        ]);

    }
}
