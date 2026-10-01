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
define( 'AUTH_KEY',          'iCK=ht=&ZEN}%|~`Vg?ZFb5+/e;>xv<REgdKf7#L-U;okE/t6DGm>oa*?hm+jNL/' );
define( 'SECURE_AUTH_KEY',   'L2~#{WkXx6YMS:0?b-z)oIVg2,}J<l}Tk@=+xpProprUO3`<uFlI|},Z^6(/ri[N' );
define( 'LOGGED_IN_KEY',     'hlanr$+*}2G{jP3jPFB}fo*Vv(V.FHAW{?%-MhAtytJhL4n)S~J<]N$;wgPY$+uE' );
define( 'NONCE_KEY',         'Q;)RylY/,2}(~WFd7j_ZU^PeQLlZXtp51Rb}_f*lT~x_%Gi%F_nK!isf9.|S%oN/' );
define( 'AUTH_SALT',         'vjV.ocv,j}k! No@d.rMyRB2NvWT-q||u^!Q8z@-)mcpf]$aNs]+962|d=h/^e&z' );
define( 'SECURE_AUTH_SALT',  '[`ssyHUtO9j8G7oSl$YDCpW5`fG-vL*:G#:MurL~E$*uGZ9F^YU(8.G?<d[*9<wZ' );
define( 'LOGGED_IN_SALT',    'gL#b}Zpg.NL`0I`ivb$-d7nZQ<{rMyS~=?`0f3nNRuq3Oyphfru>?o4=S<~d@^B#' );
define( 'NONCE_SALT',        'Znqx58Rd3|bltsMez0r?Cgvh[<OA<{|H(N!Q)3U97+i6*Q>k%GKPANu-n+d<qk ]' );
define( 'WP_CACHE_KEY_SALT', 'tEN:0E%GRM|G=[$J0H~JARu?.+2YvUd,x&oC*:TWPKSJfT}#riL!E6+]BtLsq%7 ' );


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
