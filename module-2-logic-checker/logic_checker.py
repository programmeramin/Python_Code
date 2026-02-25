# ✅ Step 2: Welcome Message
print("Welcome to Smart Eligibility & Performance Checker")
print()

# ✅ Step 3: User Input
name = input("Enter your name: ")
age = int(input("Enter your age: "))
exam_score = float(input("Enter your exam score (0-100): "))
monthly_income = float(input("Enter your monthly income: "))

print()

# ✅ Step 4: Age Check

age = 18

if age < 18:
    print("You are not eligible due to age restriction.")
else:
    print("Age requirement passed.")

# ✅ Step 5: Grade Evaluation

exam_score = 88

if exam_score >= 90:
    grade = "A"
elif exam_score >= 75:
    grade = "B"
elif exam_score >= 60:
    grade = "C"
else:
    grade = "Fail"

print("Grade:", grade)

# ✅ Step 6: Scholarship Check

monthly_income = 18000

if monthly_income < 20000 and exam_score > 75:
    scholarship_status = "Eligible"
    print("Eligible for scholarship support.")
else:
    scholarship_status = "Not Eligible"
    print("Not eligible for scholarship.")

# ✅ Step 7: Program Result

age = 18
exam_score = 88

if age >= 18:
    if exam_score >= 75:
        program_status = "Passed the program."
        print("You passed the program.")
    else:
        program_status = "Failed the program."
        print("You failed the program.")
else:
    program_status = "Program access denied."
    print("Program access denied.")

# ✅ Final Summary (Correct indentation)
print("\n------ Final Summary ------")
print("Name:", name)
print("Age:", age)
print("Exam Score:", exam_score)
print("Monthly Income:", monthly_income)
print("Grade:", grade)
print("Scholarship:", scholarship_status)
print("Status:", program_status)


# ✅ Step 9: Debugging Task
# Do the following intentionally:
# ✔ Use wrong indentation once
# ✔ Miss a colon (:)
# Observe Python error.
# Fix it and run successfully again.

# ❌ Use wrong indentation once
#   print("\nDebugging Task:") 
 
 # ❌ Miss a colon (:)
 # if age >= 18
  #      print("This line has wrong indentation and missing colon.")
        
# After fixing the above code:
print("\nDebugging Task:")

if age >= 18:
    print("This line has correct indentation and colon")   
