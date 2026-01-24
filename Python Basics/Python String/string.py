"""Multiline Strings
You can assign a multiline string to a variable by using three quotes:"""

a = """lorem ipsum dolor sit amet,\nconsectetur adipiscing elit,\nsed do eiusmod 
tempor incididunt\nut labore et dolore magna aliqua."
consectetur adipiscing elit,
sed do eiusmod tempor incididunt
ut labore et dolore magna aliqua."""

#print(a)

x = "Hello world"
#print(x[1])

for x in "Banana":
   # print(x)


    # slicing strings
    b = "hello world"
    #print(b[2:5])



z = "Hello, world"
#print(z[2:7])



"""Negative Indexing
Use negative indexes to start the slice from the end of the string:
Example"""
y = "Hello, World!"
#print(y[-5:-2])


c = "Hello world"
#print(c[2:5])


#Python - Modify Strings

#Python has a set of built-in methods that you can use on strings.

"""Upper Case

The upper() method returns the string in upper case:"""

d  = "Hello Amin"
#print(d.upper())

"""Lower Case"""#
e = "Hello John"
#print(e.lower())

#Replace String
f = "Hello World"
print(f.replace("H", "G"))


#Remove Whitespace
#The strip() method removes any whitespace from the beginning or the end:

g = " Hello World "
print(g.strip())
print(g)

h = " Hey Whats up Guys "
print(h.lstrip())
print(h.rstrip())