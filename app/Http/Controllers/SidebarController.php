<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Sidebar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SidebarController extends Controller
{

    public function showSidebar(){
        $sidebar = Sidebar::select('master_type.master_type_name', 'sidebar.course_id')
        ->join('material', 'material.material_id', '=', 'sidebar.id')
        ->join('master_type', 'material.material_type_id', '=', 'master_type.id')
        ->get();;
        return view('courses.course_sidebar');
        foreach($sidebar as $data){
            $type = $data->master_type_name;
            $courseId = $data->course_id;
            $this->showByType($type,$courseId);
        }

    }

    public function showByType($type, $courseId)
    {

        // Lakukan pengambilan data materi berdasarkan tipe materi dan ID kursus
        $materials = Material::where('type', $type)
            ->where('course_id', $courseId)
            ->get();

        // Kemudian, kirimkan data materi ke tampilan yang sesuai berdasarkan tipe materi
        // dan ID kursus
        switch ($type) {
            case 'assignment':
                return view('courses.course_asg')->with('materials', $materials);
            case 'video':
                return view('courses.course_video')->with('materials', $materials);
            case 'pdf':
                return view('courses.course_pdf')->with('materials', $materials);
            default:
                // Tipe materi tidak valid, Anda dapat menangani ini sesuai kebutuhan Anda
                break;
        }
    }

}
