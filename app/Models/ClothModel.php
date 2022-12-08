<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothModel extends Model
{
    use HasFactory;
    protected $table = 'clothes';
	protected $fillable = ['name', 'image'];
}
