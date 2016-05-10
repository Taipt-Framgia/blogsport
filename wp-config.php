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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'blogsport');

/** MySQL database username */
define('DB_USER', 'blogsport');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'f=/d-X8bwon}x:brp{Y]nx]]qe(^+86H|`Nq(TPlR-Dn|K601}D,j5Vw%WsNo1AG');
define('SECURE_AUTH_KEY',  'tqg/@INE*S`QIT2a2:0%f4*NfN|aSJe5Ztqiwti4W8zh8(hwP_8<%(}hlnm}z8Z(');
define('LOGGED_IN_KEY',    'Fna {EO_!l3rU(_bE=Zpj8$RF&ZkGl.jH{po&QGJ~<i)}A-5Pjx`Rf76yo|%a|9/');
define('NONCE_KEY',        'apA;u^apkEP4`gcH7<ob+s8~tsf@]-KxkopzbRQhUr-lxKRIx/wTS&N16,8?yR-[');
define('AUTH_SALT',        'id>V&OW;ZZ~N6agxyMkBy:8Ko)im_u[tv(3=$7LXVH:KbsVYrx&dPo`Pl>rvm@Ch');
define('SECURE_AUTH_SALT', 'W%BcwKYkD-fyGG$]p2/x>9oE5#5Mb2C$<w&yj_=r{y_YYA&jyhBL-XY4j;+fZGJk');
define('LOGGED_IN_SALT',   '9G5l[Z.A>7t}I5{2a?ni;>3w,KEa,;A$lEv/N+.h)@8UMksIvBD]m(#!D=inU c^');
define('NONCE_SALT',       'l}Qnp<]LOj5-Uh;{[N7hyK9B^:rwFgF+HQ*,oEfWysK4L+Z9&__=A`;vXvpkzaC;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);
/** define for debug bar */
define('SAVEQUERIES',true);
/** ftp setting up */
define('FS_METHOD', 'direct');
define('FTP_BASE', '/var/www/html/blogsport/');
define('FTP_CONTENT_DIR', '/var/www/html/blogsport/wp-content/');
define('FTP_PLUGIN_DIR ', '/var/www/html/blogsport/wp-content/plugins/');
define('FTP_USER', 'FRAMGIA\phung.the.tai');
define('FTP_PASS', '26031991tai@');
define('FTP_HOST', 'localhost');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

