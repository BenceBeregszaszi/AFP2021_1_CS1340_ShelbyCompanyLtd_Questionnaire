# Tesztjegyzőkönyv

Teszteléseket végezte: Sárosi Gábor

Operációs rendszer: Windows 10

Böngészők: Mozilla Firefox, Microsoft Edge, Brave

Ebben a dokumentumban lesz felsorolva az 
elvégzett tesztek elvárásai és eredményei, 
illetve időpontjai (Alfa, Béta és Végleges verzió).

## Alfa teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Adatbázis | 2021.11.17. | Kérdőívek, kérdések és válaszokhoz tartozó szövegek hozzáadása, módosíthatósága, törölhetősége. | Az elkészített adatbázis megfelelően működött. | Nem találtam hibát. |
| Adatbázis | 2021.11.15. | Kérdőívek, kérdések és válaszok tábla hozzáadása. | A táblák az oldal által küldött adatokat el tudja tárolni. | Nem találtam hibát. |
| Autentikáció | 2021.11.17. | Csak felhasználói fiók azonosítása után tudjunk hozzáférni a rendszerhez bizonyos funkcióihoz (Kilistázás, módosítás, törlés, hozzáadás, statisztika). | Bejelentkezés nélkül nem értem el az oldal funkcióját. | Nem találtam hibát. |
| Jogosultság | 2021.11.17. | Minden felhasználó férhessen hozzá a kitöltő oldalhoz, de a kérdőívek kezeléséhez ne. | Csak az admin felhasználó éri el a rendszer törzsét képező funkciókat. | Nem találtam hibát. |
| Menüpontok | 2021.11.15. | Menüpontok segítségével navigálás az oldalak között. | Minden menüpont a megfelelő oldalt jelenítette meg. | Nem találtam hibát. |

Az Alfa tesztelés során a vizsgált elemek mind hibátlanul működtek.
## Béta teszt

| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Frontend | 2021.12.01. | A weboldal igényes, letisztult megjelenése, jQuery-Ajax elemek megfelelő működése | A menürendszer egyszerű/minimalista, a weboldal intuitív. | Nem találtam hibát. |
| Backend | 2021.12.01. | PHP-SQL kódok megfelelő működése. | A backend kódjai tökéletesen működtek. | Nem találtam hibát. |
| Oldalfunkciók | 2021.11.27. | Új kitöltő oldal létrehozása. Kitöltő adatai + kérdésekre adott válaszok megjelenítése, küldést követően ezek eltárolása| A kitöltés beküldése után az adatbázis megfelelően kezeli a beérkező adatokat. | Nem találtam hibát. |
| Oldalfunkciók | 2021.11.27. | A kilistázásnál linkként lekérhető a kérdőív kitöltésére navigáló hivatkozás | Sikeresen a vágólapra másolódott a link | Nem találtam hibát. |
| Oldalfunkciók | 2021.11.30. | Statisztika oldal kilistázza az összes kérdést, megjeleníti a beküldött adatok alapján elkészült diagrammokat | A nemi és életkor szerint csoportosított adatok helyesen jelennek meg. | Nem találtam hibát. |

A Béta teszt sikeresen zajlott, a felmerülő esztétikai hibák gyorsan orvosolhatók voltak.
## Végleges teszt
| Vizsgálat | Tesztelés időpontja | Elvárás | Eredmény | Hibák |
| :---: | --- | --- | --- | --- |
| Adatbázis | 2021.12.07. | Kérdőívek, kérdések és válaszok tábla hozzáadása. | A táblák az oldal által küldött adatokat sikeresen el tudja tárolni. | Nem találtam hibát. |
| Menüpontok | 2021.12.07. | Menüpontok segítségével navigálás az oldalak között. | Minden menüpont a megfelelő oldalt jelenítette meg. | Nem találtam hibát. |
| Adatbázis | 2021.12.07. | Kérdőívek, kérdések és válaszokhoz tartozó szövegek hozzáadása, módosíthatósága, törölhetősége. | Az elkészített adatbázisunk megfelelően működött. | Nem találtam hibát. |
| Autentikáció | 2021.12.07. | Csak felhasználói fiók azonosítása után tudjunk hozzáférni a rendszerhez bizonyos funkcióihoz (Kilistázás, módosítás, törlés, hozzáadás, statisztika). | Bejelentkezés nélkül nem értem el az oldal funkcióját. | Nem találtam hibát. |
| Jogosultság | 2021.12.07. | Minden felhasználó férhessen hozzá a kitöltő oldalhoz, de a kérdőívek kezeléséhez ne. | Csak az admin felhasználó éri el a rendszer törzsét képező funkciókat. | Nem találtam hibát. |
| Frontend | 2021.12.07. | A weboldal igényes, letisztult megjelenése, jQuery-Ajax elemek megfelelő működése | A weboldal használata intuitív, minden elem megfelelően működik. | Nem találtam hibát. |
| Backend | 2021.12.07. | A backendben megírt PHP-SQL kódok megfelelő működése. | A backend kódjai tökéletesen működtek. | Nem találtam hibát. |
| Oldalfunkciók | 2021.12.07. | A kilistázásnál linkként lekérhető a kérdőív kitöltésére navigáló hivatkozás | Sikeresen a vágólapra másolódott a link | Nem találtam hibát. |
| Oldalfunkciók | 2021.12.07. | Új kitöltő oldal létrehozása. Kitöltő adatai + kérdésekre adott válaszok megjelenítése, küldést követően ezek eltárolása| A kitöltés beküldése után az adatbázis megfelelően kezeli a beérkező adatokat. | Nem találtam hibát. |
| Oldalfunkciók | 2021.12.07. | Statisztika oldal kilistázza az összes kérdést, megjeleníti a beküldött adatok alapján elkészült diagrammokat | A nemi és életkor szerint csoportosított adatok helyesen jelennek meg. | Nem találtam hibát. |

A Végleges teszt lezajlott és minden funkció rendesen működik, 
esztétikailag is megfelelő a weboldal. 

Az alkalmazás átadásra kész.

Befejezve: 2021. december 15. 18:53:24 
