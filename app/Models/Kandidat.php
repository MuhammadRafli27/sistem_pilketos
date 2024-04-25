<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function voting()
    {
        return $this->hasMany(Voting::class);
    }
    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
