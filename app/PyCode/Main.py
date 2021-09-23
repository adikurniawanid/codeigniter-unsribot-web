import sys
from Preprocessing import doubleToSingleTick, hapusSimbol, simbolToKarakter, tokenizing, stemming, pre

kalimatPerintah = sys.argv[1]

print(f"""
kalimatPerintah         : {kalimatPerintah}
Simbol to Char          : {simbolToKarakter(kalimatPerintah)}
Double to Single Tick   : {doubleToSingleTick(simbolToKarakter(kalimatPerintah))}
Token                   : {tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah)))}
Token Tanpa Simbol      : {hapusSimbol(tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah))))}
Token Setelah Stemming  : {stemming(hapusSimbol(tokenizing(doubleToSingleTick(simbolToKarakter(kalimatPerintah)))))}

Token Preprocessing     : {pre(kalimatPerintah)}
""")
