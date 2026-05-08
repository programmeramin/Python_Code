# ==============================
# Step 1: Import Modules
# ==============================
import os
import random
from datetime import datetime


# ==============================
# Step 2: Program Introduction
# ==============================
print("Welcome to Smart File-Based Manager")


# ==============================
# Step 3: Menu System
# ==============================
def show_menu():
    print("\n1. Add new expense")
    print("2. View all expenses")
    print("3. Add new note")
    print("4. View all notes")
    print("5. Exit")


# ==============================
# Step 4: File Writing (Expenses)
# ==============================
def add_expense():
    # Date auto from datetime (Step 7)
    date = datetime.now().strftime("%Y-%m-%d")
    title = input("Enter expense title: ")

    try:
        amount = float(input("Enter amount: "))
    except ValueError:
        print("Invalid amount!")
        return

    # Unique ID using random (Step 7)
    unique_id = random.randint(1000, 9999)

    data = f"{unique_id},{date},{title},{amount}\n"

    with open("expenses.csv", "a") as file:
        file.write(data)

    print("Expense added successfully!")


# ==============================
# Step 5: File Reading (Expenses)
# ==============================
def view_expenses():
    if not os.path.exists("expenses.csv"):
        print("No records found yet.")
        return

    with open("expenses.csv", "r") as file:
        lines = file.readlines()

    print("\n--- All Expenses ---")
    for line in lines:
        uid, date, title, amount = line.strip().split(",")
        print(f"ID: {uid} | Date: {date} | Title: {title} | Amount: {amount}")


# ==============================
# Step 6: Notes File System
# ==============================
def add_note():
    note = input("Write your note: ")

    with open("notes.txt", "a") as file:
        file.write(note + "\n")

    print("Note saved!")


def view_notes():
    if not os.path.exists("notes.txt"):
        print("No records found yet.")
        return

    with open("notes.txt", "r") as file:
        notes = file.readlines()

    print("\n--- Notes ---")
    for note in notes:
        print(note.strip())


# ==============================
# Main Program Loop
# ==============================
while True:
    show_menu()
    choice = input("Enter your choice: ")

    if choice == "1":
        add_expense()
    elif choice == "2":
        view_expenses()
    elif choice == "3":
        add_note()
    elif choice == "4":
        view_notes()
    elif choice == "5":
        print("Goodbye!")
        break
    else:
        print("Invalid choice!")

file = open("expenses.csv", "r")  # write করতে গেলে error
file.write("test")
file.close()

# write way
with open("expenses.csv", "a") as file:
    file.write("test\n")