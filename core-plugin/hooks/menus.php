<?php if (!defined('ABSPATH')) exit('No direct script access allowed');
/**
 * WP-CI The CodeIgniter plugin for WordPress.
 * Copyright (C)2009-2010 Collegeman.net, LLC.
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

add_action('admin_menu', 'wpci_admin_menu');
function wpci_admin_menu() {
	// add menu item for WP-CI
	add_options_page('WP-CI', 'WP-CI', 'administrator', 'wp-ci', array('WPCI', 'execute_admin_fx'));
	
	// add menus for all applications (via annotations)
	foreach(WPCI::$apps as $app => $app_path)
		wpci_process_admin_annotations($app, $app_path);
}

function wpci_process_admin_annotations($app, $app_path) {
	$dir = opendir($app_path);
	
	while(($entry = readdir($dir)) !== false) {
		
		if ($entry != '.' && $entry != '..') {
			
			if (is_dir("$app_path/$entry")) {
				wpci_process_admin_annotations($app, "$app_path/$entry");
			}
			
			else if (stripos($entry, '.php') == strlen($entry)-4) {
				$class = split("\.", $entry);
				$class = $class[0];
				
				Annotations::addClass($class, "$app_path/$entry");
				
				$ann = Annotations::get($class);
				if (isset($ann['methods'])) {
					foreach($ann['methods'] as $method_name => $method) {
						
						// administrative menus
						if (isset($method['menu'])) {
							WPCI::add_menu($app, "$app_path/$entry", $class, $method_name, $method);
						}
						
						// submenus
						if (isset($method['submenu'])) {
							WPCI::add_submenu($app, "$app_path/$entry", $class, $method_name, $method);
						}
						
					}
				}
				
			}
		}
	}
	
	closedir($dir);
}