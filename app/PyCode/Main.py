from WordList import getDaftarKolomByView
import sys
from Preprocessing import doubleToSingleTick, hapusSimbol, simbolToKarakter, stopwordFiltering, tokenizing, stemming, pre
from Processing import identifikasiKondisi, identifikasiOperatorLogika, isPerintah, identifikasiTabel, identifikasiKolom
from QueryForming import queryForming

kalimatPerintah = "Tolong Temukan nama mahasiswa dengan jurusan yang memiliki kode 09021181823168 & fakultas komputer"

# kalimatPerintah = sys.argv[1]

print(f"""
kalimatPerintah         : {kalimatPerintah}
Casefolding             : {kalimatPerintah.lower()}
Simbol to Char          : {simbolToKarakter(kalimatPerintah.lower())}
Double to Single Tick   : {doubleToSingleTick(simbolToKarakter(kalimatPerintah.lower()))}
Token                   : {tokenizing(
    doubleToSingleTick(simbolToKarakter(kalimatPerintah.lower())))}
Token Tanpa Simbol      : {hapusSimbol(tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah.lower()))))}
Stopword Filtering      : {stopwordFiltering(hapusSimbol(tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah.lower())))))}
Token Setelah Stemming  : {stemming(stopwordFiltering(hapusSimbol(tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah.lower()))))))}

Token Preprocessing     : {pre(kalimatPerintah)}
isPerintah              : {isPerintah(pre(kalimatPerintah))}
Identifikasi Kolom      : {identifikasiKolom(pre(kalimatPerintah))}
Identifikasi Tabel      : {identifikasiTabel(pre(kalimatPerintah))}
Identifikasi Kondisi    : {identifikasiKondisi(pre(kalimatPerintah))}
Identifikasi Operator   : {identifikasiOperatorLogika(pre(kalimatPerintah))}
""")


kalimatPerintah = pre(kalimatPerintah)

print(queryForming(kalimatPerintah))
