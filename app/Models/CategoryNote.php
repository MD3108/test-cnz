<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNote extends Model
{
    use HasFactory;
    protected $table = 'category_note';
    public $timestamps = false;
}
