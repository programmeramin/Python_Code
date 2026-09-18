a = -233
b = abs(a)
print(b)

c = 3.1416
d = round(c, 3)
print(d)

f = [4, 5, 6, 77, 8, 9]

print(max(f))
print(min(f))


print(divmod(11, 5))   # quotient and remainder vagsesh vagfol

#id id is being work where is locate variable

x = 10
print(id(x))

#eval
print(eval("23+34"))


text = "Hello World"
print(text.isalpha())  

# check all character is alphabet or not
print(text.isalnum())  # check all character is alphabet or number or not
print(text.isdigit())  # check all character is digit or not
print(text[slice(0,4)])


val = 1

for i in range(1, 5):
    print(i)
    val += 1
    print(val)