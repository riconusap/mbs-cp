<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\TentangPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class TentangPerusahaanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Tentang Perusahaan',
            'menu' => 'data-tentang-perusahaan'
        );
        $data['data_tp'] = TentangPerusahaan::with('contact_perusahaan')->get();
        // dd($data);
        return view('admin.data-tentang-perusahaan.index', $data);
    }
    
    public function tambah(Request $request)
    {
        // dd($request->all());
        $p = TentangPerusahaan::where('id', $request->post_id)->first();
        
        if(isset($request->foto)){
            $custom_file_name =  date("Y_m_d_h_i_s") . '.' . $request->foto->extension();
            $image = $request->foto;
            $dest = public_path('/img');
            $image->move($dest, $custom_file_name);
        } else{
            $custom_file_name = $p->logo_perusahaan;
        }

        $id = $request->post_id;

        $tp   = TentangPerusahaan::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'nama_perusahaan' => $request->nama_perusahaan,
                'inisial_perusahaan' => $request->inisial_perusahaan,
                'tentang_perusahaan' => $request->tentang_perusahaan,
                'email_perusahaan' => $request->email_perusahaan,
                'no_telp_perusahaan' => $request->no_telp_perusahaan,
                'no_telp2_perusahaan' => $request->no_telp2_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'alamat2_perusahaan' => $request->alamat2_perusahaan,
                'logo_perusahaan' => $custom_file_name,
            ]
        );
        // $tp   = TentangPerusahaan::updateOrCreate(
        //     [
        //         'id' => $id
        //     ],
        //     [
        //         'no_telp_perusahaan' => $request->no_telp_perusahaan,
        //         'alamat_perusahaan' => $request->email_perusahaan,
        //     ]
        // );
        return Response::json($tp);
    }
}
