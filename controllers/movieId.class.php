<?php 
	/* movieId class
	 * Purposes: 
	 *	1. Show pieces of informations about a movie according to his ID.
	 *	2. Update a movie according to his ID.
	 *	3. Delete a movie according to his ID.	 	
	 */
	class movieId {

		// Show a movie according to his ID.
		public function get($id) {
			global $bdd;

			$movieById = $bdd->prepare('SELECT * FROM movies WHERE id = :id');
			$movieById->execute(array('id' => $id));

			$result = $movieById->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($result, JSON_PRETTY_PRINT); // Output some json.
		}

		// Update a movie according to his ID.
		public function put($id) {
			global $bdd;

			$_PUT  = array();
      if($_SERVER['REQUEST_METHOD'] == 'PUT') { // If the request used to acces the page is $_PUT.
      	parse_str(file_get_contents('php://input'), $_PUT);
      }
			
			$updateMovieById = $bdd->prepare('UPDATE movies SET title = :title, cover = :cover, genre = :genre WHERE id = :id');
			$updateMovieById->execute(array('title' => $_PUT['title'],
				                              'cover' => $_PUT['cover'],
				                              'genre' => $_PUT['genre'],
				                              'id'    => $id)
			                        );
		}

		// Delete a movie according to hid ID.
		public function delete($id) {
			global $bdd;

			$_DELETE  = array();
      if($_SERVER['REQUEST_METHOD'] == 'DELETE') { // If the request used to acces the page is $_DELETE.
      	parse_str(file_get_contents('php://input'), $_DELETE);
      }
			
			$deleteMovieById = $bdd->prepare('DELETE FROM movies WHERE id = :id');
			$deleteMovieById->execute(array('id' => $id));
		}
	}
?>