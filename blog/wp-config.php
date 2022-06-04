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
define( 'DB_NAME', 'kerrysco_biofrienddatabase' );

/** MySQL database username */
define( 'DB_USER', 'kerrysco_biofrienduser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'gwOV+$[a1{[e' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '_6uX`,}=aw{@@yq>Yj3H5b/].yb $Zyux~3FlYQy{$h|=op=JO&c[U5~**Oq;#~Z' );
define( 'SECURE_AUTH_KEY',  'Lb$OO/U5tGeVwn~rx~1sE$U6}3MZjvZ2K_):cfZUMxc*vg46O}d}:2wgYAw#^ZMP' );
define( 'LOGGED_IN_KEY',    'o/</M<ZhcGN#N:$)1*!{6P`!oOZ==3XT;,L|3/_-wwF x>Pma:~i?!^2=y(ar|7t' );
define( 'NONCE_KEY',        'e p$/D|7WfP1i<WN*tk!f9s76,m)p0Ntf]kjf3sc#0~evw;OE;<qopB!CwYBMJ[[' );
define( 'AUTH_SALT',        'b*g uZ2?@5>5)%l^E1F2OoYlepX1f&s]^/uQJ@DAu[Av*lk7t[a7h`7q.SBQ=wbQ' );
define( 'SECURE_AUTH_SALT', 'R[a4f5]xcC=OF8jSq]cb8&v;0Tx^-iiM>+gvpH&OcynY5n?>&2W2t70YXBXQ;I./' );
define( 'LOGGED_IN_SALT',   '[f}_2QOC,Gc#2H3mwyG$]7S{uBs~NW.Qv;d/r6NSrNUdRreO7)t^kN>GiIr:+.xk' );
define( 'NONCE_SALT',       'v_0E6rtG$wq^1GR&&[3YpS==Yu#CYI1e|-2(u-P_g9[xRf (,e#Pwb uI7{-S#_3' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
