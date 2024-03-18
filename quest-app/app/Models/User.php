<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель пользователя
 *
 * @property int    $id      Id пользователя
 * @property string $name    Имя пользователя
 * @property int    $balance Баланс пользователя
 */
class User extends Model
{
    /**
     * Название таблицы
     * @var string
     */
    protected $table = 'user';

    /**
     * Список полей
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'balance',
    ];

    public $timestamps = false;
}
