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
    }
}
