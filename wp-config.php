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
define('DB_NAME', 'raccoonsolucoesweb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>)u@o=(TLh9mS7-(F/Mh^h>zv_QHD1Ht)[6a<,Bm4=`Wqqm2b*z[c!)V?F81w,it');
define('SECURE_AUTH_KEY',  '1JanB1!)pcR>Bhjr9::JXAt-!g7#&M!7TO[Mou,-/!}%KXXf63ZQgE3S/B8+=9Im');
define('LOGGED_IN_KEY',    '#qEn:xe:ok}JFK$4U/Fa^c].HF@^SF>+5^TrPKJyD%^($aFC3^{zNt=rt`RHqNWm');
define('NONCE_KEY',        'C^]E,rAe%PAnp*PF%rP)z!SygN)REf):GU0#6v^xq|Z-e4V@a?IJF~Q(Xp!oT?jL');
define('AUTH_SALT',        '`bUI{au,w+Y/q3x#bvSaj[FG]pcWYrTy3M%tpX|o*AzpY$Zke}$nWJNv%%R ~.:/');
define('SECURE_AUTH_SALT', '-2V>)T=Q~p#[I<eo%35l5.aL38/oiU5TM:MAZS=V$kS>:?RcoH[s>$B+h~$0|@x@');
define('LOGGED_IN_SALT',   '^MPJrM%NP@;sN0BTtp{$.tK~&*<1N e7[:Q/=Iq()a^[`QM7?x@_7P>7KNjE+Yj ');
define('NONCE_SALT',       'ZtcLyP,`ae*h yq!^-YSkus]3t!^8Z<*bk:M|1 &PW%n%;Iv)[i.IA!z1c3sd|%R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
