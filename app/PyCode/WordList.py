from Model import querySQL
from numpy import hstack


class wordList:
    __databaseName = "simak_simulasi"
    # __databaseName = "simakv2"

    # dari tabel
    # _daftarTabel = hstack(querySQL(
    #     f"SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE  TABLE_SCHEMA LIKE '{__databaseName}'"))
    # _daftarKolom = hstack(querySQL(
    #     f"SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='{__databaseName}'"))

    # dari view
    _daftarTabel = hstack(querySQL(
        f"SELECT TABLE_NAME FROM information_schema.`TABLES` WHERE TABLE_TYPE LIKE 'VIEW' AND TABLE_SCHEMA LIKE '{__databaseName}'"))
    _daftarKolom = hstack(querySQL(
        f"SELECT col.column_name FROM information_schema.columns col JOIN information_schema.views vie ON vie.table_schema=col.table_schema AND vie.table_name=col.table_name where col.table_schema not in ('sys', 'information_schema','mysql', 'performance_schema') AND vie.table_schema='{__databaseName}'"))
    _daftarRelasi = querySQL(
        "SELECT `TABLE_NAME`, `COLUMN_NAME`, `REFERENCED_TABLE_SCHEMA`,`REFERENCED_TABLE_NAME`,`REFERENCED_COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE` WHERE`TABLE_SCHEMA`=SCHEMA() AND `REFERENCED_TABLE_NAME` IS NOT NULL")
    _daftarPerintah = ["tampil", "apa", "berapa",
                       "siapa", "cari", "lihat", "temu"]
    _daftarKondisi = ["yang", "dimana", "dengan"]
    _daftarStopword = ["coba", "tolong", "milik", "data"]
    _daftarSimbol = "[@_!#$%^&*()<>?/\|}{~:]"
    _daftarPenangananNamaTabel = {"mata kuliah": "mata_kuliah",
                                  "matakuliah": "mata_kuliah"}


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


def getDaftarPenangananNamaTabel():
    return wordList._daftarPenangananNamaTabel


def getDaftarKolomByView(namaView):
    return hstack(querySQL(f"SELECT col.column_name FROM information_schema.columns col JOIN information_schema.views vie ON vie.table_schema=col.table_schema AND vie.table_name=col.table_name where col.table_schema not in ('sys', 'information_schema','mysql', 'performance_schema') AND vie.table_schema='simak_simulasi' AND vie.TABLE_NAME = '{namaView}'"))
