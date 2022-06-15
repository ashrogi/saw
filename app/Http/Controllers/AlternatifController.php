<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    //
    public function __construct()
    {
        $this -> middleware('auth');
    }
    public function index()
    {
        $data['alternatifs'] = Alternatif::orderBy('nama_alternatif','ASC')->get();
        return view("alternatifs.index",$data);
    }

    public function create()
    {
        //menampilkan halaman create
        return view('alternatifs.create');
    }


    public function store(Request $request)
    {
        //
        //validasi input data employee
        $request->validate([
            'nama_alternatif' => ['required', 'string']
           
        ]);

        //insert setiap request dari form ke dalam database
        //Jika menggunakan metode ini, nama field pada tabel dan form harus sama
        Alternatif::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('alternatifs.index')
                        ->with('success','Data Alternatif Berhasil Ditambahkan');

    }

    public function edit($id)
    {

        //
        $data['alternatifs'] = Alternatif::findOrFail($id);
        return view('alternatifs.edit', $data);
    }

    public function update(Request $request, Alternatif $alternatifs)
    {
        //validasi update data employee
        $request->validate([
            'nama_alternatif' => ['required', 'string']
           
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $alternatifs->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('alternatifs.index')
                        ->with('success','Data Alternatif Berhasil Diubah');

    }

    public function destroy($id)
    {
        try{
            $alternatif = Alternatif::findOrFail($id);
            $alternatif -> delete();
            return redirect()->route('alternatifs.index')
                        ->with('success','Data Berhasil Dihapus');

        } catch (Exception $e){
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" .
            $e->getMessage());
            die("Gagal");
        }
    }
}
