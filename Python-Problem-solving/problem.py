#Problem solving

# user - input - even or odd

# - user input
# - 2 %
# - print 


# num = int(input("Enter a number: "))

# if num % 2 == 0:
#     print("even")
# else:
#     print("odd")    


total = 1
for i in range(1, 6):
    total += i
    print(total)


number = (1,2,3,4,4,44,5,66,5,5,6)

count_4 = number.count(4)

print(count_4)


number = (1,2,3,4,4,44,5,66,5,5,6)

count = 0

for n in number:
    if n == 4:
        count += 1

print(count)


# a,b = map(int, input("enter your name: ").split())


name = "MD AMIN ISLAM"
age = 23

print(f"my name is:  {name} & my age is {age}")