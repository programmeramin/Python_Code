thisList = ["apple", "banana", "cherry", "apple", "cherry"]
print(thisList[2:5])

"""The list() Constructor
It is also possible to use the list() constructor when creating a new list."""

thislist = list(("apple", "banana", "cherry")) # note the double round-brackets
print(thislist)


thislist = ["apple", "banana", "cherry"]
print(thislist[-1])


thislist = ["apple", "banana", "cherry", "orange", "kiwi", "melon", "mango"]
print(thislist[2:5])

thislist = ["apple", "banana", "cherry", "orange", "kiwi", "melon", "mango"]
print(thislist[-4:-1])


if "apple" in thisList:
    print("Yes, apple is in the list fruits")



#Change Item Value
#To change the value of a specific item, refer to the index number:
thislist = ["apple", "banana", "cherry"]
thislist[1] = "blackcurrant"
print(thislist)


"""Change a Range of Item Values
To change the value of items within a specific range, define a list with the new values, and refer to the range of index numbers where you want to insert the new values:"""


thislist = ["apple", "banana", "cherry", "orange", "kiwi", "mango"]
thislist[1:3] = ["blackcurrant", "watermelon"]
print(thislist)


#If you insert more items than you replace, the new items will be inserted where you specified, and the remaining items will move accordingly:

thislist = ["apple", "banana", "cherry"]
thislist[1:3] = ["watermelon"]
print(thislist)



"""
Insert Items
To insert a new list item, without replacing any of the existing values, we can use the insert() method.
The insert() method inserts an item at the specified index
"""

thislist = ["apple", "banana", "cherry"]
thislist.insert(2, "watermelon")
print(thislist)


# Append Items
# To add an item to the end of the list, use the append() method:

thislist = ["apple", "banana", "cherry"]
thislist.append("orange")
print(thislist)


thisarray = ["apple", "banana", "cherry", "orange", "kiwi", "mango", "watermelon"]
thisarray[1:3] = ["blackcurrent", "watermelon"]
print(thisarray)

#Insert Items To insert a new list item, without replacing any of the existing values, we can use the insert() method.


thislist = ["apple", "banana", "cherry"]
thislist.insert(2, "watermelon")
thisarray.insert(0, "komola")
print(thislist) 
print(thisarray)