<?php

namespace App\Service;

use App\Repository\UsersRepository;
use App\Service\ApplyFileService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersService
{
    public $repository, $ApplyFileService;

    public function __construct()
    {
        $this->repository = new UsersRepository();
        $this->ApplyFileService = new ApplyFileService();
    }

    public function getByAccount($account)
    {
        $data = $this->repository->getByAccount($account);

        return $data;
    }

    public function store($input)
    {
        $input['password'] = Hash::make($input['password']);
        $input['status'] = 0;

        $data = DB::transaction(function () use ($input) {
            $data = $this->repository->store($input);

            if (isset($input['file'])) {
                $input['user_id'] = $data->id;
                $this->ApplyFileService->store($input);
            }

            return $data;
        });

        return $data;
    }
}
