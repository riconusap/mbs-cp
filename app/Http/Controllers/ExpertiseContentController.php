<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\ExpertiseContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ExpertiseContentController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Expertise',
            'menu' => 'data-expertise'
        );
        $data['expertise'] = ExpertiseContent::all();
        // dd($data);
        return view('admin.setting-content-expertise.index', $data);
    }
    
    public function tambah(Request $request)
    {
        // dd($request->all());
        $p = ExpertiseContent::where('id', $request->post_id)->first();
        
        if(isset($request->foto)){
            $custom_file_name =  date("Y_m_d_h_i_s") . '.' . $request->foto->extension();
            $foto = $request->foto->storeAs('public/foto', $custom_file_name);
        } else{
            $custom_file_name = $p->img;
        }

        $id = $request->post_id;

        $expert   = ExpertiseContent::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'expertise' => $request->expertise,
                'img' => $custom_file_name,
                'deskripsi' => $request->deskripsi,
                // 'foto' => $foto_path,
            ]
        );
        return Response::json($expert);
    }

    public function delete($id)
    {
        $p = ExpertiseContent::where('id', $id)->first();
        $delete = Storage::delete('foto/'.$p->foto);  
        $expert = ExpertiseContent::where('id', $id)->delete();
        return Response::json($expert);
    }
}
