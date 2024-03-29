<?php

namespace Digipeopleinc\Faker\Locales\ru_RU;

class Internet
{
    public static function resourceDomainEnd(): array
    {
        return \Digipeopleinc\Faker\Locales\en_US\Internet::resourceDomainEnd();
    }

    public static function resourceCompanyTemplates(): array
    {
        return [
            "with_type" => [
                "{type} “{leadingPart}{leadingPart}{endingPart}”",
                "{type} “{namingPart} {leadingPart}{endingPart}”",
                "{type} “{leadingPart}{endingPart}”",
            ],
            "no_type" => [
                "{leadingPart}{leadingPart}{endingPart}",
                "{namingPart} {leadingPart}{endingPart}",
                "{leadingPart}{endingPart}",
            ]
        ];
    }

    public static function resourceBusinessParts(): array
    {
        return [
            "type" => [
                "ОАО",
                "Открытое акционерное общество",
                "ООО",
                "Общество с ограниченной ответственностью",
                "ЗАО",
                "Закрытое акционерное общество",
            ],
            "namingPart" => [
                "Всемирный",
                "Национальный",
                "Авиакосмический",
                "Европейский",
                "Континентальный"
            ],
            "leadingPart" => [
                "Мед",
                "Медикал",
                "Бизнес",
                "Строй",
                "Транс",
                "Газ",
                "Нефть",
                "Снаб",
                "Сталь",
                "Глобал",
                "Металл",
                "Абсолют",
                "Внеш",
                "Рос",
                "Мос",
                "Влад",
                "Комп",
                "Пром",
            ],
            "endingPart" => [
                "Экспертс",
                "Инвест",
                "Сервис",
                "Идастриал",
                "Банк",
                "Торг",
                "Бизнес",
                "Трейд"
            ]
        ];
    }

    public static function resourcePhone(): array
    {
        return [
            "default" => ["+7##########"]
        ];
    }

    public static function resourceCategories(): array
    {
        return \Digipeopleinc\Faker\Locales\en_US\Internet::resourceCategories();
    }

    public static function resourceSlugs(): array
    {
        return \Digipeopleinc\Faker\Locales\en_US\Internet::resourceSlugs();
    }

    public static function resourceHouseNumber(): array
    {
        return ['###', '##'];
    }

    public static function resourceFlatNumber(): array
    {
        return ['###', '##'];
    }

    public static function resourceZipMask(): array
    {
        return ['6#####'];
    }

