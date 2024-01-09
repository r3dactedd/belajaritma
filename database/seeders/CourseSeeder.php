<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create([
            'course_name' => 'Algoritma dan Pemrograman',
            'short_desc' => 'Kursus ini akan menjelaskan tentang Algoritma dan Pemrograman',
            'course_desc' => ' Pada kursus ini, akan diajarkan mengenai konsep Algoritma dan Pemrograman yang merupakan dasar fundamental dari Teknik Informatika.Algoritma merupakan langkah - langkah terurut yang digunakan untuk menyelesaikan suatu masalah atau tugas dalam komputasi, sedangkan pemrograman adalah proses membuat algoritma menjadi suatu program komputer dengan menggunakan bahasa pemrograman tertentu. Bahasa pemrograman yang digunakan untuk kursus ini adalah bahasa C.',
            'level' => 'Dasar',
            'screen_resolution' => '1336 x 768',
            'minimum_ram' => '4GB',
            'processor' => 'Intel i3 / Sejenisnya',
            'operating_system' => 'Windows, macOS, dan Linux,',
            'other_programs' => 'Untuk kursus ini, diperlukan penginstalan IDE (seperti DevC atau Codeblocks), serta koneksi internet yang baik dan lancar untuk memudahkan akses materi.',
            'total_module' => 11,
            'total_time' => 142,
            'created_by' => 1,
            'updated_by' => 1,
            'course_img' => 'algoprog_courseImg.jpg',
            'ready_for_publish' => true,
        ]);

        Course::create([
            'course_name' => 'Data Structure',
            'short_desc' => 'Kursus ini akan menjelaskan tentang Data Structure, seperti Linked Lists, Stack dan Queue, Tree, Graphs, dan lainnya.',
            'course_desc' => 'Data Structure merupakan ilmu yang mempelajari cara penyusunan dan penyimpanan data secara efisien agar dapat diakses dan dimanipulasi dengan efektif. Pemahaman tentang struktur data sangat penting dalam pengembangan perangkat lunak karena mempengaruhi kinerja program serta efisiensi penggunaan sumber daya komputer. Contoh struktur data meliputi array, linked list, stack, queue, tree, graph, dan berbagai jenis lainnya yang digunakan untuk menyelesaikan berbagai masalah komputasi.',
            'level' => 'Menengah',
            'screen_resolution' => '1336 x 768',
            'minimum_ram' => '4GB',
            'processor' => 'Intel i3 / Sekelas',
            'operating_system' => 'Linux, Windows, macOS',
            'other_programs' => 'Program yang diperlukan untuk aplikasi ini adalah : IDE (seperti DevC atau Codeblocks), dan Data Structure Visualizer (seperti https://www.cs.usfca.edu/~galles/visualization/Algorithms.html)',
            'total_module' => 11,
            'total_time' => 142,
            'created_by' => 1,
            'updated_by' => 1,
            'course_img' => 'Data Structures.png',
            'ready_for_publish' => true,
        ]);

        Course::create([
            'course_name' => 'Dasar Web Programming',
            'short_desc' => 'Kursus ini akan menjelaskan tentang dasar web programming, seperti dasar untuk HTML, CSS, dan Javascript',
            'course_desc' => 'Kursus ini akan mengajarkan pengetahuan dasar yang diperlukan untuk membangun dan mengembangkan aplikasi web, yang terdiri dari HTML (HyperText Markup Language) untuk struktur dasar halaman web, CSS (Cascading Style Sheets) untuk desain dan tata letak, serta JavaScript untuk interaksi pada halaman web.',
            'level' => 'Dasar',
            'screen_resolution' => '1336 x 768',
            'minimum_ram' => '4GB',
            'processor' => 'Intel i3 / sekelas',
            'operating_system' => 'Linux,Windows, macOS',
            'other_programs' => 'Program yang diperlukan untuk aplikasi ini adalah :Text Editor (direkomendasikan Visual Studio Code) dan Web Browser untuk mengakses halaman web aplikasi',
            'total_module' => 1,
            'total_time' => 20,
            'created_by' => 1,
            'updated_by' => 1,
            'course_img' => 'webprog.jpg',
            'ready_for_publish' => false,
        ]);
    }
}
