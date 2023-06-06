<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Service\UsersService;

class LoginController extends Controller
{
    protected $UsersService;

    public function __construct()
    {
        $this->UsersService = new UsersService();
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $msg = '';
        $input = $request->all();
        $data = $this->UsersService->getByAccount($input['account']);

        if ($data) {
            $isCorrect = Hash::check($input['password'], $data->password);
            if (!$isCorrect) {
                $msg = '密碼錯誤，請重新輸入';
            } else {
                $msg = ($data->status == 1) ? '登入成功' : '此帳號待審核開通';
            }
        } else {
            $msg = '無此帳號，請重新輸入';
        }

        $binding = [
            'msg' => $msg
        ];

        return response()->json($binding);
    }
}
