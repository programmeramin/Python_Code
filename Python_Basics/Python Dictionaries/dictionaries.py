student = {

}

student["name"] = "amin"
student["age"] = 34
student["isDeveloper"] = True

# get data
print(student)
print(student.get("name"))

#update
student["name"] = "Amin Islam"
print(student)


# delete
del student["isDeveloper"]
student.pop('age')
print(student)


developer = {
    "name": "Amin islam",
    "age": 32,
    "skill": "IOS Devs",
    "hobby": "Tea coffee eat"
}

# key wise loop
for key in developer:
    print(key)

print("---------------")    

# value wise loop
for value in developer:
    print(value)

print("------value----key------wise------loop------")
for key, value in developer.items():
    print(key, ":", value)