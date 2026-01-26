""" Python divides the operators in the following groups:
✅Arithmetic operators
✅Assignment operators
Comparison operators
Logical operators
Identity operators
Membership operators
Bitwise operators """

#✅Arithmetic operators
a = 100
b = 4

print(a + b)
print(a - b)
print(a * b)
print(a / b)
print(a % b)
print(a ** b)
print(a // b)


result = ( a * b) / a
result = a - ( a * b) / a
print(result)

#✅Assignment operators
#Operator        #Example           #Same As
""" =	             x = 5	            x = 5	
    +=	             x += 3	            x = x + 3	
    -=	             x -= 3	            x = x - 3	
    *=	             x *= 3	            x = x * 3	
    /=	             x /= 3	            x = x / 3	
    %=	             x %= 3	            x = x % 3	
    //=	             x //= 3	        x = x // 3	
    **=	             x **= 3	        x = x ** 3	
    &=	             x &= 3	            x = x & 3	
    |=	             x |= 3	            x = x | 3	
    ^=	             x ^= 3	            x = x ^ 3	
    >>=	             x >>= 3	        x = x >> 3	
    <<=	             x <<= 3	        x = x << 3	
    :=	             print(x := 3)	    x = 3      """


number = [1,2,3,4,5,6,7,7]
count = len(number)

#The Walrus Operator
if count > 9:
    print(f"List has {count} elements")
if(count := len(number)) > 3:
    print(f"List has {count} elements")
    
    

#✅Identity operators

x = ["Apple", "Banana"]
y = ["Apple", "Banana"]
z = x
#print(x is z)
#print(x is y)
#print(x == y)


x = [1, 2, 3]
y = [1, 2, 3]

#print(x == y)
#print(x is y)


"""Difference Between is and ==
is - Checks if both variables point to the same object in memory
== - Checks if the values of both variables are equal"""


#✅ #✅Assignment operators
"""
Operator	Description	Example
in 	Returns True if a sequence with the specified value is present in the object	x in y

not in	Returns True if a sequence with the specified value is not present in the object	x not in y"""

fruits = ["apple", "banana", "cherry"]

print("banana" in fruits)

fruits = ["apple", "banana", "cherry"]

print("pineapple" not in fruits)


"""
Operator	Name	Description	Example
& 	AND	Sets each bit to 1 if both bits are 1	x & y	
|	OR	Sets each bit to 1 if one of two bits is 1	x | y	
^	XOR	Sets each bit to 1 if only one of two bits is 1	x ^ y	
~	NOT	Inverts all the bits	~x	
<<	Zero fill left shift	Shift left by pushing zeros in from the right and let the leftmost bits fall off	x << 2	
>>	Signed right shift	Shift right by pushing copies of the leftmost bit in from the left, and let the rightmost bits fall off	x >> 2

"""