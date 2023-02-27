<?php
namespace Digipeopleinc\Faker\Generators;

use Digipeopleinc\Faker\Modules\Internet;
use Digipeopleinc\Faker\Modules\Number;
use Digipeopleinc\Faker\Modules\Date;
use Digipeopleinc\Faker\Modules\Text;
use Digipeopleinc\Faker\Modules\Payment;
use Digipeopleinc\Faker\Modules\Color;
use Digipeopleinc\Faker\Modules\File;
use Digipeopleinc\Faker\Modules\Image;

/**
 * @mixin Number
 * @mixin Date
 * @mixin Text
 * @mixin Payment
 * @mixin Color
 * @mixin File
 * @mixin Image
 * @mixin Internet
 */
interface IGenerator
{

}
