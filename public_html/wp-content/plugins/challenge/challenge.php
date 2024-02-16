<?php 
/*
Plugin Name: Challenge Plugin
Description: Un plugin para el challenge
Author: Alejandro González
Version: 1.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Setup.php';

use Challenge\Setup;
Setup::init();
