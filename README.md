# MITS Embedded Videos für modified eCommerce Shopsoftware
(c) Copyright 2020 by Hetfield - MerZ IT-SerVice

- Author: 	Hetfield - https://www.merz-it-service.de
- Version: 	ab modified eCommerce Shopsoftware ab der Version 2.0.7.0

<hr />

Mit dieser nützlichen Erweiterungen für die modified eCommerce Shopsoftware kan man Videos für YouTube, Vimeo, Dailymotion oder eigene MP4-Videos in den Shop integrieren. 
Die Videos lassen sich ganz einfach bei Produkten und Kategorien einbinden.

Funktionsübersicht:

- Anzahl Videos pro Artikel/Kategorie per Systemmodul einstellbar
- Position der Videos wählbar (als zusätzliches Artikelbild, vor oder nach der Artikel- bzw. Kategoriebeschreibung)
- YouTube-Videos werden mit der No-Cookie-Option eingebunden
- Vimeo-Video werden mit der Option Do-Not-Track eingebunden
- Dailymotion-Videos sind jetzt auch möglich
- Eigene .mp4-Dateien integrierbar als HTML5-Video
- Für die Templates *tpl_modified* und *tpl_modified_responsive* sind keine Änderungen notwendig.
- Videos sind sprachabhängig hinterlegbar
- Titel als Videobeschreibung unterhalb des Videos hinzugefügt bei Videoposition vor oder nach der Beschreibung

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

Systemvoraussetzung: Funktionsfähige modified eCommerce Shopsoftware ab der Version 2.0.7.0

Vor der Installation des Moduls sichern sie bitte komplett ihre aktuelle Shopinstallation (Dateien und Datenbank)!
Für eventuelle Schäden übernehmen wir keine Haftung!
Die Installation und Nutzung des Moduls **MITS Embedded Videos** erfolgt auf eigene Gefahr!

Die Installation des Modul **MITS Embedded Videos** ist ziemlich einfach.

1. Führen Sie zuerst eine komplette Sicherung des Shops durch. Sichern Sie dabei die Datenbank und alle Dateien Ihrer Shopinstallation. 

2. Falls der admin-Order des Shops unbenannt wurde, dann entsprechend auch den Ordner *admin* im Verzeichnis shoproot des Moduls vor dem Hochladen ebenfalls entsprechend umbenennen!

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


