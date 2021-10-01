from WordList import getDaftarTable, getDaftarPerintah, getDaftarKolom, getDaftarKondisi


def isPerintah(token):
    kalimatPerintah = getDaftarPerintah()
    indeks = 0
    for w in token:
        if w in kalimatPerintah:
            result = w
            indeks = indeks
            break
        else:
            result = False
        indeks += 1
    return result, indeks


def indetifikasiTabel(token):
    daftarTabel = getDaftarTable()

    teridentifikasi = []
    indeksTeridentifikasi = []

    indeks = 0
    for w in token:
        if w in daftarTabel:
            teridentifikasi.append(w)
            indeksTeridentifikasi.append(indeks)
            indeks += 1
        else:
            indeks += 1

    return teridentifikasi, indeksTeridentifikasi


def indetifikasiKolom(token):
    daftarKolom = getDaftarKolom()

    teridentifikasi = []
    indeksTeridentifikasi = []

    indeks = 0
    for w in token:
        if w in daftarKolom:
            teridentifikasi.append(w)
            indeksTeridentifikasi.append(indeks)
            indeks += 1
        else:
            indeks += 1
    return teridentifikasi, indeksTeridentifikasi


def indetifikasiKondisi(token):
    daftarKondisi = getDaftarKondisi()

    teridentifikasi = []
    indeksTeridentifikasi = []

    indeks = 0
    for w in token:
        if w in daftarKondisi:
            teridentifikasi.append(w)
            indeksTeridentifikasi.append(indeks)
            indeks += 1
        else:
            indeks += 1
    return teridentifikasi, indeksTeridentifikasi


def indetifikasiOperatorLogika(token):
    teridentifikasi = []
    indeksTeridentifikasi = []

    indeks = 0
    for w in token:
        if w == "atau":
            teridentifikasi.append(w)
            # teridentifikasi.append("or")
            indeksTeridentifikasi.append(indeks)
            indeks += 1
        elif w == "dan":
            teridentifikasi.append(w)
            # teridentifikasi.append("and")
            indeksTeridentifikasi.append(indeks)
            indeks += 1
        else:
            indeks += 1
    return teridentifikasi, indeksTeridentifikasi
