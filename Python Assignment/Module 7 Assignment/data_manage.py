print("Welcome to Smart Contact & Inventory Manager")

contacts = {}

count = int(input("Enter number how many contacts the user wants to add: "))

for i in range(count):
    name = input("Enter your name: ")
    phone_number = input("Enter your phone number: ")
    contacts[name] = phone_number

# Display contacts
print("\n📒 Contact List:")
for name, value in contacts.items():
    print(name, "-", value)

# 👉 Update Contact
update_name = input("\nEnter name to update: ")

if update_name in contacts:
    new_phone = input("Enter new phone number: ")
    contacts[update_name] = new_phone
    print("✅ Contact updated successfully!")
else:
    print("❌ Contact not found!")

# 👉 Delete Contact
delete_name = input("\nEnter name to delete: ")

if delete_name in contacts:
    del contacts[delete_name]
    print("🗑️ Contact deleted successfully!")
else:
    print("❌ Contact not found!")



#📌 Step 6: Inventory Categories (Set)
categories = set()

n = int(input("How many categories you want to add: "))

for i in range(n):
    category = input("Enter category name: ").lower()
    if  category in categories:
        print("Doesn't allow duplicate category")
    else:
        categories.add(category)
print("Categories:", categories)

# ✔ Union
default_categories = {"electronics", "furniture", "food"}

union_result = categories.union(default_categories)

# ✔ Difference
difference_result = categories.difference(default_categories )

print("\nDefault Categories: ", default_categories)
print("Union Result", union_result)
print("Difference Result", difference_result)

#📌 Step 8: Nested Dictionary (Advanced)
inventory = {
    "Laptop": {"price": 50000, "stock": 10},
    "Phone": {"price": 30000, "stock": 20}
}

for product, details in inventory.items():
    print(product)
    print("Price:", details["price"])
    print("Stock:", details["stock"])

#contact isn't defined
print(contacts["Unknown"])

categories.add("food")
categories.add("food")
#Set automatically unique value রাখে

print(categories)

