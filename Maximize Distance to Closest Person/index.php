<?php

class Solution
{
    function maxDistToClosest(array $seats): int
    {
        $distance = 0;
        $maxDistance = 0;
        $isFirst = false;
        $first = 0;
        foreach ($seats as $i => $seat) {
            if (!$seat) {
                $distance++;
                if ($i == 0) {
                    $isFirst = true;
                }
            } else {
                if ($distance > $maxDistance) {
                    $maxDistance = $distance;
                }
                if ($isFirst) {
                    $first = $distance;
                    $isFirst = false;
                }

                $distance = 0;
            }
        }

        $values = [
            $first,
            $distance,
            ceil($maxDistance / 2)
        ];

        return max($values);
    }
}


var_dump((new Solution)->maxDistToClosest([0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0]));