from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from re import sub


def simbolToKarakter(simbol):
    return simbol.replace("&", "dan").replace("/", "atau")


def doubleToSingleTick(kata):
    return kata.replace("\"", "'")


def tokenizing(kalimat):
    kalimat = doubleToSingleTick(simbolToKarakter(kalimat))
    return kalimat.split()


def hapusSimbol(token):
    specialCharacter = "[@_!#$%^&*()<>?/\|}{~:]"
    return [w for w in token if w not in specialCharacter]


def stemming(token):
    factory = StemmerFactory()
    stemmer = factory.create_stemmer()

    tokenStem = []
    for w in token:
        if(w.find("'") != False):
            if(stemmer.stem(w) != ""):
                tokenStem.append(stemmer.stem(w))
        else:
            tokenStem.append(w)
    return tokenStem


def pre(kalimatPerintah):
    result = stemming(hapusSimbol(tokenizing(
        doubleToSingleTick(simbolToKarakter(kalimatPerintah)))))

    return result
