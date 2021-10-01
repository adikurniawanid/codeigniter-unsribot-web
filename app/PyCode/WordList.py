from Model import querySQL
from numpy import hstack


class wordList:
    _daftarTabel = hstack(querySQL(
        "SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE TABLE_TYPE LIKE 'VIEW' AND TABLE_SCHEMA LIKE 'simak_simulasi'"))
    _daftarKolom = hstack(querySQL("SELECT col.column_name FROM information_schema.columns col JOIN information_schema.views vie ON vie.table_schema=col.table_schema AND vie.table_name=col.table_name where col.table_schema not in ('sys', 'information_schema','mysql', 'performance_schema') AND vie.table_schema='simak_simulasi'"))
    _daftarPerintah = ["tampil", "apa", "berapa",
                       "siapa", "cari", "lihat", "temu"]
    _daftarKondisi = ["yang", "dimana"]
    _daftarStopword = ["coba", "tolong"]
    _daftarSimbol = "[@_!#$%^&*()<>?/\|}{~:]"
    _daftarRelasi = querySQL(
        "SELECT `TABLE_NAME`, `COLUMN_NAME`, `REFERENCED_TABLE_SCHEMA`,`REFERENCED_TABLE_NAME`,`REFERENCED_COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE` WHERE`TABLE_SCHEMA`=SCHEMA() AND `REFERENCED_TABLE_NAME` IS NOT NULL")


def getDaftarPerintah():
    return wordList._daftarPerintah


def getDaftarTable():
    return wordList._daftarTabel


def getDaftarKolom():
    return wordList._daftarKolom


def getDaftarKondisi():
    return wordList._daftarKondisi


def getDaftarStopWord():
    return wordList._daftarStopword


def getDaftarSimbol():
    return wordList._daftarSimbol


def getDaftarRelasi():
    return wordList._daftarRelasi


def getDaftarKolomByView(namaView):
    return hstack(querySQL(f"SELECT col.column_name FROM information_schema.columns col JOIN information_schema.views vie ON vie.table_schema=col.table_schema AND vie.table_name=col.table_name where col.table_schema not in ('sys', 'information_schema','mysql', 'performance_schema') AND vie.table_schema='simak_simulasi' AND vie.TABLE_NAME = '{namaView}'"))
