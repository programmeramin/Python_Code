#📌 Step 2: Program Introduction

print("Welcome to Smart Task Repetition System")

#📌 Step 3: Task Input
task_name = input("Enter your task name (Example: Study Python, Practice Math): ")
repeat_times = int(input("How many times do you want to repeat this task today? "))


#📌 Step 4: Using a for Loop
for i in range(1, repeat_times + 1):
    print(f"Task {i}: {task_name} completed.")


# 📌 Step 5: Countdown Using a While Loop
countdown = int(input("Enter a number to start countdown: "))

while countdown > 0:
    print(countdown)
    countdown -= 1

#📌 Step 6: Nested Loop (Advanced Practice)    

sessions = ["Morning", "Evening"]

for session in sessions:
    for task in range(1, 4):
        print(f"{session}  Task {task}")

#📌 Step 7: Infinite Loop Test (Learning Purpose)
#Infinite Loop
# while True:
#     print("This loop will run forever...")


counter = 1

while counter <= 5:
    print("Loop running", counter )
    counter += 1

print("Loop stopped correctly")




#📌  Step 8: Debugging Practice
count = 1

#❌ Wrong Code
# while count <= 5:
#     print("Counter:", count)



#Correct code
while count <= 5:
    print("Counter:", count)
    count += 1