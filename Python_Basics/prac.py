name = "DEV Two"
age = 32

#print("Hello " + name + ", you are " + str(age) + " years old.")

x = 10
y = 12.4
z = "23"

#print(f"x is {type(x).__name__}")
#print(f"y is {type(y).__name__}")
#print(f"z is {type(z).__name__}")


a = 11 
b = 3
 
#print("sum:", a + b)
#print("difference:", a- b)
#print("product:", a * b)
#print("division:", a / b)
print("floor division:", a // b)


devs = {"name": "Amin Islam", "age": 28, "skill": "Python"}

#print("Name:", devs["name"], "Age:", devs["age"], "skill:", devs["skill"])


a = 100
b = 99.9
c = "Python"
d = True

#print(f"a -> {type(a).__name__}")
#print(f"b -> {type(b).__name__}")
#print(f"c -> {type(c).__name__}")
#print(f"d -> {type(d).__name__}")


#print("Hello world " + name + " You are " + str(age) + " Years old")

d = True

print(f"d is {type(d).__name__}")


DUBUG = True

if DUBUG: 
    print(f"Debugging is enabled for {type(a).__name__}")


    def add(a,b):
        return a + b
    print("sum is:", add(12222223, 4333333))


    g = 35

    if g >= 18:
        print("You are eligible to vote")
    else:
        print("You are not eligible to vote")


        age = 18 

        if age >=18:
            print("You are eligible to vote")

        elif age < 18:
            print("You are not eligible to vote")
        elif age < 60:
            print("You are a senior citizen")
        elif age < 18:
            print("You are a kids")
        else: 
            print("Your are a super senior citizen")