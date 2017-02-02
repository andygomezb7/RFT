<?php
include 'PHP/rft_sistem.php';

    define('TS_ROOT', realpath(dirname(__FILE__)));
    define('TS_HEADER', TRUE);
    define('TS_CLASS', 'PHP/class/');
	define('TS_EXTRA', 'ext/');
	/* DEFINICIÓN DE CARPETAS PARA SUBIR ARCHIVOS */
    define('TS_FILES', 'arc/');
    define('TS_CO', 'arc/co/');
    define('TS_HE', 'arc/he/');
    /* FIN DE LA DEFINICIÓN */
    define('TS_PHP', 'PHP/io/');
    define('TS_TEMP', 'PHP/templates/');
    set_include_path(get_include_path() . PATH_SEPARATOR . realpath('./'));

/* INCLUIMOS LOS ARCHIVOS CLASS */
include TS_CLASS.'/global.class.php';
/* DEFINIMOS VARIABLES DE CLASSES */
$tsGlobal =& tsGlobal::getInstance();

include TS_CLASS.'/user.class.php';
$tsUser =& tsUser::getInstance();

$tsUser->read();
?>