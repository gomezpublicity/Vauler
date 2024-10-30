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
define( 'DB_NAME', 'vauler_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '|@21.~C_>Q {QFO#0KwuMx)~s&GW2ZdjaHe#b9eg8BvX,$Sv6Ah@`zI]SJT_zV!$' );
define( 'SECURE_AUTH_KEY',  'GJfhY$7pM4.eu`H%;p42}h*!k#(bQ7i|BOzch6^/u{b|zcLd)3OF!A[X?Lo MbTp' );
define( 'LOGGED_IN_KEY',    'Hd=~`>R_*6Oz)~%VH*z#*c{[L,GC5G$CjJRHd[C7I{$0#vE(nNdx4-n/.mlyI9l-' );
define( 'NONCE_KEY',        '>:1==/qqw_=Q>y*:e=0^ L_[ZVDgn_.usLNlLL6EE}xVm2=k^(c~<J } $XT?C1g' );
define( 'AUTH_SALT',        '#.(ryr?0_a/=d~k;<Beiqc8?}h sEr]}4VOHt_,cSlt_o[awl2qxy1)8n#E|,s9,' );
define( 'SECURE_AUTH_SALT', 'Faa@D7MyZc>X@*t,7HgBr&ynUiu{$OV@$#CzXR:NVqNa^r=KAu(n[tO>3&kC~%S:' );
define( 'LOGGED_IN_SALT',   'OXC37uMFnA?EKDN_e?_I?qw|-Lgw*Hii.`M!};<:aIypDy{o@PtH<P._HlbU|%p-' );
define( 'NONCE_SALT',       'OVbAXk:4B|Q(84X%psjQp(DG%OdrXVt6PzfA?Q<p~:^%_ CLdy}9JBK05|*I+TmH' );

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
