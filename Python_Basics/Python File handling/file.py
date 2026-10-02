txt_file = open("txt.txt", "r")

contend = txt_file.read()
contendline = txt_file.readlines()

 
for line in txt_file:
  print(line)


file = open("example.txt", "w")
file.write("My name is amin islam, my age 100 years old")
file.close()


csv_file = open("csv.csv", "r")

content = csv_file.read()
#print(content)

text_file = open("txt.txt", "r")

lineprint = text_file.readlines()
#print(lineprint)

# File create and write
filecreate = open("newfile.txt", "w")
filecreate.write("This is a new file created using python")
filecreate.close()

# File open and read
file_open = open("newfile.txt", "r")
file_read = file_open.read()
file_open.close()

print(file_read)


csv_file.close()
text_file.close()
filecreate.close()