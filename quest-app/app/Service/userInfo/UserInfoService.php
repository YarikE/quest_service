<?php

namespace App\Service\userInfo;

use App\DTO\MessageResponseDTO;
use App\DTO\UserInfoResponseDTO;
use App\Models\User;
use App\Repository\QuestAppRepository;

class UserInfoService
{
    /**
     * Получение данных о пользователе
     *
     * @param $userId
     * @return UserInfoResponseDTO|MessageResponseDTO
     */
    public static function getUserInfo($userId): UserInfoResponseDTO|MessageResponseDTO
    {
        $user = QuestAppRepository::getUser($userId);
        if (self::validateUser($user)) {
            $response = new MessageResponseDTO();
            $response
                ->setResult(false)
                ->setMessage('Такого пользователя не существует');
        }

        $response = new UserInfoResponseDTO();

        $userData = QuestAppRepository::getUser($userId);

        $userName = $userData->name;
        $userBalance = $userData->balance;
        $userQuestHistory = QuestAppRepository::getUsersQuestHistory($userId);

        return $response->setName($userName)->setBalance($userBalance)->setQuestHistory($userQuestHistory);
    }


    /**
     * Валидация данных о пользователе
     *
     * @param User|null $user
     * @return bool
     */
    public static function validateUser(User|null $user): bool
    {
        if (is_null($user)) {
            return false;
        }
        return true;
    }
}
