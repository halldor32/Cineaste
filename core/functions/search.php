<?php
// dbcon
try{
	//  82.148.66.15   GRU_H5   foxyboxy1337
	$pdo = new PDO('mysql:host=10.200.10.24;dbname=gru_h5_movies', 'GRU_H5', 'foxyboxy1337');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec('SET NAMES "utf8"');

}

catch (PDOException $e){
	
	echo "tenging tókst ekki". "<br>" . $e->getMessage();
	exit();
}

/************************************************
	Search Virkni
************************************************/

// skilgreina Output HTML Formating
$html = '';
$html .= '<li class="result">';
$html .= '<a href="urlString">';
$html .= '<h3>nameString</h3>';
$html .= '<h4> (functionString)</h4>';
$html .= '</a>';
$html .= '</li>';

// ná í search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);

// gá hvort stengurinn sé meira en 1 á lengd
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	
	// Leita í gagnagrunninum
		$query = $pdo->prepare("SELECT * FROM movies WHERE name LIKE '%".$search_string."%' LIMIT 5");
		$query->execute();

		// setja niðurstöður í array
		while($data = $query->fetch(PDO::FETCH_ASSOC)) {
		$result_array[] = $data;
	 	}

	// gá hvort leitin hefur niðurstöðu
	if (isset($result_array)) {
		foreach ($result_array as $result) {

			// Formatta Output strenginn. setur bold á niðursöður sem passa
			$display_year = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['year']);
			$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['name']);
			$display_url = 'http://tsuts.tskoli.is/hopar/GRU_H5/movie.php?movieID='.urlencode($result['movieID']);

			// Inserta nafn
			$output = str_replace('nameString', $display_name, $html);

			// Inserta ár
			$output = str_replace('functionString', $display_year, $output);

			// Inserta URL
			$output = str_replace('urlString', $display_url, $output);

			// Outputta því sem er komið
			echo($output);
		}
	}else{

		// Formatta þegar engar noðurstöður voru fundnar
		$output = str_replace('urlString', 'javascript:void(0);', $html);
		$output = str_replace('nameString', '<b>Engin niðurstaða fannst.</b>', $output);
		$output = str_replace('functionString', '', $output);

		echo($output);
	}
}
?>