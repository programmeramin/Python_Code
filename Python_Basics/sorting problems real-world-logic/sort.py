number = [5, 2, 9, 1, 5, 6, 34,2,23,34,23,45,67,89,90,12,34,56,78,90]

print(sorted(number))

mark = [23, 45, 67, 89, 90, 12, 34, 56, 78, 90]
mark.sort()
print(mark) 


name = ["Alice", "Bob", "Charlie", "David", "Eve"]
sorted_name = sorted(name)
print(sorted_name)


# algorithm for thinking
# compare -> swap 

a = 5 
b = 2

b, a = a, b
print(a, b)



# linear search

arr = [5, 2, 9, 1, 5, 6, 34,2,23,34,23,45,67,89,90,12,34,56,78,90]
target = 34

for i in range(len(arr)):
    if arr[i] == target:
        print("Element found at index:", i)
        break

# binary search
a = [1, 2, 3, 4, 5, 6, 7, 8, 9]
target = 5

left, right = 0, len(a) - 1

while left <= right:
    mid = left + right // 2
    if a[mid] == target:
        print("Element found at index:", mid)
        break
    elif target > a[mid]:
        left = mid + 1
    else:        right = mid - 1