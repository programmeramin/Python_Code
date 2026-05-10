name = "  amin islam  k     "

# print(len(name))
# print(name.upper())
# print(name.strip())
#print(name.rstrip())
#print(name.lstrip())

s = 'PYTHON is powerful'

# find = s.find("power")
find = "power" in s
# print(find)

digit = "1234"
#print(digit.isdigit())

alpha = "asdksjad"
#print(alpha.isalpha())

isaln = "asdas1234"
#print(isaln.isalnum())

email = "aminislam@gmail.com"

user = email.split("@")[0]
domain = email.split("@")[1]

#print(user)
#print(domain)

phone = "01712345678"

mask = "*"*7 + phone[-4:]
print(mask)

text = "This is a sample text for testing."

replace_text = text.replace("sample", "example")
print(replace_text)


# remove duplicate
s = "bananaaa"

unique = "".join(dict.fromkeys(s))
print(unique)