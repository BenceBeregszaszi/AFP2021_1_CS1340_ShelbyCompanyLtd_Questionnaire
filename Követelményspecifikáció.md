# Követelményspecifikáció

## Készítette: 
            - Banyik Nándor

            - Kecse Károly Dániel
            
            - Nagy Péter Axel
           
            - Sárosi Gábor
## Jelenlegi helyzet
Ügyfelünk papír alapon osztogatta kérdőíveit az ügyfeleinek. A választ adott ügyfelek száma a kiküldött kérdőívek felét se éri el. Ebből visszavezetve kiderült, hogy csak az idősebb ügyfelek küldték vissza postán a kérdőívet. Így rengeteg papír megy kárba, és hiányos, illetve a fiatalabb generációktól nem is kapnak visszajelzéseket.
## Vágyálom rendszer
Mivel a világunkban minden gyorsul, egyre kevesebb van ideje bármire is az embereknek, kérdőíveket még annál ritkábban töltenek ki. Ennek következtében ügyfelünk szeretne elektromos kérdőívekre váltani, hogy a fiatalabb generációkból is többen töltsék ki. Ezzel ugyan veszíthet az idősebbek visszajelzéseiktől, de pénzt spórol meg, sőt óvja a környezetet a felesleges papír pocsékolással.
## Jelenlegi üzleti folyamatok

 1. Az alapanyagok beszerzése:
  - Papír beszerzése
  - Tintapatronok megvásárlása
 2. A kérdőív elkészítése:
  - Kérdőív megtervezése
  - Nyomtatás
 3. A kérdőívek postázása:
  - Visszaküldési boríték felcímzése
  - Postára feladás
 4. A visszaérkező válaszok elemzése:
  - A beérkezett levelek ellenőrzése
  - Konklúzió levonása az eredményekből


## Igényelt üzleti folyamatok
 1. Új kérdőív készítése
  - b. Importálás fájlból
  - a. Kérdőív készítése a weboldalon
 2. Kérdőív kitöltése:
  - Az oldal megnyitásakor a megrendelő által kiválasztott alapértelmezett kérdőív tölthető ki (bejelentkezés nélkül)
  - A kitöltés megkezdése előtt egy általános kérdéssor kerül a felhasználó elé, amelyre kizárólag a statisztika miatt van szükség:
    - Életkora
    - Neme
  - A kérdőív végeztével lehetősége lesz a felhasználónak fiókot létrehozni, amivel szükségtelen lesz minden alkalommal kitöltenie az általános kérdéseket
    - Regisztrációkor szükséges a születési dátum         
 3. Eredmények összegzése:
  - Az általános kérdések eredményei alapján felvázolható a részletes felbontása a kapott válaszok összegzésének



## A rendszerre vonatkozó szabályok

## Követelménylista

## Fogalomtár 
Design - Stílus, forma, kinézet

Importálható - Beolvasható

Intuitív - Magától értetődő

Autentikáció - Hitelesítés. (A projekt esetében: Ne kelljen külön felhasználói fiókot arra létrehozni, hogy kitöltsünk egy kérdőívet.)

Laravel - Egy ingyenes, nyílt forráskódú PHP web framework, melynek célja, hogy MVC modellre illeszkedően leegyszerűsítse a webalkalmazások fejlesztését

MVC: Egy népszerű szoftverfejlesztési dizájn webalkalmazások létrehozásakor.
