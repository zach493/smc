<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'SMC' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         ']{19r3w4ec:Uvd,|^)kYO[>Cq-C+wT.tDZGhEQ=pKfQC!+uk-FdO{?;p1y40d_EI' );
define( 'SECURE_AUTH_KEY',  'w`iGl{tZY.7mq9FYr.w0t`N,WcAl)GZ_6EEFo3oX+tpACY+;a&^9f_]?siCKf!%U' );
define( 'LOGGED_IN_KEY',    '=2X/hb7uvW>0>)1}bX1MP5hkq+)W(d m-$!NooTU#vXyH+mzE?3~<40G 2Q|yw%l' );
define( 'NONCE_KEY',        'LiVu-G-33$z@aN]l2<=YS1zm)C#YA#)d*dt/6Y;`vYzU}}ciw-L?16HkS#4IDnJ_' );
define( 'AUTH_SALT',        'vAYZj74`C{2zM4sA|S>g~IV|7E.C8Ew&Dc8w<k`RMS;;~Hz8 Fh?E>2A6X|<L[Rc' );
define( 'SECURE_AUTH_SALT', '6(Rjta,=.@-UK|[+7?gl;ZGxBFO`k2dp:{EahlFZAGux#c{ }IPbN?OnpKQ$W/j=' );
define( 'LOGGED_IN_SALT',   '9pzYu5n{HY /jADJGo,$lX!JSPo#FWrq)^?(XR0t(I,m13.uoPrh/<VLLD2lWp!E' );
define( 'NONCE_SALT',       'AGuJz,Mtsss[plG&^(+>X[t}YZ);5OjoV~fkemCTBOy86]4*F2T~L9Lg )dD~*:y' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'SMC';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
