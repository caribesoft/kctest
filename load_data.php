<?php
	namespace Phppot;

	include 'connect.php';
	include_once dirname(__FILE__)."/class/Config.php";
    // GET ROWS PER PAGE LIMIT //
    $perPage = Config::LIMIT_PER_PAGE;

    // GET TOTAL ROWA //
	$db->Consultar("SELECT Count(*) AS total FROM students");
	while($row = $db->ObtenerArray()) {	 
		 $result = $row['total'];
	}
	$totalRecords = $result;
	$totalPages = ceil($totalRecords/$perPage);

	// PAGINATION CALCULATION //
	if (isset($_GET["page"])) {
		$page  = $_GET["page"]; 
	} else { 
		$page=1; 
	};  

	if($page == 1) {
		$startFrom = 0;
	}else{
		$startFrom = ($page*$perPage) - $perPage;  
	}

	// USER'S DATA CREATION  //
	$paginationHtml = '';
	$db->Consultar("SELECT * FROM students ORDER BY id ASC 
		LIMIT $startFrom, $perPage ");
	while($row = $db->ObtenerArray()) {	 

		$paginationHtml.='<tr><td align="right"><img src="assets/images/green.png"></td>';  
		$paginationHtml.='<td>'.$row["id"].'<br>';
		$paginationHtml.= $row["name"].'</td>';
		$paginationHtml.='<td>...<br>'.$row["group"].'</td>'; 
		$paginationHtml.='</tr>';  
	} 

	$jsonData = array(
		"html"	=> $paginationHtml,	
		"totalPages" => $totalPages,
	);

	echo json_encode($jsonData); 
?>