10. Für das Template *tpl_modified_nova* sind spezielle Anpassungen notwenig, da das im Template verwendete viewer.js keine Videos darstellen kann. Deshalb bringt das Modul ein eigenes Modal-Fenster mit. 
    Es müssen aber dazu alle Artikeldetailvorlagen bearbeitet werden und im Modul muss *Angepasstes Template?* auf *ja* stehen. 
    Suche dazu in den Artikelvorlagen unter *templates/tpl_modified_nova/module/product_info/* (in alle dort vorhandenen HTML-Dateien) nach folgendem Code:

        {if isset($more_images) && count($more_images) > 0}
          {foreach key=image_nr item=more_images_data from=$more_images name=more_images}
            <div class="splide__slide">
              <div class="pd_image_small"><div class="pd_image_small_inner">
              {if $smarty.const.PICTURESET_ACTIVE === true}
                <img class="lazyload" data-src="{$more_images_data.PRODUCTS_IMAGE|replace:"info_":"mini_"}" alt="{if isset($more_images_data.IMAGE_ALT) && $more_images_data.IMAGE_ALT != ''}{$more_images_data.IMAGE_ALT|onlytext}{else}{$PRODUCTS_NAME|onlytext}{/if}" title="{if isset($more_images_data.IMAGE_TITLE) && $more_images_data.IMAGE_TITLE != ''}{$more_images_data.IMAGE_TITLE|onlytext}{else}{$PRODUCTS_NAME|onlytext}{/if}" />
              {else}
                <img class="lazyload" data-src="{$more_images_data.PRODUCTS_IMAGE|replace:"info_":"thumbnail_"}" alt="{if isset($more_images_data.IMAGE_ALT) && $more_images_data.IMAGE_ALT != ''}{$more_images_data.IMAGE_ALT|onlytext}{else}{$PRODUCTS_NAME|onlytext}{/if}" title="{if isset($more_images_data.IMAGE_TITLE) && $more_images_data.IMAGE_TITLE != ''}{$more_images_data.IMAGE_TITLE|onlytext}{else}{$PRODUCTS_NAME|onlytext}{/if}" />
              {/if}
              </div></div>
            </div>
          {/foreach}
        {/if}

    Füge darunter diesen Abschnitt ein:

        {if isset($videos) && count($videos) > 0}
          {foreach item=video_data from=$videos}
            <div class="splide__slide">
              <div class="pd_image_small"><div class="pd_image_small_inner">
                <a href="#" class="{$video_data.VIDEO_SOURCE} open-video" data-src="{$video_data.PRODUCTS_VIDEO}" data-title="{$video_data.PRODUCTS_VIDEO_TITLE|onlytext}">
                  <img class="lazyload" {$video_data.VIDEO_CONSENT} data-src="{$video_data.PRODUCTS_VIDEO_THUMBNAIL_IMAGE}" alt="Video: {$PRODUCTS_NAME|onlytext}" title="{$video_data.PRODUCTS_VIDEO_TITLE|onlytext}" />
                </a>
              </div></div>
            </div>
          {/foreach}
        {/if}

    Suche weiter unten nach folgendem Code:

        {if isset($more_images) && count($more_images) > 0}
          {foreach key=image_nr item=more_images_data from=$more_images name=more_images}
            <div class="splide__slide">
              <picture>
                <source media="(max-width:420px)" data-srcset="{$more_images_data.PRODUCTS_IMAGE|replace:"info_images":"thumbnail_images"}">
                <source data-srcset="{$more_images_data.PRODUCTS_IMAGE}">
                <img class="lazyload" data-original="{$more_images_data.PRODUCTS_IMAGE|replace:"info_":"popup_"}" data-src="{$more_images_data.PRODUCTS_IMAGE|replace:"info_":"mini_"}" alt="{if isset($more_images_data.IMAGE_ALT) && $more_images_data.IMAGE_ALT != ''}{$more_images_data.IMAGE_ALT|onlytext}{else}{$PRODUCTS_NAME|onlytext}{/if}" title="{if isset($more_images_data.IMAGE_TITLE) && $more_images_data.IMAGE_TITLE != ''}{$more_images_data.IMAGE_TITLE|onlytext}{else}{$PRODUCTS_NAME|onlytext}{/if}" />
              </picture>
            </div>
          {/foreach}
        {/if}

    Füge darunter diesen Code ein:

        {if isset($videos) && count($videos) > 0}
          {foreach item=video_data from=$videos}
            <div class="splide__slide">
              {$video_data.PRODUCTS_VIDEO_EMBEDDED}
            </div>
          {/foreach}
        {/if}

11. Fertig!

Wichtiger Hinweis zu YouTube-Videos in der Colorbox (bei *tpl_modified* und *tpl_modified_responsive*)!

Beim Einbinden von YouTube-Videos über die jQuery Colorbox kann es zu dem Fehler
„Video konnte nicht geladen werden (Fehler 153)“ kommen.

Dieser Fehler tritt auf, weil YouTube das Abspielen von Videos in bestimmten eingebetteten Umgebungen einschränkt,
insbesondere wenn das Video in einem sandboxed <iframe> oder in einer DOM-Umgebung mit Cross-Origin-Isolation geöffnet wird.
Die Colorbox erzeugt intern ein eigenes <iframe>, um externe Inhalte anzuzeigen.
Dabei werden Sicherheitsattribute gesetzt, die den YouTube-Player am Laden oder Initialisieren hindern.

Technischer Hintergrund:

- YouTube benötigt für seine Player-API uneingeschränkten Zugriff auf das <iframe> (z. B. allow-same-origin und Skriptsteuerung).
- Die Colorbox trennt jedoch eingebettete Inhalte vom Haupt-Dokument, um Cross-Site-Scripting zu verhindern.
- Dadurch kann YouTube das Video nicht korrekt initialisieren, was zu Fehler 153 führt.

Empfehlung: Entweder in diesem Fall die Anzeige in den Beschreibungen bevorzugen oder die Lösung für das *tpl_modified_nova* in das entsprechende Template mit Anpassungen übernehmen. 

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
