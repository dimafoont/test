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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'TPD' );

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
define( 'AUTH_KEY',         '~SY&XT<>b9$hw>cy%|-ES)/ufVO{_=y#~[wC)sUn>LI@Gwvb]F$A~}1?},ju8re^' );
define( 'SECURE_AUTH_KEY',  'U_vWwU=]pkpf6@<8w^sNf9zV`av X3tP!F:)4j?CYy~_5L:zY&P8MZtI&NK$m+JN' );
define( 'LOGGED_IN_KEY',    'Mx]qhQXA=Cp/T/TAMV2hDrVq[u[0dV6cdh#rgy7xRB$KQQM?s3Q*lU71js}UK:<2' );
define( 'NONCE_KEY',        'p;N=~zK4*7(7`d9}XQhzXcCSAN&o:t4hsz$@_I_6=Odwq$cTP93+jtpnB30ma?s|' );
define( 'AUTH_SALT',        '>?lo1w5*lp7NSt(b^uDCwPrK)1`>0RwW3,.Psd~.T!aDL(>Ygs.H2/!~5&5&oF9y' );
define( 'SECURE_AUTH_SALT', 'X(.#L#oS?#H?s6%y<:P3nj8$Fcrp*R;lhO~,Qf,Oq@K}VWX;$hpOXiD~j,R4Poag' );
define( 'LOGGED_IN_SALT',   'QjrHYv.B!6+9|`}S5AT&@jmu*bH}5C_dgpZ=Sf[Pr>%9<EIm}o}Ay*+RXbO?ZM7a' );
define( 'NONCE_SALT',       'nRW)&=Ho}dUK3=o#Z?i=W*m9U5(0qx`o_#b-xoCR2%9-%2o#2m~>luH?504&+ {k' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tpd_';

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
