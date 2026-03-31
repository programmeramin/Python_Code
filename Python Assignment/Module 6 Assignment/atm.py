balance = 1000
transaction = []

while True:
    print("\n====  Wellcome to ATM System =====")
    print("1. Check Balance")
    print("2. Withdraw")
    print('3. Deposit')
    print("4. Transaction history")
    print("5. Exit")

    choice = input("Enter choice: ")

    # -------------------------
    # Option 1: Check Balance
    # -------------------------

    if choice == "1":
        print(f"Your Current Balance: {balance}")

    elif choice == "2":
        amount = float(input("Enter amount to withdraw: "))

        if amount <= 0:
            print("Invalid amount! Must be greater than 0.")
        elif amount > balance:
            print("Error: Insufficient balance!")
        else:
            balance -= amount
            transaction.append(f"Withdrawn: {int(amount)}")
            print("Withdrawal successful!")
            print(f"Remaining balance: {balance}")  


    elif choice == "5":
        print("Thank you for using ATM. Goodbye!")
        break

    # -------------------------
    # Invalid Input
    # -------------------------
    else:
        print("Invalid choice! Please select between 1-5.")       
