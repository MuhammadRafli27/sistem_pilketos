<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('/kandidat', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.tambah-data-kandidat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_kandidat' => 'required',
                'kelas_kandidat' => 'required',
                'visi_kandidat' => 'required',
                'misi_kandidat' => 'required',
                'foto_kandidat' => 'required|image|file|max:3080',

            ], [
                'nama_kandidat.required'=>'Nama Kandidat tidak boleh kosong!!!',
                'visi_kandidat.required'=>'Visi Kandidat tidak boleh kosong!!!',
                'misi_kandidat.required'=>'Misi Kandidat tidak boleh kosong!!!',
                'foto_kandidat.required'=>'Foto Kandidat wajib diupload!!!',
                'foto_kandidat.image'=>'Foto yang anda masukan bukan image!!!',
                'foto_kandidat.max'=>'Foto yang anda masukan terlalu besar harap kompres terlebih dahulu!!!',

            ]
        );


        if($request->file('foto_kandidat')){
            $validated['foto_kandidat'] = $request->file('foto_kandidat')->store('images');
        }
        Kandidat::create($validated);
        Alert::success('Success', 'Data Kandidat Berhasil Ditambahkan!!!');
        return redirect('/kandidat')->with('success', 'Data Kandidat Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/edit/ubah-data-kandidat',[
            'kandidat' => Kandidat::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kandidat = Kandidat::findorfail($id);
        $validated = $request->validate(
            [
                'nama_kandidat' => 'required',
                'kelas_kandidat' => 'required',
                'visi_kandidat' => 'required',
                'misi_kandidat' => 'required',
                'foto_kandidat' => 'image|file|max:3080',

            ], [
                'nama_kandidat.required'=>'Nama Kandidat tidak boleh kosong!!!',
                'visi_kandidat.required'=>'Visi Kandidat tidak boleh kosong!!!',
                'misi_kandidat.required'=>'Misi Kandidat tidak boleh kosong!!!',
                'foto_kandidat.image'=>'Foto yang anda masukan bukan image!!!',
                'foto_kandidat.max'=>'Foto yang anda masukan terlalu besar harap kompres terlebih dahulu!!!',

            ]
        );
        if($request->file('foto_kandidat')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['foto_kandidat'] = $request->file('foto_kandidat')->store('images');
        }
        $kandidat->update($validated);
        Alert::success('Success', 'Data Kandidat Berhasil DiUbah!!!');
        return redirect('/kandidat')->with('success', 'Data Kandidat Berhasil DiUbah!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kandidat $kandidat)
    {
        if($kandidat->foto_kandidat){
            Storage::delete($kandidat->foto_kandidat);
        }
        Kandidat::destroy($kandidat->id);
        Alert::error('Success', 'Data Kandidat Berhasil DiHapus!!!');
        return redirect('/kandidat')->with('delete', 'Data Kandidat Berhasil Di Hapus!!!');
    }
}
