#✅ CAPITALIZE PYTHON METHOD NAMES Upper case the first letter in this sentence:



txt = "hello, and welcome to my world."

x = txt.capitalize()

#print (x)

#✅ LOWER CASE METHOD NAMES Make the string lower case:
txt = "Hello, And Welcome To My World!"

x = txt.casefold()

#print(x)


#✅ Python String center() Method Print the word "banana", taking up the space of 20 characters, with "banana" in the middle:

y = "Banana"

center = y.center(20)

#print(center)

text = "Hello, World!"

x = txt.center(20, "O")

#✅ Python String count() Method Return the number of times the value "apple" appears in the string:

txt = "I love apples, apple are my favorite fruit"

x = txt.count("apple")
#print(x)


#✅The count() method returns the number of times a specified value appears in the string.
txt = "I love apples, apple are apple my favorite fruit"

x = txt.count("apple", 10, 28)

#print(x)   
 
#✅ Python String encode() Method UTF-8 encode the string:

txt = "My name is Ståle"
x = txt.encode()
#print(x)

txt = "My name is Ståle"

#print(txt.encode(encoding="ascii",errors="backslashreplace"))
#print(txt.encode(encoding="ascii",errors="ignore"))
#print(txt.encode(encoding="ascii",errors="namereplace"))
#print(txt.encode(encoding="ascii",errors="xmlcharrefreplace"))
#print(txt.encode(encoding="ascii",errors="replace"))


endw = "Hello, Wellcome to my world."
x = endw.endswith(".")
print(x)




































































