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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'art-clothes_db' );

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
define( 'AUTH_KEY',         'q/!v41q?WE-4zF{DcJ68X_KC+v@_cD F$<zBe;K<cqn)#%.r|Y{Ws~ZZ`*4<@g]~' );
define( 'SECURE_AUTH_KEY',  'Ko#,=p}Ez.XK:Vh.7ApF?k.<W=BN6^l)>prmA(>;*|<m/[|A,54L~[sNOmeouz0j' );
define( 'LOGGED_IN_KEY',    'lX.)qCI}d;Lzv`_wZ!Jp9xfL-kJzQOxxs:P=k]bxh8{ogtUf}=DB>x2$H]G1TJAq' );
define( 'NONCE_KEY',        '>lf*gqMUzrT:I,tWw{I5]:[&&%nZ%Jpi>jR97erb./t7 B@ElG1x5K5mQq,pqp5U' );
define( 'AUTH_SALT',        '1^!aT64v&_4flTH:+U=$Ep2!B),xW#B.68&[Nn6sq*Mei* YB2x(MD<y<n@#DL}m' );
define( 'SECURE_AUTH_SALT', 'hZ}GQ@&&4zG|wRXnc`|lPfTKiikt-C j!QbQ[XV%WA>EVqYNg=,~vx?6$`0ixTZ(' );
define( 'LOGGED_IN_SALT',   '3wir&LQT/@Ih|Y*T28;,qeWHT]FUr-k5wrqKgpI^wMbGL;RcWm<g{63yh.8>FRh!' );
define( 'NONCE_SALT',       'k[j8I ~/5}w*.ctOvPq/qN7gPl~1Gw[DMaCy@nW(LaL1pA!umsLv!:-V*H|PW ]?' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

@ini_set( 'upload_max_filesize' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '90000' );
@ini_set( 'max_input_time', '300' );
