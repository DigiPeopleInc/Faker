<?php

namespace Digipeopleinc\Faker\Locales\en_US;

class Payment
{
    public static function resourceCreditCards(): array
    {
        return [
            "American Express" => [
                "34#############",
                "37#############",
            ],
            "UnionPay" => [
                "62##############",
                "62#################",
            ],
            "RuPay" => [
                "60##############",
                "65##############",
                "81##############",
                "82##############",
                "508#############",
                "353#############",
                "356#############"
            ],
            "Maestro" => [
                "5018########",
                "5020########",
                "5038########",
                "5893########",
                "6304########",
                "6759########",
                "6761########",
                "6762########",
                "6763########",
                "5018###############",
                "5020###############",
                "5038###############",
                "5893###############",
                "6304###############",
                "6759###############",
                "6761###############",
                "6762###############",
                "6763###############",
            ],
            "Mir" => [
                "2200############",
                "2201############",
                "2202############",
                "2203############",
                "2204############",
                "2200###############",
                "2201###############",
                "2202###############",
                "2203###############",
                "2204###############",
            ],
            "Mastercard" => [
                "2221############",
                "23##############",
                "24##############",
                "25##############",
                "26##############",
                "2720############",
                "51##############",
                "52##############",
                "53##############",
                "54##############"
            ],
            "Visa" => [
                "4###############"
            ],
            "Visa Electron" => [
                "4026############",
                "417500##########",
                "4508############",
                "4844############",
                "4913############",
                "4917############"
            ]
        ];
    }

    public static function resourceBankNameTemplates(): array
    {
        return [
            "{firstPart}{secondPart}{thirdPart}",
            "{firstNaming} {secondPart}{thirdPart}"
        ];
    }

    public static function resourceBankNames(): array
    {
        return [
            "firstNaming" => [
                "Russian",
                "Moscow",
                "Vladimir",
                "Nizhny Novgorod",
                "Ekaterinburg",
                "Railway",
            ],
            "firstPart" => [
                "Metal",
                "Absolute",
                "Exterior",
                "Ros",
                "Mos",
                "Vlad",
                "Prom",
                "Sber",
                "Gas",
                "Agricultural",
                "Auto",
                "Agro",
                "Invest"
            ],
            "secondPart" => [
                "Economy",
                "Defence",
                "Credit",
                "Industrial",
                "Bargain",
                "Business"
            ],
            "thirdPart" => [
                "Bank",
                "Trade",
                "Standard"
            ]
        ];
    }
}
