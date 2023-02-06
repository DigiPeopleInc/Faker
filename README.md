# Faker

Requires PHP >= 8.1

# Table of Contents

- [Installation](#installation)
- [Usage](#usage)

## Installation

```sh
composer require digipeopleinc/faker
```

## Usage

```sh
require_once("../vendor/autoload.php");
use Digipeopleinc\Faker\Faker;
use Digipeopleinc\Faker\Modules\Text;

$faker = new Faker("ru_RU");
$quote = $faker->quote(template: "«{Quote}» <span>{Author}</span>");
$rgbColor = $faker->rgbCss();
$personName = $faker->person(gender: Text::GENDER_FEMALE);
$html = $faker->html(
    [
        "h1" => $faker->sentence(maxWords: 5),
        "div" => [
            $faker->tag(
                fn() => $faker->arrayOf(
                    fn() => $faker->paragraph(maxWords: 40),
                    times: 10
                ),
                tag: "p"
            )
        ],
        $faker->tag($quote, "p", ["style" => "color: ".$rgbColor]),
        $faker->tag($personName, "p")
    ],
    template: "default"
);
```

## Running tests

```sh
vendor/phpunit/phpunit/phpunit tests
```

See public methods in module classes located in /Modules directory 
