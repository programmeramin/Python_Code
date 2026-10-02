import csv

# CSV file create + initial data
with open("data.csv", "w", newline="") as file:
    writer = csv.writer(file)

    writer.writerow(["Name", "Age", "City"])
    writer.writerow(["Alice", 30, "New York"])
    writer.writerow(["Bob", 25, "Los Angeles"])
    writer.writerow(["Charlie", 35, "Chicago"])


# New data append
with open("data.csv", "a", newline="") as file:
    writer = csv.writer(file)
    writer.writerow(["David", 28, "Houston"])


# Read the CSV file
with open("data.csv", "r") as file:
    data_content = file.read()

print(data_content)

print("CSV file created successfully.")


#R + Reaad + write
with open("example.txt", "r+", newline="") as file:
    # Read the existing content
    content = file.read()
    print("Existing Content:")
    print(content)

    # Move the cursor to the end of the file
    file.seek(0, 2)  # Move to the end of the file

    # Write new data
    file.write("\nThis is new data added to the file.")
    