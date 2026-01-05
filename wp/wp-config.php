<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'perspect_wp333' );

/** MySQL database username */
define( 'DB_USER', 'perspect_wp333' );

/** MySQL database password */
define( 'DB_PASSWORD', '@SJv8!p1k6' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3rcfbjdnsz9drcg1qmestrk6yfnfnkeuto9vsuq9yivjjjndwin62vt57h1fc4jo' );
define( 'SECURE_AUTH_KEY',  '4ma3kxpuywnm0v01g6azgho0nbgyquknyrfnipojdafvcd6sqyf9u3xf4bmdcebl' );
define( 'LOGGED_IN_KEY',    'oijslhym4dkxgtqjnryfm7j06gaebtr33u7ovaxmlntredqcbtx2otgroiwjdhuj' );
define( 'NONCE_KEY',        'igpmgvxitcaofdnb3qrbqqkabxhplr2ejcyhqpyn24garbvz9byznvt5leago4ll' );
define( 'AUTH_SALT',        '88s0hbunjdoekqhu1fi74tpdmo9jz8u6rdqm1ghhuy3ccivfms01h1zpvutptuuo' );
define( 'SECURE_AUTH_SALT', 'y3qxn30ksse3qaak7999azfp8fcqnznlgnbnwo5x9qbnurymcuvekfjs7stbt2q5' );
define( 'LOGGED_IN_SALT',   'eufajrikhj1re2s6nnluy0e95q019ebgcezfzvgdhshtdm1hbfra3it6qxvo36ga' );
define( 'NONCE_SALT',       'x7rrqblde8tkgxbctghy16zsvea1b53aklfimlt0gqotcean6uzwffiswp3irugm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpoh_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'perspectivepov.co.za');
define('PATH_CURRENT_SITE', '/wp/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
