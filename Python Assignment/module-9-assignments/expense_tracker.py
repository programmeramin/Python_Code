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
    
    elif choice == "3":
       if len(summary) == 0:
        print("No data available!")
       else:
        print("\nCategory-wise Report:")
        for category, total in summary.items():
            print(f"{category} - {total}")

    elif choice == "4":
        if len(transactions) == 0:
            print("No data available!")
        else:
            # Total expense
            total_expense = sum(amount for _, amount in transactions)

            # Highest & Lowest expense
            highest = max(transactions, key=lambda x: x[1])
            lowest = min(transactions, key=lambda x: x[1])

            # Most used category (based on total spending)
            most_used = max(summary, key=summary.get)

            # Average expense
            average = total_expense / len(transactions)

            print("Analytics:")
            print(f"Total Expense: {int(total_expense)}")
            print(f"Highest Expense: {highest[0]} - {int(highest[1])}")
            print(f"Lowest Expense: {lowest[0]} - {int(lowest[1])}")
            print(f"Most Used Category: {most_used}")
            print(f"Average Expense: {int(average)}")

    elif choice == "5":
        search_category = input("Enter category to search: ").strip()

        found = False

        for i, (category, amount) in enumerate(transactions, start=1):
            if category.lower() == search_category.lower():
                print(f"{i}. {category} - {int(amount)}")
                found = True

        if not found:
            print("No expense found for this category")

    elif choice == "6":
        if len(transactions) == 0:
            print("No expenses to remove!")
        else:
            
            for i, (category, amount) in enumerate(transactions, start=1):
                print(f"{i}. {category} - {int(amount)}")

           
                index = int(input("Enter index to remove: "))

                if index < 1 or index > len(transactions):
                    print("Invalid index!")
                    continue

                # Remove from list
                removed = transactions.pop(index - 1)
                print(f"Removed: {removed[0]} - {int(removed[1])}")

                # Recalculate dictionary and set
                summary.clear()
                categories.clear()

                for category, amount in transactions:
                    categories.add(category)
                    if category in summary:
                        summary[category] += amount
                    else:
                        summary[category] = amount

    elif choice == "8":
        print("Exiting program....")

    else:
        print("Invalid choice! Please try again")




        


