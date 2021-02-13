

	

<?php 

	class DbOperations{

		private $con; 

		function __construct(){

			require_once dirname(__FILE__).'/dbconnection.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}

		

		public function createUser($username, $pass, $email){
			if($this->isUserExist($username,$email)){
				return 0; 
			}else{
				$password = ($pass);
				$stmt = $this->con->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL, ?, ?, ?);");
				$stmt->bind_param("sss",$username,$password,$email);

				if($stmt->execute()){
					return 1; 
				}else{
					return 2; 
				}
			}
		}

		

	}
?>