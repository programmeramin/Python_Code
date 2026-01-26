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



endw = "Hello, wellcome to my world."

x = endw.endswith(".")
#print(x)


"""Python String expandtabs() Method \t মানে কী?

\t হলো tab character (horizontal tab)
Terminal-এ এটা সাধারণত বড় ফাঁকা জায়গা নেয়।"""

txt = "H\te\tl\tl\to"
x = txt.expandtabs(2)

#print(x)


#print("A\tB\tC".expandtabs(4))

#Python String find() Method
txt = "Hello, wellcome to my world."

x = txt.find("wellcome")

#print(x)


#Where in the text is the first occurrence of the letter "e" when you only search between position 5 and 10?:

txt = "Hello, wellcome to my world."

x = txt.find("e", 5, 10)

#print(x)

#✅ Python String find() Method

txt1 = "Hello, welcome to my world."
#print(txt1.find("q"))
#print(txt1.index("q"))

#✅ Python String format() Method Insert the price inside the placeholder, the price should be in fixed point, two-decimal format:

txt = "For only {price: .2f} dollars!"
#print(txt.format(price = 49))


txt1 = "My name is {fname}, I'm {age}".format(fname = "John", age = 36)
txt2 = "My name is {0}, I'm {1}".format("John",36)
txt3 = "My name is {}, I'm {}".format("John",36)


# ✅Python String index() Method

txt = "Hello, welcome to my world"
x = txt.index("Hello, welcome to my world")
#print(x)


txt4 = "Hello, welcome to my world."
#print(txt4.find("q"))
#print(txt4.index("q"))


txt = "Hello, welcome to my world."

x = txt.index("e", 5, 10)

print(x)


# ✅ Python String isalnum() Method Check if all the characters in the text are alphanumeric:

"""ExampleGet your own Python Server
Check if all the characters in the text are alphanumeric:"""

txt = "Company12"

x = txt.isalnum()

print(x)

txt = "Company 12"

x = txt.isalnum()

print(x)


#✅ Python String isascii() Method

"""🧠 ASCII কী? (simple)

ASCII = basic English characters:

a–z

A–Z

0–9

space

punctuation (!@#$%) যদি সব ASCII → True

একটাও non-ASCII থাকলে → False"""

