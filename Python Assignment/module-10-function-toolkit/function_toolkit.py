
# 📌 Step 2: Program Introduction
print("Welcome to Smart Utility Function Toolkit")

# 📌 Step 3: Calculator Functions

# ✔ Addition function
def add(a, b):
    return a + b

# ✔ Subtraction function
def subtract(a, b):
    return a - b

# ✔ Multiplication function
def multiply(a, b):
    return a * b

# ✔ Division function 
def divide(a, b):
    if b == 0:
        return "Cannot divide by zero"
    return a / b


# 📌 Step 4: User Input Menu

print("\nSelect Operation:")
print("1. Add")
print("2. Subtract")
print("3. Multiply")
print("4. Divide")

choice = input("Enter choice: ")

# Taking user input
num1 = float(input("Enter first number: "))
num2 = float(input("Enter second number: "))

if choice == '1':
    print("Result:", add(num1, num2))

elif choice == '2':
    print("Result:", subtract(num1, num2))

elif choice == '3':
    print("Result:", multiply(num1, num2))

elif choice == '4':
    print("Result:", divide(num1, num2))

else:
    print("Invalid choice")

# 📌 Step 5: Scope Practice

# ✔ Global variable
app_name = "Smart Utility Toolkit"

def show_app_name():
    print("\nApp Name:", app_name)

show_app_name()

# 📌 Step 6: Lambda Practice

square = lambda x: x * x

num = int(input("\nEnter a number to square: "))
print("Squared value:", square(num))

# 📌 Step 7: Map Function Usage

numbers = [1, 2, 3, 4, 5]


doubled_numbers = list(map(lambda x: x * 2, numbers))

print("\nDoubled List:", doubled_numbers)

# 📌 Step 8: Filter Function Usage

even_numbers = list(filter(lambda x: x % 2 == 0, numbers))

print("Even Numbers:", even_numbers)

  
# 📌 Step 9: Debugging Practice

def wrong_add(a, b):
    result = a + b   

print("\nWrong Add Output (will be None):", wrong_add(5, 3))

# ✔ Fix
def correct_add(a, b):
    return a + b

print("Correct Add Output:", correct_add(5, 3))


# ❌ Mistake 2: Wrong parameter count
# Uncomment below line to see error:
# add(5)

# ✔ Fix:
print("Fixed Call:", add(5, 3))