def greet():
    print("Hello world")

greet()

def student(name, age):
    print(name, age)

student(name="AMIN ISLAM", age=22)


def total(*numbers):
    print(numbers)

total(1,2,3,4,5,6,7)

def details (**info):
    print(info)
details(name = "Rahim", age = 23)


def demomix(a, b, *arg, **kwarg):
    print(a,b)
    print(arg)
    print(kwarg)

demomix(1, 2, 3,4,4,4, x = 23, y = 34)


def calc(a, b):
    return a+b, a-b

x,y = calc(10, 5)
print(x,y)