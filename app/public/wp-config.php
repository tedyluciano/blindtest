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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cz7q3jMoL0LjPImp+zouJSGmywhTgn1kMrEWd1XkMBQ+qxiT1DFD4+rQVKA1XRzBofNAGyWB4zW7i4nfWEa7oQ==');
define('SECURE_AUTH_KEY',  'HbrvgC+c3DJhRl9pyeYbbsc6r8inDWVGmZLqU9pF5NzsayOSM2M0sQ4iUNRve6q0wGpduhrC/ljLtMdwQlN4TQ==');
define('LOGGED_IN_KEY',    'GuxmJP+5va0ez7KXg6zcEGLrsF/GOL+dVTG0tWFxfJk74jexPXE8FAqjSlGO1evDN4/QiZcUWOAjU0fQ4JbZ2Q==');
define('NONCE_KEY',        'qmfOeZIhc89/Mt7niR9X/va9vFLqquZLV5uJ0sXO/XK8fTk1/U62QixSJbOVwKfubog66CWxx7/feOYLII6psA==');
define('AUTH_SALT',        'ruDYBZCWawODGXAJBNtgB0dnZrp6T1ypJFYW2I32SXaWvSWAUjVcaZqkZE8rNtZwQiFcSTieF4j+cW6C8rASlw==');
define('SECURE_AUTH_SALT', 'yuMLDTAgy+IATHkxWz+afR+835O2dp1NmPJIiaHfoIAg7ik6TE/VxBszc895KHK/72BnV/yVeVZcsxZ6IZW6Sw==');
define('LOGGED_IN_SALT',   'iGvMaFe9rAnyKtHFmmXYmo8W55qvA3Y6odtuj/5kfGn7ZzhhSHDz1a8WOO8SvrxCvQoTILSe8REAhfvDYlnSFw==');
define('NONCE_SALT',       'NoZpbvFvTcYnhggNWRN7SBa/p+Df4yJPCZjYyWhI3LYDYQAl/SpL70/NEaynWN//x78o7PIadbwUCTy1cejfPA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define( 'WP_DEBUG', false );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
