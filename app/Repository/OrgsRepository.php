<?php

namespace App\Repository;

use App\Models\orgs;

class OrgsRepository
{
    public function __construct()
    {
    }

    public function getByNo($org_no)
    {
        $data = orgs::where('org_no', $org_no)->first();

        return $data;
    }

    public function store($input)
    {
        $data = new orgs();
        $data->fill($input);
        $data->save();

        return $data;
    }
}
