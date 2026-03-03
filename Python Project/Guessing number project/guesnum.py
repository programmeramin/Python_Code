import random

# Random number generate (1 to 100)
secret_number = random.randint(1, 100)


print("🎮 Welcome to Number Guessing Game!")
print("I have selected a number between 1 and 10")

while True:
    guess = int(input("Enter your guess: "))

    if guess > secret_number:
        print("Too High! 📈")
    elif guess < secret_number:
        print("Too Low! 📈")
    else:
        print(f"🎉 Correct! You guessed in attempts.")
        break
 