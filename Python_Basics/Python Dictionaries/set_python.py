# {}
# immutable => indexing kore value pawa jabe na
# immutable => noupdated
# no duplicates
# set()

# Set = unordered collection + unique values only

s = [1,2,3,4,5,6,89,546,36,87,56,9834,60]
t = [23,43,2,56,7,3,43,45,7,3,6743,34,34,23]

c = set(s).union(set(t))
d = set(s).intersection(set(t))

print(c)
