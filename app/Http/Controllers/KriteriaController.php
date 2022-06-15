<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Crips;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    //
    public function __construct()
    {
        $this -> middleware('auth');
    }
    public function index()
    {
        $data['criterias'] = Criteria::orderBy('nama_kriteria','ASC')->get();
        return view("criterias.index",$data);
    }

    public function create()
    {
        //menampilkan halaman create
        return view('criterias.create');
    }


    public function store(Request $request)
    {
        //
        //validasi input data employee
        $request->validate([
            'nama_kriteria' => ['required', 'string'],
            'atribut' => ['required', 'string'],
            'bobot' => ['required', 'string']
        ]);

        //insert setiap request dari form ke dalam database
        //Jika menggunakan metode ini, nama field pada tabel dan form harus sama
        Criteria::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('criterias.index')
                        ->with('success','Data Kriteria Berhasil Ditambahkan');

    }

    public function edit($id)
    {

        //
        $data['criterias'] = Criteria::findOrFail($id);
        return view('criterias.edit', $data);
    }

    public function update(Request $request, Criteria $criterias)
    {
        //validasi update data employee
        $request->validate([
            'nama_kriteria' => ['required', 'string'],
            'atribut' => ['required', 'string'],
            'bobot' => ['required', 'string']
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $criterias->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('criterias.index')
                        ->with('success','Data Kriteria Berhasil Diubah');

    }

    public function destroy($id)
    {
        try{
            $kriteria = Criteria::findOrFail($id);
            $kriteria -> delete();
            return redirect()->route('criterias.index')
                        ->with('success','Data Berhasil Dihapus');

        } catch (Exception $e){
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" .
            $e->getMessage());
            die("Gagal");
        }
    }

    public function show ($id)
    {
        $data['crips'] = Crips::where('kriteria_id',$id)->get();
        $data['criterias'] = Criteria::findOrFail($id);
        return view('criterias.show',$data);
    }
}
