<?php 
	/* userId class
	 * Purposes: 
	 *	1. Show pieces of informations about a user according to his ID.
	 *	2. Update a user according to his ID.
	 *	3. Delete a user according to his ID.	 	
	 */
	class userId {

		// Show a user according to his ID.
		public function get($id) {
			global $bdd;

			$userById = $bdd->prepare('SELECT * FROM users WHERE id = :id');
			$userById->execute(array('id' => $id));

			$result = $userById->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($result, JSON_PRETTY_PRINT); // Output some json.
		}

		// Update a user according to his ID.
		public function put($id) {
			global $bdd;

			$_PUT  = array();
      if($_SERVER['REQUEST_METHOD'] == 'PUT') { // If the request used to acces the page is $_PUT.
      	parse_str(file_get_contents('php://input'), $_PUT);
      }

			$updateUserById = $bdd->prepare('UPDATE users SET username = :username WHERE id = :id');
			$updateUserById->execute(array('username' => $_PUT['username'],
				                             'id'       => $id)
			                        );
		}

		// Delete a user according to hid ID.
		public function delete($id) {
			global $bdd;

			$_DELETE  = array();
      if($_SERVER['REQUEST_METHOD'] == 'DELETE') { // If the request used to acces the page is $_DELETE.
      	parse_str(file_get_contents('php://input'), $_DELETE);
      }

			$deleteUserById = $bdd->prepare('DELETE FROM users WHERE id = :id');
			$deleteUserById->execute(array('id' => $id));
		}
	}
?>