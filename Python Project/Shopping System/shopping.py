import math

print("Welcome to smart shopping system")

total = 0
count = 0
running = True

while running:
    price = float(input('Enter the price of the product (press 0 to stop): '))


    if price == 0:
      running = False
    elif  price < 0:
        print("Invalid False")   
    else:
        total = total + price
        count = count + 1   


if count == 0:
    print("No item purchased")
else:
    print("\nTotal Items:", count)    
    print("\nTotal Price:", total)


if total >= 5000:
    discount = total * 0.20
elif total >= 2000:
    discount = total * 0.10
else:
    discount = 0.0

after_discount = total - discount

#-----vat total------
vat = after_discount * 0.05

final_bill = after_discount + vat


print("Total Bill", total )
print("Discount", discount)
print("Vat 5%", vat)
print("Final Bill", round(final_bill, 2))
print("Cash Payable", math.ceil(final_bill))



