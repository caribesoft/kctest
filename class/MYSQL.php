<?php
	date_default_timezone_set('America/Merida');
	class MYSQL
	{
	const SALT = "";
	
	private $servidor = "mysql:host=127.0.0.1:8889;dbname=knowledge";
	private $usuario = "root";
	private $password = "secret";
	private $Conexion;
	private $Consulta;
	private $tmp;
	
	function __construct(){}
    
    function __destruct()
    {
        $this->Conexion = null;
        $this->Consulta = null;
    }
	
	private function Conectar()
	{
		$this->Conexion= new PDO($this->servidor, $this->usuario, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$this->Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if(!$this->Conexion)
			return false;
		else {
			return true;
		}
	}
	
	private function desconectar()
	{
		$this->Conexion = null;
		$this->Consulta = null;
	}
	
	public function Consultar($Consulta)
	{
		try
		{
			if(!$this->Conexion)
				$this->Conectar();
			
			$this->Consulta = $this->Conexion->query($Consulta);
            //echo $Consulta."<br>";
            //$this->_log(1, "Consulta: {$Consulta}");
		}catch(exception $e)
		{
			$this->_log(1, "Consulta: {$Consulta} -- Error : {$e->getMessage()}");
			return false;
		}
		return true;
	}
	public function Consultar2($Consulta2)
	{
		try
		{
			if(!$this->Conexion)
				$this->Conectar();
			
			$this->Consultar2 = $this->Conexion->query($Consulta2);
            //echo $Consulta."<br>";
            //$this->_log(1, "Consulta: {$Consulta}");
		}catch(exception $e)
		{
			$this->_log(1, "Consulta: {$Consulta2} -- Error : {$e->getMessage()}");
			return false;
		}
		return true;
	}
	
	public function ObtenerArray()
	{
		if($this->Consulta != "")
			return $this->Consulta->fetch(PDO::FETCH_ASSOC);
		else
			return false;
	}
	public function ObtenerArray2()
	{
		if($this->Consultar2 != "")
			return $this->Consultar2->fetch(PDO::FETCH_ASSOC);
		else
			return false;
	}
	public function ObtenerObjetos()
	{
		if($this->Consulta != "")
			return $this->Consulta->fetch(PDO::FETCH_OBJ);
		else
			return false;
	}
	
	public function ObtenerUltimoID()
	{
		if(!$this->Conexion) 
			$this->Conectar();
		
		return $this->Conexion->lastInsertId();
	}
	
	public function FechaMYSQL($fecha)
	{
		$fecha = str_replace("/", "-", $fecha);
		preg_match( "/([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})/", $fecha, $mifecha);
		if(is_array($mifecha) && count($mifecha) > 0)
			return "{$mifecha[3]}-{$mifecha[2]}-{$mifecha[1]}";
		else
			return ""; 
	}
	
	public function FechaNormal($fecha)
	{
		preg_match( "/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/", $fecha, $mifecha); 
		if(is_array($mifecha) && count($mifecha) > 0)
			return "{$mifecha[3]}/{$mifecha[2]}/{$mifecha[1]}";
		else
			return "";
	}
	
	private function _log($numero, $texto)
	{
		$fp = fopen(dirname(dirname(__FILE__)) . '/log/db.log','a');
		$Mensaje = "[".date("Y/m/d H:i:s")."] [$numero]: $texto \r\n";
		fwrite($fp,$Mensaje);
		fclose($fp);
	}
	
	function getBaseUrl() 
	{
		$protocol = 'http';
		if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) 
		{
			$protocol .= 's';
		}
	
		$host = $_SERVER['HTTP_HOST'];
		$request = $_SERVER['PHP_SELF'];
		return dirname($protocol . '://' . $host . $request);
	}
	
    function getLink(array $links, $type) 
    {
        foreach($links as $link) {
            if($link->getRel() == $type) 
            {
                return $link->getHref();
            }
        }
        return "";
    }
}
?>





