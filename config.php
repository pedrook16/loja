<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/loja/");
	$config['dbname'] = 'nova_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://projects.crddeveloper.com/loja/");
	$config['dbname'] = 'crddev71_loja';
	$config['host'] = 'http://projects.crddeveloper.com/loja/';
	$config['dbuser'] = 'crddev71_admin';
	$config['dbpass'] = 'ba0896@P';
}

$config['default_lang'] = 'pt-br';
$config['cep_origin'] = '72240803';

$config['pagseguro_seller'] = 'pedrook16@gmail.com';

// Informações do MercadoPago
$config['mp_appid'] = '1173267089584114';
$config['mp_key'] = 'yvnv1p6RfzfSFRH5XPhe5l0zMn6VUKnQ';

// Informações do PayPal
$config['paypal_clientid'] = 'AQ9fApNwXUdMQiUIGWsuE5-C5w_Xr2Xqetdxi3CrSh5ZAApxx5cywk0oRt6ZxOZZdcPTDsabC3e13gu4';
$config['paypal_secret'] = 'EMJrTFbSynPxRrycji6IC6Qis32pNIwfcwPCI0OuWLWmOONfHfKOFiNJ3blKVqtMZn3Yt0ut-Z2oPxKl';

$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("NovaLoja")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("NovaLoja")->setRelease("1.0.0");

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setAccountCredentials('pedrook16@gmail.com', 'A3ABB78C867344328A5626FF9D117FCC');
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');
