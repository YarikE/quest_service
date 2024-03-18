<?php

namespace app\DTO;

use App\DTO\interfaces\ResponseDTOInterface;
use Illuminate\Http\JsonResponse;

/**
 * DTO информации о пользователе
 *
 * @property string $name         Имя пользователя
 * @property array  $questHistory История выполнения заданий
 * @property int    $balance      Баланс пользователя
 */
class UserInfoResponseDTO implements ResponseDTOInterface
{
    /**
     * @var string Имя пользователя
     */
    public string $user_name;


    /**
     * @var array История выполнения заданий
     */
    public array $quest_history;


    /**
     * @var int Баланс пользователя
     */
    public int $balance;


    /**
     * Сеттер для поля name
     *
     * @param string $name
     *
     * @return UserInfoResponseDTO
     */
    public function setName(string $name): UserInfoResponseDTO
    {
        $this->user_name = $name;
        return $this;
    }


    /**
     * Сеттер для поля questHistory
     *
     * @param array $questHistory
     *
     * @return UserInfoResponseDTO
     */
    public function setQuestHistory(array $questHistory): UserInfoResponseDTO
    {
        $this->quest_history = $questHistory;
        return $this;
    }


    /**
     * Сеттер для поля balance
     *
     * @param int $balance
     *
     * @return UserInfoResponseDTO
     */
    public function setBalance(int $balance): UserInfoResponseDTO
    {
        $this->balance = $balance;
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
