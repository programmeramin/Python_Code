
student = {
    "s1" :{
        "name" : "Amin islam",
        "age" : 23,
        "class" : "10"
    },
    "s2" : {
        "name" : "Karim",
        "age" : 23,
        "class" : "10"
    },
    "s3" : {
        "name" : "Janat",
        "age" : 21,
        "class" : "10"
    }
}

print(student["s1"]["name"])
student["s2"]["age"] = 120
student["s3"]["city"] = "Dhaka"
# delete data
del student["s1"]["name"]
print(student)


#Loop (nested loop)
for student, info in student.items():
    print("Id: ", student)
    
    for key, value in info.items():
        print(key, ":", value)


