#Lambda
add = lambda a,b : a + b 
print(add(3,4))


square = lambda x : x * x
print(square(4))

even = lambda x : x % 2 == 0
print(even(10))

# 🔥 Basic Syntax
# lambda arguments: expression

student = [("Rahim", 23), ("Karim", 63), ("Jahid", 14)]

sorted_list = sorted(student, key = lambda x : x[1])
print(sorted_list)


num = [1,2,3,4,5,6]

result = map(lambda x : x * 2, num)
print(tuple(result))


def square(x):
    return x * x

num = [1,2,3,4,5,6]
result = map(square, num)
print(list(result))


#filter
num = [1,2,3,4,5,6]

result = filter(lambda x : x % 2 == 0, num)
print(list(result))