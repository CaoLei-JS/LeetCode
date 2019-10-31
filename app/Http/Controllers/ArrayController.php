<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function sortArrayByParity($A = [0])
    {
        $eval = $odd = [];
        foreach ($A as $value) {
            if ($value % 2 == 0) {
                $eval[] = $value;
            } else {
                $odd[] = $value;
            }
        }
        return array_merge($eval, $odd);
    }

    public function sumEvenAfterQueries($A = [1, 2, 3, 4], $queries = [[1, 0], [-3, 1], [-4, 0], [2, 3]])
    {
        $result = [];
        $temp = 0;
        foreach ($A as $valueA) {
            if ($valueA % 2 == 0) {
                $temp += $valueA;
            }
        }
        foreach ($queries as $value) {
            if ($A[$value[1]] % 2 == 0) {
                $temp -= $A[$value[1]];
            }
            $A[$value[1]] += $value[0];
            if ($A[$value[1]] % 2 == 0) {
                $temp += $A[$value[1]];
            }
            $result[] = $temp;
        }
        return $result;
    }

    public function sortArray($nums = [5, 2, 3, 1])
    {
        asort($nums);
        return $nums;
    }


}
