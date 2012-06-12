<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.0';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'basketmerge',
    'title'        => 'marmalade.de :: mergeBasket',
    'description'  => 'Shows user the previously added products in checkout',
    'version'      => '1.1.0',
    'author'       => 'marmalade.de :: Joscha Krug',
    'url'          => 'http://www.marmalade.de',
    'email'        => 'mail@marmalade.de',
    'extend'       => array(
        'oxbasket'      => 'marm/basketmerge/basketmerge_oxbasket',
        'oxcmp_shop'    => 'marm/basketmerge/basketmerge_oxcmp_shop',
        'oxcmp_basket'  => 'marm/basketmerge/basketmerge_oxcmp_basket',
    ),
    'files' => array(
    ),
    'blocks' => array(
    ),
   'settings' => array(
    )
);