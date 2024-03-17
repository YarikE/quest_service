<?php
namespace App\Service\makeTask;

use App\DTO\MessageResponseDTO;
use App\Models\CompletedQuests;
use App\Models\Quest;
use App\Repository\QuestAppRepository;

class MakeTaskService
{
    /**
     * Сделать задачу
     *
     * @param $userId
     * @param $questId
     *
     * @return MessageResponseDTO
     */
    public static function makeTask($userId, $questId): MessageResponseDTO
    {
        $response = new MessageResponseDTO;

        $completedQuest = QuestAppRepository::getCompletedQuest($userId, $questId);
        $quest = QuestAppRepository::getQuest($questId);

        // Если нет прогесса по конкретному заданию у пользователя
        if (!self::validateCompletedQuest($completedQuest)) {

            // Если нет задания
            if (!self::validateQuest($quest)) {
                return $response->setResult(false)->setMessage("Нет задания с id $questId");
            }

            $done_tasks_amount = 1;

            if ($quest->tasks_amount == $done_tasks_amount) {
                $done_quests_amount = 1;
            } else {
                $done_quests_amount = 0;
            }

            QuestAppRepository::createCompletedQuest($userId, $questId, $done_tasks_amount, $done_quests_amount);

        } else {

            // Если пользователю доступно выполнение задания
            if (!self::canMakeQuest($completedQuest->done_quests_amount, $quest)) {
                return $response->setResult(false)->setMessage('Пользователю не доступно выполнение задания');
            }

            $updateResult = self::getUpdatedTasksAndQuestsAmount($quest, $completedQuest->done_tasks_amount, $completedQuest->done_quests_amount);

            $done_tasks_amount = $updateResult['done_tasks_amount'];
            $done_quests_amount = $updateResult['done_quests_amount'];

            // Если нужно выдать пользователю вознаграждение за выполнение задания
            if ($updateResult['giveReward']) {
                $user = QuestAppRepository::getUser($userId);
                $userBalance = $user->balance + $quest->cost;
                QuestAppRepository::updateUserBalance($userId, $userBalance);
            }

            QuestAppRepository::updateCompletedQuest($completedQuest, $done_tasks_amount, $done_quests_amount);

        }
        return $response->setResult(true)->setMessage('Задача успешно выполнена');
    }


    /**
     * Валидация полученных данных по выполненным заданиям
     *
     * @param CompletedQuests|null $completedQuests
     *
     * @return bool
     */
    public static function validateCompletedQuest(CompletedQuests|null $completedQuests): bool
    {
        if (!is_null($completedQuests)) {
            return true;
        }
        return false;
    }


    /**
     * Валидирование полученных данных по выполненным заданиям
     *
     * @param Quest|null $quest
     *
     * @return bool
     */
    public static function validateQuest(Quest|null $quest): bool
    {
        if (!is_null($quest)) {
            return true;
        }
        return false;
    }


    /**
     * Получить обновленное кол-во сделаных задач и заданий
     *
     * @param Quest $quest
     * @param int $done_tasks_amount
     * @param int $done_quests_amount
     *
     * @return array Пример данных на выходе: ['done_tasks_amount' => 0, 'done_quests_amount' => $done_quests_amount + 1]
     */
    public static function getUpdatedTasksAndQuestsAmount(
        Quest $quest,
        int $done_tasks_amount = 1,
        int $done_quests_amount = 0,
    ): array
    {
        if ($quest->tasks_amount == $done_tasks_amount + 1) {
            return ['done_tasks_amount' => 0, 'done_quests_amount' => $done_quests_amount + 1, 'giveReward' => true];
        }

        return ['done_tasks_amount' => $done_tasks_amount + 1, 'done_quests_amount' => $done_quests_amount, 'giveReward' => false];
    }


    /**
     * Разрешить пользователю доступ к заданию
     *
     * @param int $completedQuests
     * @param Quest $quest
     *
     * @return bool
     */
    public static function canMakeQuest(int $completedQuests, Quest $quest): bool
    {
        if ($quest->accessible_quest_amount > $completedQuests) {
            return true;
        }
        return false;
    }
}
