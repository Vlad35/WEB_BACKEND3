<?php
	header('Content-Type: text/html; charset=UTF-8');

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  	if (!empty($_GET['save'])) {
      print('Спасибо, результаты сохранены.');
  	}
    include('form.php');
 		exit();
	}else {
		$errors = false;
		$Lims = intval($_POST['uLim']);
		$uMailReg = "/^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$/";
		if(empty($_POST['uName'])) {
			print('Заполните Имя. <br/>');
			$errors = true;
		}
		if(empty($_POST['uMail'])) {
			print('Заполните E-mail. <br/>');
			$errors = true;
		}else if (!preg_match($uMailReg, $_POST['uMail'])) {
      print('Некорректно введен E-mail. <br/>');
      $errors = TRUE;
    }
		if(empty($_POST['uDate'])) {
			print('Заполните Дату. <br/>');
			$errors = true;
		}
		if (empty($_POST['uGen'])) {
      print('Заполните Пол. <br/>');
      $errors = TRUE;
    } else if ($_POST['uGen'] != 1 && $_POST['uGen'] != 2) {
      print('Некорректно введен Пол. <br/>');
      $errors = TRUE;
    }
		if ($Lims < 1 || $Lims > 3) {
			print('<div style="color:red;margin: 5px;border:3px solid red;">Заполните поле Конечностей.</div> <br/>');
      $errors = TRUE;
    } else if ($Lims != 1 && $Lims != 2 &&$Lims != 3) {
      print('Некорректно заполнен поле Конечностей. <br/>');
			$errors = TRUE;
    }
		if(empty($_POST['uBio'])) {
			print('Заполните Биографию.');
			$errors = TRUE;
		}
		if($errors) {
			include('form.php');
			exit();
		}
		
		$uName = $_POST['uName'];
		$uMail = $_POST['uMail'];
		$uDate = $_POST['uDate'];
		$uGen = $_POST['uGen'];
		$uLim = $_POST['uLim'];
		$uBio = $_POST['uBio'];
	
		try{
			$user = 'u47684';
			$pass = '8848410';

			$db = new PDO('mysql:host=localhost;dbname=u47684', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
      $stmt = $db->prepare("INSERT INTO uData (name, Email, Birthdate, Gender, Limbs, Bio) VALUES (:name, :email, :date, :gender, :limbs, :bio)");
      $stmt->bindParam(':name', $uName);
      $stmt->bindParam(':email', $uMail);
      $stmt->bindParam(':date', $uDate);
      $stmt->bindParam(':gender', $uGen);
      $stmt->bindParam(':limbs', $uLim);
      $stmt->bindParam(':bio', $uBio);
			if($stmt->execute()==false){
  			print_r($stmt->errorCode());
  			print_r($stmt->errorInfo());
  			exit();
 			}
		}	catch(PDOException $e){
 				print('Error : ' . $e->getMessage());
  			exit();
		}
		print_r("Succesfully added new stuff, ");
	}

?>