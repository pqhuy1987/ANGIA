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
define( 'DB_NAME', 'baochi' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '}%s^t}E26M7JHL>B| }-u|cL]0j&6W[zf{_t)$vfK`X3R(&xc~jdHyU;{-5<`j`d' );
define( 'SECURE_AUTH_KEY',  '?>SQ9nO5e,k%$M`8mk{825SIMYCmi3E+_q)]=HT#NgoZ&DLnXj1pfaiv^0JCHI}h' );
define( 'LOGGED_IN_KEY',    '+H[^Gwa&KK/M@vM&UwC#kLP6)8l5Cy:357oD!@ gyU[3BxS`?A!U[(-s?JMmoEX8' );
define( 'NONCE_KEY',        'J,<wYE!z|Ot3JNzp^`+JN2)T|~)!@o]`<,99]2(u%33de]m26eCY?C^u`Z,&Epff' );
define( 'AUTH_SALT',        'jMw$|,/@f)nb~6eJEnSA#BENpR$qwm)1(<_;S$kl3_h4k?~,M M&`P#|YH2`V?<~' );
define( 'SECURE_AUTH_SALT', '2J.hBtlZJeQ#yVRNN.;=3:JE@Z^@j)O:|*s;#Nzu%ud9t[p$=sWh-|(lkcE=KJy[' );
define( 'LOGGED_IN_SALT',   'GpiQk!O&wt9C=hQ!znmP|d)kg&?cNC:*zQJ+6nyKV>hoHo>NaK_ bIY@hs*}O5t(' );
define( 'NONCE_SALT',       'i] x>*bZA/:)Q``Pqzq5N1+$J_bVia%7Y./Q 9%UP67$x%z-DLtx{-}9Gqz-BF?Q' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
