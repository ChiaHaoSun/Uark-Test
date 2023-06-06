<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orgs extends Model
{
    protected $table = 'orgs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'org_no'
    ];
}
