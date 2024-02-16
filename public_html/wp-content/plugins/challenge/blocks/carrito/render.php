<?php

/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */



require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../src/Data.php';

use Challenge\Data;

if (!is_null($attributes['urlApi'])){

	$data = new Data($attributes['urlApi']);

	$paises = json_decode($data->listElement());
	
	foreach( $paises as $pais) {
		echo $pais->name->official. '<br>';
	}
}

$block_content = '<h5 ' . get_block_wrapper_attributes(
	[
		'class' => 'letra', 
		'style' => 'color: #F00',
	]
) . '>' . __("Registro desde") . ' >> ' . esc_html($attributes['urlApi']) . '</h5>';

echo wp_kses_post($block_content);
