import mysql.connector

try:
    connection = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="simak_simulasi"
        # database="simakv2"
    )
except mysql.connector.Error as e:
    print("Gagal Mengkoneksikan Basis Data", e)


def querySQL(sql):
    cursor = connection.cursor()
    cursor.execute(sql)
    records = cursor.fetchall()
    return records
