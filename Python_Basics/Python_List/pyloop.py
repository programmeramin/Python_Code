"""Loop Through a List
You can loop through the list items by using a for loop:"""

"""Concept	       Python	JavaScript
Array element	thislist[i]	thislist[i]
String char	        x[1]	 x[1]
❌ ভুল	—	  thislist[i,1]    """

thislist = ["apple", "banana", "cherry"]
for x in thislist:
  print(x[1])
  print(x)

thislist = ["apple", "banana", "cherry"]
i = 0
while i < len(thislist):
  print(thislist[i])
  i = i + 1

"""Using a While Loop
You can loop through the list items by using a while loop.

Use the len() function to determine the length of the list, then start at 0 and loop your way through the list items by referring to their indexes."""

thislist = ["apple", "banana", "cherry"]

i = 0

while i < len(thislist):
  print(thislist[i])
  i = i +1

  thislist = ['apple', "banana", "cherry"]

  i = 0 
  while i < len(thislist):
    print(thislist[i])
    i = i + 1