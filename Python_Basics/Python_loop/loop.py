x = 10
while x > 0:
    print(x)
    x -= 1
    

while True:
    name = input("Enter your name (or 'exit' to quit): ")
    if name.lower() == 'exit':
        print("Goodbye!")
        break
    print(f"Hello, {name}!")

num = 10
for i in range (1, num):
    print(num, "x", i, "=", num * i)  