<?php
	include_once('database.php');

	class User extends Database{
		function __construct($id) {
			$data_base= new Database();
			$sql = "SELECT * FROM users WHERE id = $id;";
			//$statement = Database::$db->prepare($sql);
			$statement=$data_base->db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

		public static function add($name) {
			$data_base=new Database();
			$sql = "INSERT INTO users (name) VALUES (?)";
			//Database::$db->prepare($sql)->execute([$name]);
			$data_base->db->prepare($sql)->execute([$name]);

		}
		
		public  function delete() {
			$data_base=new Database();

			$sql = "DELETE FROM users WHERE id = $this->id;";

			//Database::$db->query($sql);
			$data_base->db->query($sql);
		}

		public  function save() {
			$data_base=new Database();
			$sql = "UPDATE users SET name = ? WHERE id = ?;";
			//Database::$db->prepare($sql)->execute([$this->name, $this->id]);
			$data_base->db->prepare($sql)->execute([$this->name, $this->id]);
		}

		public static function all($keyword) {
			$data_base=new Database();
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM users WHERE name like ('%$keyword%');";
			//$statement = Database::$db->prepare($sql);
			$statement = $data_base->db->prepare($sql);
			$statement->execute();
			$users = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$users[] = new User($row['id']);
			}
			return $users;
		}
	}
?>