<?php 
// nær í upplýsingar um kvikmyndina
function movie_data($movieID)
{
	try{
	$pdo = new PDO('mysql:host=localhost;dbname=mb', 'root', '');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec('SET NAMES "utf8"');

	}

	catch (PDOException $e){
	
	echo "tenging tókst ekki(movies)". "<br>" . $e->getMessage();
	exit();
	}
	// skilgreina breitur
	$data = array();
	$movieID = (int)$movieID;
	// nær í breiturnar sem fóru í gegnum functionið
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	// ef fjöldi breita sem er náð í er meira en 1 þá nær það í allar upplýsingar sem voru skilgreindar
	if ($func_num_args > 1)
	{
		unset($func_get_args[0]);
		// implode'ar inn í select skipunina
		$fields = implode(', ', $func_get_args);
		$query = $pdo->prepare("SELECT $fields FROM movies WHERE ID = ?");
		$query->bindValue(1, $movieID);
		$query->execute();
		// nær í array af öllum upplýsingum um myndina
		$data = $query->fetch(PDO::FETCH_ASSOC);

		
		return $data;
	}

}
// gáir hvort myndin er skilgreind
function movie_isset()
{
	return (isset($_GET['m'])) ? true : false;
}
// nær í fjölda kvikmynda sem eru í gagnagrunninum
function num_of_movies($pdo)
{
	$query3 = $pdo->prepare("SELECT COUNT(ID) FROM movies");
	$query3->execute();
	return $query3->fetchColumn();
}
// nær í random kvikmynd
function random_movie($pdo)
{
	$query3 = $pdo->prepare("SELECT ID FROM movies ORDER BY RAND() LIMIT 1");
	$query3->execute();
	return $query3->fetchColumn();
}
function get_movies($pdo) 
{
	$query3 = $pdo->prepare("SELECT * FROM movies");
	$query3->execute();
	return $query3->fetchAll();
}
// nær í tegund frá id
function genre_from_genre_id($genreID, $pdo)
{
	$query3 = $pdo->prepare("SELECT name FROM genre WHERE genreID = :genreID");
	$query3->bindValue(1, $genreID);
	$query3->execute();
	return $query3->fetchColumn();
}
// nær í fornafn leikstjóra frá id
function director_first_name_from_director_id($directorID, $pdo)
{
	$query3 = $pdo->prepare("SELECT first_name FROM directors WHERE directorID = :directorID");
	$query3->execute(array('directorID' => $directorID));
	return $query3->fetchColumn();
}
// nær í eftirnafn leikstjóra frá id
function director_last_name_from_director_id($directorID, $pdo)
{
	$query3 = $pdo->prepare("SELECT last_name FROM directors WHERE directorID = :directorID");
	$query3->execute(array('directorID' => $directorID));
	return $query3->fetchColumn();
}
//nær í mynd frá id
function image_from_image_id($imageID, $pdo)
{
	$query3 = $pdo->prepare("SELECT image FROM image WHERE imageID = :imageID");
	$query3->execute(array('imageID' => $imageID));
	return $query3->fetchColumn();
}
// nær í upplýsingar um random kvikmynd
function random_movie_data($pdo)
{
	$movie_id = random_movie($pdo);
    $movie_data = movie_data($movie_id, 'movieID', 'name', 'genreID', 'rating', 'directorID', 'imageID', 'year', 'info');

    $genre = genre_from_genre_id($movie_data['genreID'], $pdo);
    $director = director_first_name_from_director_id($movie_data['directorID'], $pdo) . ' ' . director_last_name_from_director_id($movie_data['directorID'], $pdo);
    $image = image_from_image_id($movie_data['imageID'], $pdo);

    $new_movie_data = array(
    	'movieID' => $movie_data['movieID'],
    	'name' => $movie_data['name'],
    	'genre' => $genre,
    	'rating' => $movie_data['rating'],
    	'director' => $director,
    	'image' => $image,
    	'year' => $movie_data['year'],
    	'info' => $movie_data['info']
    	);

    return $new_movie_data;
}
// nær í upplýsingar um kvikmynd
function legit_movie_data($get_movie_id, $pdo)
{
    $movie_data = movie_data($get_movie_id, 'movieID', 'name', 'genreID', 'rating', 'directorID', 'imageID', 'year', 'info');

    $genre = genre_from_genre_id($movie_data['genreID'], $pdo);
    $director = director_first_name_from_director_id($movie_data['directorID'], $pdo) . ' ' . director_last_name_from_director_id($movie_data['directorID'], $pdo);
    $image = image_from_image_id($movie_data['imageID'], $pdo);

    $new_movie_data = array(
    	'movieID' => $movie_data['movieID'],
    	'name' => $movie_data['name'],
    	'genre' => $genre,
    	'rating' => $movie_data['rating'],
    	'director' => $director,
    	'image' => $image,
    	'year' => $movie_data['year'],
    	'info' => $movie_data['info']
    	);

    return $new_movie_data;
}
// skilar true eða false ef notandi hefur gefið mynd einkunn eða ekki
function rated_before($userID, $movieID, $pdo) {
	
	$query2 = $pdo->prepare("SELECT COUNT(user_has_moviesID) FROM user_has_movies WHERE userID = :userID AND movieID = :movieID");
	$query2->execute(array(':userID' => $userID, ':movieID' => $movieID));
	return ($query2->fetchColumn() == 1) ? true : false;
}
// skilar true ef að það vikaði að gefa myndinni einkunn
function rating_success($userID, $movieID, $rate, $pdo) {
	
	$query2 = $pdo->prepare("SELECT COUNT(user_has_moviesID) FROM user_has_movies WHERE userID = :userID AND movieID = :movieID AND rating = :rating");
	$query2->execute(array(':userID' => $userID, ':movieID' => $movieID, ':rating' => $rate));
	return ($query2->fetchColumn() == 1) ? true : false;
}
// nær í topp myndir sem eru í sérstökum flokki
function top_movies_from_genre($genre,$pdo) {

	$query = $pdo->prepare("SELECT movies.movieID, movies.name, rating FROM movies JOIN genre ON movies.genreID=genre.genreID WHERE genre.name = :genre ORDER BY rating DESC");
	$query->execute(array(':genre' => $genre));
	$data = $query->fetchAll();


	return $data;
}
// nær í kvikmyndir sem eru með hæsta einkunn
function top_movies($pdo) {

	$query = $pdo->prepare("SELECT movieID, name FROM movies ORDER BY rating DESC");
	$query->execute();
	$data = $query->fetchAll();


	return $data;
}
// gáir hvort flokkur er tómur
function genre_is_empty($genre, $pdo) {
	$query2 = $pdo->prepare("SELECT COUNT(movieID) FROM movies JOIN genre ON genre.genreID=movies.genreID WHERE genre.name = :genre");
	$query2->execute(array(':genre' => $genre));
	return ($query2->fetchColumn() == 0) ? true : false;
}

