from WordList import getDaftarKolomByView
import sys
from Preprocessing import doubleToSingleTick, hapusSimbol, simbolToKarakter, stopwordFiltering, tokenizing, stemming, pre
from Processing import identifikasiKondisi, identifikasiOperatorLogika, isPerintah, identifikasiTabel, identifikasiKolom

kalimatPerintah = "Tolong Temukan nama mahasiswa yang memiliki NIM 09021181823168 & fakultas komputer"
# kalimatPerintah = "Tolong"

# kalimatPerintah = sys.argv[1]

# test = pre(kalimatPerintah)

print(f"""
kalimatPerintah         : {kalimatPerintah}
Casefolding             : {kalimatPerintah.lower()}
Simbol to Char          : {simbolToKarakter(kalimatPerintah.lower())}
Double to Single Tick   : {doubleToSingleTick(simbolToKarakter(kalimatPerintah.lower()))}
Token                   : {tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah.lower())))}
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

# test = []

# kalimatPerintahSelect = isPerintah(pre(kalimatPerintah))
# tabel = identifikasiTabel(pre(kalimatPerintah))
# kolom = identifikasiKolom(pre(kalimatPerintah))
# kondisi = identifikasiKondisi(pre(kalimatPerintah))
# operatorLogika = identifikasiOperatorLogika(pre(kalimatPerintah))

# test.append(kalimatPerintahSelect)
# test.append(kolom)
# test.append(tabel)
# test.append(kondisi)
# test.append(operatorLogika)

# print(test)


# BEGIN SELECT
kalimatPerintah = pre(kalimatPerintah)
KP, indeksKP = isPerintah(kalimatPerintah)

if KP == True:
    kalimatPerintah[indeksKP] = "SELECT"
# END SELECT
print(kalimatPerintah)

daftarTabel, indeksTabel, banyakTabel = identifikasiTabel(kalimatPerintah)

indeks = 0
for w in kalimatPerintah:
    for x in daftarTabel:
        if w in getDaftarKolomByView(x):
            kalimatPerintah[indeks] = f"{x}.{w}"
            break
    indeks += 1
print(kalimatPerintah)

indeks = 0
for w in kalimatPerintah:
    for x in daftarTabel:
        if w == "atau":
            kalimatPerintah[indeks] = "OR"
            break
        elif w == "dan":
            kalimatPerintah[indeks] = "AND"
    indeks += 1
print(kalimatPerintah)
