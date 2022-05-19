<?
//Данные с клиента переданые POST
$data = $_POST;
//массив уже зарегестрированых пользоватлей
function GetUser(){
$user =  
[
	array("id"=>'1',"name"=>'Alex'	,"email"=>'firstuser@test.ru'),
	array("id"=>'2',"name"=>'Jim'	,"email"=>'seconduser@test.ru'),
	array("id"=>'1',"name"=>'Alex'	,"email"=>'threeuser@test.ru'),
];
return $user;
}
//Проверка не был ли раньше зарегестрирован переданный пользователем
function CheckEmail($email){
	$user = GetUser();//Полученеи массива пользователй
	$user_count = count($user);//Подсчет кол-ва пользоватлей в массиве
	for ($user_index=0; $user_index < $user_count; $user_index++){ 
		if($user[$user_index]['email'] == $email){//Сравнение email из аргумента с email из массива
			return true;//Возврощает true если было найденно совпадение
		}
	}
	return false;
}
//Регистрация юзера
function RegistrtationUser($data){
	$validation = ValidationDataUser($data);//Передача данных для валидации
	if($validation != false){//Если функция вернула не true то валидация не пройдена 
		http_response_code(404);
		echo json_encode(['message' => $validation]);//Вывод ошибки валидации
		exit();
	}
	echo json_encode(['message' => "Вы успешно прошли регистрацию"]);
	my_log("Успешная регистрация",'SUCCESS');

}
//Провера переданных данных
function ValidationDataUser($data){
	$password = $data['password'];//Пароль
	$repeatpassword = $data['reapeatpassword'];//Повтор пароля
	$email = $data['email'];//Почта
	$error = false;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){//Проверка корректнсти присланого email
   		$error = "Адрес указан НЕ корректно";
		my_log($error,'ERROR');//Добалвение ошибки в лог файл
		return $error;
	}
	elseif(CheckEmail($email)){
		$error = 'Такой email уже зарегестрирован';
		my_log($error,'ERROR');//Добалвение ошибки в лог файл
		return $error;
	}elseif($password != $repeatpassword){
		$error = 'Пароли не совподают';
		my_log($error,'ERROR');//Добалвение ошибки в лог файл
		return $error;
	}	
	return $error;
}

//Сохранение файлов в лог файл
function my_log($text,$status){
	$log = date('Y-m-d H:i:s') .'|'.$status.'|'.$text.";";
	file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
}

RegistrtationUser($data);
?>