<?php

/**
 * Se genera un listado de los item descrito en el documento mostrando la aplicaciones de al menos un elemento de cada sector
 */


// a.	Array 

        // devuelve la cantidad de array en un elementos
        $autos=array("Volvo","BMW","Toyota","Mercedes","otro");
        echo count($autos);

        // Ordena los array de forma ascendente de acuerdo al valor de menor a mayor
        $age=array("Peter"=>"35","Ben"=>"27","Joe"=>"43");
        asort($age);

        foreach($age as $x=>$x_value)
        {
        echo "Key=" . $x . ", Value=" . $x_value;
        echo "<br>";
        }



// b.	Calendar 

        // saca el dia especificado que se esta mencionando a traves del tiempo del mes y el año

        print_r(cal_info(0));

        $d=cal_days_in_month(CAL_GREGORIAN,2,1965);
        echo "Fue el dia $d de febrero del año 1965.<br>";

        $d=cal_days_in_month(CAL_GREGORIAN,2,2004);
        echo "Fue el dia $d de febrero del año 2004.";


// c.	Date 
        // creación de la fecha para dar formato a una fecha especifica
        $date=date_create("2023-04-15");
        echo date_format($date,"d/m/Y");

// d.	Directory 
        // saca la ruta del directorio
        echo getcwd();


// e.	Error 
        // esto es para trabajar con los errores que pueda traer en el codigo al momento de depurar, usualmente hago eso yo por lo menos, generando un archivo en la carpeta principal
        error_reporting(E_ALL);
        ini_set('ignore_repeated_errors',TRUE);
        ini_set('display_errors',FALSE);
        ini_set('log_errors',TRUE);
        ini_set("error_log", dirname(__FILE__)."/log-php-error.log");

        error_log("========= INICIO DE LA WEB =================");


// f.	Exception 
        // se crea capturas de error cuando la ejecución del codigo no soporta o hay algun error como exception capturando el error y gatillando el mensaje, se ocupa mucho al momento de ingresar datos a la bd o conección en ella
        function divide($dividend, $divisor) {
            if($divisor == 0) {
            throw new Exception("División por cero ", 1);
            }
            return $dividend / $divisor;
        }
        
        try {
            echo divide(5, 0);
        } catch(Exception $ex) {
            $code = $ex->getCode();
            $message = $ex->getMessage();
            $file = $ex->getFile();
            $line = $ex->getLine();
            echo "Exception capturado en $file en la linea $line: [Code $code]
            $message";
        }


// g.	Filesystem 

        // ruta de un archivo cualquiera
        $path = "/testweb/home.php";
        //mostrando el nombre del archivo
        echo basename($path) ."<br/>";

        //mostrando el nombre del archivo, pero corta la extención del ".php" files
        echo basename($path,".php");


// h.	Filter 
        // los filtro siver para asegurar una limpieza del codigo por codigo de inyección de codigo malisioso o validar en este caso el mail si esta bien escrito
        $email = "john.doe@example.com";

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email es valido la dirección de e-mail");
        } else {
        echo("$email NO es valido la dirección de e-mail");
        }

// i.	FTP 

        // Asigne espacio para un archivo y cargue el archivo en el servidor FTP

        // conectar e iniciar sesión en el servidor FTP
        $ftp_server = "ftp.ejemplo.com";
        $ftp_conn = ftp_connect($ftp_server) or die("No pudo conectarse a $ftp_server");
        $login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

        $file = "/test/myfile";

        // asignar espacio
        if (ftp_alloc($ftp_conn, filesize($file), $result))
        {
        echo "Espacio asignado en el servidor. Enviando $file.";
        ftp_put($ftp_conn, "/files/myfile", $file, FTP_BINARY);
        }
        else
        {
        echo "¡Error! servidor dijo: $result";
        }

        // cerrando la conección
        ftp_close($ftp_conn);


// j.	JSON 

        //Almacene datos JSON en una variable PHP y luego decodifique en un objeto PHP: se trabaja mucho en API
        $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
        
        var_dump(json_decode($jsonobj));


