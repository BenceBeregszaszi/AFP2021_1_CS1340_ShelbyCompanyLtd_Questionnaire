# Funkcionális terv 

## Készítette: 
            - Banyik Nándor

            - Kecse Károly Dániel
            
            - Nagy Péter Axel
           
            - Sárosi Gábor

## Áttekintés 
Egy olyan webalkalmazást fejlesztünk, ami segítségével ügyfelünk gyorsabban, egyszerűbben kérheti számon célközönsége véleményét, mindezt papír pazarlás nélkül . Célunk, hogy minden  eszközön könnyedén használható legyen a rendszer. A kérdőívek létrehozása mellett lehetőséget adunk a megrendelőnknek, hogy mely kérdőív az aktuális, amit bejelentkezés nélkül is bárki kitölthet. További autentikáció elvégzése után elérhetővé válik az összes létrehozott kérdőív, amelyek közül szabadon választhatnak a regisztrált felhasználók. A regisztráció segíti azokat, akik rendszeres használói az oldalnak, hiszen a statisztikák kimutatása végett szükséges személyes adatok (életkor, nem) megadása nem lesz kötelező minden egyes alkalomkor.

## Jelenlegi helyzet
A megrendelő szeretné leváltani a korszerűtlen és a természetre igencsak káros hatású kérdőívek készítését, illvetve azok kezelését egy olyan rendszerre, ahol könnyedén létrehozhatja azon kérdéssorokat, amelyekre szeretné a célközönsége véleményét kikérni. Az eredmények tágabb vizsgálása érdekében az egyes statisztikák is megjeleníthetővé válnak, amikhez a  részletesebb kimutatás végett további adatokat kérünk be a felhasználóktól, leszűkítve az egyes befolyásoló tényezőket a vélemények megadása során. Ezzel a korszerű és gyors megoldással akár kutatásokat is indíthat, vagy támogathat, egy esetleges következő termékére vonatkozó igényt is felmérheti. A nagyobb felhasználási kör érdekében fontos, hogy minden eszközön használható legyen a felület, ezért egy reszponzív web-es alkalmazás mellett döntöttek, amihez feltétlenül valamilyen PHP alapú framework-höz ragaszkodnak, így a továbbfejlesztés folyamata is egyszerűbb lesz a későbbiekben.

## Követelménylista

| Modul  | Id | Név | Kifejtés |
| ------------- | ------------- | ------------- | -------------|
| Felhasználói rendszer | K1  | Admin felület | A megrendelő be tudjon jelentkezni az adminfelületbe |
| Felhasználói rendszer | K2  | Bejelentkezési felület | Be lehessen lépni az oldalra |
| Felhasználói rendszer | K3  | Admin felület | A kitöltő egy kérdőív kitöltése után regisztrálhat az oldalra |
| Felhasználói rendszer | K4  | Jelszómódosítás | A felhasználó meg tudja változtatni a jelszavát |
| Kérdőív | K5  | Kérdőív létrehozása | Az admin tudjon új kérdőívet létrehozni |
| Módosítás  | K6  | Kérdőív módosítása | A megrendelő igénye szerint tudja módosítani a már meglévő kérdőíveket |
| Kitöltés | K7  | Kérdőív kitöltése | Az oldalra belépők alapadataik megadásával kitölthetik a kérdőívet |
| Statisztika  | K8  | Statisztika | A beérkező eredményekből az oldal képes kimutatásokat készíteni. |

## Jelenlegi üzleti folyamatok modellje

A világunk felgyorsult, az embereknek mindenre egyre kevesebb idejük van, illetve egyre kevesebb időt fordítanak a jelentéktelenebb dolgokra. Ennek következtében az emberek fiatalabb generációja nem tartja annyira kényelmes, és gyors megoldásnak a kérdőívek postai úton visszaküldését. Ez pedig ügyfelünk legnagyobb problémája, hisz így jelentős adatmennyiségből marad ki. Ez az üzleti gyarapodást is hátráltatja, és a papírba, logisztikába, postázásba fektetett pénz csekély része térül vissza. A mai világban nyugodtan kijelenthetjük, a papír alapú kérdőívek elavultak, és ezt ügyfelünk felismerte és mielőbb szeretne váltani.

## Igényelt üzleti folyamatok modellje

Megszámlálhatatlan sok weboldalon láthatunk esetleges kérdőíveket, vagy csak csekély értékeléseket, melyekre rendelés után kérhetnek meg minket, hogy értékeljük a terméküket. Cégünk korszerű, igényenyes felületet tud biztosítani minden ehhez hasonló igényre. Ezzel a befektetéssel elengedhetik a plusz kiadásokat, mint a kérdőívek termelése, logisztikája, postázása, valamint értelmezése. Ehelyett egy kényelmes, olcsóbb megoldást kínálunk, ahol automatikus visszajelzés statisztikát kaphat vissza az ügyfelünk, másodperceken belül.

## Használati esetek

Admin: Az admin egy külön oldalon tud belépni. Számára megjelenik a felhasználók kezelése, kérdőívek kezelése,
statisztika menüpontok. 
Ezeken keresztül teljes felügyelete van a weboldal felett.
Új kérdőíveket hozhat létre, módosíthatja azokat, kezelheti a regisztrált felhasználókat,
megtekinthet különféle statisztikákat a kérdőíve után.

Látogató: Nem számít felhasználónak az oldalon. 
Ő az aktuális kérdőívet töltheti ki az alapadatok megadása után. 
Ahogy végzett a kitöltéssel, azután regisztrálhat a weboldalra és több kérdőívet is kitölthet. 
Ezután már nem kell alapadatokat megadnia.

Felhasználó: Ahogy felcsatlakozik az oldalra, megjelennek számára azok a kérdőívek, melyeket még nem töltött ki. Új kérdőív kitöltésekor már nem kell megadnia az alapadatait.


## Képernyő tervek

- Beállítások főmenü
![Beállítások főmenü](https://i.imgur.com/VrUDdz5.png)

- Kérdőív főoldal, navigációs menü admin szemszögből
![Kérdőív főoldal, admin felhasználóba bejelentkezve](https://i.imgur.com/qlN4DWo.png)

## Forgatókönyv
***Admin szemszögéből***: Bejelentkezés után hozzáférése lesz a kérdőívek kezeléséhez. Kilistázhatja, módosíthatja őket - kérdőív nevét, kérdések szövegeit illetve azok válaszainak változtatásának lehetősége. További lehetősége van az adminnak kérdőíveket, kérdéseket törölni a rendszerből. Az egyes kérdőíveknek megtekinthetőek a statisztikai elemei, amit az eltárolt alapadatoknak megfelelően jelenítünk meg. A kérdőívek kitöltésére szolgáló hivatkozások másolása, ami segítségével elérjük a kérdőíveket.

***Vendég szemszögéből***: Alapadatok megadásával és a válaszok jelölésével elküldheti a kiválasztott kérdőívhez tartozó értékeket, amiket adatbázisban tárolunk. 


## Fogalomszótár

Autentikáció - Hitelesítés. (A projekt esetében: Ne kelljen külön felhasználói fiókot arra létrehozni, hogy kitöltsünk egy kérdőívet.)

Reszponzív: A weboldal méretezése automatikusan igazodik a használt eszközhöz.

Framework: Magyarul keretrendszer. Jelen esetben olyan eszköz, amely segíti a projekt hatékony fejlesztését.
