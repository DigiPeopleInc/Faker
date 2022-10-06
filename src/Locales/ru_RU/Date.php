<?php

namespace Digipeopleinc\Faker\Locales\ru_RU;

use Digipeopleinc\Faker\Locales\en_US;

class Date
{
    public static function resourceFormatNames(): array
    {
        return [
            "days" => [
                1 => "Понедельник",
                2 => "Вторник",
                3 => "Среда",
                4 => "Четверг",
                5 => "Пятница",
                6 => "Суббота",
                7 => "Воскресенье"
            ],
            "daysShort" =>  [
                1 => "Пн",
                2 => "Вт",
                3 => "Ср",
                4 => "Чт",
                5 => "Пт",
                6 => "Сб",
                7 => "Вс"
            ],
            "month" => [
                1 => "Январь",
                2 => "Февраль",
                3 => "Март",
                4 => "Апрель",
                5 => "Май",
                6 => "Июнь",
                7 => "Июль",
                8 => "Август",
                9 => "Сентябрь",
                10 => "Октябрь",
                11 => "Ноябрь",
                12 => "Декабрь"
            ],
            "monthShort" => [
                1 => "Янв",
                2 => "Фев",
                3 => "Мар",
                4 => "Апр",
                5 => "Май",
                6 => "Июн",
                7 => "Июл",
                8 => "Авг",
                9 => "Сен",
                10 => "Окт",
                11 => "Ноя",
                12 => "Дек"
            ],
            "monthGenitive" => [
                1 => "Января",
                2 => "Февраля",
                3 => "Марта",
                4 => "Апреля",
                5 => "Мая",
                6 => "Июня",
                7 => "Июля",
                8 => "Августа",
                9 => "Сентября",
                10 => "Октября",
                11 => "Ноября",
                12 => "Декабря"
            ],
            "monthGenitiveShort" => [
                1 => "Янв",
                2 => "Фев",
                3 => "Мар",
                4 => "Апр",
                5 => "Мая",
                6 => "Июн",
                7 => "Июл",
                8 => "Авг",
                9 => "Сен",
                10 => "Окт",
                11 => "Ноя",
                12 => "Дек"
            ]
        ];
    }

    public static function resourceDefaultFormats(): array
    {
        return [
            "date" => "d.m.Y",
            "time" => "H:i:s"
        ];
    }

    public static function resourceTimeZones(): array
    {
        return en_US\Date::resourceTimeZones();
    }
}
