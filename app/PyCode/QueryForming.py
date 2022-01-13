from Processing import identifikasiKolom, isPerintah, identifikasiTabel, identifikasiKondisi
from WordList import getDaftarKolomByView


def queryForming(token):
    # SELECT
    isKalimatPerintah, indeksKP = isPerintah(token)
    if isKalimatPerintah == True:
        token[indeksKP] = "SELECT"
    else:
        return("tidak ada perintah SELECT")

    # Kolom dan Tabel
    daftarKolom, indeksKolom, banyakKolom = identifikasiKolom(token)
    daftarTabel, indeksTabel, banyakTabel = identifikasiTabel(token)
    indeks = 0
    for w in token:
        for x in daftarTabel:
            if w in getDaftarKolomByView(x):
                token[indeks] = f"{x}.{w}"
                break
        indeks += 1

    # Operator Logika AND OR
    indeks = 0
    for w in token:
        for x in daftarTabel:
            if w == "atau":
                token[indeks] = "OR"
                break
            elif w == "dan":
                token[indeks] = "AND"
        indeks += 1

    # FROM
    if banyakTabel > 0:
        token.insert(indeksTabel[0], "FROM")

    # WHERE
    daftarKondisi, indeksKondisi, banyakKondisi = identifikasiKondisi(
        token)
    if banyakKondisi > 0:
        token[indeksKondisi[0]] = "WHERE"

    # jika kolom tidak ada
    if banyakKolom == 0 and banyakTabel > 0:
        token.insert(1, "*")

    hasilQuery = ""
    for w in token:
        hasilQuery += w
        hasilQuery += " "

    return(hasilQuery)
