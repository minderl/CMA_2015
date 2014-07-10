<?php 
	/* users class
	 * Purpose: list all the users.
	 */

	class Users {
		// Method to display a list of all the users.
		public function get() {
			global $bdd;

			$allUsers = $bdd->prepare('SELECT * FROM users');
			$allUsers->execute();

			$result = $allUsers->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($result, JSON_PRETTY_PRINT); // Output some json.
		}

		// Method to add a new user
		public function post() {
			global $bdd;

			$addNewUser = $bdd->prepare('INSERT INTO users (username) VALUES (:username)');
			$addNewUser->execute(array('username' => $_POST['username']));
		}

	}
?>