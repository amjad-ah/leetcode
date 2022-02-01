<?php

class Solution {
    function maxProfit(array $prices): int {
        $maxProfit = 0;
        for ($i=1; $i < count($prices); $i++) {
            $current = $prices[$i];
            $lowest = $current;
            for ($j=$i-1; $j >= 0; $j--) {
                if ($prices[$j] >= $current) break;
                if ($prices[$j] < $lowest) $lowest = $prices[$j];
            }
            $profit = $current - $lowest;
            if ($profit > $maxProfit) {
                $maxProfit = $profit;
            }
        }

        return $maxProfit;
    }
}

$prices = [7,1,5,3,6,4];

echo (new Solution())->maxProfit($prices);
echo PHP_EOL;