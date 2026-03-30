# Initial setup
balance = 1000
transactions = []

while True:
    print("\n===== ATM MENU =====")
    print("1. Check Balance")
    print("2. Deposit")
    print("3. Withdraw")
    print("4. Transaction History")
    print("5. Exit")

    choice = input("Enter choice: ")

    # -------------------------
    # Option 1: Check Balance
    # -------------------------
    if choice == "1":
        print(f"Your current balance is: {balance}")

    # -------------------------
    # Option 2: Deposit
    # -------------------------
    elif choice == "2":
        amount = float(input("Enter amount to deposit: "))

        if amount > 0:
            balance += amount
            transactions.append(f"Deposited: {int(amount)}")
            print("Deposit successful!")
            print(f"New balance: {balance}")
        else:
            print("Invalid amount! Must be greater than 0.")

    # -------------------------
    # Option 3: Withdraw
    # -------------------------
    elif choice == "3":
        amount = float(input("Enter amount to withdraw: "))

        if amount <= 0:
            print("Invalid amount! Must be greater than 0.")
        elif amount > balance:
            print("Error: Insufficient balance!")
        else:
            balance -= amount
            transactions.append(f"Withdrawn: {int(amount)}")
            print("Withdrawal successful!")
            print(f"Remaining balance: {balance}")

    # -------------------------
    # Option 4: Transaction History
    # -------------------------
    elif choice == "4":
        print("\n--- Transaction History ---")

        if len(transactions) == 0:
            print("No transactions yet.")
        else:
            total_deposit = 0
            total_withdraw = 0

            for i, t in enumerate(transactions, start=1):
                print(f"{i}. {t}")

                # Calculate totals
                if "Deposited" in t:
                    amount = int(t.split(": ")[1])
                    total_deposit += amount
                elif "Withdrawn" in t:
                    amount = int(t.split(": ")[1])
                    total_withdraw += amount

            print(f"\nTotal Deposited: {total_deposit}")
            print(f"Total Withdrawn: {total_withdraw}")

    # -------------------------
    # Option 5: Exit
    # -------------------------
    elif choice == "5":
        print("Thank you for using ATM. Goodbye!")
        break

    # -------------------------
    # Invalid Input
    # -------------------------
    else:
        print("Invalid choice! Please select between 1-5.")   