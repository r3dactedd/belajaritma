<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Sidebar;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    //
    public function showSidebar($title,$id, $material_id){
        $material = Material::find($material_id);
        $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id')
        ->join('material', 'material.id', '=', 'sidebar.material_id')
        ->where('sidebar.course_id',$id)
        ->get();;

       return view('contents.session_assignment', ['sidebars'=>$sidebars, 'material'=>$material, 'id'=>$id]);

        // dd($sidebars);

    }

    //ini buat ngebuka page spesifik
    public function showByType($materialTitle, $id)
    {
        $material = Material::find($id);
        // Lakukan pengambilan data materi berdasarkan tipe materi dan ID kursus
        $materialContent = MaterialContent::where('id', $id)->first();

        $type = MasterType::where('master_type_code', 'MATERIAL_TYPE')->get();

        // Inisialisasi variabel $viewName dengan nama view default
        $viewName = 'courses.course_default';

        foreach ($type as $test) {
            switch ($test->master_type_name) {
                case 'Assignment':
                    $viewName = 'courses.course_asg';
                    break;
                case 'Video':
                    $viewName = 'courses.course_video';
                    break;
                case 'PDF':
                    $viewName = 'courses.course_pdf';
                    break;
                // Tipe materi lainnya bisa ditambahkan sesuai kebutuhan
            }
        }

        return view($viewName, ['materialContent' => $materialContent]);
    }
}
