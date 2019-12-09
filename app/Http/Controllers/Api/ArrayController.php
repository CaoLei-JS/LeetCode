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

    public function exercise974(Request $request)
    {
        $A = $request['A'];
        $K = $request['K'];
        return $this->subarraysDivByK($A, $K);

    }

    function calcSum($A, $begin, $end)
    {
        $result = 0;
        for ($i = $begin; $i <= $end; $i++) {
            $result += $A[$i];
        }
        return $result;
    }

    /**
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    function subarraysDivByK($A, $K)
    {
        $length = count($A);
        $values = [];
        for ($i = 1; $i <= $length; $i++) {
            for ($j = 0; $j + $i <= $length; $j++) {
                $values[] = $this->calcSum($A, $j, $j + $i - 1);
            }
        }
        $count = 0;
        foreach ($values as $value) {
            if ($value % $K == 0) {
                $count++;
            }
        }
        return $count;
    }

    public function exercise26(Request $request)
    {
        $nums = json_decode($request['nums'], true);
        $length = $this->removeDuplicates($nums);

        return compact('nums', 'length');
    }

    function removeDuplicates(&$nums)
    {
        $length = count($nums);
        if ($length < 2) {
            return $length;
        }
        $i = 0;
        for ($j = 1; $j < $length; $j++) {
            if ($nums[$i] != $nums[$j])
                $nums[++$i] = $nums[$j];
        }
        return ++$i;
    }
}
