<?php
namespace App\Repository;

use App\Models\CompletedQuests;
use App\Models\Quest;
use App\Models\User;

class QuestAppRepository
{
    /**
     * Создание пользователя
     *
     * @param array $params
     * @return User
     */
    public static function createUser(array $params): User
    {
        return User::create($params);
    }


    /**
     * Получить пользователя
     *
     * @param int $userId
     * @return User|null
     */
    public static function getUser(int $userId): User|null
    {
        return User::find($userId);
    }


    /**
     * Создание задания
     *
     * @param array $params
     * @return Quest
     */
    public static function createQuest(array $params): Quest
    {
        return Quest::create($params);
    }


    /**
     * Обновление баланса пользователя
     *
     * @param $userId
     * @param $balance
     * @return void
     */
    public static function updateUserBalance($userId, $balance): void
    {
        $user = User::find($userId);
        $user->balance = $balance;
        $user->save();
    }


    /**
     * Получить задание по id
     *
     * @param int $questId
     * @return null|Quest
     */
    public static function getQuest(int $questId): null|Quest
    {
        return Quest::find($questId);
    }

    /**
     * Получить список всех задач, проиндексированных по id
     *
     * @return array
     */
    public static function getAllQuests(): array
    {
        return Quest::all()->keyBy('id')->toArray();
    }

    /**
     * Создание записи о выполнении задания/задачи
     *
     * @param int $userId
     * @param int $questId
     * @param int $done_tasks_amount
     * @param int $done_quests_amount
     * @return CompletedQuests
     */
    public static function createCompletedQuest(
        int $userId,
        int $questId,
        int $done_tasks_amount,
        int $done_quests_amount,
    ):CompletedQuests
    {
        $completedQuest = new CompletedQuests;

        $completedQuest->user_id = $userId;
        $completedQuest->quest_id = $questId;
        $completedQuest->done_tasks_amount = $done_tasks_amount;
        $completedQuest->done_quests_amount = $done_quests_amount;

        $completedQuest->save();

        return $completedQuest;
    }


    /**
     * Получение записи о выполнении задания/задачи
     *
     * @param int $userId
     * @param int $questId
     * @return null|CompletedQuests
     */
    public static function getCompletedQuest(int $userId, int $questId): null|CompletedQuests
    {
        $conditions = [
            ['user_id', '=', $userId],
            ['quest_id', '=', $questId],
        ];

        return CompletedQuests::where($conditions)->first();
    }


    /**
     * Обновление записи о выполнении задания/задачи
     *
     * @param CompletedQuests $completedQuest
     * @param int $done_tasks_amount
     * @param int $done_quests_amount
     * @return void
     */
    public static function updateCompletedQuest(
        CompletedQuests $completedQuest,
        int $done_tasks_amount,
        int $done_quests_amount
    ): void
    {
        $completedQuest->done_tasks_amount = $done_tasks_amount;
        $completedQuest->done_quests_amount = $done_quests_amount;

        $completedQuest->save();
    }


    /**
     * Получить историю заданий поьзователя
     *
     * @param $userId
     * @return array|null
     */
    public static function getUsersQuestHistory($userId): array|null
    {
        $condition = [
            ['user_id', '=', $userId],
        ];

        return CompletedQuests::where($condition)->get()->toArray();
    }
}
