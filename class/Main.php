<?php

include "db.php"; 
	
	abstract class Main{
		protected $table;

		abstract public function insert();
		abstract public function update($id);


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