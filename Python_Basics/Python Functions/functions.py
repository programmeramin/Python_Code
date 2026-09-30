# def greet():
#     print("Hello world")

# greet()

# def student(name, age):
#     print(name, age)

# student(name="AMIN ISLAM", age=22)


# def total(*numbers):
#     print(numbers)

# total(1,2,3,4,5,6,7)

# def details (**info):
#     print(info)
# details(name = "Rahim", age = 23, skill = 'MERN', hobby = "Traveling")

# def demomix(a, b, *arg, **kwarg):
#     print(a,b)
#     print(arg)
#     print(kwarg)

# print(demomix(1, 2, 3,4,4,4, x = 23, y = 34))


# def calc(a, b):
#     return a+b, a-b

# x,y = calc(10, 5)
# print(x,y)

# def alomelo(a,b, *args, **info):
#     print(a)
#     print(b)
#     print(args)
#     print(info)

# alomelo(1,3,12,3,4,5,3, name = "Amin Islam", age = 23, skill = "IOS", hobby = "Travel")



# Type of parameters
 #1 Positional parameters

def info (name, age):
    print(name, age)

info(name="Amin Islam", age=23)   


# Default Parameters

def greet(name="Amin Islma"):
    print(f"Hello, {name}")

greet()

#Keyword Arguments

def student(name, age):
    print(name, age)

student(age=23, name='AMIN ISLAM')    

def total(*numbers):
    print(numbers)

total(1,2,3,4)    