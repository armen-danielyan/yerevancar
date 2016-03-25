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
define('DB_NAME', 'yerevanc_yerevancar');

/** MySQL database username */
define('DB_USER', 'yerevanc_yerevan');

/** MySQL database password */
define('DB_PASSWORD', 'pA8T8-HP61bM');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'x/|=cAgbPEz!z7`cNR]9roNx@pm%KwIF2h2_2l(1a>d!%S]r+(|T$+,czl(smr-p');
define('SECURE_AUTH_KEY',  'a>;[#-/@:3|gD7VwS[j}%^WMOFB]%D$#>Hzf[_8_KG_mJ-eJ3/lCk_.n[n?l~zgR');
define('LOGGED_IN_KEY',    'Pn7C1$9yZJ05}|8m/Q>b[3zY%x-U1>5v[RJwk-$/?KZ2>;FrSC65*xy/94pIJa=u');
define('NONCE_KEY',        'yv$wLY+(=@}=i3@u;6{O<bm?:}Tc9voV)>26+$;M}&;z^Ejb@9!Ud9`l_II!cIG!');
define('AUTH_SALT',        'ZlFl3zWAz?V=)rVwQ=qTMTC[#zd$J?#,E&uhl Av>~N?O2AN(3CQP.-y 9vth5s}');
define('SECURE_AUTH_SALT', 'aIU}4[ff5b+!Q+ihYW_ftK-kGqE^7$/lidg~oinRpgWt~A9|W5n0cN42TzIaK|TA');
define('LOGGED_IN_SALT',   'pE)@0hr[U+iR^+eT`>%RE9yoDDL4ns02;p9?Zb*H?%;[@0)-a.VH 0+?IEQc&!UW');
define('NONCE_SALT',       'dSgBW6Wjnl]s^hd5Z;(PX)%,!_^zDKJ+)9!gH,q+)((=eq-k(y1v``@2U~>]_<?R');

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
require_once(ABSPATH . 'wp-settings.php');//Disable File Edits
define('DISALLOW_FILE_EDIT', true);