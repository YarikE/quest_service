<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель задания
 *
 * @property int    $id                      Id пользователя
 * @property string $name                    Название задания
 * @property int    $cost                    Стоимость задания
 * @property int    $tasks_amount            Кол-во задач задания
 * @property int    $accessible_quest_amount Кол-во доступных заданий
 */
class Quest extends Model
{
    /**
     * Название таблицы
     * @var string
     */
    protected $table = 'quest';

    /**
     * Список полей
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'cost',
        'tasks_amount',
        'accessible_quest_amount',
    ];

    public $timestamps = false;
}
