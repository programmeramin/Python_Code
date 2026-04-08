numbers = [12,34,54,12]
serial = 0
for i in numbers:
    serial += 1
    print(serial, ":", i)

if 12 in numbers:
    print("12 found")
else:
    print("Not found")

print(numbers.index(34))

for i in range(len(numbers)):
    if numbers[i] == 30:
        print("Found")


student = {"name ": "Amin Islam", "age" : 23, "skill" : "IOS DEVS"}

