print("Welcome to ATM System ")

balance = 10000
running = True

while running:
    withdraw_balance = float(input("enter your withdraw balance press 0 to stop: "))


    if withdraw_balance == 0:
        running = False
    elif withdraw_balance < 0:
        print("Invalid withdraw amount")
    elif withdraw_balance > balance:
        print("You didn't have sufficient balance")
        running = False   
    else:
        balance = balance - withdraw_balance


    print("------final result-------")
    print("Withdraw Amount", withdraw_balance)            
    print("Account Balance", balance)  
    running = False








