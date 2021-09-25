import sys
from Preprocessing import doubleToSingleTick, hapusSimbol, simbolToKarakter, tokenizing, stemming, pre
from Processing import indetifikasiKondisi, indetifikasiOperatorLogika, isPerintah, indetifikasiTabel, indetifikasiKolom

kalimatPerintah = "Tolong Temukan nama mahasiswa / dosen yang memiliki nim 09021181823168"
# kalimatPerintah = "Tolong"

# kalimatPerintah = sys.argv[1]

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
Identifikasi Kondisi    : {indetifikasiKondisi(pre(kalimatPerintah))}
Identifikasi Operator   : {indetifikasiOperatorLogika(pre(kalimatPerintah))}
""")
