import json
import os

print("Welcome to our smart contact manager")


def save_contacts(contacts):
    with open("contacts.json", "w") as f:
        json.dump(contacts, f, indent=4)
        
def load_contacts():
    if os.path.exists("contacts.json"):
        with open("contacts.json", "r") as f:
            return json.load(f)
    return []

contacts = load_contacts()

def show_contacts():
    if not contacts:
        print("No contacts found")
        return

    for i, c in enumerate(contacts, 1):
        print(f"{i}. { c['name']} - {c['phone']} - { c[ 'email']}")
    
def add_contact():
    name = input("Name: ")                             
    phone = input("Phone: ")                             
    email = input("Email: ") 

    for c in contacts:
        if c["phone"]  == phone:
            print("Phone already exists!")
            return        

    contact = {
        "name" : name,
        "phone" : phone,
        "email" : email
    }                  

    contacts.append(contact)
    save_contacts(contacts)
    print("Contact added successfully")

def search_contact():
    query = input("Search by name or phone: ").lower()

    found = False

    for c in contacts:
        if query in c["name"].lower() or query in c["phone"]:
            print(f"{c['name']} - {c['phone']} - {c['email']}")
            found = True

    if not found:
        print("No contact found")   

def update_contact():
    phone = input("Enter phone number to update: ")

    for c in contacts:
        if c["phone"] == phone:
            print("Contact found. Leave blank if you don't want to change.")

            new_name = input(f"New name ({c['name']}): ")
            new_phone = input(f"New phone ({c['phone']}): ")
            new_email = input(f"New email ({c['email']}): ")

            if new_name:
                c["name"] = new_name
            if new_phone:
                c["phone"] = new_phone
            if new_email:
                c["email"] = new_email

            save_contacts(contacts)
            print("Contact updated successfully")
            return

    print("Contact not found")


def delete_contact():
    phone = input("Enter phone number to delete: ")

    for c in contacts:
        if c["phone"] == phone:
            contacts.remove(c)
            save_contacts(contacts)
            print("Contact deleted successfully")
            return

    print("Contact not found")



while True:
    print("\n1. Add Contact")
    print("2. Show Contacts")
    print("3. Search")
    print("4. Update")
    print("5. Delete")
    print("6. Exit")

    choice = input("Enter your choice: ")

    if choice == "1":
        add_contact()

    elif choice == "2":
        show_contacts()

    elif choice == "3":
        search_contact()

    elif choice == "4":
        update_contact()

    elif choice == "5":
        delete_contact()       
        
    elif choice == "6":
        print("Thanks for stay our smart contact management")
        break       
    else:
        print("Invalid input")