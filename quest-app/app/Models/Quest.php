<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель задания
 *
 * @property int    $id                  Id пользователя
 * @property string $name                Название задания
 * @property int    $coast               Стоимость задания
 * @property int    $tasks_amount        Кол-во задач задания
 * @property int    $access_quest_amount Кол-во
 */
class Quest extends Model
{
    /**
     * Название таблицы
     * @var string
     */
    protected $table = 'quests';

    /**
     * Список полей
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'coast',
        'tasks_amount',
        'access_quest_amount',
    ];
}
