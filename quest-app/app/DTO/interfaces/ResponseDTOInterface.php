<?php
namespace App\DTO\interfaces;

use Illuminate\Http\JsonResponse;

interface ResponseDTOInterface
{
    /**
     * Получить json ответ
     * @return JsonResponse
     */
    public function getJsonResponse(): JsonResponse;
}
