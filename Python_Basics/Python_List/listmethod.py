#Add an element to the fruits list:

#append()	Adds an element at the end of the list

fruits = ["Apple", "Mango", "Orange", "Cherry"]
fruits.append("orange")

list = ["Amin", "Rahim", "Karim",]

#fruits.append(list)

print(fruits)

#clear() Removes all the elements from the list

"""Method	Description
append()	Adds an element at the end of the list
clear()	Removes all the elements from the list
copy()	Returns a copy of the list
count()	Returns the number of elements with the specified value
extend()	Add the elements of a list (or any iterable), to the end of the current list
index()	Returns the index of the first element with the specified value
insert()	Adds an element at the specified position
pop()	Removes the element at the specified position
remove()	Removes the item with the specified value
reverse()	Reverses the order of the list
sort()	Sorts the list"""

# Lists – index, slice, methods (append, insert)



name =  ["Amin", "Kemi", "Rahim", "Karim"]
print(name.index("Karim"))
print(name[3])
name.insert(4, "Khairul")
print(name)
name.append("Raihan")
print(name)
print(name[0 : 3])


#step slicing
a = [1,2,3,4,5,6,7,8,9]

print(a[::2])

#reverse print
print(a[::-1])
print(a[-4:-1])

# 2 list with sum
b = [1,3,4,5]
c = [6,7,8,9]

b.extend(c)
print(b)

# specific data remove
number = [1, 23,45,6,45,5,6]

number.pop(5)
print(number)

#list full data remove ok
student = [23, 23 , "amin islam", 34]
student.clear()
print(student)

student5 = [23, 23 , "amin islam", 34]
print(student5.index("amin islam"))
print(student5.count(34))
