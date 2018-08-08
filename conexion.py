import mysql.connector

cnx = mysql.connector.connect(user='root', 
                              password='',
                              host='127.0.0.1',
                              database='controlsi')
cursor = cnx.cursor()

query = ("SELECT nombre, apellido, email FROM contacto")
cursor.execute(query)

for (nombre, apellido, email) in cursor:
    print("{} {} \t y su email es {}".format(nombre, apellido, email))

cursor.close()
cnx.close()