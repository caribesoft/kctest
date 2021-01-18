<?php 
    namespace Phppot;

     // GET TOTAL PAGES ///
    include 'connect.php';

    // adding limits to select query
    $data = array();
    include_once dirname(__FILE__)."/class/Config.php";
    $limit = Config::LIMIT_PER_PAGE;

	$db->Consultar("SELECT Count(*) AS total FROM students");
	while($row = $db->ObtenerArray()) {	 
		 $totalRecords = $row['total'];
	}

   	$data = array(
   		"records" => $totalRecords,
   		"limit" => $limit
   	);

	echo json_encode($data); 

?>