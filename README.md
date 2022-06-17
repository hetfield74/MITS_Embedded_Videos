# MITS Embedded Videos für modified eCommerce Shopsoftware
(c) Copyright 2020 by Hetfield - MerZ IT-SerVice

- Author: 	Hetfield - https://www.merz-it-service.de
- Version: 	ab modified eCommerce Shopsoftware ab der Version 2.0.0.0

<hr />

Mit dieser nützlichen Erweiterungen für die modified eCommerce Shopsoftware kan man Videos für YouTube oder Vimeo in den Shop integrieren. Die Videos lassen sich ganz einfach bei Produkten und Kategorien einbinden.

Funktionsübersicht:

- Anzahl Videos pro Artikel/Kategorie per Systemmodul einstellbar
- Position der Videos wählbar (als zusätzliches Artikelbild, vor oder nach der Artikel- bzw. Kategoriebeschreibung)
- YouTube-Videos werden mit der No-Cookie-Option eingebunden
- Vimeo-Video werden mit der Option Do-Not-Track eingebunden
- Für die Templates *tpl_modified* und *tpl_modified_responsive* sind keine Änderungen notwendig.

Die Installation erfolgt ohne das Überschreiben von Dateien.

<hr />

## Lizenzinformationen:

Diese Erweiterung ist unter der GNU/GPL lizensiert. Eine Kopie der Lizenz liegt diesem Modul bei
oder kann unter der URL http://www.gnu.org/licenses/gpl-2.0.txt heruntergeladen werden. Die
Copyrighthinweise müssen erhalten bleiben, bzw. mit eingebaut werden. Zuwiderhandlungen verstoßen
gegen das Urheberrecht und die GPL und werden zivil- und strafrechtlich verfolgt!

<hr />

## Anleitung für das Modul MITS Embedded Videos

### Installation

Systemvoraussetzung: Funktionsfähige modified eCommerce Shopsoftware ab der Version 2.0.0.0

Vor der Installation des Moduls sichern sie bitte komplett ihre aktuelle Shopinstallation (Dateien und Datenbank)!
Für eventuelle Schäden übernehmen wir keine Haftung!
Die Installation und Nutzung des Moduls **MITS Embedded Videos** erfolgt auf eigene Gefahr!

Die Installation des Modul **MITS Embedded Videos** ist ziemlich einfach.

1. Führen Sie zuerst eine komplette Sicherung des Shops durch. Sichern Sie dabei die Datenbank und alle Dateien Ihrer Shopinstallation. 

2. Falls der admin-Order des Shops unbenannt wurde, dann entsprechnd auch den Ordner *admin* im Verzeichns shoproot des Moduls vor dem Hochladen ebenfalls entsprechend umbenennen!

3. Kopieren Sie anschließend einfach alle Dateien in dem Verzeichnis *shoproot* aus dem Modulpaket  in das Hauptverzeichnis ihrer bestehenden modified eCommerce Shopsoftware Installation. 
   Es werden dabei keine Dateien überschrieben!

4. Wechseln sie in den Administrationsbereich und rufen sie den Menüpunkt Module -> System-Module auf.

5. Markieren sie dort den Eintrag 
   ***MITS Embedded Videos © by Hetfield (MerZ IT-SerVice)***
   und klicken sie dann auf der rechten Seite auf den Button Installieren. Das Modul wird nun komplett installiert. 
       
6. Konfigurieren sie nun das Modul nach ihren Wünschen. Die verschiedenen Einstellmöglichkeiten sind im Modul erklärt.

7. Rufen Sie den Menüpunkt Module -> Klassenerweiterungen Module auf und wechseln Sie in den Reiter categories.

8. Markieren sie dort den Eintrag 
   ***MITS Embedded Videos © by Hetfield (MerZ IT-SerVice)***
   und klicken sie dann auf der rechten Seite auf den Button Installieren. 
   Das Klassenerweiterungs-Modul wird nun komplett installiert.
       
9. Für die Templates *tpl_modified* und *tpl_modified_responsive* sind für die Einstellung "Am Ende bei den zusätzlichen Artikelbildern" keine Änderungen notwendig. Möchten Sie diese Option in anderen Templates nutzen, müssen Sie die Vorlagen für Artikeldetails entsprechend anpassen. Hier eine kleine Hilfe als Denkanstoß. Eventuell müssen aber auch noch Javascripte angepasst werden, dies ist je nach Template unterschiedlich. 
  
       {if isset($videos) && count($videos) > 0} 
         {foreach item=video_data from=$videos}
           <div>
             <a title="{$PRODUCTS_NAME|onlytext}" href="{$video_data.PRODUCTS_VIDEO}">
               {if $smarty.const.PICTURESET_ACTIVE === true}
                 <img class="lazyload" data-src="{$video_data.PRODUCTS_VIDEO_MIDI_IMAGE}" alt="{$PRODUCTS_NAME|onlytext}" title="{$PRODUCTS_NAME|onlytext}" />
               {else}
                 <img class="lazyload" data-src="{$video_data.PRODUCTS_VIDEO_THUMBNAIL_IMAGE}" alt="{$PRODUCTS_NAME|onlytext}" title="{$PRODUCTS_NAME|onlytext}" />
               {/if}
               <noscript><img src="{$video_data.PRODUCTS_VIDEO_THUMBNAIL_IMAGE}" alt="{$PRODUCTS_NAME|onlytext}" title="{$PRODUCTS_NAME|onlytext}" /></noscript>
             </a>
           </div>
         {/foreach}
       {/if}
 
      Möglich ist auch folgende Variante, bei der direkt die Videos als eingebettetes Video (iframe) aufgelistet werden:

         {if isset($videos) && count($videos) > 0} 
           {foreach item=video_data from=$videos}
             <div>
               {$video_data.PRODUCTS_VIDEO_EMBEDDED}
             </div>
           {/foreach}
         {/if}

10. Fertig!

<hr />

Wir hoffen, das Modul **MITS Embedded Videos** für die modified eCommerce Shopsoftware gefällt ihnen!
Benötigen sie Unterstützung bei der individuellen Anpassung des Moduls oder haben sie eventuell doch Probleme beim Einbau?
Gerne können sie unseren kostenpflichtigen Support in Anspruch nehmen.
Kontaktieren sie uns einfach unter <a href="https://www.merz-it-service.de/Kontakt.html">info(at)merz-it-service.de</a>

<hr />

<img src="https://www.merz-it-service.de/images/logo.png" alt="MerZ IT-SerVice" title="MerZ IT-SerVice" />

**MerZ IT-SerVice** Nicole Grewe - Am Berndebach 35a - D-57439 Attendorn
Telefon: 0 27 22 - 63 13 63 - Telefax: 0 27 22 - 63 14 00
E-Mail: <a href="https://www.merz-it-service.de/Kontakt.html">Info(at)MerZ-IT-SerVice.de</a> - Internet: <a href="https://www.merz-it-service.de">www.MerZ-IT-SerVice.de</a>

<hr />
