<?php

// BEGIN Kadence Security - Do not modify or remove this line
// Kadence Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END Kadence Security - Do not modify or remove this line

define( 'ITSEC_ENCRYPTION_KEY', 'Ly9eZitsZ3lNSHJHTCMpMj5tZThKYVMmbCZmbHVEKWI1TzdVKGxZQShhS35iSDoxRXJiTVcrX2p8PUxBJWI3aA==' );

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
define( 'AUTH_KEY',          '`Wv@5Il#nBiH8ki1Rj3:pmIbWnRvNwUj%i800~jV91j/IA{OoI]x:m1#U6qU0BWr' );
define( 'SECURE_AUTH_KEY',   'N%?3kdu*`X7;:k!_!(mTJ6 b|_y{* S8y-Lpn9{$L$u$pxZRiE@YOTSsa%e0fg04' );
define( 'LOGGED_IN_KEY',     'i=D&F4X0K-=:u;G~8>(`Ll%YHU:f1?BEJ*3AuFaTQx5w;wt*d;)Tsi(4/}E*NZjG' );
define( 'NONCE_KEY',         'R+e4f/9!_!,kfag[iTKX;RJ~vk4_$IZx@AeJ4bCOZ7z$20Xt]^CKs+Ej~bXhPX3q' );
define( 'AUTH_SALT',         ')=GjjX-{),.e%8(*R`)kXQC9oOpSVBQn@~gz)%s3t9-.iuF#AxDUYUS*S1lc!~?I' );
define( 'SECURE_AUTH_SALT',  '>0IRmJPa2()PtLEyS(w5#`i)yMp,OP 9g>d91.m%H=A3O?M[Kq`:F=fSw:B{?R=G' );
define( 'LOGGED_IN_SALT',    '$Wpu2?5c^?]O3[u3|r%kpOb$u=MAw(zU[;8uaofON%W$<2$=xwHmj;KK][!|QGj/' );
define( 'NONCE_SALT',        '<oC_Ku?8:93-xLWhf)1;WXAWb*{i9#0}[(K*S]L%Tmj*MC)?$*c*i&iyzx/6>p<~' );
define( 'WP_CACHE_KEY_SALT', 'trkLDqgC >FZNPass%>@0O?$F/8t4{QYTd2gq%2tX[&*|7sH3TO8)p<UzY93Hf-Y' );
define( 'DISABLE_WP_CRON', true );

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
//define('FS_METHOD', 'direct');

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
