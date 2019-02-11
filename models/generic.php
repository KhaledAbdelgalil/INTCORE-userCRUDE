<?php
	include_once('database.php');

	class generic extends Database{
		protected  $table_name='users';
		
public function get_by_id($id) 
		{
			//echo "user is connected <br>";

			
			//$data_base= new Database();
			$sql = "SELECT * FROM ".$this->table_name. " WHERE id = $id;";
			//$statement = Database::$db->prepare($sql);
			$statement=$this->db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			//echo "yala hatr07<br>";
			//print_r($data);

			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		} 
		public  function add($name) {
			//$data_base=new Database();
			$sql = "INSERT INTO ".$this->table_name." (name) VALUES (?)";
			//Database::$db->prepare($sql)->execute([$name]);
			$this->db->prepare($sql)->execute([$name]);

		}
		
		public  function delete() {
			//$data_base=new Database();

			$sql = "DELETE FROM ".$this->table_name. " WHERE id = $this->id;";

			//Database::$db->query($sql);
			$this->db->query($sql);
		}

		public  function save() {
			//$data_base=new Database();
			$sql = "UPDATE ".$this->table_name." SET name = ? WHERE id = ?;";
			//Database::$db->prepare($sql)->execute([$this->name, $this->id]);
			$this->db->prepare($sql)->execute([$this->name, $this->id]);
		}

		public  function all($keyword) {
			//$data_base=new Database();

			$keyword = str_replace(" ", "%", $keyword);
			//echo $this->table_name.'<br>';
			$sql = "SELECT * FROM ".$this->table_name." WHERE name like ('%$keyword%');";
			//$statement = Database::$db->prepare($sql);
			//echo $sql.'<br>';
			$statement = $this->db->prepare($sql);
			$statement->execute();
			//echo $statement->fetch(PDO::FETCH_ASSOC).'<br>';
			$templates = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$template_= new User();
				$template_->get_by_id($row['id']);
				$templates[]=$template_;
				//echo $row['id']."<br>";
				//echo $row.'<br>';
			}
			//print_r($templates);
			return $templates;
		}
	}
?>