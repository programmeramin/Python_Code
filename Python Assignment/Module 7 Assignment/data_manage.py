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
