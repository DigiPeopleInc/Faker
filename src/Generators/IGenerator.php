<?php
namespace Digipeopleinc\Faker\Generators;

use Digipeopleinc\Faker\Modules\Number;
use Digipeopleinc\Faker\Modules\Date;
use Digipeopleinc\Faker\Modules\Text;
use Digipeopleinc\Faker\Modules\Payment;
use Digipeopleinc\Faker\Modules\Color;

/**
 * @mixin Number
 * @mixin Date
 * @mixin Text
 * @mixin Payment
 * @mixin Color
 */
interface IGenerator
{

}
