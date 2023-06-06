<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UsersService;
use App\Service\OrgsService;

class RegisterController extends Controller
{
    protected $UsersService, $OrgsService;

    public function __construct()
    {
        $this->UsersService = new UsersService();
        $this->OrgsService = new OrgsService();
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        $input = $request->all();

        $org = $this->OrgsService->getByNo($input['org_no']);
        if (!$org) {
            $binding = [
                'status' => 'fail',
                'text' => '尚無此單位，請先建立單位'
            ];

            return response()->json($binding);
        } else {
            $input['org_id'] = $org->id;
        }

        $data = $this->UsersService->getByAccount($input['account']);

        if ($data) {
            $binding = [
                'status' => 'fail',
                'text' => '已有此帳號，請重新輸入'
            ];
        } else {
            $data = $this->UsersService->store($input);

            $binding = [
                'status' => 'success',
                'text' => '建立成功'
            ];
        }

        return response()->json($binding);
    }
}
