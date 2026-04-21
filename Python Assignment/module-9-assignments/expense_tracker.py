#Section A: Menu System

print("===== Expense Tracker Menu ======")

transactions = []
categories = set()
summary = {}

while True:
    print("\n1. Add Expense ")
    print("2. View All Expense ")
    print("3. Category-wise Report")
    print("4. Analytics")
    print("5. Search Expense")
    print("6. Remove Expense")
    print("7. View Categories")
    print("8. Exit")

    choice = input("Enter your choice: ")

    if choice == "1":
        category = input("Enter your category: ")

        # validation category
        if category == "":
            print("Category cannot be empty")
            continue

        amount = float(input("Enter your amount: "))

        if amount <= 0:
            print("Enter a valid amount")

        # store transactions
        transactions.append((category, amount))

        # add category
        categories.add(category)

        #update dictionary
        if category in summary:
            summary[category] += amount
        else:
            summary[category] = amount 

        print("Expense added successfully!")

    elif choice == "2":
        if len(transactions) == 0:
            print("No expenses found!")
        else:
            
            for i, (category, amount) in enumerate(transactions, start=1):
                print(f"{i}. {category} - {amount}")   


    elif choice == "8":
        print("Exiting program....")

    else:
        print("Invalid choice! Please try again")




        


