<?php

namespace App\Repository;

use App\Models\apply_file;

class ApplyFileRepository
{
    public function __construct()
    {
    }

    public function store($input)
    {
        $data = new apply_file();
        $data->fill($input);
        $data->save();

        return $data;
    }
}
