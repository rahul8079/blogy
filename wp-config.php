<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

define('FS_METHOD', 'direct');

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blogy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '.?N:vH*f /_<9[z];kD]bT71>/~duA-D_Jz^Vk&tP^X62oeaTX$~INnN?/n7#,|5' );
define( 'SECURE_AUTH_KEY',  'O(bB%8IIm7YZxgmQT4KqM|#aUAOO0D^K6G}HChYTYd~/xeJj`]_JO|05F54=;BDS' );
define( 'LOGGED_IN_KEY',    'WE^}yU>${$eus6K6PG`-CxV1MY%]:U}K^z7:llEU-EXFr=CwBs&jh8s|(Dn6[Zt5' );
define( 'NONCE_KEY',        'K76rQI5_DU1JbdTf3<Uh<tk$9_ B$=sp*zZ^(% ;VB<4T{3F;*KPz6nVv7YF2]9&' );
define( 'AUTH_SALT',        '/LX-4sUmXk,l.%eOEv`Sz6 L:jj?[!} V}{QEZ*Z <5Oc5a}@]]Le<j!(3o{@7Pi' );
define( 'SECURE_AUTH_SALT', '}*T:mXpfsIQWXH`xW(;{l*BD7=z`y`9lB=^BA =J~/N7iC.RXS%EGqZe}%g,WW$Q' );
define( 'LOGGED_IN_SALT',   'KS|19^@u`YRI.V&[)kyx~ e*7Ur-^U>.4LNRfqEgwY[(]gcU*^x5jAG%Fp!4!=jH' );
define( 'NONCE_SALT',       'bu]tlYD^.+3hgX]2k&Otlb8c|xTY2} {T%HkY:YB!F9Q~SLB<75vj_#B}hIa_ec!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
