<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель выполненных заданий
 *
 * @property int $user_id            Id Пользователя
 * @property int $quest_id           Id Задания
 * @property int $done_tasks_amount  Кол-во выполненных задач
 * @property int $done_quests_amount Кол-во выполненных заданий
 */
class CompletedQuests extends Model
{
    /**
     * Название таблицы
     * @var string
     */
    protected $table = 'completed_quests';

    /**
     * Список полей
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'quest_id',
        'done_tasks_amount',
        'done_quests_amount',
    ];

    public $timestamps = false;
}
