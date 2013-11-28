<?php
/*
 * Plugin Name: Countries
 * Plugin URI: http://wordpress.lowtone.nl/lib-style
 * Description: Lowtone Style library.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\location\countries {

	use lowtone\Util;
	
	if (!class_exists("lowtone\\Lowtone"))
		return;
	
	Util::addMergedPath(__NAMESPACE__);

	// Load text domain
	
	$loadTextDomain = function() {
		if (is_textdomain_loaded("lowtone_location_countries"))
			return;

		load_textdomain("lowtone_location_countries", __DIR__ . "/assets/languages/" . get_locale() . ".mo");
	};

	add_action("plugins_loaded", $loadTextDomain);

	add_action("after_setup_theme", $loadTextDomain);

	// Functions
	
	function countries() {
		return json_decode(file_get_contents(__DIR__ . "/assets/countries/countries.json"));
	}
	
}