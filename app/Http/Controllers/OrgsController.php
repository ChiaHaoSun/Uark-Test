<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\OrgsService;

class OrgsController extends Controller
{
    protected $OrgsService;

    public function __construct()
    {
        $this->OrgsService = new OrgsService();
    }

    public function orgs()
    {
        return view('orgs');
    }

    public function doOrgs(Request $request)
    {
        $input = $request->all();
        $data = $this->OrgsService->getByNo($input['org_no']);

        if ($data) {
            $binding = [
                'status' => 'fail',
                'msg' => '已有此單位，請重新輸入'
            ];
        } else {
            $data = $this->OrgsService->store($input);

            $binding = [
                'status' => 'success',
                'msg' => '建立成功'
            ];
        }

        return response()->json($binding);
    }
}
