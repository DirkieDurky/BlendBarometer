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
2. Installeer de benodigde packages\
```composer install```\
**Tip**: Voeg voordat je dit doet de folder van het project (of een parent folder) toe aan de "exclusions" van Windows Defender. Dat maakt "Generating optimized autoload files" veel sneller.
3. Maak je .env bestand aan met een app-key\
Om dit gemakkelijker te maken staat er in de root van het project een `.env.example` bestand. Deze kun je kopiëren en renamen naar `.env` voor een head-start.\
Doe dat handmatig of run het volgende:\
```copy .env.example .env```\
Vul daarna de app-key in\
```php artisan key:generate```
4. Maak de database aan\
```php artisan migrate```\
(En druk op enter op de vraag "Would you like to create it?")
5. Start de server\
```composer run dev```
6. De website zou nu te zien moeten zijn op `http://localhost:8000/`!
