<?php


// PLEASE REGISTER A PERSONAL TOKEN FROM build.envato.com and replace it below on ___PASTE_TOKEN_HERE___


if ( is_file( 'config.local.php' ) ) {
	require_once 'config.local.php';
}


if ( ! defined( 'ENVATO_API_PERSONAL_TOKEN' ) ) {
	define( 'ENVATO_API_PERSONAL_TOKEN', '___PASTE_TOKEN_HERE___' );
}

