# BlendBarometer
Dit is de BlendBarometer! Een tool om te bepalen hoe "blended" je onderwijsmodule is.

## Installeren
### Benodigdheden
- Git
- PHP
- Composer
- Laravel

### Stappenplan
1. Clone de repository\
```git clone https://github.com/DirkieDurky/BlendBarometer```
2. Maak je .env bestand aan met een app-key\
Om dit gemakkelijker te maken staat er in de root van het project een `.env.example` bestand. Deze kun je kopiëren en renamen naar `.env` voor een head-start.\
Doe dat handmatig of run het volgende:\
```cp .env.example .env```\
Vul daarna de app-key in\
```php artisan key:generate```
3. Installeer de benodigde packages\
```composer install```
4. Maak de database aan\
```php artisan migrate```
5. Start de server\
```composer run dev```
6. De website zou nu te zien moeten zijn op `http://localhost:8000/`!
