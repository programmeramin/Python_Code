print("WelCome to Inventory System")

inventory = {}
categories = set()

while True:
    print(f"1. Product Add")
    print(f"2. Product View")
    print(f"3. Product Delete")
    print(f"4. Category View")
    print(f"5. Exit")

    choice = input("Enter your choice: ")

#------ add product ------
    if choice == "1":
      name = input("Enter product name: ")
      price = float(input("Enter product price: "))
      qty = int(input("enter product quantity: "))
      category = input('Enter product category: ')
    
      inventory[name] = {"price" : price, "quantity" : qty, "category" : category}
      categories.add(category)
      print("Product add successfully")
    
    elif choice == "2":
    
        if not inventory:
           print("No Products in inventory")
           
        else : 
           for name, info in inventory.items():
              print("-----Product view-------")
              print(f"\nName: {name}")
              print(f"Price: {info["price"]}")   
              print(f"Quantity: {info["quantity"]}")   
              print(f"Category: {info["category"]}")   
    
    elif choice == "3":
      delete = input("Enter product name to delete: ")
      if delete in inventory:
         del inventory[delete]
         print("Product deleted successfully")
      else:
         print("Product not found")

    # view category
    elif choice == "4":
       cat = input("Enter category name to view: ")

       if cat in categories:
          print("category", cat)
       else:
          print("Category not found")   
               
    elif choice == "5":
       print("Thanks for stay our inventory system")
       break
    else:
       print("Enter you correct code")          


s = {"food", "food", "electronics"} 

print(s)