<?php
namespace App\Http\Controllers\Make;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Service\makeTask\MakeTaskService;

class MakeController extends Controller
{
    /**
     * Action url: /make/task
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function makeTask(Request $request): JsonResponse
    {
        $userId = $request->all()['userId'];
        $questId = $request->all()['questId'];

        return MakeTaskService::makeTask($userId, $questId)->getJsonResponse();
    }
}
