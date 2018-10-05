<?php 
include "Main.php";


	class Student extends Main{
		protected $table = 'tbl_student';
		private $name;
		private $dept;
		private $age;

		public function setName($name){
			$this->name = $name;
		}

		public function setDept($dept){
			$this->dept = $dept;
		}

		public function setAge($age){
			$this->age = $age;
		}



		public function insert(){
			$sql = "INSERT INTO $this->table(name, dept, age) VALUES(:name, :dept, :age)";
				$stmt = db::prepareOwn($sql);
				$stmt->bindParam(':name', $this->name );
				$stmt->bindParam(':dept', $this->dept );
				$stmt->bindParam(':age', $this->age );
				return $stmt->execute();
		}

		public function update($id){
			$sql = "UPDATE $this->table SET name=:name, dept=:dept, age=:age WHERE id=:id";
				$stmt = db::prepareOwn($sql);
				$stmt->bindParam(':name', $this->name );
				$stmt->bindParam(':dept', $this->dept );
				$stmt->bindParam(':age', $this->age );
				$stmt->bindParam(':id', $id );
				return $stmt->execute();
		}


		public function edit($id){
			$sql = "SELECT * FROM  $this->table WHERE id=:id";
			$stmt = db::prepareOwn($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt->fetch();

		}

		public function readAll(){
			$sql = "SELECT * FROM $this->table";
			$stmt = db::prepareOwn($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function delete($id){
			$sql = "DELETE FROM $this->table WHERE id=:id";
				$stmt = db::prepareOwn($sql);
				$stmt->bindParam(':id', $id );
				return $stmt->execute();
		}

	}



 ?>