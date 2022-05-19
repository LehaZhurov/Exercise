function SendRequest(method,url,body = null){
	Ajax = true;
	return new Promise ((resolve,reject)=>{
		const xhr = new XMLHttpRequest();
		xhr.open(method,url,true)//Открытие AJAX запроса
		xhr.responseType = 'json';//Ожидаемый формат данных
		if(xhr.readyState == 0){
			console.log(0);
		}
		if(xhr.readyState == 1){
			console.log(1);
		}
		if(xhr.readyState == 3){
			console.log(3);
		}
		if(xhr.readyState == 4){
			console.log(4);
		}
		xhr.onload = () =>{
			if(xhr.status >= 400){//Если статус ошибка то вернет reject
				reject(xhr.response);
			}else{//В ином случае вернет resolve
				resolve(xhr.response);
			}
		}
		xhr.onerror = () =>{//Если возникла ошибка отправки то также вернет ошибку
			reject(xhr.response);
		}
		xhr.send(body);//Отправка запроса на сервер
	});
}