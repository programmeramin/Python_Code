"""String Format
As we learned in the Python Variables chapter, we cannot combine strings and numbers like this:

ExampleGet your own Python Server
age = 36
#This will produce an error:
txt = "My name is John, I am " + age
print(txt)"""


x = 25
txt = "My name is Amin islam, I am " + str(x) + " Years old"
print(txt)


age = 36
txt2 = 'My name is John, I am {age} years old'.format(age=age)
print(txt2)


price = 59
txt = f"The price is {price:.2f} dollars"
print(txt)