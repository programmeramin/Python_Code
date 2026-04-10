fruits = ["Apple", "Banana", "Mango"]

print("Apple" in fruits)

if "Mango" in fruits:
    print("Mango found in fruits")
else:
    print("Mango not found in fruits")    

num = ["Amin Islam", "Raihan Kabir", "Zahid Rana", "Kabir Islam"]  

for num in num:
    if num == "Amin Islam":
        print("Found")
    else:
        print("Not Found")    


print(len(num))

numbers  = [12, 23, 323, 234,223,23,56]

for i in range(len(numbers)):
    if numbers[i] == 23:
        print("Found at", i)

item = ["Pen", "Book", "Bag", "Saban"]

search = input("Enter your search bag: ").lower()

if search in item:
    print("Found")
else:
    print("Found")    

mx = [
   [1,2,3],
   [4,5,6] 
]    

for r in mx:
    for i in r:
        if i == 5:
            print("found")


vote = [1,2,3,4,5,6,7,8,5,2,3,5,3,2,3,3]

count = 0

for vot in vote:
    if vot == 3:
        count += 1   # ✅ correct

print("Frequency:", count)    

mx = [
   [1,2,3],
   [4,5,6],
   [8,5,6]
]    

for r in mx:
    print(r)
    for i in r:
        if i == 8:
            print("found")
