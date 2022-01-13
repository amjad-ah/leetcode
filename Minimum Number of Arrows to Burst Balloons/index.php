<?php

class Solution
{
    function findMinArrowShots(array $points): int
    {
        usort($points, function ($a,$b) { return $a[1] <=> $b[1];});

        $arrows = 1;
        $min = $points[0][0];
        $max = $points[0][1];
        foreach ($points as $key => $pointA) {
            $pointB = isset($points[$key+1]) ? $points[$key+1] : $points[$key];
            if (
                ($min <= $pointA[0] && $pointA[0] <= $max) ||
                ($min <= $pointB[1] && $pointB[1] <= $max) ||
                ($min >= $pointA[0] && $pointA[1] >= $max)
            ) {
                $min = ($pointA[0] < $min) ? $min : $pointA[0];
                $max = ($pointB[1] > $max) ? $max : $pointB[1];
            } else {
                $min = $pointA[0];
                $max = $pointA[1];
                $arrows++;
            }
        }

        return $arrows;
    }
}
