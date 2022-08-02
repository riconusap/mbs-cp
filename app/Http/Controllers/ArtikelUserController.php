<?php

namespace App\Http\Controllers;

use App\Model\Artikel;
use App\Model\Client;
use App\Model\ExpertiseContent;
use App\Model\Komentar;
use App\Model\KomentarChild;
use Illuminate\Http\Request;
use App\Model\MasterKategori;
use App\Model\Pegawai;
use Illuminate\Support\Facades\Response;

class ArtikelUserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Artikel',
            'menu' => 'data-artikel'
        );
        $data['latestArtikel'] = Artikel::with('kategori')->orderBy('tanggal','DESC')->limit(3)->get();
        $data['artikel'] = Artikel::with('kategori','author')->paginate(4);
        $data['kategori'] = MasterKategori::leftjoin('artikel as a','a.master_kategori_id','=','master_kategori.id')->selectRaw('count(a.id) as jumlah,master_kategori.id, master_kategori.kategori')->where('status', 1)->groupBy('master_kategori.id','master_kategori.kategori')->get();
        // dd($data);
        return view('user.artikel.index', $data);
    }
    
    public function detail($slug)
    {
        $data = array(
            'title' => 'Artikel',
            'menu' => 'data-artikel'
        );
        $data['selected'] = Artikel::with('kategori','author','komentar','komentar.komentarChild')->where('slug', $slug)->first();
        // dd($data);
        return view('user.artikel.detail', $data);
    }
    public function postKomentar(Request $request)
    {
        // dd($request->all());
        $k = new Komentar();
        $k->artikel_id = $request->artikel_id;
        $k->isi_komentar = $request->isi;
        $k->email = $request->email;
        $k->tanggal = Date(now());
        $k->save();
        if ($k->save()) {
            $k->save();
            return Response::json($k);
        } else {
            return Response::json($respone = ['error' => "Gagal Menambahkan Komentar"], 422);
        }
    }
    public function postKomentarReply(Request $request)
    {
        // dd($request->all());
        $k = new KomentarChild();
        $k->komentar_id = $request->komentar_id;
        $k->isi_komentar = $request->isi_rep;
        $k->email = $request->emailRep;
        $k->tanggal = Date(now());
        $k->save();
        if ($k->save()) {
            $k->save();
            return Response::json($k);
        } else {
            return Response::json($respone = ['error' => "Gagal Menambahkan Komentar"], 422);
        }
    }
    public function artikelGroupByKategori($kategori)
    {
        $data = array(
            'title' => 'Artikel',
            'menu' => 'data-artikel'
        );
        $data['latestArtikel'] = Artikel::with('kategori')->orderBy('tanggal','DESC')->limit(3)->get();

        $data['kategori'] = MasterKategori::leftjoin('artikel as a','a.master_kategori_id','=','master_kategori.id')->selectRaw('count(a.id) as jumlah,master_kategori.id, master_kategori.kategori')->where('status', 1)->groupBy('master_kategori.id','master_kategori.kategori')->get();

        $data['artikel'] = Artikel::with('kategori','author')->whereHas('kategori',  function ($q) use ($kategori)
        {
            $q->where('kategori', $kategori);
        })->paginate(4);
        // dd($data);
        return view('user.artikel.kategori', $data);
    }
}
