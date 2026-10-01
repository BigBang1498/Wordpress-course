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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ':@rVw_}DPA*>T/HE/&_bouxM $4$ F$9{0Ue=lo+Jlk6)x0?kQ$$=k`GqMLILOI$' );
define( 'SECURE_AUTH_KEY',   'Q-[)+O6yW5PTjRdp[=>FZrscG-.xIJ?B1y7$);X)c*K..pyhEm(wkc`o[O6IZdo<' );
define( 'LOGGED_IN_KEY',     'qyeivZvo?P8YhjNZ7#?eY.6co;BAWt@N2l7czc#=pqpMfZDNO-L@obu{9M^zUo@!' );
define( 'NONCE_KEY',         '<EZ|5EeVtr39fYVtwcs<)S}l /[hI:@6K%E2RLhUyW pHWGJsIl$3>n}>tF_m8GB' );
define( 'AUTH_SALT',         'B9U)e<Qm=~I G{eUHPvn,}c:lh6E)nl/TY@(z, e<K.O5@jRxY[skr^VUPQGNsMW' );
define( 'SECURE_AUTH_SALT',  'qMcs|6_8LDRkMYJ2q3r&st:l/#}P{& 1pp4GLjudYOUyIdW$XwZ{f#o.,mV3{Xd9' );
define( 'LOGGED_IN_SALT',    'eKY*8}J5R60/{?CE+pPpl_ra7DwR11 G!h1.Eum<4SU, &n(?Ed=N{owZib}]_sW' );
define( 'NONCE_SALT',        'FPNc,7X`q!p8N%vWg^I}f#n2t)Y@?hq:$sI2Q]Ca`ykXS&xKrl/s38mI>jqFG,Yx' );
define( 'WP_CACHE_KEY_SALT', 'Xbxmxl)$^pcEI3W5iM+z6dfO#8z->cROAeDlyGM2&@Qb_To}Tv7L=~o~uchj2ZZ&' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
