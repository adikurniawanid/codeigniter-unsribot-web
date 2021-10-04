from WordList import getDaftarTable, getDaftarPerintah, getDaftarKolom, getDaftarKondisi


def isPerintah(token):
    kalimatPerintah = getDaftarPerintah()
    indeks = 0
    for w in token:
        if w in kalimatPerintah:
            # result = w
            result = True
            indeks = indeks
            break
        else:
            result = False
        indeks += 1
    return result, indeks


def identifikasiTabel(token):
    daftarTabel = getDaftarTable()

    teridentifikasi = []
    indeksTeridentifikasi = []
    banyakTabel = 0

    indeks = 0
    for w in token:
        if w in daftarTabel:
            teridentifikasi.append(w)
            indeksTeridentifikasi.append(indeks)
            banyakTabel += 1
            indeks += 1
        else:
            indeks += 1

    return teridentifikasi, indeksTeridentifikasi, banyakTabel


def identifikasiKolom(token):
    daftarKolom = getDaftarKolom()

    teridentifikasi = []
    indeksTeridentifikasi = []
    banyakKolom = 0

    indeks = 0
    for w in token:
        if w in daftarKolom:
            teridentifikasi.append(w)
            indeksTeridentifikasi.append(indeks)
            banyakKolom += 1
            indeks += 1
        else:
            indeks += 1
    return teridentifikasi, indeksTeridentifikasi, banyakKolom


def identifikasiKondisi(token):
    daftarKondisi = getDaftarKondisi()

    teridentifikasi = []
    indeksTeridentifikasi = []
    banyakKondisi = 0

    indeks = 0
    for w in token:
        if w in daftarKondisi:
            teridentifikasi.append(w)
            indeksTeridentifikasi.append(indeks)
            banyakKondisi += 1
            indeks += 1
        else:
            indeks += 1
    return teridentifikasi, indeksTeridentifikasi, banyakKondisi


def identifikasiOperatorLogika(token):
    teridentifikasi = []
    indeksTeridentifikasi = []
    banyakOperatorLogika = 0

    indeks = 0
    for w in token:
        if w == "atau":
            teridentifikasi.append(w)
            # teridentifikasi.append("or")
            indeksTeridentifikasi.append(indeks)
            indeks += 1
            banyakOperatorLogika += 1
        elif w == "dan":
            teridentifikasi.append(w)
            # teridentifikasi.append("and")
            indeksTeridentifikasi.append(indeks)
            indeks += 1
            banyakOperatorLogika += 1
        else:
            indeks += 1
    return teridentifikasi, indeksTeridentifikasi, banyakOperatorLogika
