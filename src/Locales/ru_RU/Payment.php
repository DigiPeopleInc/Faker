<?php

namespace Digipeopleinc\Faker\Locales\ru_RU;
use Digipeopleinc\Faker\Locales\en_US;

class Payment
{
    public static function resourceCreditCards(): array
    {
        return en_US\Payment::resourceCreditCards();
    }

    public static function resourceBankNameTemplates(): array
    {
        return [
            "{firstPart}{secondPart}{thirdPart}",
            "{firstPart}{secondPart}{thirdPart}",
            "{firstPart}{secondPart}{thirdPart}",
            "{firstNaming} {secondPart}{thirdPart}"
        ];
    }

    public static function resourceBankNames(): array
    {
        return [
            "firstNaming" => [
                "Всероссийский",
                "Московский",
                "Владимирский",
                "Нижегородский",
                "Екатеринбургский",
                "Железнодорожный",
            ],
            "firstPart" => [
                "Металл",
                "Абсолют",
                "Внеш",
                "Рос",
                "Мос",
                "Влад",
                "Пром",
                "Сбер",
                "Газ",
                "Сельхоз",
                "Авто",
                "Агро",
                "Инвест"
            ],
            "secondPart" => [
                "Эконом",
                "Оборон",
                "Кредит",
                "Индастриал",
                "Торг",
                "Бизнес"
            ],
            "thirdPart" => [
                "Банк",
                "Трейд",
                "Стандарт"
            ]
        ];
    }
}
