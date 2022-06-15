<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crips;
use App\Models\Criteria;

class CripsController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_crips' => 'required|string',
            'bobot' => 'required|numeric'
        ]);

        try {
            $crips = new Crips();
            $crips -> kriteria_id = $request->kriteria_id;
            $crips -> nama_crips = $request->nama_crips;
            $crips -> bobot = $request->bobot;
            $crips -> save();
            return back()->with('msg','Berhasil menambahkan data');
        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" .
            $e->getMessage());
            die("Gagal");
        }
    }
    public function edit($id)
    {
        $data['crips'] = Crips::findOrFail($id);
        return view ('crips.edit', $data);
    }

    public function update(Request $request, Crips $id)
    {
        $request->validate([
            'kriteria_id' => ['integer'],
            'nama_crips' => ['required', 'string', ],
            'bobot' => ['required', 'string']
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $id->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('criterias.index')
                        ->with('success','criterias data updated successfully');

    }
    public function destroy($id)
    {
        try{
            $crips = Crips::findOrFail($id);
            $crips -> delete();
            return redirect()->route('criterias.index')
                        ->with('success','Data Berhasil Dihapus');
        } catch (Exception $e){
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" .
            $e->getMessage());
            die("Gagal");
        }
    }
}
