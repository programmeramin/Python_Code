import json
import os

print("Welcome to voting system")

# save data
def save_candidate(voting):
    with open("voting.json", "w") as f:
        json.dump(voting, f, indent=4)

# load data
def load_candidate():
    if os.path.exists("voting.json"):
        with open("voting.json", "r") as f:
            return json.load(f)
    return []

voting = load_candidate()

# create candidates
def create_candidate():
    total = int(input("How many candidates you want to add: "))

    for i in range(total):
        name = input(f"Enter candidate {i+1} name: ")

        candidate = {
            "name": name,
            "votes": 0
        }

        voting.append(candidate)
    save_candidate(voting)
    print("Candidates added successfully!\n")

def show_candidate():
    if not voting:
        print("Voting not found")
        return
    
    for i, c in enumerate(voting, 1):
        print(f"{i}. 👨‍💼{c["name"]}")

def give_vote():
    name = input("Enter candidate name: ")

    for candidate in voting:
        if candidate["name"].lower() == name.lower():

            try:
                vote = int(input("Enter your vote (only 1 allowed): "))

                if vote != 1:
                    print("❌ You can only give 1 vote!")
                    return

                candidate["votes"] += 1
                save_candidate(voting)

                print(f"✅ Vote given to {candidate['name']}")
                return

            except ValueError:
                print("❌ Please enter a valid number")
                return

    print("❌ Candidate not found")          

def show_winner():
    if not voting:
        print("❌ No candidates found")
        return

    # max vote বের করা
    max_votes = max(c["votes"] for c in voting)

    # যাদের vote max তাদের খুঁজে বের করা
    winners = [c for c in voting if c["votes"] == max_votes]

    if max_votes == 0:
        print("❌ No votes given yet")
        return

    print("\n🏆 Winner 🏆")

    for w in winners:
        print(f" {w['name']} - {w['votes']} votes")

while True:
   
    if not voting:
     create_candidate()

    print("\n1. Show candidate")   
    print("2. Give Vote ")
    print("3. Show Result ") 
    print("4. Exit")


    choice = input("Enter your choice: ")

    if choice == "1":
        show_candidate()
     
    elif choice == "2":
        give_vote() 

    elif choice == "3":
        show_winner()    
