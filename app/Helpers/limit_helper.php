<?php

function word_limiter($str, $limit = 10)
{
    if (stripos($str, " ")) {
        $ex_str = explode(" ", $str);
        $str_s = "";
        if (count($ex_str) > $limit) {
            for ($i = 0; $i < $limit; $i++) {
                $str_s .= $ex_str[$i] . " ";
            }
            return $str_s . "&hellip;";
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}
