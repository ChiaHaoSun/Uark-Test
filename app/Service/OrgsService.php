<?php

namespace App\Service;

use App\Repository\OrgsRepository;

class OrgsService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new OrgsRepository();
    }

    public function getByNo($org_no)
    {
        $data = $this->repository->getByNo($org_no);

        return $data;
    }

    public function store($input)
    {
        $data = $this->repository->store($input);

        return $data;
    }
}
