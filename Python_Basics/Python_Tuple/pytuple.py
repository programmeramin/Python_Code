"""Tuple
Tuples are used to store multiple items in a single variable.

Tuple is one of 4 built-in data types in Python used to store collections of data, the other 3 are List, Set, and Dictionary, all with different qualities and usage."""

mytuple = ("apple", "banana", "cherry")

print(mytuple)

#create a tuple
thistuple = ("Apple", "banana", "cherry")
print(thistuple)

"""Tuple Length
To determine how many items a tuple has, use the len() function:"""


thistuple = ("apple", "banana", "cherry")
print(len(thistuple))


# One item tuple, remember the comma:

thistuple = ("apple",)
print(type(thistuple))

#NOT a tuple
thistuple = ("apple")
print(type(thistuple))


tuple1 = ("apple", "banana", "cherry")
tuple2 = (1, 5, 7, 9, 3)
tuple3 = (True, False, False)

print(tuple1)
print(tuple2)
print(tuple3)

#Using the tuple() method to make a tuple:
thistuple = tuple(("apple", "banana", "cherry")) 
# note the double round-brackets
print(thistuple)


"""There are four collection data types in the Python programming language:

List is a collection which is ordered and changeable. Allows duplicate members.
Tuple is a collection which is ordered and unchangeable. Allows duplicate members.
Set is a collection which is unordered, unchangeable*, and unindexed. No duplicate members.
Dictionary is a collection which is ordered** and changeable. No duplicate members."""

#access tuple
"""Example
This example returns the items from the beginning to, but NOT included, "kiwi":"""

thistuple = ("apple", "banana", "cherry", "orange", "kiwi", "melon", "mango")
print(thistuple[:4])


thistuple = ("apple", "banana", "cherry", "orange", "kiwi", "melon", "mango")
print(thistuple[2:])


thistuple = ("apple", "banana", "cherry", "orange", "kiwi", "melon", "mango")
print(thistuple[-4:-1])

if "apple" in thistuple:
    print("Yes, apples in the fruits tuple")