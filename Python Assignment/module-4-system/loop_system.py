#📌 Step 2: Program Introduction
print("Welcome to Daily Life Problem Solver Toolkit")

# 📌 Step 3: Menu System
a = 100
b = 25
c = 180

# 1. Calculate sum of two numbers
sum = a + b

print(sum)

if sum % 2 == 0:
    print("Even")
else:
    print("Odd")    

# 3.Find maximum of three numbers
if a >= b and a >= c:
    print("Max a ", a)     
elif b >= a and b >= c:
    print("Max b ", b)
else:

    print("Max c", c)


#📌 Step 4: Sum Calculator
option = int(input("Choose option (1 for Sum Calculator): "))

if option == 1:
    num1 = float(input("Enter first number: "))
    num2 = float(input("Enter second number: "))

    total = num1 + num2

    print("Total number", total)


#📌 Step 5: Even or Odd Checker
option2 = int(input("Please choose option (2 for even or odd): "))

if option2 == 2:
    number = int(input("Enter a number any kind of: "))

    if number % 2 == 0:
        print("Even number")
    else:
        print("Odd number")    

#📌 Step 6: Maximum Finder
option3 = int(input("Please choose option (3 for find maximum number): "))

if option3 == 3:
    number1 = int(input("Enter a 1st number: "))
    number2 = int(input("Enter a 2nd number: "))
    number3 = int(input("Enter a 3rd number: "))


    if number1 >= number2 and number1 >= number3:
        print("Largest number1", number1)
    elif number2 >= number1 and number2 >= number3:
        print("Largest number2", number2)
    else:
        print("Largest number3 ", number3)


# 📌 Step 7: Repeat Program Using Loop (Challenge Part)
while True:

    num1 = int(input("Enter a number: "))
    num2 = int(input("Enter a number: "))

    total = num1 + num2

    print("total number", total)


    choice = input("Do you want to solve another problem? (yes/no) or y/n: ").lower()

    if choice == "yes" or choice == "y":
        print("run again")
    else:
        print("Exiting program. Goodbye!")
        break    


#📌 Step 8: Debugging Practice
# age = input("Enter your age: ")   # ❌ Forgot int conversion

# # Step 2: Check eligibility
# if age >= 18                   # ❌ Missing colon
#     print("You are eligible to vote")
# else:
#     print("You are not eligible to vote")

# correct version
age = int(input("Enter your age: "))
if age >= 18:          
    print("You are eligible to vote")
else:
    print("You are not eligible to vote")
