import request

api_key = "20aed50fac861622db626f00b1e1dbed"

user_input = input("Enter the city name: ")

weather_data = request.get(f"http://api.openweathermap.org/data/2.5/weather?q={user_input}&appid={api_key}").json()