<?php

namespace App\Http\Controllers;

use App\Model\MasterJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MasterJabatanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data jabatan',
            'menu' => 'data-jabatan'
        );
        $data['jabatan'] = MasterJabatan::where('status', 1)->get();
        // dd($data);
        return view('admin.data-jabatan.index', $data);
    }
    
    public function tambah(Request $request)
    {
        // dd($request->all());
        $id = $request->post_id;

        $jabatan   = MasterJabatan::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'jabatan' => $request->jabatan,
                'status' => 1,
                // 'foto' => $foto_path,
            ]
        );
        return Response::json($jabatan);
    }

    public function delete($id)
    {
        $jabatan = MasterJabatan::where('id', $id)->first();
        $jabatan->status = 0;
        $jabatan->save();
        return Response::json($jabatan);
    }
}
