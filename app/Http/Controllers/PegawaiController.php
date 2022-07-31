<?php

namespace App\Http\Controllers;

use App\Model\MasterJabatan;
use App\Model\Pegawai;
use DateTime;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Pegawai',
            'menu' => 'data-pegawai'
        );
        $data['jabatan'] = MasterJabatan::where('status', 1)->get();
        $data['pegawai_list'] = Pegawai::with('jabatan')->get();
        // dd($data['pegawai_list'][1]->jabatan->nama_jabatan);
        return view('admin.data-pegawai.index', $data);
    }
    public function tambah(Request $request)
    {
        // dd($request->all());
        $date1 = new DateTime(date('Y-m-d', strtotime($request->tanggal_lahir)));
        $tahun_lahir = $date1->format('y');
        $bulan_lahir = $date1->format('m');
        $tanggal_lahir = $date1->format('d');
        $jenis_kelamin = $request->jenis_kelamin;

        $nip = $tanggal_lahir . $bulan_lahir . $tahun_lahir . $jenis_kelamin . rand(1000, 9999);
        $p = Pegawai::where('id', $request->post_id)->first();
        // dd($p);
        
        if(isset($request->foto)){
            $custom_file_name =  date("Y_m_d_h_i_s") . '.' . $request->foto->extension();
            // dd($custom_file_name);
            $foto = $request->foto->storeAs('public/foto', $custom_file_name);
            // dd($ktp);
            // store your file into database
        } else{
            $custom_file_name = $p->foto;
        }

        $id = $request->post_id;

        $pegawai   = Pegawai::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'nama' => $request->nama,
                'jabatan_id' => $request->jabatan,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'foto' => $custom_file_name,
                'deskripsi' => $request->deskripsi,
                'no_telp' => str_replace(" ", "", $request->no_telp),
                // 'foto' => $foto_path,
            ]
        );
        return Response::json($pegawai);
    }
    public function delete($id)
    {
        $p = Pegawai::where('id', $id)->first();
        $delete = Storage::delete('foto/'.$p->foto);  
        $pegawai = Pegawai::where('id', $id)->delete();
        return Response::json($pegawai);
    }
}
