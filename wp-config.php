<?php
define( 'WP_CACHE', true );

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
define('DB_NAME', 'adam-ben-filmmaking');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'FbCceJwaAii+Wjst8W1VZSUViMcuuEEi3ed5uxqtayUR4G36wXQP1/8l488+');
define('SECURE_AUTH_KEY',  '9ENJz7GZ/iK1SUCjVMsF8yDTP9phXymY+/CooSNEqeo6B38qUeV/C4/rj7Th');
define('LOGGED_IN_KEY',    'XpI2/Zw0HUa/G/9cJnJ5fVcHDycJO642Vd6EQO9eJtIYmCaVEWVm6cJIr35B');
define('NONCE_KEY',        'tHWCAHQjtqsOpwAoE286aMwvUGx2B88Qs7+WtNfcITcoQ7Wj3oDPiPhsbPA8');
define('AUTH_SALT',        'aBYfrhn/4qtNKKQLZUkYhdCAQfNhyP7TmfYigzojCltbs6N2Dzl6rkE+I89x');
define('SECURE_AUTH_SALT', 'UkWCZhWZlv19fS14SQXPmSaK0c/csFirArxX7W83TI8Bx+lETII919jrxt8B');
define('LOGGED_IN_SALT',   'tS0dEVj1Tnu5hgdwiWSyEtmFt4gB0sMJOYelogW5nMSaKy5DGf78guUt7sWK');
define('NONCE_SALT',       'XkeCR2V/vxlcxgEgmSKT63kGb6NndFVHgWzQBLnN7U+JmCWhP62cs10iSs9V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mod237_';

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
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false);

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
