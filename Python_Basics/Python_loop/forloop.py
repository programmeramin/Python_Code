# box = "pyton"
# for item in box:
#     print(item)

# fruits = ["Apple", "Banana", "Mango"]
# for fruit in fruits:
#     print(fruit)


# # ✅ 2️⃣ Range ব্যবহার করে সংখ্যা প্রিন্ট
# for i in range(0, 10, 3):
#     print(i)


# students = ["Amin", "Rahim", "Karim"]

# for student in students:
#     print(student, "is present")

# #✅ 7️⃣ Dictionary এর উপর Loop

# students = {"name": "Amin", "age": 24}

# for key, value in students.items():
#     print(key, ":", value)

# for key, value in students.items():
#     print(key, ":", value)


#reverse loop print
for i in range(10,0,-1):
    print(i)


#multiplicatin
num = 10

for i in range(1, 11):
    print(num, "x", i, "=", num * i)



#string reverse print
name = "Python"

for i in range(len(name) -1, -1, -1):
    print(name[i])


# forloop break use

for i in range(10):
    if i == 5:
        break
    print(i)


# Nested loop
for i in range(3):
    for j in range(2):
        print("I = ", i, "J = ", j)
    print(i)


# Patterns draw
for i in range(1, 6):
    for j in range(i):
        print("*", end="")
    print()            

print("------ different -------")

for i in range(6, 0, -1):
    for j in range(i):
        print("*", end="")
    print() 