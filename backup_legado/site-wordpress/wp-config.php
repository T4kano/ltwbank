<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'ltwbank_site' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'ltwbank_root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'Ban9002!@' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4y7O>B?w~(M;RU/lAtW4hnMsA:T(&PIIIH^7YAPU8C]dZ1DYse/0U/rd#LI|I*Bt' );
define( 'SECURE_AUTH_KEY',  'gD#o=&8+G9xJ.&;vbC,`>[0jh}aP1p|Ay|hV,Xg$:uC{QzlxIO1_YgG{;P#<{WCX' );
define( 'LOGGED_IN_KEY',    '=w:6ZV:Wp_W@aL!oZ*;.<z+nD7A@R+]d3%lKM~)1}0M/1_37<hcKj9r@cXU:4Zoz' );
define( 'NONCE_KEY',        '-;[.:}S9><X.c:IcjAgg~i&zI`LPdbWn$)E#H0;10=}ic*`?dmt9/ mC?{NMxsy!' );
define( 'AUTH_SALT',        'd23r>kb;`et~FJWWnR6UTaJaN9si{L?NG3;{Z/<3BHIQDmhKSre bJGt7=*Tk];a' );
define( 'SECURE_AUTH_SALT', 'YCEL0W7QSG3H2J8cm]7`27}ynXW70O!Ss*O`&;pWB8/p.OFg#*0<gZr>OzZ<PM9A' );
define( 'LOGGED_IN_SALT',   'zPLcy(y!tO[FfVYgn0Ru9j.ol9v*?^InLhA:>AsCPI~MhUT^)zkFk%ARJFJJhfED' );
define( 'NONCE_SALT',       'Kgw`0?2#cH<6@zx8Q=ZrU^9S,=rhgFEkKlu:lrn3`<VUS_3hG,sTB~W~YX|t6o!E' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'lb_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
