<?php 
	/* movies class
	 * Purpose: 
	 *	1. list all the movies.
	 *	2. Add a new movie.
	 */

	class Movies {
		// Method to display a list of all the movies.
		public function get() {
			global $bdd;

			$allMovies = $bdd->prepare('SELECT * FROM movies');
			$allMovies->execute();

			$result = $allMovies->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($result, JSON_PRETTY_PRINT); // Output some json.
		}

		// Method to add a new movie.
		public function post() {
			global $bdd;

			$addNewMovie = $bdd->prepare('INSERT INTO movies (title, cover, genre) VALUES (:title, :cover, :genre)');
			$addNewMovie->execute(array('title' => $_POST['title'],
													 			  'cover' => $_POST['cover'],
													 			  'genre' => $_POST['genre'])
			                     );
		}

	}
?>