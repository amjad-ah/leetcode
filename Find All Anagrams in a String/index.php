<?php

class Solution
{
    function findAnagrams(string $s, string $p): array {
        $sChars = str_split($s);
        $pChars = str_split($p);
        $pCount = [];
        $sCount = [];
        for ($i=0; $i < count($pChars); $i++) {
            $pCount[$pChars[$i]] = (isset($pCount[$pChars[$i]])) ? $pCount[$pChars[$i]] + 1 : 1;
            $sCount[$sChars[$i]] = (isset($sCount[$sChars[$i]])) ? $sCount[$sChars[$i]] + 1 : 1;
        }
        $result = ($pCount == $sCount) ? [0] : [];
        $l = 0;
        for ($r=count($pChars); $r < count($sChars); $r++) {
            $sCount[$sChars[$r]] = (isset($sCount[$sChars[$r]])) ? $sCount[$sChars[$r]] + 1 : 1;
            $sCount[$sChars[$l]] -= 1;

            if ($sCount[$sChars[$l]] == 0) {
                unset($sCount[$sChars[$l]]);
            }
            $l++;
            if ($sCount == $pCount) {
                $result[] = $l;
            }
        }

        return $result;
    }
}
