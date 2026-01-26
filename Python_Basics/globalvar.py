#Global Variables

x = "Awesome"

def myfunc():
   
    x = " Fantastic"
    #print("Python is " + x)
    

myfunc()
#print("Python is " + x)


#✔️ Python-এ modify করতে হলে global keyword ব্যবহার করতে হয়।
y = "Hello, World!"

def myfunc():
    global y
    y = "Python is great!"

myfunc()
print("Inside function: " + y)


#Python Data Types

x = "HELLO WORLD"    #str
y = 20               #int
z = 30.2            #float
a = 1j               #complex
b = ["Apple", "Banana", "Cherry"]  #list
c = ("Apple", "Orange", "Cherry")  #tuple
d = range(6)        #range 
x = {"name": "John", "age": 23}  #dict
y = {"apple", "banana", "cherry"}  #set
d = True              #bool
b = bytes(5)        #bytes
byte = bytearray(5)  #bytearray
memoryview = memoryview(bytes(5))  #memoryview
none = None         #NoneType

m = dict(name="john", age=23)

#display the data types
print(type(x))