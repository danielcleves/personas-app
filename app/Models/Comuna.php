<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;
    protected $table = 'tb comuna';
    protected $primaryKey = 'comu codi ';
    public $timestamps = false;
}
