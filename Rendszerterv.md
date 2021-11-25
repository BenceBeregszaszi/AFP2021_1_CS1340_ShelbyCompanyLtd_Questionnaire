# Rendszerterv

## Készítette: 
            - Banyik Nándor

            - Kecse Károly Dániel
            
            - Nagy Péter Axel
           
            - Sárosi Gábor

##  A rendszer célja 

A megrendelő egy fejlesztő csapathoz fordult, hogy egy Google Formshoz hasonló weboldalt hozzanak létre. A weboldal lényege, hogy teljesen véletszerű kérdéseket tesz fel a felhasználónak és a válaszait eltárolja egy adatbázisban. Nincs bejelentkezéshez kötve a weboldal használata. A weboldal a begyűjtött válaszokból statisztikát készít a megrendelő számára.

## Projektterv

Projektmunkások, felelősségek:
- Adatbázis tervezés és annak létrehozása: Kecse Károly, Nagy Péter Axel
- Frontend: Banyik Nándor, Kecse Károly, Nagy Péter Axel, Sárosi Gábor
- Frontend design: Sárosi Gábor
- Backend: Banyik Nándor, Kecse Károly, Sárosi Gábor
- Tesztelés: Banyik Nándor, Kecse Károly, Nagy Péter Axel, Sárosi Gábor

## Üzleti folyamatok modellje

![https://i.imgur.com/TTElsIx.jpeg](https://i.imgur.com/TTElsIx.jpeg)

## Követelmények
 - Funkcionális követelmények
   - Felhasználó (admin) bejelentkezési adatainak tárolása
   - Felhasználói jogkörök kialakítása
   - Kérdőívek adatainak tárolása
     - Kérdések, azokhoz lehetséges válaszok
   - Webes környezeten való stabil működés
 - Nem funkcionális működés
   - A bejelentkezés nélküli felhasználók ne férhessenek hozzá a kérdőívekhez és azok kezeléséhez
   - Kitöltött kérdőívekről lekérdezhető az egyes statisztika
     - ehhez csak az admin (egyetlen felhasználó) férhet hozzá
   - A bejelentkezés nélküli felhasználó csak az admin által beállított kérdőívhez férhessen hozzá
 - Törvényi előírások, szabályok
   - A web felület szabványos eszközökkel készüljön, html/php/css
   - Intuitív, átlátható rendszer
   - GDPR szabályoknak való megfelelés


## Funkcionális terv
 - Rendszerszereplők
    - Admin
    - Vendég
 - Rendszerhasználati esetek és lefutásaik:
    - ADMIN:
        - Rendszer feletti korlátlan hozzáférés
        - Kérdőívek létrehozása
        - Kérdések (és azokhoz tartozó válaszlehetőségek) létrehozása
        - Kérdőívek szerkesztése
        - Kérdés szövegének megváltoztatása
        - Válaszok módosítása
        - Az egyes kérdőívekre vonatkozó statisztikák megjelenítése
        - Kérdőívek kitöltési URL-jének lekérése/másolása
    - Vendég
        - Kérdőívhez való hozzáférés hivatkozáson keresztül
        - Kérdőív statisztikához szükséges alapadatok megadása
        - Kérdőív kitöltése
 - Menü-architektúrák:
    - BEJELENTKEZÉS:
        - Admin számára autentikációs lehetőség
    - BEÁLLÍTÁSOK:
        - Kérdőívek kezelésére szolgáló felület
        - Kérdőívek listázása
        - Kérdőívek szerkesztése
        - Kérdőívek URL-jének lekérése
    - KÉRDŐÍV:
        - Alapadatok megadása
        - Kérdések megválaszolása
        - Kérdőív elküldése
    - Regisztráció
        - Felhasználók regisztrációws felülete a rendszerbe, így nem kell minden esetben megadni az alapadatokat
    - Kijelentkezés


## Fizikai környezet

 - Az alkalmazás WEB platformon készül.
   - A BootStrap alkalmazása miatt hordozható eszközökön (okostelefon, táblagépek) illetve asztali számítógépeken is egyformán elérhető.
   - Laravel framework segítségével szabványos eljárásokkal készült backend és frontend
 - Fejlesztői eszközök:
   - Visual Studio Code
   - MySQL Workbench
   - CodeTogether
   - XAMPP(phpmyadmin)
   - Adobe Photoshop (2021)


## Architektúrális terv
Backend:

-A backend fejlesztéséhez szükséges egy adatbázis szerver, amit MySQL-lel valósítuttuk meg

-Laravel framework a szabványos fájlkezelés és összetettebb fejlesztési lehetőségek végett

-PHP

-JavaScript

Frontend:

-BootStrap

-TailWind CSS

## Adatbázis terv
![https://i.imgur.com/GYhCAzW.png](https://i.imgur.com/GYhCAzW.png)

## Implementációs terv
A felület HTML, JS, és PHP nyelven készül.
Az oldalakat és azok vezérlését végző fájlokat a framework által karbantartott fájl rendszerezés szerint hoztuk létre. 
A szabványos fájlkezelés végett átláthatóbb és egyszerűbb lesz 
a későbbi fejlesztési folyamatok során megérteni a rendszer felépítését.
A frontend elkészítése során CSS, BootStrap illetve Tailwind CSS használatára került sor, 
ezek felgyorsították a felület szerkesztésének folyamatát.

## Tesztterv
A teszteléseket egy külön jegyzőkönyvben fogjuk majd vezetni és folyamatosan jegyzetelni a fejlesztés során.
Több tesztelés fog történni a fejlesztés alatt (Alfa, Béta és végleges teszt), 
Minden teszt 1 hetet fog igénybe venni és minden funkció átvizsgálásra fog kerülni.
A fejlesztő csapat mindegyik tagja külön-külön fogja tesztelni a weboldalt.
A tesztjegyzőkönyv megtalálható a többi dokumentáció között.


## Telepítési terv
A weboldal használatához szüksége lesz a felhasználónak egy böngésző használatához
(Opera, Microsoft Edge, Google Chrome, Mozilla Firefox), 
más egyébre nincs szüksége a felhasználónak.

## Karbantartási terv
a) Az alkalmazás folyamatos üzemeltetése és karbantartása, mely
magában foglalja a programhibák elhárítását, a belső igények változása miatti
módosításokat, valamint a környezeti feltételek változása miatt
megfogalmazott program-, illetve állomány módosítási igényeket.
Karbantartás
b) Corrective Maintenance: A megrendelő jelenti, ha bármi hibát vélt felfedezni.
c) Adaptive Maintenance: A program naprakészen tartása és finomhangolása.
d) Perfective Maintenance: A szoftver hosszútávú használata érdekében végzett
módosítások, új funkciók, a szoftver teljesítményének és működési
megbízhatóságának javítása.
e) Preventive Maintenance: Olyan problémák elhárítása, amelyek még nem
tűnnek fontosnak, de később komoly problémákat okozhatnak.