// nær í random flokk
function random_genre($pdo)
{

	do {
		$query3 = $pdo->prepare("SELECT name FROM genre ORDER BY RAND() LIMIT 1");
		$query3->execute();
		$genre = $query3->fetchColumn();
	} while (genre_is_empty($genre, $pdo) === true);

	return $genre;
}
// nær í kvikmyndir
function top_movies_in_random_genre($genre, $pdo) {

	$query3 = $pdo->prepare("SELECT movies.movieID, genre.name, movies.name FROM movies JOIN genre ON movies.genreID=genre.genreID WHERE genre.name = :genre ORDER BY rating DESC LIMIT 10");
	$query3->execute(array(':genre' => $genre));
	return $query3->fetchAll();
 

}
// nær í leikara sem er í sérstakri mynd
function actor_in_movie($movieID, $pdo) {
	$query = $pdo->prepare("SELECT first_name, last_name FROM actor JOIN movies_has_actor ON actor.actorID=movies_has_actor.actorID WHERE movieID = :movieID");
	$query->execute(array(':movieID' => $movieID));
	$data = $query->fetchAll();


	return $data;
}	
// nær í allar umsagnir fyrir tiltekna mynd
function review_for_movie($movieID, $pdo) {
	$query = $pdo->prepare("SELECT user.userID, first_name, last_name, rating, review FROM user_has_movies JOIN user ON user_has_movies.userID=user.userID WHERE movieID = :movieID ORDER BY user_has_moviesID DESC
			LIMIT 15");
	$query->execute(array(':movieID' => $movieID));
	$data = $query->fetchAll();

	return $data;
}
// nær í rating frá user sem tengjast sérstakri mynd
function rating_from_user($userID, $movieID, $pdo) {
	$query2 = $pdo->prepare("SELECT rating FROM user_has_movies WHERE userID = :userID AND movieID = :movieID");
	$query2->execute(array(':userID' => $userID, ':movieID' => $movieID));
	return $query2->fetchColumn();
}
// gáir hvort notandi hefur skrifað umsögn áður
function reviewed_before($userID, $movieID, $pdo) {
	$query2 = $pdo->prepare("SELECT review FROM user_has_movies WHERE userID = :userID AND movieID = :movieID");
	$query2->execute(array(':userID' => $userID, ':movieID' => $movieID));
	return ($query2->fetchColumn() == NULL) ? true : false;
}
// nær í rating fyrir kvikmyndir
function rating_for_movie($movieID, $pdo) {
	$query2 = $pdo->prepare("SELECT rating FROM user_has_rating WHERE movieID = ?");
	$query2->bindValue(1, $movieID);
	$query2->execute();
	return $query2->fetchAll();
}
// nær í agelimit kvikmyndar
function get_movie_ageLimit($movieID, $pdo) {
	$query2 = $pdo->prepare("SELECT age_limit FROM age_limit WHERE ID = ?");
	$query2->bindValue(1, $movieID);
	$query2->execute();
	return $query2->fetchColumn();
}
// nær í land sem kvikmynd er frá
function get_country_from_movie($CtCode, $pdo) {
	$query2 = $pdo->prepare("SELECT CtName FROM countries WHERE CtCode = ?");
	$query2->bindValue(1, $CtCode);
	$query2->execute();
	return $query2->fetchColumn();
}
// nær í tegund fyrir kvikmynd
function get_genre_for_movie($movieID, $pdo) {
	$query2 = $pdo->prepare("SELECT genre_Name FROM genre JOIN movies_has_genre ON genre.ID=movies_has_genre.genreID JOIN movies ON movies_has_genre.movieID=movies.ID WHERE movies.ID = ?");
	$query2->bindValue(1, $movieID);
	$query2->execute();
	return $query2->fetchAll();
}

?>