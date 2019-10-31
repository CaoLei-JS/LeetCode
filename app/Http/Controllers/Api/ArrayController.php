<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArrayController extends Controller
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function numMagicSquaresInside($grid)
    {
        $num = 0;
        $width = count($grid[0]);
        $height = count($grid);
        if ($width < 3 || $height < 3) {
        } else {
            for ($i = 2; $width - $i > 0; $i++) {
                for ($j = 2; $height - $j >= 0; $j++)
                    $num += $this->checkSquareMatch($grid, $i, $j) ? 1 : 0;
            }
        }
        return $num;
    }

    function checkSquareMatch($grid, $p, $q)
    {
        if ($grid[$p - 1][$q - 1] != 5)
            return false;
        for ($i = 0; $i < 3; $i++) {
            $s1 = $s2 = 0;
            for ($j = 0; $j < 3; $j++) {
                if ($grid[$p - $i][$q - $j] > 9 || $grid[$p - $i][$q - $j] < 0) {
                    return false;
                } else {
                    $s1 += $grid[$p - $i][$q - $j];
                    $s2 += $grid[$p - $j][$q - $i];
                    $temp[] = $grid[$p - $i][$q - $j];
                }
            }
            if ($s1 != 15 || $s2 != 15) {
                return false;
            }
        }
        if (count(array_unique($temp)) < 9)
            return false;
        return true;
    }

    public function exercise840(Request $request)
    {
        return $this->numMagicSquaresInside($request['grid']);
    }
}
