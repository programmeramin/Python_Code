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