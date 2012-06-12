INSTALLATION

### IMPORTANT ###
Requires the IonCube Loader insalled on your Server.
You could get it for free here:
http://www.ioncube.com/loaders.php
### / IMPORTANT ###

- backup your shop and database
- copy files/folders from 'copy_this' in your shop-directory
- add the following module-entries to configuration

oxbasket => marm/basketmerge/basketmerge_oxbasket
oxcmp_shop => marm/basketmerge/basketmerge_oxcmp_shop
oxcmp_basket => marm/basketmerge/basketmerge_oxcmp_basket

adjust template
### BASIC Theme ###
 _header.tpl insert after <body>

 [{if $hasSaveBasket}]
    	[{oxid_include_dynamic file="dyn/merge_basket.tpl" }] 
    [{/if}]

### Azure Theme ###
 layout/base.tpl insert after <body>

    [{oxid_include_dynamic file="../../../modules/marm/basketmerge/out/blocks/merge_basket.tpl" }] 

- Oxid 4.4 needs jQuery or template adjustment


- IMPORTANT: delete cookie 

HAVE FUN!
    
