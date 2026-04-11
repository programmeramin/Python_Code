student = {"name" : "AMIN ISLAM" , "marks" : 43}

for k, v in student.items():
    if k == "marks":
        print("marks found", v)


student = {
    "s1" : {"name" : "AMIN ISLAM", "marks" : 45},
    "s2" : {"name" : "JAHID ISLAM", "marks" : 85}
}


for k, v in student.items():
    print("Student", ":", k)
    for k , v in v.items():
        print(k, ":", v)


data = {"amin", "jamin", "kamin", "karim"}

name = input("enter your name: ")
if name in data:
    print("Found name")
else:
    print("Not Found")    

