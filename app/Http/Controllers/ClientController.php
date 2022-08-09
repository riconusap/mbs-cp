<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Client',
            'menu' => 'data-client'
        );
        $data['client'] = Client::all();
        // dd($data);
        return view('admin.data-client.index', $data);
    }
    
    public function tambah(Request $request)
    {
        $p = Client::where('id', $request->post_id)->first();
        
        if(isset($request->foto)){
            $custom_file_name =  date("Y_m_d_h_i_s") . '.' . $request->foto->extension();
            $image = $request->foto;
            $dest = public_path('/img');
            $image->move($dest, $custom_file_name);
        } else{
            $custom_file_name = $p->logo;
        }

        $id = $request->post_id;

        $client   = Client::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'nama_client' => $request->nama,
                'logo' => $custom_file_name,
                // 'foto' => $foto_path,
            ]
        );
        return Response::json($client);
    }

    public function delete($id)
    {
        $p = Client::where('id', $id)->first();
        $delete = Storage::delete('foto/'.$p->foto);  
        $client = Client::where('id', $id)->delete();
        return Response::json($client);
    }
}
