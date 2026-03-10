print("Welcome to Python Quiz Game")

score = 0

#Question 1
print("\n1. What is the capital of Bangladesh")
print("a) Dhaka")
print("b) Mymensingh")
print("c) Rajshahi")

answer = input("Enter your answer: ")

if answer.lower() == "a":
    print("Correct!")
    score += 1
else:
    print("Wrong! Correct answer is Dhaka")    


# Question 2
print("\n2. Who created Python?")
print("a) Elon Musk")
print("b) Guido van Rossum")
print("c) Mark Zuckerberg")

answer = input("Enter your answer: ")

if answer.lower() == "b":
    print("Correct!")
    score = score + 1
else:
    print("Wrong! Correct answer is Guido van Rossum")


# Question 3
print("\n3. What is 5 + 5?")
print("a) 8")
print("b) 10")
print("c) 12")

answer = input("Enter your answer: ")

if answer.lower() == "b":
    print("Correct!")
    score = score + 1
else:
    print("Wrong! Correct answer is 10")

# Question 4
print("\n4. Who is invented the bulb")
print("a) Tomas alva addition ")
print("b) Alexander the graham bell ")
print("c) Bill gates")

answer = input("Enter your answer: ")
if answer.lower() == "a":
    print("Correct!")
    score += 1
else:
    print('Wrong! Your answer is incorrect')    

# Final Result
print("\nQuiz Finished")
print("Your Score:", score, "/ 4")

if score == 4:
    print("Excellent!")
elif score == 30:
    print("Good job!")
else:
    print("Keep practicing!")

