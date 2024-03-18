<?php

namespace app\Http\Controllers\Info;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Service\userInfo\UserInfoService;

class InfoController extends Controller
{
    /**
     * Action url: /info/user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function userInfo(Request $request): JsonResponse
    {
        $userId = $request->all()['userId'];
        return UserInfoService::getUserInfo($userId)->getJsonResponse();
    }
}
