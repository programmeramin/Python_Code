# 5️⃣ Bitwise Operators

# Binary level এ কাজ করে

# &

# |

# ^

# ~

# <<

# >>

a = 5      # 0101
b = 3      # 0011

# দুইটা bit 1 হলে result 1

print(a & b) #1


# 🔹 2️⃣ | (OR)

# যেকোনো একটা 1 হলে result 1
print(a | b) #7


# 🔹 3️⃣ ^ (XOR)
# দুইটা ভিন্ন হলে 1
# একই হলে 0
print(a ^ b) # 6

# 🔹 4️⃣ ~ (NOT)

# Bit উল্টে দেয় (0 → 1, 1 → 0)
print(~a) #-6




# 🔹 5️⃣ << (Left Shift)

# বাম দিকে bit shift করে (মানে ×2)

print(a << 1) #10


# 🔹 6️⃣ >> (Right Shift)

# ডান দিকে bit shift করে (মানে ÷2)

print(a >> 1) #2

