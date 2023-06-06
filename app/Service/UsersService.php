<?php

namespace App\Service;

use App\Repository\UsersRepository;
use Illuminate\Support\Facades\Hash;

class UsersService
{
    public $repository;

    public function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function getByAccount($account)
    {
        $data = $this->repository->getByAccount($account);

        return $data;
    }

    public function store($input)
    {
        $input['org_id'] = 2345;
        $input['password'] = Hash::make($input['password']);
        $input['status'] = 0;

        $data = $this->repository->store($input);

        return $data;
    }
}
