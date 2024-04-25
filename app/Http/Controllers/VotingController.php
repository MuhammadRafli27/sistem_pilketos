<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votings = Voting::all();
        $kandidats = Kandidat::all();
        return view('/voting', compact('votings', 'kandidats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $item = Kandidat::findorfail($id);
        if(auth()->user()->has_voted){
            Alert::error('Mohon Maaf', 'Akun anda Sudah Melakukan Voting Sebelumnya!!!');
            return redirect('/voting')->with('delete', 'Mohon Maaf, Anda sudah melakukan voting sebelumnya!!!');
        }
        $item->vote++;
        $item->save();

        $user = auth()->user();
        $vote = Voting::firstOrCreate(['id_user' => $user->id, 'id_kandidat' => $item->id]);

        $user->has_voted = true;
        $user->save();

        Alert::success('Berhasil', 'Terima Kasih Anda Berhasil Voting!!!');
        return redirect('/voting')->with('success', 'Terima kasih, Anda Berhasil Voting!!!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