// k.	Keywords 
        // hay muchos elementos en esto hay mencionare dos el echo y empty
        $str = "";
        if(empty($str)) {
        echo "la variable se encuentra vacia";
        }

        // otro ejemplo es el for
        for($i = 0; $i < 10; $i += 2):
            echo "$i <br>";
        endfor;

        // otro  mas
        $cars = ["Ford", "Volvo", "BMW"];
        foreach($cars as $car) {
        echo "$car <br>";
        }

        // ultimo ejemplo
        $a = 4;
        if($a < 5) {
        echo "La variable es menor que 5";
        }

// l.	Libxml 

        // en este caso se cambia el cargador de entidades externo predeterminado:
        // Function de PHP libxml_set_streams_context() 

        $xml = <<<XML
        <!DOCTYPE foo PUBLIC "-//FOO/BAR" "http://example.com/foobar">
        <foo>bar</foo>
        XML;

        $dtd = <<<DTD
        <!ELEMENT foo (#PCDATA)>
        DTD;

        libxml_set_external_entity_loader(
        function ($public, $system, $context) use($dtd) {
            var_dump($public);
            var_dump($system);
            var_dump($context);
            $f = fopen("php://temp", "r+");
            fwrite($f, $dtd);
            rewind($f);
            return $f;
        }
        );

        $dd = new DOMDocument;
        $r = $dd->loadXML($xml);

        var_dump($dd->validate());

// m.	Mail 
        // para envio de un mail
        // El mensaje
        $msg = "Primera línea de texto\nSegunda línea de texto";
        // usa wordwrap() si las líneas tienen más de 70 caracteres
        $msg = wordwrap($msg,70);
        // envio email
        mail("destinatario@example.com","Asunto",$msg);


// n.	Math 
        // redondea el numero al más proximo
        echo(ceil(0.60) . "<br>");
        echo(ceil(0.40) . "<br>");
        echo(ceil(5) . "<br>");
        echo(ceil(5.1) . "<br>");
        echo(ceil(-5.1) . "<br>");
        echo(ceil(-5.9));

// o.	Misc 
        // La miscelánea Las funciones solo se colocaron aquí porque ninguna de las otras categorías encajan.
        // como las variables constantes
        define("HOLA","Esto es un saludo en una variable constante");
        echo constant("HOLA");

// p.	MySQLi
        // Las funciones de MySQLi le permiten acceder a servidores de bases de datos MySQL.

        $mysqli = new mysqli("localhost","USUARIO","PASS","my_db");

        // valida conección
        if ($mysqli -> connect_errno) {
        echo "Error al conectarse: " . $mysqli -> connect_error;
        exit();
        }


// q.	PDO 
        // Conectar a una base de datos de MySQL invocando al controlador 
        $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
        $usuario = 'usuario_bd';
        $contraseña = 'contraseña_bd';

        try {
            $gbd = new PDO($dsn, $usuario, $contraseña);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

  
// r.	Network 
        // Devuelve una lista de encabezados de respuesta enviados se ocupupa para coneccion de envio de API:
        setcookie("TestCookie","OtroValor");
        header("X-Sample-Test: ejemplo");
        header("Content-type: text/plain");

        var_dump(headers_list());

// s.	Output 
        // esta son funciones de salida
        // Algunos navegadores no mostrarán el contenido si es demasiado corto
        // Usamos str_pad() para hacer que la salida sea lo suficientemente larga
        echo str_pad("¡Hola mundo!", 4096);
        // Usar flush() para enviar la cadena al navegador
        flush();

        // Mostrar el resto del contenido tres segundos después
        sleep (3);
        echo "<br>";
        echo "¡Hola mundo!";

// t.	RegEx 

        // Utilice una expresión regular para realizar una búsqueda sin distinción entre mayúsculas y minúsculas de en una cadena se ocupa para validaciones:
        $string = "hola";
        echo preg_match("/h[aeiou]la/", $string); // Devuelve 1

// u.	SimpleXML 
        // SimpleXML es una extensión que nos permite manipular y obtener datos XML fácilmente.
        // SimpleXML proporciona una manera fácil de obtener el nombre, los atributos y el contenido textual de un elemento si conoce la estructura o el diseño del documento XML.

        $xml=<<<XML
        <?xml version="1.0" standalone="yes"?>
        <cars>
        <car id="1">Volvo</car>
        <car id="2">BMW</car>
        <car id="3">Saab</car>    
        </cars>
        XML;
        
        $sxe=new SimpleXMLElement($xml);
        // Obtener el nombre del elemento coches
        echo $sxe->getName() . "<br>";

        // Imprime también los nombres de los hijos del elemento cars
        foreach ($sxe->children() as $child)
        {
        echo $child->getName() . "<br>";
        }

// v.	Stream 
        // Los Stream son la forma de generalizar archivos, redes, compresión de datos y otras operaciones que comparten un conjunto común de funciones y usos. Es decir, se puede leer o escribir de forma lineal, y puede ser capaz de fseek() a una ubicación arbitraria dentro de la secuencia.

        $src = fopen("test1.txt", "r");
        $dest = fopen("test2.txt", "w");

        // copia 1024 bytes en el archivo test2.txt
        echo stream_copy_to_stream($src, $dest, 1024) . " los bytes copiado test2.txt";

// w.	String 
        // funcion que pone las variables en forma secuencial en un archivo o en un string
        $number = 9;
        $str = "Santiago";
        echo sprintf("Esto es %u millones de %s. de habitantes",$number,$str);

// x.	Var Handling 
        // Las funciones de manejo de variables de PHP son parte del núcleo de PHP.
        // devuelve el valor boolean en los diferentes valores si estan vacio o con valores true
        echo "0: " .(boolval(0) ? 'true' : 'false') . "<br>";
        echo "4: " .(boolval(42) ? 'true' : 'false') . "<br>";
        echo '"": ' .(boolval("") ? 'true' : 'false') . "<br>";
        echo '"Hello": ' .(boolval("Hello") ? 'true' : 'false') . "<br>";
        echo '"0": ' .(boolval("0") ? 'true' : 'false') . "<br>";
        echo "[3, 5]: " .(boolval([3, 5]) ? 'true' : 'false') . "<br>";
        echo "[]: " .(boolval([]) ? 'true' : 'false') . "<br>";

// y.	XML Parser 
        // Las funciones XML le permiten analizar, pero no validar, documentos XML.
        // codifica y decodifica UTF-8 string to ISO-8859-1: para envio de info o archivos
        // esta deprecado en la funcion php 8.2
        $text = "\xE0";
        echo utf8_encode($text) ."<br>";
        echo utf8_decode($text);

        // otro ejemplo con XML
        // Archivo xml no válido
        $xmlfile = 'test.xml';
        $xmlparser = xml_parser_create();

        // Abre el archivo y lee los datos.
        $fp = fopen($xmlfile, 'r');
        while ($xmldata = fread($fp, 4096)) {
        // analizar el fragmento de datos
        if (!xml_parse($xmlparser,$xmldata,feof($fp))) {
            die( print "ERROR: "
            . xml_error_string(xml_get_error_code($xmlparser))
            . "<br>Linea: "
            . xml_get_current_line_number($xmlparser)
            . "<br>Columna: "
            . xml_get_current_column_number($xmlparser)
            . "<br>");
        }
        }
        xml_parser_free($xmlparser);

// z.	Zip 
        // Las funciones de archivos Zip le permiten leer archivos ZIP
        // esta funcion esta deprecado en php 8, lo muestro solamente como ejemplo, aunque finciona igual
        $zip = zip_open("test.zip");

        if ($zip) {
        while ($zip_entry = zip_read($zip)) {
            if (zip_entry_open($zip, $zip_entry)) {
            // some code
            // Close directory entry
            zip_entry_close($zip_entry);
            }
        }
        zip_close($zip);
        }


// aa.	Timezones
        // zonas horarias admitidas por PHP, que son útiles con varias funciones de fecha de PHP.
        date_default_timezone_set('America/Santiago');