box = "pyton"
for item in box:
    print(item)

fruits = ["Apple", "Banana", "Mango"]
for fruit in fruits:
    print(fruit)


# ✅ 2️⃣ Range ব্যবহার করে সংখ্যা প্রিন্ট
for i in range(0, 10,2):
    print(i)


students = ["Amin", "Rahim", "Karim"]

for student in students:
    print(student, "is present")

#✅ 7️⃣ Dictionary এর উপর Loop

students = {"name": "Amin", "age": 24}

for key, value in students.items():
    print(key, ":", value)



for i in range(3):
    for j in range(3):
        print("*", end=" ")
    print()
