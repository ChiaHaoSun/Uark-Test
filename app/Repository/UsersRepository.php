<?php

namespace App\Repository;

use App\Models\users;

class UsersRepository
{
    public function __construct()
    {
    }

    public function getByAccount($account)
    {
        $data = users::where('account', $account)->first();

        return $data;
    }

    public function store($input)
    {
        $data = new users();
        $data->fill($input);
        $data->save();

        return $data;
    }
}
