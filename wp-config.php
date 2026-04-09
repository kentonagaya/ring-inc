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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "LAA1546973-ring" );

/** Database username */
define( 'DB_USER', "LAA1546973" );

/** Database password */
define( 'DB_PASSWORD', "b6HPzDpn" );

/** Database hostname */
define( 'DB_HOST', "mysql216.phy.lolipop.lan" );

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
define( 'AUTH_KEY',         '%JQRpB[obT/G0x4Yc:~B+yl^e]>J}M,nhu=mNUA6A#O7zcF*a|W-eiugE.I;R~Px' );
define( 'SECURE_AUTH_KEY',  'b9W!}UU+Y!mzy8i3dsODD4BTthJXaz|,%,W=_pc5Xo}pK~]]EV?oY@:sD>qWH4?O' );
define( 'LOGGED_IN_KEY',    '2q@?p5;fGMKc).uG-Y`hWu{Zc+vj#dfuUfp{;Y+hqEqZ SlFptl6YPs^yy/:jc*T' );
define( 'NONCE_KEY',        'U#E0_ a;!Dvo2vu>p>]b3tseo]QV7kwbCt<l`~DkB=kn~-vRFe-udgtjYY3E49rX' );
define( 'AUTH_SALT',        'KpLyfQ3RbLt%RBxq/;NnA(xLPD#&~q0uU`:Bw+_M5s8J>rw}VMvVlGOjG63)#hD8' );
define( 'SECURE_AUTH_SALT', ':naZ-nNqPYtKsmP2(Bc0P_`q{<2NvDWml[4@F`OS$H|zji-/@_=]/wGx;^I9j0cM' );
define( 'LOGGED_IN_SALT',   '6sd$xqq4NCxAt)C!PAoLdh.}&MV.5KRK-y-DttH4)`yi4)zNDY4jt=ydB+C]g HQ' );
define( 'NONCE_SALT',       'Xk^ SMkYv5QIm:.b,~[@u*|pl4u<eYaY_9ZUW[-&14Tnf[#4bkZT;+&$_`3:99h7' );

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



define( 'WP_SITEURL', 'http://ring-inc.com/' );
define( 'WP_CONTENT_DIR', '/home/users/2/boo.jp-ring-inc/web/ring/wp-content' );
define( 'WP_CONTENT_URL', 'http://ring-inc.com/wp-content' );
define( 'WP_PLUGIN_DIR', '/home/users/2/boo.jp-ring-inc/web/ring/wp-content/plugins' );
define( 'WP_PLUGIN_URL', 'http://ring-inc.com/wp-content/plugins' );
define( 'WPMU_PLUGIN_DIR', '/home/users/2/boo.jp-ring-inc/web/ring/wp-content/mu-plugins' );
define( 'WPMU_PLUGIN_URL', 'http://ring-inc.com/wp-content/mu-plugins' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/wp' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
