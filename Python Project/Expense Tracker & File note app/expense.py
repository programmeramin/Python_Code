import csv
from datetime import datetime

file = "expenses.csv"

def load_expenses():
    expenses = []
    try:
        with open(file, mode='r') as csvfile:
            reader = csv.DictReader(csvfile)
            for row in reader:
                expenses.append({
                    'date': row['date'],
                    'category': row['category'],
                    'amount': float(row['amount'])
                })
    except FileNotFoundError:
        pass  # No expenses file yet
    return expenses

def save_expenses(expenses):
    with open(file, mode='w', newline='') as csvfile:
        fieldnames = ['date', 'category', 'amount']
        writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
        writer.writeheader()
        for expense in expenses:
            writer.writerow(expense)

def add_expense(expenses):
    category = input("Enter expense category: ")
    amount = float(input("Enter expense amount: "))
    date = datetime.now().strftime("%Y-%m-%d")
    expenses.append({
        'date': date,
        'category': category,
        'amount': amount
    })

    print("Expense added successfully!")


def view_expenses(expenses):
    if not expenses:
        print("No expenses recorded.")
        return

    print("Date       | Category       | Amount")
    print("-----------------------------------")
    for expense in expenses:
        print(f"{expense['date']} | {expense['category']} | ${expense['amount']:.2f}")  

def show_total(expenses):
    total = sum(expense['amount'] for expense in expenses)
    print(f"Total expenses: ${total:.2f}")


def main():
    expenses = load_expenses()

    while True:
        print("\nExpense Tracker")
        print("1. Add Expense")
        print("2. View Expenses")
        print("3. Show Total")
        print("4. Exit")

        choice = input("Choose an option: ")

        if choice == '1':
            add_expense(expenses)
            save_expenses(expenses)
        elif choice == '2':
            view_expenses(expenses)
        elif choice == '3':
            show_total(expenses)
        elif choice == '4':
            print("Exiting the program. Goodbye!")
            break
        else:
            print("Invalid option. Please try again.")
            
main()            
