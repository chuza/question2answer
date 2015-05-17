<?php

/*
	Plugin Name: Q2A Feed Widget 2
	Plugin URI: https://github.com/Towhidn/Q2A-feed-widget
	Plugin Description: lists latest RSS feeds
	Plugin Version: 1.4.0
	Plugin Date: 2014-5-19
	Plugin Author: QA-Themes
	Plugin Author URI: http://qa-themes.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version:
	Plugin Update Check URI: https://raw.githubusercontent.com/Towhidn/Q2A-feed-widget/master/q2a-feed-widget/qa-plugin.php
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}


	qa_register_plugin_module('widget', 'qa-feed-widget2.php', 'qa_feed_widget2', 'Feed Widget 2');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
