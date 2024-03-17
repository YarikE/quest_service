<?php

namespace App\DTO;

use Illuminate\Http\JsonResponse;
use App\DTO\interfaces\ResponseDTOInterface;

/**
 * DTO простого ответа
 *
 * @property bool   $result  Результат выполнени
 * @property string $message Сообщение
 */
class MessageResponseDTO implements ResponseDTOInterface
{
    /**
     * @var bool $result Результат выполнения
     */
    public bool $result;


    /**
     * @var string $message Сообщение
     */
    public string $message;


    /**
     * Сеттер для поля result
     *
     * @param bool $result
     *
     * @return $this
     */
    public function setResult(bool $result): MessageResponseDTO
    {
        $this->result = $result;
        return $this;
    }


    /**
     * Сеттер для поля message
     *
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): MessageResponseDTO
    {
        $this->message = $message;
        return $this;
    }


    /**
     * @inheritDoc
     */
    public function getJsonResponse(): JsonResponse
    {
        return response()->json($this);
    }
}
