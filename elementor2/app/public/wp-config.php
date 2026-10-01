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
define( 'AUTH_KEY',          '/f3&|>lkps@2q#Z$1*:)%IWF}YeCLGb8t!ojKckKrVU,MRw}=R?W_UzXwE$+,nkJ' );
define( 'SECURE_AUTH_KEY',   '8AImgpI#^j=^sG{~2s+q={JN^(A!fb0+{6&uEnl!rR qv>~{i8[T:zZ$A&#mL&|(' );
define( 'LOGGED_IN_KEY',     'Z6!~{/yMoy.e<&k a7=nXtjjYG5ZPB!P[7%]qL1OthUYo)|he[;G<=1:mrIAPk+k' );
define( 'NONCE_KEY',         ';r8#u}gB`H9^XaB3~KuJDyB(.j*3(;R5I~Ej2Yq{Y>,*6}@QewtoM9M?TQIiby+$' );
define( 'AUTH_SALT',         'FzFwK=NtiKlRN?}#&n{Fn>z[kmY0adTc2Qinmx]Rv4=l[^v!||G6>5jAgb+y#h^v' );
define( 'SECURE_AUTH_SALT',  'TK-TYi:,_i5{%Z`8i)qJvH5`5Brb=EIO1,bG3dH/_}>3=?lj.|2sda~`K?YI||HT' );
define( 'LOGGED_IN_SALT',    'aEaOM*{VK$-M0X,k~!Ktd}T|pS_?p*c_hqT%-YgoA]lIx5~/??J:C4G@^8OVQh-Z' );
define( 'NONCE_SALT',        '.[zyR.,]Upqh %/+!=QMbYYCP/]}ZKxE=)96aV2`k2;5$=7_UQ(rM0]rZhAD/C+_' );
define( 'WP_CACHE_KEY_SALT', 'XJ6&8dA%7YS)J8No8Dru.DVgxNU-N?,76L/8r.n9 D7%,|#aF/XcD/_1,ANR-CvC' );


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
