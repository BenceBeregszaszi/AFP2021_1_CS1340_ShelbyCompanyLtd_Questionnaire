# Tesztjegyzőkönyv
Teszteléseket végezte: Kecse Károly Dániel

Operációs rendszer: Windows 10

Böngészők: Google Chrome, Opera

Ebben a dokumentumban lesz felsorolva az 
elvégzett tesztek elvárásai és eredményei, 
illetve időpontjai (Alfa, Béta és Végleges verzió).

## Alfa teszt
| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Adatbázis | 2021.11.15. | Kérdőívek, kérdések és válaszok tábla hozzáadása. | A táblák az oldal által küldött adatokat sikeresen el tudja tárolni. | Nem találtam hibát. |
| Menüpontok | 2021.11.15. | Menüpontok segítségével navigálás az oldalak között. | Minden menüpont a megfelelő oldalt jelenítette meg. | Nem találtam hibát. |
| Adatbázis | 2021.11.17. | Kérdőívek, kérdések és válaszokhoz tartozó szövegek hozzáadása, módosíthatósága, törölhetősége. | Az elkészített adatbázisunk megfelelően működött. | Nem találtam hibát. |
| Jogosultság | 2021.11.17. | Minden felhasználó férhessen hozzá a kitöltő oldalhoz, de a kérdőívek kezeléséhez ne. | Csak az admin felhasználó éri el a rendszer törzsét képező funkciókat. | Nem találtam hibát. |
| Autentikáció | 2021.11.17. | Csak felhasználói fiók azonosítása után tudjunk hozzáférni a rendszerhez bizonyos funkcióihoz (Kilistázás, módosítás, törlés, hozzáadás, statisztika). | Bejelentkezés nélkül nem értem el az oldal funkcióját. | Nem találtam hibát. |

Az Alfa tesztelés során a vizsgált elemek mind hibátlanul működtek, az adatbázisban eltárolandó elemek tisztázása után a munka gördülékenyen folyt, mindenféle fennakadások nélkül.

Következő tesztelésnél a többi funkció kerül vizsgálatra illetve elemzésre.
## Béta teszt
| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Oldalfunkciók | 2021.11.27. | A kilistázásnál linkként lekérhető a kérdőív kitöltésére navigáló hivatkozás | Sikeresen a vágólapra másolódott a link | Nem találtam hibát. |
| Oldalfunkciók | 2021.11.27. | Új kitöltő oldal létrehozása. Kitöltő adatai + kérdésekre adott válaszok megjelenítése, küldést követően ezek eltárolása| A kitöltés beküldése után az adatbázis megfelelően kezeli a beérkező adatokat. | Nem találtam hibát. |
| Oldalfunkciók | 2021.11.30. | Statisztika oldal kilistázza az összes kérdést, megjeleníti a beküldött adatok alapján elkészült diagrammokat | A nemi és életkor szerint csoportosított adatok helyesen jelennek meg. | Nem találtam hibát. |
| Frontend | 2021.12.01. | A weboldal igényes, letisztult megjelenése. | A menürendszer egyszerű/minimalista, a weboldal intuitív. | Nem találtam hibát. |
| Backend | 2021.12.01. | A backendben megírt PHP-SQL-jQuery-Ajax kódok megfelelő működése. | A backend kódjai tökéletesen működtek. | Nem találtam hibát. |


A Béta teszt is sikeresen zajlott, a felmerülő hibák szinte azonnal orvosolhatóak voltak.

A végleges tesztelésnél az összes fent felsorolt vizsgálati elem újra ellenőrzésre kerül.


## Végleges teszt
