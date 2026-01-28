"""Remove Specified Item
The remove() method removes the specified item."""

thislist = ["apple", "banana", "cherry"]
thislist.remove("banana")
print(thislist)

thislist = ["apple", "banana", "cherry", "banana", "kiwi"]
thislist.remove("banana")
print(thislist)

#The del keyword also removes the specified index:

"""Remove the first item"""
fruits = ["apple", "mango", "cherry", "orange"]

del fruits[0]
print(fruits)

thislist = ["apple", "banana", "cherry"]
del thislist


"""Clear the List
The clear() method empties the list.

The list still remains, but it has no content."""
thislist = ["apple", "banana", "cherry"]
thislist.clear()
print(thislist)