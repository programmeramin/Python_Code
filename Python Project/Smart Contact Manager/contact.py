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
            

    elif choice == "6":
        break       
