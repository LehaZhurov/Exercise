<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid" style = 'margin-top: 20px;'>
        <div class="row justify-content-center">
          <div class="col-6">
            <form id = 'registration_form' >
              <span id = 'error' style = 'color:red'></span>
              <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" name = 'name' placeholder="Введите имя">
              </div>
              <div class="mb-3">
                <label for="secondname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="secondname" name = 'secondname' placeholder = 'Введите фамилию'>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name = 'email' placeholder="Адрес электронной почты">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name = 'password' placeholder = 'Пароль'>
                <div id="passHelp" class="form-text">Пароль должене быть не менее 8 символов</div>
              </div>
              <div class="mb-3">
                <label for="reapeatpassword" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" id="reapeatpasswordpassword" name = 'reapeatpassword' placeholder = 'Повторите пароль'>
                <div id="passHelp" class="form-text">Пароль должене быть не менее 8 символов</div>
              </div>
              <button type="button" class="btn btn-primary" onclick="Registrtation()">Регистрация</button>
            </form>
          </div>
        </div>
    </div>
    <div class="container-fluid" style = 'margin-top: 20px;'>
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 id = "reg_success" ></h1>
            </div>
        </div>
    </div>
    <script src = 'script/AJAX.js'></script>
    <script src="https://unpkg.com/validator@latest/validator.min.js"></script>
    <script src = 'script/registration.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>