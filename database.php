<?php 
    #database class code was initially copied from a git repo I cloned titled "shoes-store"
	class Database {

		private $db_connection;
		private $db_selection;

		function __construct(){
			include("database_config.php");
			$this->db_connection = new mysqli($db_server,$db_user,$db_password,$db_selected,$db_port);
		}

		function db_queryresult($sql=""){
			$result = array();
			if($sql!=""){
				$query=$this->db_connection->query($sql);
				if($query->num_rows>0){
					$rows=$query->fetch_assoc();
					do {
						$result[]=$rows;
					}while($rows=$query->fetch_assoc());
				}

			}
			return $result;
		}

		function db_getonerow($sqlimg=""){
			$result = 0;

			if($sqlimg!=""){
				$query=$this->db_connection->query($sqlimg) or die($this->db_connection->error);
				$result = $query->fetch_assoc() ;

			}

			return $result;
		}

		function db_insert($table="",$fielddata=NULL){
			$result = NULL;
            $result_2 = NULL;

			$fields="";

			$fieldsvalue="";

			if($table!="" && $fielddata!=NULL){
				//print_r($fielddata);
                
                //this loop produces separate comma-separated lists of the keys and values of the fielddata object
				foreach($fielddata as $key=>$value){
					$fields=$fields . $key . ",";
                    $fieldsvalue=$fieldsvalue . $value . ",";
				}

                $fields = substr($fields,0,strlen($fields)-1);
				$fieldsvalue = substr($fieldsvalue,0,strlen($fieldsvalue)-1);
					
				//Query insert ke sql
				$sql = "INSERT INTO " . $table . " ( " . $fields . " ) " . " VALUES ( " . $fieldsvalue . " ) ";
                echo("got here, sql statement is $sql");
				//Execute Query
				$this->db_connection->query($sql);				
				//mysql_query($sql,$this->db_connection);
				$result = $this->db_connection->insert_id;
			}
			//return $result;
			return $result;
		}

		function db_update($table="",$fielddata=NULL,$wherestr=""){
			$result = 0;
			$fieldset="";
			if($table!="" && $fielddata!=NULL && $wherestr != ""){
				foreach($fielddata as $field=>$fieldvalue){
					$fieldset = $fieldset . $field . "=" . $fieldvalue . ",";
				}
				$fieldset = substr($fieldset,0,strlen($fieldset)-1);

				$sql ="UPDATE " . $table . " SET " . $fieldset;
				$sql = $sql . " WHERE " . $wherestr;

				$result = $this->db_connection->query($sql);
			}

			return $result;

		}

		function db_rowcount($sql=""){
			$result=0;
			// echo $sql;exit;
			if($sql!=""){

				$query=$this->db_connection->query($sql);
				$result=$query->num_rows;
				//echo $result;exit;
			}
			return $result;
		}

		function db_execute($sql=""){
			$result = 0;
			if($sql!=""){
				$result = $this->db_connection->query($sql);

			}
			return $result;
		}

	}
 ?>