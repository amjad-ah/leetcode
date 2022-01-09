package main

import (
	"fmt"
	"sort"
)

func main() {
	fmt.Println(carPooling([][]int{{2, 1, 5}, {3, 5, 7}}, 3))                        // true
	fmt.Println(carPooling([][]int{{2, 1, 5}, {3, 3, 7}}, 5))                        // true
	fmt.Println(carPooling([][]int{{2, 2, 6}, {2, 4, 7}, {8, 6, 7}}, 11))            // true
	fmt.Println(carPooling([][]int{{3, 2, 7}, {3, 7, 9}, {8, 3, 9}}, 11))            // true
	fmt.Println(carPooling([][]int{{3, 2, 8}, {4, 4, 6}, {10, 8, 9}}, 11))           // true
	fmt.Println(carPooling([][]int{{4, 3, 4}, {3, 2, 4}, {1, 8, 9}, {7, 2, 5}}, 16)) // true
	fmt.Println(carPooling([][]int{{2, 1, 5}, {3, 3, 7}}, 4))                        // false
	fmt.Println(carPooling([][]int{{10, 1, 6}, {7, 5, 6}, {6, 7, 8}}, 16))           // false
	fmt.Println(carPooling([][]int{{9, 0, 1}, {3, 3, 7}}, 4))                        // false
}

func carPooling(trips [][]int, capacity int) bool {
	sort.Slice(trips, func(i, j int) bool {
		return trips[i][1] < trips[j][1]
	})
	var passengers [][]int
	for _, trip := range trips {
		x := trip[0]
		for _, passenger := range passengers {
			if passenger[1] > trip[1] {
				x += passenger[0]
			}
		}

		if x > capacity {
			return false
		}

		passengers = append(passengers, []int{trip[0], trip[2]})
	}

	return true
}
