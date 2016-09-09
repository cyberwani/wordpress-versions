<?php
/**
 * Do not edit this file.
 */

$webroot_dir = __DIR__;

if( !defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

/**
 * =Environment-specific constants
 * -------------------------------------------------------------------------- */

$dir_level = 0;
$dirname = $webroot_dir;

do {
    $dirname = dirname( $dirname );
    $env = $dirname . '/env.php';
}
while( ++$dir_level < 5 && !file_exists( $env ) );

if( file_exists( $env ) ) {
    require_once $env;
}
else if( file_exists( $webroot_dir . '/env.php' ) ) {
    require_once $webroot_dir . '/env.php';
}

/**
 * =Hardcode the site URL
 * -------------------------------------------------------------------------- */

$environments = unserialize( ENVIRONMENTS );

define( 'WP_HOME', $environments[ WP_ENV ] );
define( 'WP_SITEURL', WP_HOME . '/wp' );

/**
 * =Content Directory
 * -------------------------------------------------------------------------- */

define( 'WP_CONTENT_DIR', realpath( $webroot_dir . '/app' ) );
define( 'WP_CONTENT_URL', WP_HOME . '/app' );

/**
 * =Active Theme
 * -------------------------------------------------------------------------- */

// define( 'STYLESHEETPATH', WP_CONTENT_DIR . '/themes/castor-child' );
// define( 'TEMPLATEPATH', WP_CONTENT_DIR . '/themes/castor' );

/**
 * =DB settings
 * -------------------------------------------------------------------------- */

define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

/**
 * =Multisite settings
 * -------------------------------------------------------------------------- */

// define( 'WP_ALLOW_MULTISITE',   true );
// define( 'MULTISITE',            true );
// define( 'SUBDOMAIN_INSTALL',    false );
// define( 'DOMAIN_CURRENT_SITE',  WP_HOME );
// define( 'PATH_CURRENT_SITE',    '/' );
// define( 'SITE_ID_CURRENT_SITE', 1 );
// define( 'BLOG_ID_CURRENT_SITE', 1 );

/**
 * =Custom settings
 * -------------------------------------------------------------------------- */

if( !defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT',  true );
}

if( !defined( 'WP_MEMORY_LIMIT' ) ) {
	define( 'WP_MEMORY_LIMIT',     '64M' );
}

if( !defined( 'WP_MAX_MEMORY_LIMIT' ) ) {
	define( 'WP_MAX_MEMORY_LIMIT', '128M' );
}

/**
 * =Start Wordpress
 * -------------------------------------------------------------------------- */

require_once( ABSPATH . 'wp-settings.php' );