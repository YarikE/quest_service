<?php
namespace App\Service\userInfo;

use App\Models\User;
use App\Models\Quest;
use App\Models\CompletedQuests;
use App\DTO\MessageResponseDTO;
use App\DTO\UserInfoResponseDTO;
use App\DTO\QuestHistoryEntityDTO;
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
        if (!self::validateUser($user)) {
            $response = new MessageResponseDTO();
            $response
                ->setResult(false)
                ->setMessage('Такого пользователя не существует');
            return $response;
        }

        $response = new UserInfoResponseDTO();

        $userName = $user->name;
        $userBalance = $user->balance;
        $userQuestHistory = self::getQuestHistoryInfo($userId);

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


    /**
     * Получить список Dto с историей прохождения заданий пользователем
     *
     * @param $userId
     *
     * @return array
     */
    public static function getQuestHistoryInfo($userId): array
    {
        $result = [];

        /** @var CompletedQuests[] $questHistoryArray */
        $questHistoryArray = QuestAppRepository::getUsersQuestHistory($userId);

        /** @var Quest[] $questData */
        $questData = QuestAppRepository::getAllQuests();

        foreach ($questHistoryArray as $questHistoryEntity) {

            $questId = $questHistoryEntity['quest_id'];
            $questName = $questData[$questId]['name'];

            $doneTasksAmount = $questHistoryEntity['done_tasks_amount'];
            $maxTasksAmount = $questData[$questId]['tasks_amount'];

            $doneQuestsAmount = $questHistoryEntity['done_quests_amount'];
            $maxQuestsAmount = $questData[$questId]['accessible_quest_amount'];

            $actualQuestProgressData = self::getActualQuestProgress(
                $doneTasksAmount,
                $maxTasksAmount,
                $doneQuestsAmount,
                $maxQuestsAmount,
            );

            $actualQuestProgress = $actualQuestProgressData['actual_quest_progress'];
            $actualQuestProgressPercent = $actualQuestProgressData['actual_quest_progress_percent'];

            $questHistoryDto = new QuestHistoryEntityDTO(
                $questId,
                $questName,
                $doneTasksAmount,
                $doneQuestsAmount,
                $actualQuestProgress,
                $actualQuestProgressPercent,
            );

            $result[] = $questHistoryDto;
        }
        return $result;
    }


    /**
     * Получить прогресс выполнения заданий
     *
     * @param int $doneTasksAmount Кол-во выполненных задач
     * @param int $maxTasksAmount  Максимальное кол-во задач
     * @param int $doneQuestAmount Кол-во выполненных заданий
     * @param int $maxQuestAmount  Максимально кол-во заданий
     *
     * @return array
     */
    public static function getActualQuestProgress(
        int $doneTasksAmount,
        int $maxTasksAmount,
        int $doneQuestAmount,
        int $maxQuestAmount,
    ): array
    {
        $result = [];

        if ($doneQuestAmount == $maxQuestAmount) {
            $actualQuestProgress = 'Выполнено максимальное кол-во заданий';
            $actualQuestProgressPercent = '100 %';
        } else {
            $actualQuestProgress = "$doneTasksAmount из $maxTasksAmount задач в последнем задании выполнено";
            $actualQuestProgressPercent = round($doneTasksAmount / $maxTasksAmount, 2) * 100;
            $actualQuestProgressPercent = "$actualQuestProgressPercent %";
        }

        $result['actual_quest_progress'] = $actualQuestProgress;
        $result['actual_quest_progress_percent'] = $actualQuestProgressPercent;

        return $result;
    }
}
