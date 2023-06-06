<?php

namespace App\Service;

use App\Repository\ApplyFileRepository;
use Illuminate\Support\Facades\Storage;

class ApplyFileService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ApplyFileRepository();
    }

    public function store($input)
    {
        $file_data = $input['file'];  //取得檔案資料
        $file_type = $file_data->getClientOriginalExtension(); //取得檔案類型
        $file_name = (int)(microtime(true) * 10000) . '.' . $file_type;
        $input['file_path'] = "/apply_file/" . $file_name;

        Storage::disk('public')->put($input['file_path'], $file_data->get());

        $data = $this->repository->store($input);

        return $data;
    }
}
