transactions = []
categories = set()
summary = {}


print("===== Expense Tracker Menu ======")

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
        category = input("Enter your category name: ")

        if category == "":
            print("Category didn't empty ")
    
        amount = float(input("Enter your amount: "))

        if amount <= 0:
            print("Amount must be a positive number")

        transactions.append((category, amount))

        categories.add(category) 

        if category in summary:
            summary[category] += amount
        else:
            summary[category] = amount    


    if choice == "2":
        for i, (cate, amo), in enumerate(transactions, start=1):
            print(f"{i}. {cate} - {amo}")

