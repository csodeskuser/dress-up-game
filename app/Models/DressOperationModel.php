<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DressOperationModel extends Model
{
    use HasFactory;
    protected $table = 'dress_up_details';
	protected $fillable = [
		'user_id', 
		'cloth_id'
	];
}
