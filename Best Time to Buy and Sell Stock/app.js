var maxProfit = function(prices) {
    var maxProfit = 0;
    for (let i = 1; i < prices.length; i++) {
        var current = prices[i];
        var lowest = current;
        for (let j = i-1; j >= 0; j--) {
            if (prices[j] >= current) break;
            if (prices[j] < lowest) lowest = prices[j];
        }
        var profit = current - lowest;
        maxProfit = (profit > maxProfit) ? profit : maxProfit;
    }

    return maxProfit;
};

console.log(maxProfit([7,1,5,3,6,4]));