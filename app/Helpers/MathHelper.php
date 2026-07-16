<?php

namespace App\Helpers;

class MathHelper {

    /**
     * @param float $min
     * @param float $max
     * @param int $decimals
     * @return float
     */
    public static function randomFloatBetween(float $min, float $max, int $decimals = 1): float {
        $factor = pow(10, $decimals);
        return mt_rand($min * $factor, $max * $factor) / $factor;
    }
}
