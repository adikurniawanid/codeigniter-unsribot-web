import sys
from Preprocessing import doubleToSingleTick, hapusSimbol, simbolToKarakter, tokenizing, stemming, pre
from Processing import isPerintah, indetifikasiTabel, indetifikasiKolom

# kalimatPerintah = "TOlong  Nama Dosen / mahasiswa Yang memiliki NIP 0902101231 "
kalimatPerintah = sys.argv[1]

# test = pre(kalimatPerintah)

print(f"""
kalimatPerintah         : {kalimatPerintah}
Simbol to Char          : {simbolToKarakter(kalimatPerintah)}
Double to Single Tick   : {doubleToSingleTick(simbolToKarakter(kalimatPerintah))}
Token                   : {tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah)))}
Token Tanpa Simbol      : {hapusSimbol(tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah))))}
Token Setelah Stemming  : {stemming(hapusSimbol(tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah)))))}

Token Preprocessing     : {pre(kalimatPerintah)}
isPerintah              : {isPerintah(pre(kalimatPerintah))}
Identifikasi Tabel      : {indetifikasiTabel(pre(kalimatPerintah))}
Identifikasi Kolom      : {indetifikasiKolom(pre(kalimatPerintah))}
""")
