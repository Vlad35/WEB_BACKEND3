<?php
header('Content-Type: text/html; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
	print_r('ONLY POST METHODS!!');
}
$errors = FALSE;

if(empty($_POST['name-1']) || !isset($_POST['name-4']) || empty($_POST['email']) || empty($_POST['date']) || empty($_POST['bio']) || empty($_POST['checkbox']) || $_POST['checkbox'] == false){
	print_r('Empty fields!');
	exit();
}
if(!is_numeric($_POST['radio-2'])){
	print_r('Limb field is not a number');
}
$name = $_POST['name-1'];
$email = $_POST['email'];
$birth = $_POST['date'];
$bio= $_POST['bio'];
$limbs = $_POST['radio-2'];
$sex = $_POST['radio-1'];
$BioReg = "/^\s*\w+[\w\s\.,-]*$/";
$NameReg = "/^\w+[\w\s-]*$/";
$DateReg = "/^\d{4}-\d{2}-\d{2}$/";
$MailReg = "/^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$/";
if(!preg_match($NameReg,$name)){
	print_r('Invalid name format');
	exit();
}
if($limbs < 1 || $limbs > 5){
	print_r('Invalid am of limbs');
	exit();
}
if(!preg_match($DateReg,$birth)){
	print_r('Invalid birth format');
	exit();
}
preg_match_all("/\d+/",$birth,$matches);
if (!checkdate($matches[0][1],$matches[0][2],$matches[0][0])){
	print_r('Date does not exist');
	exit();
}
if(!preg_match($BioReg,$bio)){
	print_r('Invalid bio format');
	exit();
}
if(!preg_match($MailReg,$email)){
	print_r('Invalid email format');
	exit();
}
if($sex !== 'male' && $sex !== 'female'){
	print_r('Then who you are...');
	exit();
}
// foreach($superpowers as $checking){
// 	if(array_search($checking,$super_list)=== false){
// 			print_r('Invalid superpower value!');
// 			exit();
// 	}
// }
$user = 'u47684';
$pass = '8848410';

//ssh -fNg -L 3307:127.0.0.1:3306 u47684@212.192.134.20
//lsof -i:3307
$db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=u47684', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
// $db = new PDO('mysql:host=212.192.134.20;dbname=u47684', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
  $stmt = $db->prepare("INSERT INTO DataTable SET name=:name, email=:email, birthdate=:birthdate, bio=:bio");
  $stmt->bindParam('name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':birthdate', $birth);
  $stmt->bindParam(':bio', $bio);
  if($stmt->execute()==false){
  print_r($stmt->errorCode());
  print_r($stmt->errorInfo());
  exit();
  }
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

print_r("Added!");
?>
