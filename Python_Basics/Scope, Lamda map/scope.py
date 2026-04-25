def my_fun():
    x = 23

    print(x)

my_fun()


z = 34890

def scope_fun():
    print(z)

scope_fun()


#modify global scope

x = 89

def my_modify():
    global x 
    x = 230
    print(x)

my_modify()


# enclosing scope

def outer():
    x = 324
    def inner():
        print(x)

    inner()

outer()


# enclosing scope change
def enclosing():
    a = 34

    def innerEnclosing():
        nonlocal a
        a = 34094334

    innerEnclosing()
    print(a)   

enclosing()