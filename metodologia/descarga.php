<?php
include '../../portal/class/general.php';
include '../config.php';

// leemos el nombre de archivo que le pasamos          
if (!isset($_GET['id']) || empty($_GET['id'])) exit();

$time = 0.5;                    // Tiempo de refresco, en segundos
$file = basename($_GET['id']);  // ruta del fichero que vamos a descargar

if (is_file($file)) $otros = "\n<meta http-equiv='Refresh' content='".$time.";url=".$file."'>";

//cabecera
include 'cabecera.php';

//cuerpo
echo "
            <!-- Cuerpo -->
            <div id='cuerpo'>
                <div id='mensaje' style='height:100%; width:85%; padding: 50px;'>
";
if (is_file($file)) {
    // Si se encuentra el archivo, alternativa por si falla la descarga automatica.
    $msg="
        <h3>La descarga de su fichero comenzar&aacute; autom&aacute;ticamente en breves instantes.</h3>\n
        <br>Si encuentra problemas con la descarga, pruebe este <strong><a href='".$file."'>enlace directo</a></strong>.\n
        ";
} else {
    // En caso contrario.
    $msg="
        <h1>Error 404</h1>
        \n<hr>
        \nEl recurso solicitado no existe o no se encuentra en la ruta indicada.
        \n<br>Por favor, p&oacute;ngase en <a href='http://www.juntadeandalucia.es/institutodeestadisticaycartografia/bd/contacto/'>contacto</a>
        con los administradores de la web.
        \n<br><br>\n<a href='javascript:window.close();'>Cerrar</a>\n
        ";
}
echo ($msg);
echo "    
                </div>
            </div>
            <!-- Fin Cuerpo -->
";

//pie
include 'pie.php';
?>
