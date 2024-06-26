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
            'questions' => 'Bagaimana elemen diakses dalam struktur data Stack?',
            'jawaban_a' => 'FIFO',
            'jawaban_b' => 'LIFO',
            'jawaban_c' => 'Unordered',
            'jawaban_d' => 'Random Access',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Bagaimana elemen diakses dalam struktur data Queue?',
            'jawaban_a' => 'FIFO',
            'jawaban_b' => 'LIFO',
            'jawaban_c' => 'Unordered',
            'jawaban_d' => 'Berdasarkan index',
            'jawaban_benar' => 'A',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Apa kekurangan dari singly linked list dibandingkan dengan doubly linked list?',
            'jawaban_a' => 'Membutuhkan lebih banyak ruang penyimpanan.',
            'jawaban_b' => 'Lebih sulit dalam pengelolaan memori',
            'jawaban_c' => 'Lebih lambat dalam operasi penyisipan tengah',
            'jawaban_d' => 'Kurang efisien dalam operasi traversal mundur',
            'jawaban_benar' => 'D',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Apa persamaan antara Stack dan Queue?',
            'jawaban_a' => 'Keduanya hanya dapat menampung elemen numerik',
            'jawaban_b' => 'Keduanya menggunakan prinsip FIFO',
            'jawaban_c' => 'Keduanya dapat diimplementasikan menggunakan linked list',
            'jawaban_d' => 'Keduanya cocok untuk operasi pencarian acak',
            'jawaban_benar' => 'B',
        ]);
        AssignmentQuestions::create([
            'material_id' => 15,
            'questions' => 'Bagian yang diberi outline merah disebut:',
            'jawaban_a' => 'Pointer',
            'jawaban_b' => 'Node',
            'jawaban_c' => 'Value',
            'jawaban_d' => 'Stack',
            'question_img'=> 'assignment1Course2Question5.png',
            'jawaban_benar' => 'B',
        ]);

        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Pernyataan yang benar untuk DFS (Depth-First Search) dan BFS (Breadth-First Search)?',
            'jawaban_a' => 'DFS menggunakan stack, sedangkan BFS menggunakan queue',
            'jawaban_b' => 'DFS menggunakan prinsip FIFO, sedangkan BFS menggunakan prinsip LIFO.',
            'jawaban_c' => 'DFS menggunakan stack, sedangkan BFS melibatkan antrian',
            'jawaban_d' => 'BFS menggunakan stack, sedangkan DFS menggunakan queue',
            'jawaban_benar' => 'A',
        ]);
        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Fungsi utama dari hash-function pada tabel hash adalah :',
            'jawaban_a' => 'Melakukan sorting elemen pada tabel',
            'jawaban_b' => 'Menghapus elemen duplikat',
            'jawaban_c' => 'Melakukan operasi pada data',
            'jawaban_d' => 'Mapping data pada array',
            'jawaban_benar' => 'D',
        ]);
        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Cara umum untuk menyelesaikan collision pada hash table adalah :',
            'jawaban_a' => 'Menambah ukuran hash table',
            'jawaban_b' => 'Menghapus elemen yang berkonflik',
            'jawaban_c' => 'Membuat linked list antar data',
            'jawaban_d' => 'Collision dapat dihiraukan terlebih dahulu',
            'jawaban_benar' => 'C',
        ]);
        AssignmentQuestions::create([
            'material_id' => 20,
            'questions' => 'Algoritma apakah yang sering digunakan untuk mencari jalan terpendek pada weighted graph?',
            'jawaban_a' => 'Algoritma Dijkstra',
            'jawaban_b' => 'Algoritma Prim',
            'jawaban_c' => 'Algoritma Kruskal',
            'jawaban_d' => 'Algoritma Bresenham',
            'jawaban_benar' => 'A',
        ]);
    }
}
