INSTALLATION

- mergebasket in modules kopieren
- Modul config eintragen:

oxbasket => marm/basketmerge/basketmerge_oxbasket
oxcmp_shop => marm/basketmerge/basketmerge_oxcmp_shop
oxcmp_basket => marm/basketmerge/basketmerge_oxcmp_basket

- customer Sprachdatei hinzufügen

    'BASKETMERGE_HEAD'									=> 'Merge Basket',
    'BASKETMERGE_DESC'									=> 'add the following products to basket',
    'BASKETMERGE_ADD'									=> 'add',
    'BASKETMERGE_REMOVE'								=> 'dont add',

    'BASKETMERGE_HEAD'									=> 'Warenkorb laden',
    'BASKETMERGE_DESC'									=> 'Sie hatte beim letzten mal folgende Artikel im Warenkorb. Bitte wählen Sie, welche sie in Ihrem aktuellen Warenkrob hinzufügen möchten:',
    'BASKETMERGE_ADD'									=> 'hinzufügen',
    'BASKETMERGE_REMOVE'								=> 'nicht hinzufügen',

- Oxid Template kopieren (je nach Version)

- Oxid 4.4 _header.tpl bearbeiten, nach <body>

 [{if $hasSaveBasket}]
    	[{oxid_include_dynamic file="dyn/merge_basket.tpl" }] 
    [{/if}]

- Oxid 4.5 layout/base.tpl bearbeiten, nach <body>

    [{oxid_include_dynamic file="../../../modules/marm/basketmerge/out/blocks/merge_basket.tpl" }] 

- Oxid 4.4 brauch jQuery bzw. Template noch anpassen

- Oxid 4.5 JS (z.B. oxminibasket.js) folgende Zeile einfügen nach "$.widget( "ui.oxMiniBasket", oxMiniBasket );" :

    jQuery( "#merge_basket" ).draggable();

- WICHTIG: Cookie löschen 

HAVE FUN!
    
