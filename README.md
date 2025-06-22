# MatchLog webalkalmazás
A MatchLog egy egyszerű webes alkalmazás, amiben versenyeket lehet felvenni, azokhoz fordulókat és azokhoz versenyzőket.
### Követelmények
- npm 10.9.2
- PHP 8.2
- Composer 2.8.9
- MySQL adatbázis, mely rendelkezik egy matchlog nevű adatbázissal
### Telepítés menete
- A Projekt futtatásához szükséges eszközök, könyvtárak 
```sh
    composer install
    npm install
    npm run build
```
- Adatbázis migrációja, seedelése
```sh
    php artisan migrate
    php artisan db:seed
```
- Futtatás
```sh
    php artisan serve
```
Az `.env.example` fájlban megtalálhatók az alapvető konfigurációs beállítások, melyeket ki kell egészíteni az adatbázisszerver adataival.
