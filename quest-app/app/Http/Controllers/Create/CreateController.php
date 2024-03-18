<?php
namespace app\Http\Controllers\Create;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\QuestAppRepository;

class CreateController extends Controller
{
    /**
     * Action url: /create/user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createUser(Request $request): JsonResponse
    {
        return response()->json(QuestAppRepository::createUser($request->all()), 201);
    }

    /**
     * Action url: /create/quest
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createQuest(Request $request): JsonResponse
    {
        return response()->json(QuestAppRepository::createQuest($request->all()), 201);
    }
}
