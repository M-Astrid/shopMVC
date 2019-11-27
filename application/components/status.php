<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 23.11.2019
 * Time: 9:56
 */
namespace Components;

class Status
{
    const ORDER_STATUS_MESSAGE = array(
        '1' => "Новый",
        '2' => "В обработке",
        '3' => "Доставляется",
        '4' => "Закрыт",
    );

    const DISPLAY_STATUS_MESSAGE = array(
        '1' => "Отображается",
        '0' => "Скрыта",
    );
}