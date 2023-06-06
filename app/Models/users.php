<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
	protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'org_id',
        'name',
        'birthday',
        'email',
        'account',
        'password',
        'status'
    ];

    //單位
    public function org()
    {
        return $this->hasOne(orgs::class, 'id', 'org_id');
    }

    //申請附檔
    public function apply_file()
    {
        return $this->hasOne(apply_file::class, 'user_id', 'id');
    }
}
