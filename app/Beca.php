<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{

    static function calculaBeca($promedio){
    	$VALUE_X = 35 / 12;
	 	$VALUE_Y = -195 / 4;
	 	$VALUE_Z = 1235 / 6;
    	$promedio3 = pow($promedio, 3);
    	$promedio2 = pow($promedio, 2);
    	$porcentaje = ($promedio3 * $VALUE_X) + ($promedio2 * $VALUE_Y) + ($promedio * $VALUE_Z);
    	return $porcentaje;
    }
}
