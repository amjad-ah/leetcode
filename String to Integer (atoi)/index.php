<?php

class Solution {

    /**
     * @param string $s
     * @return int
     */
    function myAtoi(string $s): int {
        $s = trim($s);
        preg_match("/^[-|+]?([0-9])+/", $s, $res);

        if (isset($res[0])) { // I had to this, because the task was to do it with 32 bits not 64
            if ($res[0] < -2147483648) {
                return -2147483648;
            } else if ($res[0] > 2147483647) {
                return 2147483647;
            }

            return $res[0];
        }
        return 0;
    }
}
