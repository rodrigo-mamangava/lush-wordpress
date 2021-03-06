<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'lush-20');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8g;m/d8wJo0G/$>z_(P(o6._,V{Q6-bA>=+TlM@.Q@NmNC-[+voTL2VJ?QcfgsJQ');
define('SECURE_AUTH_KEY',  'gt1a8?O%0XGd&.WW5f9,-7nW;a:7759=G#)(JEWh-tg`K+f%G71rA7croZolk~?K');
define('LOGGED_IN_KEY',    '/Bf~UKx%Y*zVj0CHTGJ#X%:iY<;*tfq_pUco[Cr,25Sgh3nyKkeH]bs3UIQkGAzI');
define('NONCE_KEY',        '43Styvzr~XF0#rdx2AV~UAFJ75eg[?OP^j2diYrO^i7#%^s@o++hzoCl<4S`!(BX');
define('AUTH_SALT',        'GZp91W>z?/1au*7:2FnQ9|{=T)(qm_]5cIE}%eI0*{BPw4YUsp`a_NX:|~~Li!0~');
define('SECURE_AUTH_SALT', 'b=B)$2P(=.@[|{]9;OT]!xyK# oM&1VO-)SW{9wT1QtY11MUnM=cz`bwau.4MiK{');
define('LOGGED_IN_SALT',   'U/VM&vC.<en{9>9(aX!{{Z>FAQ9@X43HsQ{p]f&:wXjQm2/UKHRI5v4(8GzWskg7');
define('NONCE_SALT',       'w]|yx6[7WvyGOib$o+@FU-/aYj:4dg`/d/y/D0=If*uFY+P*Q.r4wx<iQUAjYNw:');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'mmgv_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

 define('WPLANG', 'pt_BR');

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
