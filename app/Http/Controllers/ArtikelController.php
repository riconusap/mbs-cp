<?php

namespace App\Http\Controllers;

use App\Model\Artikel;
use App\Model\Client;
use App\Model\Komentar;
use App\Model\KomentarChild;
use App\Model\MasterKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Artikel',
            'menu' => 'data-artikel'
        );
        $data['artikel'] = Artikel::with('author','kategori')->get();
        // dd($data['artikel']);
        return view('admin.data-artikel.index', $data);
    }
    
    public function tambah($id = null)
    {
        $data = array(
            'title' => 'Artikel',
            'menu' => 'data-artikel'
        );
        if ($id != null) {
            $data['kategori_halaman'] = 'detail';
            $data['detail'] = Artikel::with('kategori','author','komentar','komentar.komentarChild')->where('id', $id)->first();
            // dd($data['detail']);
        } else {
            $data['kategori_halaman'] = 'tambah';
        }
        $data['kategori'] = MasterKategori::where('status', 1)->get();
        // dd($data);
        return view('admin.data-artikel.tambah', $data);
    }

    public function post(Request $request)
    {
        // dd($request->all());

        $id = $request->post_id;
        $slug = str_replace(' ','-',(strtolower($request->judul)));
        if (empty($request->isi)) {
            return Response::json($respone = ['error' => "Isi Artikel Kosong!"], 422);
        }
        if (empty($request->post_id)) {
            $p = Artikel::where('slug', $slug)->count();
            // dd($p);
            if ($p > 0) {
                return Response::json($respone = ['error' => "Artikel dengan judul ".$request->judul." sudah ada, silahkan merubah judul atau merubah artikel yang sudah ada!"], 422);
            }
        }
        $p = Artikel::where('id', $id)->first();
        if(isset($request->foto)){
            $custom_file_name =  date("Y_m_d_h_i_s") . '.' . $request->foto->extension();
            // dd($custom_file_name);
            $foto = $request->foto->storeAs('public/foto', $custom_file_name);
            // dd($ktp);
            // store your file into database
        } else{
            $custom_file_name = $p->img;
        }

        $artikel   = Artikel::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'judul' => $request->judul,
                'slug' => $slug,
                'isi' => $request->isi,
                'summary' => $request->summary,
                'penulis' => Auth::id(),
                'tanggal' => Date(now()),
                'img' => $custom_file_name,
                'master_kategori_id' => $request->kategori,
            ]
        );
        return Response::json($artikel);
    }

    public function delete($id)
    {
        $p = Artikel::where('id', $id)->first();
        $delete = Storage::delete('foto/'.$p->foto);  
        $artikel = Artikel::where('id', $id)->delete();
        return Response::json($artikel);
    }

    public function deleteKomentar($id)
    {
        // dd($id);
        $komentar = Komentar::where('id', $id)->delete();
        $komentar = KomentarChild::where('komentar_id', $id)->delete();
        return Response::json($komentar);
    }
    public function deleteKomentarChild($id)
    {
        $komentar = KomentarChild::where('komentar_id', $id)->delete();
        return Response::json($komentar);
    }
}
