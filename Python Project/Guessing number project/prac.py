import random

print("Welcome to the number guessing game")

secret_number = random.randint(1, 10)

attempt = 3

while attempt > 0:
    print("Your remaining chances", attempt)
    
    guess = int(input("Enter your guessing number 1 - 10: "))

    if guess == secret_number:
        print("Congratulations you have selected correct number")

    elif guess > secret_number:
        print("Opps! To High")
    else:
        print("To Low")

    attempt -= 1

    if attempt == 0:
        print("You ran out of remaining chance", attempt)         

