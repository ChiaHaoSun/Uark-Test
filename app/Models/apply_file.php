<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class apply_file extends Model
{
	protected $table = 'apply_file';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file_path'
    ];
}
