<?php
	include_once('database.php');

	class generic extends Database{
		protected $table_name;
		

		public  function add($name) {
			$data_base=new Database();
			$sql = "INSERT INTO ".$this->table_name." (name) VALUES (?)";
			//Database::$db->prepare($sql)->execute([$name]);
			$data_base->db->prepare($sql)->execute([$name]);

		}
		
		public  function delete() {
			$data_base=new Database();

			$sql = "DELETE FROM ".$this->table_name. " WHERE id = $this->id;";

			//Database::$db->query($sql);
			$data_base->db->query($sql);
		}

		public  function save() {
			$data_base=new Database();
			$sql = "UPDATE ".$this->table_name." SET name = ? WHERE id = ?;";
			//Database::$db->prepare($sql)->execute([$this->name, $this->id]);
			$data_base->db->prepare($sql)->execute([$this->name, $this->id]);
		}

		public  function all($keyword) {
			$data_base=new Database();
			$keyword = str_replace(" ", "%", $keyword);
			echo $this->table_name.'<br>';
			$sql = "SELECT * FROM ".$this->table_name." WHERE name like ('%$keyword%');";
			//$statement = Database::$db->prepare($sql);
			echo $sql.'<br>';
			$statement = $data_base->db->prepare($sql);
			$statement->execute();
			//echo $statement->fetch(PDO::FETCH_ASSOC).'<br>';
			$users = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$users[] = new User($row['id']);
				echo $row['id']."<br>";
				//echo $row.'<br>';
			}
			print_r($users);
			return $users;
		}
	}
?>