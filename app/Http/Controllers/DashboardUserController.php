<?php

namespace App\Http\Controllers;

use App\Model\Artikel;
use App\Model\Client;
use App\Model\ExpertiseContent;
use App\Model\Pegawai;

class DashboardUserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'menu' => 'data-dashboard'
        );
        $data['expertise'] = ExpertiseContent::get(); 
        $data['pegawai'] = Pegawai::with('jabatan')->get();
        $data['artikel'] = Artikel::with('kategori')->orderBy('tanggal','DESC')->paginate(3);
        $data['clients'] = Client::get();
        // dd(date("d",strtotime($data['artikel'][0]->tanggal)));
        return view('user.dashboard.index', $data);
    }
}