    public static function resourceCountry(): array
    {
        return [
            "Абхазия", "Австралия", "Австрия", "Азербайджан", "Албания", "Алжир", "Американское Самоа", "Ангилья", "Ангола", "Андорра", "Антарктида", "Антигуа и Барбуда", "Аргентина", "Армения", "Аруба", "Афганистан",
            "Багамы", "Бангладеш", "Барбадос", "Бахрейн", "Беларусь", "Белиз", "Бельгия", "Бенин", "Бермуды", "Болгария", "Боливия", "Бонэйр, Синт-Эстатиус и Саба", "Босния и Герцеговина", "Ботсвана", "Бразилия", "Британская Территория в Индийском Океане", "Британские Виргинские Острова", "Бруней", "Буркина-Фасо", "Бурунди", "Бутан",
            "Вануату", "Ватикан", "Венгрия", "Венесуэла", "Великобритания", "Виргинские Острова Соединённых Штатов", "Вьетнам",
            "Габон", "Гаити", "Гайана", "Гамбия", "Гана", "Гваделупа", "Гватемала", "Гвинея", "Гвинея-Бисау", "Германия", "Гернси", "Гибралтар", "Гондурас", "Гонконг", "Гренада", "Гренландия", "Греция", "Грузия", "Гуам",
            "Дания", "Демократическая Республика Конго", "Джерси", "Джибути", "Доминика", "Доминиканская Республика", "Египет",
            "Замбия", "Западная Сахара", "Зимбабве", "Израиль", "Индия", "Индонезия", "Иордания", "Ирак", "Иран", "Ирландия", "Исландия", "Испания", "Италия", "Йемен",
            "Кабо-Верде", "Казахстан", "Камбоджа", "Камерун", "Канада", "Катар", "Кения", "Кипр", "Киргизия", "Кирибати", "Китай", "Кокосовые острова", "Колумбия", "Коморы", "Конго", "Корейская Народно-Демократическая Республика", "Корея", "Коста-Рика", "Кот-д\"Ивуар", "Куба", "Кувейт", "Кюрасао",
            "Лаос", "Латвия", "Лесото", "Либерия", "Ливан", "Ливия", "Литва", "Лихтенштейн", "Люксембург",
            "Маврикий", "Мавритания", "Мадагаскар", "Майотта", "Макао", "Малави", "Малайзия", "Мали", "Малые Тихоокеанские Отдаленные Острова Соединенных Штатов", "Мальдивы", "Мальта", "Марокко", "Мартиника", "Маршалловы Острова", "Мексика", "Микронезия", "Мозамбик", "Молдова", "Монако", "Монголия", "Монтсеррат", "Мьянма",
            "Намибия", "Науру", "Непал", "Нигер", "Нигерия", "Нидерланды", "Никарагуа", "Ниуэ", "Новая Зеландия", "Новая Каледония", "Норвегия",
            "Объединенные Арабские Эмираты", "Оман", "Острова Кайман", "Острова Кука", "Острова Теркс и Кайкос", "Остров Буве", "Остров Мэн", "Остров Норфолк", "Остров Рождества", "Остров Херд и Острова Макдональд",
            "Пакистан", "Палау", "Палестина", "Панама", "Папуа-Новая Гвинея", "Парагвай", "Перу", "Питкерн", "Польша", "Португалия", "Пуэрто-Рико",
            "Республика Македония", "Реюньон", "Россия", "Руанда", "Румыния",
            "Самоа", "Сан-Марино", "Сан-Томе и Принсипи", "Саудовская Аравия", "Свазиленд", "Святая Елена, Остров Вознесения, Тристан-да-кунья", "Северные Марианские Острова", "Сейшелы", 
            "Сен-Бартелеми", "Сен-Мартен", "Сенегал", "Сент-Винсент и Гренадины", "Сент-Китс и Невис", "Сент-Люсия", "Сент-Пьер и Микелон", "Сербия", "Сингапур", "Сирийская Арабская Республика", 
            "Словакия", "Словения", "Соединенные Штаты Америки", "Соломоновы Острова", "Сомали", "Судан", "Суринам", "Сьерра-Леоне",
            "Таджикистан", "Таиланд", "Тайвань", "Танзания", "Тимор-лесте", "Того", "Токелау", "Тонга", "Тринидад и Тобаго", "Тувалу", "Тунис", "Туркмения", "Турция",
            "Уганда", "Узбекистан", "Украина", "Уоллис и Футуна", "Уругвай",
            "Фарерские острова", "Фиджи", "Филиппины", "Финляндия", "Фолклендские острова", "Франция", "Французская Гвиана", "Французская Полинезия", "Французские Южные Территории", "Хорватия",
            "Центрально-Африканская Республика", "Чад", "Черногория", "Чехия", "Чили", "Швейцария", "Швеция", "Шпицберген и Ян-Майен", "Шри-Ланка",
            "Эквадор", "Экваториальная Гвинея", "Эландские Острова", "Эль-Сальвадор", "Эритрея", "Эстония", "Эфиопия",
            "Южная Африка", "Южная Джорджия и Южные Сандвичевы Острова", "Южная Осетия", "Южный Судан",
        ];
    }

