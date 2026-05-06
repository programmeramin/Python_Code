txt_file = open("txt.txt", "r")

contend = txt_file.read()
contendline = txt_file.readlines()
 
for line in txt_file:
  print(line)


file = open("example.txt", "w")

file.write("My name is amin islam, my age 100 years old")
