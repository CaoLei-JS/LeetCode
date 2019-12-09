<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GreedyController extends Controller
{
    public function exercise122(Request $request)
    {
        $prices = json_decode($request->prices, true);
        $result = 0;
        $len = count($prices);
        for ($i = 1; $i < $len; $i++) {
            $temp = $prices[$i] - $prices[$i - 1];
            if ($temp > 0) {
                $result += $temp;
            }
        }
        return $result;
    }
}
