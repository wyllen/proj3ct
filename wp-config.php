<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'proj3ct');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '11OnI-DN7?Q[%a ?:zL_,5Ms:]sf+:^x/J^0J{KwB?bduG 0s%AV@h3<Q@dk@ D)');
define('SECURE_AUTH_KEY',  'DzR@K) pw`6+xAPlQzbOp0<TS7hb`f1$8K*pKQrs|6)QN&phpKGS1Ur$EIrG|(2Y');
define('LOGGED_IN_KEY',    'B1!SS#m|F!L|zC1Uct=1@cp-fU43<DzvSR0R9lMK>}{Q~C+E+R&+u$~xnZEL| .@');
define('NONCE_KEY',        '^tk7@JC3I(Fn+}9QT%5dd:Ww~X1+N}q6!n;EjHmJ;0[$fIV9O+5z9lIZ8X%dYZT}');
define('AUTH_SALT',        'jEw0FX>ajKm6H*f44|^!F)Rl0OM4_lWQh=G9D[g;7AN/_5:f=+W/r7mxj*-Zg(r^');
define('SECURE_AUTH_SALT', 'vtQmU}Zx$Mbeqmz0-QCd,sGB|>p{1UV)sq> >HxY[J#`7Ra)<a|5KG=5/oRZ^zSu');
define('LOGGED_IN_SALT',   'M8>V6P.H(-o>+=EIcg-Z-JqFW3YcReRE|!qYjx3|ToRJ29mm4Ajc_[Hb-.3|*qQz');
define('NONCE_SALT',       'WxwoLOS<9$UH|[Gg&x^|V/jFcwi6W!^a^!zF4AM3l/l9nd#Wlu{jQ~2Jid,C@Kx7');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'p3_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');