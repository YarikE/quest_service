<?php

namespace app\DTO;

class QuestHistoryEntityDTO
{
    /**
     * @var int Id задания
     */
    public int $quest_id;

    /**
     * @var string Название задания
     */
    public string $quest_name;

    /**
     * @var int Кол-во выполненных задач в задании
     */
    public int $done_tasks_amount;

    /**
     * @var int Кол-во выполненных заданий
     */
    public int $done_quests_amount;

    /**
     * @var string Прогресс текущего задания
     */
    public string $actual_quest_progress;

    /**
     * @var string Прогресс (в процентах) текущего задания
     */
    public string $actual_quest_progress_percent;


    /**
     * Конструктор
     *
     * @param int    $quest_id
     * @param string $quest_name
     * @param int    $done_tasks_amount
     * @param int    $done_quests_amount
     * @param string $actual_quest_progress
     * @param string $actual_quest_progress_percent
     */
    public function __construct(
        int    $quest_id,
        string $quest_name,
        int    $done_tasks_amount,
        int    $done_quests_amount,
        string $actual_quest_progress,
        string $actual_quest_progress_percent
    )
    {
        $this->quest_id = $quest_id;
        $this->quest_name = $quest_name;
        $this->done_tasks_amount = $done_tasks_amount;
        $this->done_quests_amount = $done_quests_amount;
        $this->actual_quest_progress = $actual_quest_progress;
        $this->actual_quest_progress_percent = $actual_quest_progress_percent;
    }


}
