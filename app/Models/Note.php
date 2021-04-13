<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['fighter', 'name', 'notation', 'damage', 'ki_start', 'ki_end', 'user_id'];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
