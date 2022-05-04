<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Ex3</title>
    <link rel="stylesheet" href="style.css">
</head>

<form action="index.php" method = "POST" class="form_class">
	<div> Имя: </div>
  <label>
  <input  type="text" name="uName" placeholder="Ваше имя" autocomplete="off">
  </label>
	<br/>	
	<div> Email: </div>	
	<label>
    <input  type="text" name="uMail" placeholder="E-mail" autocomplete="off">
  </label><br/>
	<div> Дата рождения: </div>
  <label>
    <input  type="date" name="uDate" autocomplete="off">
  </label>
	<br/>
  <div> Пол: </div>
	<div >
    <input type="radio" value="1" name="uGen" id="uMale" checked="checked">
    <label for="uMale"> Мужской </label>
  </div>
  <div>
  	<input type="radio" value="2" name="uGen" id="uFemale">
  	<label  for="uFemale"> Женский: </label>
  </div>
	<div> Кол-во конечностей: </div>
	<div >
		<input type="radio" value="1" name="uLim" id="uNorm" checked="checked">
    <label  for="userHealthy"> 2 ноги и 2 руки </label>
  </div>
  <div >
    <input  type="radio" value="2" name="uLim" id="uLess">
    <label  for="userDisabled">Чего-то не хватает </label>
	</div>
	</div>
    <input  type="radio" value="3" name="uLim" id="uMore">
    <label for="uMore"> Годрик сторукий</label>
  </div>
  <div>
  	<div>Ваша биография:</div>
    <label>
  	<textarea name="uBio" placeholder="Ваша биография" autocomplete="off"></textarea>
    </label>
		<br/>
  </div>
  <div> Сверхспособности: </div>
  <label>
    <select  multiple aria-label="multiple select" name="uPow">
      <option value="0">Бессмертие</option>
      <option value="1">Прохождение сквозь стены</option>
      <option value="2">Левитация</option>
    </select>
  </label>
  </div>
  <div>
    <label >
			<input type="checkbox" id="check">С контрактом согласен!
		</label>
		<br/>
	</div>
  <div >
    <input type="submit" id="submitButton" value="Свяжитесь с нами!">
  </div>
</div>
</form>