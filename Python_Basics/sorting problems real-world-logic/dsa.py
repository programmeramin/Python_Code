arr = [10, 23, 43, 23, 11]

#arr.sort()
#print(arr)

arr.append(55)
arr.remove(23)
#print(arr[2])


#stack (lifo) last in first out

stack = []
stack.append(10)
stack.append(20)

stack.pop()


#queue (fifo) first in first out

from collections import deque
queue = deque()
queue.append(10)
queue.append(20)
queue

print(queue.popleft())

