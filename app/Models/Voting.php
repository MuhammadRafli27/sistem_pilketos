<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable =
    ['id_user','id_kandidat'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function role()
    {
        return $this->hasMany(Role::class);
    }
    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class);
    }

    //Cek Siswa
    public function hasVoted()
    {
        return $this->user->votings()->where('id_kandidat', $this->id_kandidat)->exists();
    }

    public function setHasVoted()
    {
        $this->user->votes()->create([
            'id_kandidat' => $this->id_kandidat
        ]);
    }
}
