
//Функция отправки данных на сервер для регистрации
function Registrtation(){
	let form = document.querySelector('#registration_form');
	let data = new FormData(form);
	let validation = ValidationFormRegistration(data);//Вызов функции для проверки формы
	if(validation != false){//Если поля не прошли валидацию 
		EchoError('error',validation);//То выведит ошибку
		return false;
	}

	SendRequest("POST","/registration.php",data)//Функция для отправки AJAX
	.then(data =>  RegistrtationSuccess(data))//Передаем сообщение от сервера
	.catch(err =>  EchoError('error',err['message']));
}
//Функция валидации формы , 
function ValidationFormRegistration(data){
	let name 			= data.get('name');
	let sname 			= data.get('secondname');
	let password 		= data.get('password');
	let reapeatpassword = data.get('reapeatpassword');
	let email           = data.get('email');
	let error = false;
	if(!validator.isEmail(email)){
		error = 'Введите корректный Email';
		return error;
	}else if(validator.isEmpty(name)){
		error = 'Введите имя';
		return error;
	}else if(validator.isEmpty(sname)){
		error = 'Введите фамилию';
		return error;
	}else if(validator.isEmpty(password)){
		error = 'Введите пароль';
		return error;
	}else if(validator.isEmpty(reapeatpassword)){
		error = 'Повторите пароль';
		return error;
	}else if(password != reapeatpassword){
		error = 'Пароли не совподают';
		return error;
	}else if(password.length < 8 || reapeatpassword.length < 8){
		error = 'Пароли не может быть меньше 8 символов';
	}
	return error;

}

//Принимает id блока куда нужно вывести ошибку и текст самой ошибки
function EchoError(id,text){
	let block = document.querySelector('#'+id);
	block.innerText = text;
}

function RegistrtationSuccess(data){
	let form = document.querySelector('#registration_form')
	let error = document.querySelector('#error').style.display.none;
	form.style.display = 'none';
	let reg_success_block = document.querySelector('#reg_success');
	reg_success_block.innerHTML = data.message;
}


