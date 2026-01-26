#One-line takeaway

#In Python, objects can be empty, and empty means False.

age = 10

#print(age > 22)

#print(age < 22)

if age >= 18:
    print("You are an adult.")
else:
    print("You are a minor.")

#print(bool("Hello"))
#print(bool(15))


x = "Hello"
y = 15

#print(bool(x))
print(bool(y))
#

bool("abc")
bool(123)
bool(["apple", "cherry", "banana"])

"""Some Values are False
In fact, there are not many values that evaluate to False, except empty values, such as (), [], {}, "", the number 0, and the value None. And of course the value False evaluates to False."""

bool(False)
bool(None)
bool(0)
bool("")
bool(())
bool([])
bool({})


class myclass2():
   def __len__(self):
      return 5

myobj2 = myclass2()
print(bool(myobj2))

z  = 0
if z:
    print("True")
else:
    print("False")


class myClass():
    def __len__(self):
        return 5

myJob = myClass()
print(bool(myJob))

class aminVai():
    def __len__(self):
        return 10
    
myAmin = aminVai()
print(bool(myAmin))