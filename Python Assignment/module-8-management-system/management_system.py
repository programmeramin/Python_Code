# 📌 Step 2: Program Introduction
print("Welcome to Smart Voting & Student Management System")

# 📌 Step 3: Voting Data Input
num_voters = int(input("Enter number of voters: "))

votes = []

for i in range(num_voters):
    candidate = input(f"Voter {i+1}, enter candidate name: ")
    votes.append(candidate)

print("\nAll votes:", votes)

# 📌 Step 4: Frequency Counter Using Dictionary
vote_count = {}  # empty dictionary

for vote in votes:
    if vote in vote_count:
        vote_count[vote] += 1
    else:
        vote_count[vote] = 1

print("\nVote Count:")
for candidate, count in vote_count.items():
    print(f"{candidate} = {count}")


# 📌 Step 6: Winner Detection

winner = None
max_votes = 0

for candidate, count in vote_count.items():
    if count > max_votes:
        max_votes = count
        winner = candidate

print(f"\nWinner is Candidate {winner}")

#📌 Step 7: Student Management (Bonus Feature)
print("-----------------------")

student = {
    "john" : {"math": 80, "science": 75},
    "Alex" : {"math": 90, "science": 85}
}

for name, v in student.items():
    total = 0
    for s, m in v.items():
        total += m
    print(f"{name}'s Total marks = {total}")    


# 📌 Step 8: Searching Feature

search_name = input("\nEnter candidate or student name to search: ")

# 🔍 Search in vote_count (candidates)
if search_name in vote_count:
    print(f"{search_name} got {vote_count[search_name]} votes")

# 🔍 Search in student dictionary
elif search_name in student:
    print(f"\nStudent: {search_name}")
    total = 0

    for subject, marks in student[search_name].items():
        print(f"{subject} = {marks}")
        total += marks

    print(f"Total Marks = {total}")

# ❌ Not found
else:
    print("No data found for this name")


# 📌 Step 9: Debugging Practice
vote_count = {}

for vote in votes:
    vote_count[vote] += 1   # ❌ error এখানে

vote_count = {}

# ✅ Fix
for vote in votes:
    if vote in vote_count:
        vote_count[vote] += 1
    else:
        vote_count[vote] = 1

# ❌ Case 2: Missing Loop Indentation
for vote in votes:
print(vote)   # ❌ indentation নাই       


#✅ Fix 
for vote in votes:
    print(vote)
