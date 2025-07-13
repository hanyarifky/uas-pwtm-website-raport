<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
