<?php

/**
 * Hop Custom Members Listing - Config
 *
 * NSM Addon Updater config file.
 *
 * @package		Hop Studios:Hop Custom Members Listing
 * @author		Hop Studios, Inc.
 * @copyright	Copyright (c) 2017, Hop Studios, Inc.
 * @link		http://www.hopstudios.com/
 * @version		1.0.0
 */

$config['name']='Hop Custom Members Listing';
$config['version']='1.0.0';
$config['nsm_addon_updater']['versions_xml']='http://www.hopstudios.com/software';

// Version constant
if (!defined('HOP_CUSTOM_MEMBERS_LISTING_VERSION')) {
	define('HOP_CUSTOM_MEMBERS_LISTING_VERSION', $config['version']);
}
