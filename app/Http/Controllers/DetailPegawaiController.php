<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\ExpertiseContent;
use App\Model\Pegawai;

class DetailPegawaiController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Attorney',
            'menu' => 'data-attorney'
        );
        $data['founder'] = Pegawai::with('jabatan')->where('jabatan_id', 1)->first();
        // dd($data['founder']);
        $data['attorney'] = Pegawai::with('jabatan')->where('jabatan_id','!=', 1)->get();
        return view('user.attorney.index', $data);
    }
    
    public function detail($id)
    {
        $data = array(
            'title' => 'Attorney',
            'menu' => 'data-attorney'
        );
        $data['selected'] = Pegawai::with('jabatan')->where('id', $id)->first();
        $data['attorney'] = Pegawai::with('jabatan')->where('id','!=', $id)->get();
        // dd($data);
        return view('user.attorney.detail', $data);
    }
}
