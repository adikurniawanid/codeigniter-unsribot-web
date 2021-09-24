import mysql.connector

try:
    connection = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="simak_simulasi"
    )
except mysql.connector.Error as e:
    print("Gagal Mengkoneksikan Basis Data", e)


def querySQL(sql):
    cursor = connection.cursor()
    cursor.execute(sql)
    records = cursor.fetchall()
    return records


print(querySQL("SELECT col.column_name FROM information_schema.columns col JOIN information_schema.views vie ON vie.table_schema=col.table_schema AND vie.table_name=col.table_name where col.table_schema not in ('sys', 'information_schema','mysql', 'performance_schema') AND vie.table_schema='simak_simulasi'"))