    public static function resourceCity(): array
    {
        return [
            "Москва", "Санкт-Петербург", "Новосибирск", "Екатеринбург", "Казань", "Нижний Новгород", "Челябинск", "Красноярск", "Самара", "Уфа", "Ростов-на-Дону", "Омск",
            "Краснодар", "Воронеж", "Пермь", "Волгоград", "Саратов", "Тюмень", "Тольятти", "Барнаул", "Ижевск", "Махачкала", "Хабаровск", "Ульяновск", "Иркутск", "Владивосток",
            "Ярославль", "Кемерово", "Томск", "Набережные Челны", "Ставрополь", "Оренбург", "Новокузнецк", "Рязань", "Балашиха", "Пенза", "Чебоксары", "Липецк", "Калининград",
            "Астрахань", "Тула", "Киров", "Сочи", "Курск", "Улан-Удэ", "Тверь", "Магнитогорск", "Сургут", "Брянск", "Иваново", "Якутск", "Владимир", "Белгород", "Нижний Тагил",
            "Калуга", "Чита", "Грозный", "Волжский", "Смоленск", "Подольск", "Саранск", "Вологда", "Курган", "Череповец", "Орёл", "Архангельск", "Владикавказ", "Нижневартовск",
            "Йошкар-Ола", "Стерлитамак", "Мурманск", "Кострома", "Новороссийск", "Тамбов", "Химки", "Мытищи", "Нальчик", "Таганрог", "Нижнекамск", "Благовещенск", "Комсомольск-на-Амуре",
            "Петрозаводск", "Королёв", "Шахты", "Энгельс", "Великий Новгород", "Люберцы", "Братск", "Старый Оскол", "Ангарск", "Сыктывкар", "Дзержинск", "Псков", "Орск", "Красногорск",
            "Армавир", "Абакан", "Балаково", "Бийск", "Южно-Сахалинск", "Одинцово", "Уссурийск", "Прокопьевск", "Рыбинск", "Норильск", "Волгодонск", "Сызрань", "Петропавловск-Камчатский",
            "Каменск-Уральский", "Новочеркасск", "Альметьевск", "Златоуст", "Северодвинск", "Хасавюрт", "Домодедово", "Салават", "Миасс", "Копейск", "Пятигорск", "Электросталь",
            "Майкоп", "Находка", "Березники", "Коломна", "Щёлково", "Серпухов", "Ковров", "Нефтекамск", "Кисловодск", "Батайск", "Рубцовск", "Обнинск", "Кызыл", "Дербент", "Нефтеюганск",
            "Назрань", "Каспийск", "Долгопрудный", "Новочебоксарск", "Новомосковск", "Ессентуки", "Невинномысск", "Октябрьский", "Раменское", "Первоуральск", "Михайловск", "Реутов",
            "Черкесск", "Жуковский", "Димитровград", "Пушкино", "Артём", "Камышин", "Муром", "Ханты-Мансийск", "Новый Уренгой", "Северск", "Орехово-Зуево", "Арзамас", "Ногинск",
            "Новошахтинск", "Бердск", "Элиста", "Сергиев Посад", "Видное", "Ачинск", "Тобольск", "Ноябрьск"
        ];
    }

    public static function resourceStreet(): array
    {
        return [
            "Северная", "Южная", "Ладыгина", "Ленина", "Ломоносова", "Домодедовская", "Гоголя", "1905 года", "Чехова", "Сталина", 
            "Космонавтов", "Гагарина", "Славы", "Бухарестская", "Будапештсткая", "Балканская"
        ];
    }

    public static function resourceAddressParts(): array
    {
        return [
            "region" => [
                'Амурская', 'Архангельская', 'Астраханская', 'Белгородская', 'Брянская',
                'Владимирская', 'Волгоградская', 'Вологодская', 'Воронежская', 'Ивановская',
                'Иркутская', 'Калининградская', 'Калужская', 'Кемеровская', 'Кировская',
                'Костромская', 'Курганская', 'Курская', 'Ленинградская', 'Липецкая',
                'Магаданская', 'Московская', 'Мурманская', 'Нижегородская', 'Новгородская',
                'Новосибирская', 'Омская', 'Оренбургская', 'Орловская', 'Пензенская',
                'Псковская', 'Ростовская', 'Рязанская', 'Самарская', 'Саратовская',
                'Сахалинская', 'Свердловская', 'Смоленская', 'Тамбовская', 'Тверская',
                'Томская', 'Тульская', 'Тюменская', 'Ульяновская', 'Челябинская',
                'Читинская', 'Ярославская',
            ],
            "cityFirstPart" => [
                "город"
            ],
            "streetFirstPart" => [
                "ул.",
                "ул.",
                "ул.",
                "наб."
            ],
            "houseFirstPart" => [
                "д."
            ],
            "flatFirstPart" => [
                "кв."
            ],
            "regionSecondPart" => [
                "область"
            ]
        ];
    }

    public static function resourceAddressFormat(): array
    {
        return [
            "full" => [
                "{zipMask}, {region} {regionSecondPart}, {cityFirstPart} {city}, {streetFirstPart} {street}, {houseFirstPart} {houseNumber}, {flatFirstPart} {flatNumber}",
                "{zipMask}, {region} {regionSecondPart}, {cityFirstPart} {city}, {streetFirstPart} {street}, {houseFirstPart} {houseNumber}"
            ],
            "short" => [
                "{streetFirstPart} {street}, {houseFirstPart} {houseNumber}, {flatFirstPart} {flatNumber}",
                "{streetFirstPart} {street}, {houseFirstPart} {houseNumber}",
            ]
        ];
    }
}