

d = range(10, 0, -1)

for i in d:
    print(i)

for i in reversed(range(11, 1)):
    print("your ")


a = [1, 2, 3, 4, "b", 5, 6, 7, 8]

for i in a:
    if type(i) == type("b"):

        print("Now break")
        break
    else:
        print(i)

for i in a:
    if type(i) == type("hello"):
        continue
    else:
        print(i)        


print("-------------")

for i in range(5):
    print(i)


