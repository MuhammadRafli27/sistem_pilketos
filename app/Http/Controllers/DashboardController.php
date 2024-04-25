<?php

namespace App\Http\Controllers;

use App\Models\Voting;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use RealRashid\SweetAlert\Facades\Alert;

// use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $datasiswa = User::count();
        $hasVote = User::where('has_voted', true)->count();
        $notVote = User::where('has_voted', null)->count();
        $datakandidat = Kandidat::count();
        return view('/dashboard',  compact('datasiswa', 'hasVote', 'datakandidat', 'notVote'));
    }
}
?>
