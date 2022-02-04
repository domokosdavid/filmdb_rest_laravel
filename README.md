# FilmDb backend laraveles megvalósítása

Filmek adatait tárolja

## Telepítési lépések

* Készítsünk egy másolatot az .env.example fájlról, .env néven!
* A fájlban írjuk át az adatbázis kapcsolat adatait a megfelelőre!

A konzolban hajtsuk végre az alábbi utasításokat:

    composer install
    php artisan key:generate --ansi
    php artisan migrate --seed

A fejlesztői szervert az alábbi utasítással indíthatjuk el:

    php artisan serve

Ellenőrizzük, hogy minden rendben van-e, hogy az alábbi URL teszt JSON adatokat ad-e vissza:

http://localhost:8000/api/film

## Adattáblák

### filmek

A tárolt filmek

* id: egész
* cim: A film címe
* kategoria: A film kategóriái felsorolva
* hossz: A film hossza percben
* ertekeles: A film értékelése 1-10-es skálán

## API végpontok

Minden be- és kimeneti adat JSON formátumú.

**GET /api/film**

Visszaadja a filmek listáját.

    [
        {
            "id": 1,
            "cim": "Numquam labore similique excepturi.",
            "kategoria": "horror, akció, fantasy",
            "hossz": 74,
            "ertekeles": 4
        },
        {
            "id": 2,
            "cim": "Architecto voluptas aspernatur ea qui est.",
            "kategoria": "vígjáték, dráma",
            "hossz": 118,
            "ertekeles": 8
        },
    }

**POST /api/film**

Létrehoz egy új filmet a megadott adatokkal. Az id-n kívül minden mező megadása kötelező!

Visszaadja a létrehozott film adatait, beleértve a generált ID-t.

**GET /api/film/{id}**

Az *id* azonosítójú film adatait adja vissza.

**PATCH /api/film/{id}**

Módosítja az *id* azonosítójú film adatait. Csak a módosítandó adatokat kell megadni, pl. ha csak az értékelést szeretnénk módosítani, akkor elég ennyit megadni:

    {
        "ertekeles": 8,
    }

Az ID nem módosítható.

Visszaadja a módosított film adatait.

**PUT /api/film/{id}**

Módosítja az *id* azonosítójú film adatait. Minden adatot meg kell adni.

Az ID nem módosítható.

Visszaadja a módosított film adatait.

**DELETE /api/film/{id}**

Törli az adott azonosítójú filmet.

Visszatérésnek nem ad vissza tartalmat.

## Hibakezelés

Ha a végpontot nem megfelelően hívtuk meg, vagy az adatok nem felelnek meg a leírtaknak, a backend az alábbi módon jelzi a hibaeseteket:

* A HTTP státusz kód a 400-as sávból fog kikerülni, a hiba típusának megfelelően
* A visszakapott JSON objetum "message" tulajdonsága tartalmazza a hiba okát.

Pl.: GET http://localhost:8000/api/film/9999 (nem létező id)

    404 Not Found
    {
        "message": "A megadott azonosítóval nem található film"
    }

A kérésnél ne felejtsük beállítani az "Accept" header értékét "application/json"-ra!
