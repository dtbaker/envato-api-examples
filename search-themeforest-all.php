<?php

/**
 * This example outputs a list of items based on a free text search term against themeforest.
 * The output below will be:
 *
 * Received 10 results: <br/>
 * Result 0 is item ID 2833226: <a href="https://themeforest.net/item/avada-responsive-multipurpose-theme/2833226">Avada | Responsive Multi-Purpose Theme</a> <br/>
 * Result 1 is item ID 2665775: <a href="https://themeforest.net/item/avada-psd/2665775">Avada | PSD</a> <br/>
 * Result 2 is item ID 18437560: <a href="https://themeforest.net/item/avara-hotel-and-resort-theme/18437560">Avara - Hotel and Resort HTML5 Template</a> <br/>
 * Result 3 is item ID 8041961: <a href="https://themeforest.net/item/basix-responsive-wordpress-theme/8041961">Basix - Responsive WordPress Theme</a> <br/>
 * Result 4 is item ID 19673689: <a href="https://themeforest.net/item/acada-charity-theme-charity-nonprofit-organizations/19673689">Acada Charity Theme | Charity &amp; Non-Profit Organizations</a> <br/>
 * Result 5 is item ID 19955189: <a href="https://themeforest.net/item/emilio-ecommerce-template/19955189">Emilio - Ecommerce Template</a> <br/>
 * Result 6 is item ID 20240744: <a href="https://themeforest.net/item/crane-responsive-multipurpose-wordpress-theme/20240744">Crane - Highly Customizable Multipurpose WordPress Theme</a> <br/>
 * Result 7 is item ID 19707359: <a href="https://themeforest.net/item/stack-multipurpose-wordpress-theme-with-variant-page-builder/19707359">Stack - Multi-Purpose WordPress Theme with Variant Page Builder &amp; Visual Composer</a> <br/>
 * Result 8 is item ID 9693644: <a href="https://themeforest.net/item/lambda-multi-purpose-responsive-bootstrap-theme/9693644">Lambda - Multi Purpose Responsive Bootstrap Theme</a> <br/>
 * Result 9 is item ID 20967457: <a href="https://themeforest.net/item/aveda-night-club-multipurpose-responsive-template-for-disco-night-club-party-music/20967457">Aveda Night Club- Multipurpose Responsive Template For Disco, Night club, Party &amp; Music</a> <br/>
 *
 */

require_once 'config.php';
require_once 'class.SimpleEnvatoAPI.php';

// What item name to search for:
$search_term = 'Avada';
$marketplace = 'themeforest.net';

// Perform the search via the Envato API
$envato_api = SimpleEnvatoAPI::getInstance();
$envato_api->set_mode( 'personal' );
$envato_api->set_personal_token( ENVATO_API_PERSONAL_TOKEN );
$result = $envato_api->api( 'v1/discovery/search/search/item?site=' . $marketplace . '&term=' . urlencode( $search_term ) );

// Loop over the results:
if ( ! empty( $result ) && ! empty( $result['matches'] ) ) {
	echo 'Received ' . count( $result['matches'] ) . " results: <br/>\n";
	foreach ( $result['matches'] as $id => $match ) {
		echo 'Result ' . $id . ' is item ID ' . $match['id'] . ': <a href="' . $match['url'] . '">' . htmlspecialchars( $match['name'] ) . "</a> <br/>\n";
	}
} else {
	echo 'No results';
}

