<?php

/**
 * This example searches themeforest in the "Joomla" item category.
 *
 * Received 30 results: <br/>
 * Result 0 is item ID 21558931: <a href="https://themeforest.net/item/odin-simple-easy-creative-one-page-joomla-template/21558931">ODIN - Simple &amp; Easy Creative One Page Joomla Template</a> <br/>
 * Result 1 is item ID 15889992: <a href="https://themeforest.net/item/vanessa-easy-startup-landing-joomla-template/15889992">Vanessa - Easy Startup Landing Joomla template</a> <br/>
 * Result 2 is item ID 11035698: <a href="https://themeforest.net/item/sj-time-responsive-news-portal-joomla-template/11035698">SJ Time - Responsive News Portal Joomla Template</a> <br/>
 * Result 3 is item ID 15419405: <a href="https://themeforest.net/item/auto-club-responsive-car-dealer-joomla-template/15419405">Auto Club - Responsive Car Dealer Joomla Template</a> <br/>
 * Result 4 is item ID 21626381: <a href="https://themeforest.net/item/organic-store-responsive-joomla-ecommerce-template/21626381">Organic Store - Responsive Joomla Ecommerce Template</a> <br/>
 * Result 5 is item ID 10480326: <a href="https://themeforest.net/item/reflect-creative-one-page-joomla-template/10480326">Reflect - Creative One Page Joomla Template</a> <br/>
 * Result 6 is item ID 8643058: <a href="https://themeforest.net/item/elos-responsive-multipurpose-joomla-theme/8643058">Elos - Responsive MultiPurpose Joomla Theme</a> <br/>
 * Result 7 is item ID 20226189: <a href="https://themeforest.net/item/printer-responsive-multipurpose-creative-joomla-theme/20226189">Printer - Responsive Multi-Purpose Creative Joomla Theme With Page Builder</a> <br/>
 * Result 8 is item ID 21400452: <a href="https://themeforest.net/item/oscar-multipurpose-responsive-joomla-template/21400452">Oscar - Multipurpose Responsive Joomla Template</a> <br/>
 *
 */


require_once 'config.php';
require_once 'class.SimpleEnvatoAPI.php';

// What item name to search for:
$search_term = 'easy';
$marketplace = 'themeforest.net';
$category    = 'cms-themes/joomla';

// Perform the search via the Envato API
$envato_api = SimpleEnvatoAPI::getInstance();
$envato_api->set_mode( 'personal' );
$envato_api->set_personal_token( ENVATO_API_PERSONAL_TOKEN );
$result = $envato_api->api( 'v1/discovery/search/search/item?site=' . $marketplace . '&term=' . urlencode( $search_term ) . '&category=' . urlencode( $category ) );
// Loop over the results:
if ( ! empty( $result ) && ! empty( $result['matches'] ) ) {
	echo 'Received ' . count( $result['matches'] ) . " results: <br/>\n";
	foreach ( $result['matches'] as $id => $match ) {
		echo 'Result ' . $id . ' is item ID ' . $match['id'] . ': <a href="' . $match['url'] . '">' . htmlspecialchars( $match['name'] ) . "</a> <br/>\n";
	}
} else {
	echo 'No results';
}

