﻿# google-clone

## dit is een google clone project.
het project is gemaakt met html, css, php, mysql, nginx docker

het project bestaat uit 6 folder's:
### 1. ajax
### 2. classes
### 3. config
### 4. docker/php
### 5.nginx
### 6. public

#### de ajax folder heeft 3 bestanden:
bestand 1 is setbroken.php en is verantwoordelijk voor het markeren van afbeeldingen in een database als "broken"/ongeldig op basis van de waarde van "src" die wordt ontvangen via een POST-verzoek. Als er geen "src" wordt verstrekt, wordt een melding weergegeven.

bestand 2 is updateImageCount.php en dit script is bedoeld om het aantal klikken op een bepaalde afbeelding bij te houden in een database, op voorwaarde dat de juiste "imageUrl" wordt meegegeven via een POST-verzoek. Anders wordt er een melding weergegeven dat er geen afbeeldings-URL naar de pagina is doorgegeven.

bestand 3 is updateLinkCount.php en de code van handelt klikken op links af in een database, en als er geen link wordt doorgegeven, geeft het een foutmelding weer.


#### de classes folder heeft 3 bestanden:
bestand 1 is DomDocumentParser.php en in deze document analyseer van webpagina's, waarbij de focus ligt op het links, titels, meta-informatie en afbeeldingen.
bestand 2 is ImageResultsProvider.php en Deze class is ontworpen om afbeeldingsresultaten te beheren en HTML-opmaak te genereren voor weergave op een webpagina.
bestand 3 is SiteResultsProvider.php en deze bestand definiëren we de zoekresultaten van het database op te halen en deze in HTML weer te geven.

#### config
de config.php is voor het connect database en de php en hiervoor gebruik ik het PDO.
