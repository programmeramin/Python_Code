import datetime


date = datetime.datetime.now()
print(date)

today = datetime.date.today()
print(today)


# custome date
custom_date = datetime.time(12, 1, 1)
print(custom_date)


# birthday
birthday = datetime.datetime(1990, 5, 15)
today = datetime.date.today()
age = today.year - birthday.year
print(age)

now = datetime.datetime.now()
print(now.strftime("%d-%m-%y %H:%M:%S"))