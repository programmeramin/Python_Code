import math

print(math.pi)

print(math.pow(2, 3))


# root of 16
print(math.sqrt(16))

print(math.ceil(2.4))
print(math.floor(2.4))

# decimal number removed from 7.5
print(math.trunc(7.5))


# Negative number coverted to positive
a = -34
b = math.fabs(a)
print(b)


# factorial of 5
print(math.factorial(5))


# logarithm of 1000 to base 10
print(math.log10(1000))


import random

random_number = random.randint(1, 100)
print(random_number)

random_float = random.uniform(1.0, 10.0)
print(random_float)

random.randrange(1, 10, 2)  # Random odd number between 1 and 10
print(random.randrange(1, 10, 2))


name = ["Alice", "Bob", "Charlie", "David"]
random_name = random.choice(name)
print(random_name)
