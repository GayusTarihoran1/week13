<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Suplier;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    public function tambah_data()
    {
        return view('tambah_data');
    }

    public function simpan_data(Request $request)
    {
        // insert data ke tabel supplier
        Suplier::insert([
            's_no' => $request->s_no,
            'nama' => $request->nama,
            'kota' => $request->kota,
        ]);
        // alihkan halaman ke halaman tambah data
        return redirect('/supplier/tambah_data');
    }

    public function tampil_data()
    {
        // mengambil data dari tabel supplier
        $suppliers = Suplier::get();
 
        // mengirim data supplier ke tampil data
        return view('tampil_data',['suppliers' => $suppliers]);
    }

    public function edit_data($id)
    {
        // mengambil data supplier berdasarkan id yang dipilih
        $supplier = Suplier::where('s_no',$id)->get();
        // passing data supplier yang didapat ke view edit.blade.php
        return view('edit_data',['supplier' => $supplier]);
    
    }


    // update data supplier
    public function update_data(Request $request)
    {
        // update data supplier
        Suplier::where('s_no',$request->s_no)->update([
            'nama' => $request->nama,
            'kota' => $request->kota,
        ]);

        // alihkan halaman ke halaman tampul supplier
        return redirect('/supplier/tampil_data');
    }

    public function hapus_data($id)
    {
        // menghapus data supplier berdasarkan id yang dipilih
        Suplier::where('s_no',$id)->delete();
            
        // alihkan halaman ke halaman supplier
        return redirect('/supplier/tampil_data');
    }


}
