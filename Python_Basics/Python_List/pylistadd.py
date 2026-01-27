#Python - Add List Items 
#To add an item to the end of the list, use the append() method:

thislist = ["apple", "mango", "cherry"]
thislist.append("orange")
print(thislist)


thislist.insert(1, "guava")
print(thislist)


#Extend List To append elements from another list to the current list, use the extend() method.

thislist = ["apple", "orange", "cherry"]
tropical = ["mango", "guava"]
thislist.extend(tropical)
print(thislist)


"""Add Any Iterable
The extend() method does not have to append lists, you can add any iterable object (tuples, sets, dictionaries etc.)."""

thislist = ["apple", "banana", "cherry"]
thistuple = ("kiwi", "orange")
thislist.extend(thistuple)
print(thislist)