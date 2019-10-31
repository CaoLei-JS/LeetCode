<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StringController extends Controller
{
    /**
     * @param String $version1
     * @param String $version2
     * @return Integer
     */
    function compareVersion($version1, $version2)
    {
        $string1 = explode('.', $version1);
        $string2 = explode('.', $version2);
        $length = max(count($string1), count($string2));
        for ($i = 0; $i < $length; $i++) {
            $temp1 = empty($string1[$i]) ? 0 : (int)$string1[$i];
            $temp2 = empty($string2[$i]) ? 0 : (int)$string2[$i];
            if ($temp1 > $temp2) {
                return 1;
            } elseif ($temp1 < $temp2) {
                return -1;
            }
        }
        return 0;
    }

    public function exercise164(Request $request)
    {
        return $this->compareVersion($request['version1'], $request['version2']);
    }
}
