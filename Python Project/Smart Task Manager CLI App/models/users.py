import json
import os

user_file = "data/users.json"

def save_user(users):
    with open(user_file, "w") as f:
        json.dump(users, f, indent=4)

def load_user():
    if os.path.exists(user_file):
        with open(user_file, "r") as f:
            return json.load(f)
    return []


def reg_user(name, email, password):
    users = load_user()

    #check email
    for user in users:
        if user["email"] == email:
         return {"success" : False, "message" : "Users already exists"}

    new_user = {
        "name" : name,
        "email" : email,
        "password" : password
    }

    users.append(new_user)

    save_user(users)

    return {"success": True, "message": "User registered successfully"}

def login_user(email, password):
    users = load_user()

    # 🔍 user খুঁজে বের করা
    for user in users:
        if user["email"] == email:
            
            # 🔐 password check
            if user["password"] == password:
                return {
                    "success": True,
                    "message": "Login successful",
                    "user": user
                }
            else:
                return {
                    "success": False,
                    "message": "Incorrect password"
                }

    # ❌ user না পেলে
    return {
        "success": False,
        "message": "User not found"
    }