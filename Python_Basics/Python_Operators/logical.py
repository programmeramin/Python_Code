# and or not

rain = True
country = 'BD'

if rain == True and country == 'BD':
    print("You are allow this country")
else:
    print("You are not allow")    


passport = True

if passport == True or country == "BD":
    print("You are enter the room please sit down here")

is_raining = True

if not is_raining:
    print("You are not allow")   
else:
    print("You are allow")        



age = 18
citizen = False
has_license = True


if (age >= 18 and citizen) or has_license:
    print("You can apply")