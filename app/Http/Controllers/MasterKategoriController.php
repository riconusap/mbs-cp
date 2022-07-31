<?php

namespace App\Http\Controllers;

use App\Model\MasterKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MasterKategoriController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Kategori Artikel',
            'menu' => 'data-kategori'
        );
        $data['kategori'] = MasterKategori::where('status', 1)->get();
        // dd($data);
        return view('admin.data-kategori.index', $data);
    }
    
    public function tambah(Request $request)
    {
        // dd($request->all());
        $id = $request->post_id;

        $kategori   = MasterKategori::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'kategori' => $request->kategori,
                'status' => 1,
                // 'foto' => $foto_path,
            ]
        );
        return Response::json($kategori);
    }

    public function delete($id)
    {
        $kategori = MasterKategori::where('id', $id)->first();
        $kategori->status = 0;
        $kategori->save();
        return Response::json($kategori);
    }
}
