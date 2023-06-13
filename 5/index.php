<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lichi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div id="messageDelete"></div>
<div id="formDelete">
    <div class="text-center">
        <H1>Форма</H1>
    </div>

    <div class="text-center text-danger" id="message"></div>
    <div class="container py-3 col-12 col-md-9 col-lg-7 col-xl-6">
        <div class="card p-5 " style="border-radius: 15px;">
            <div class="form_container">
                <form id="form" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Имя</label>
                        <input type="text" class="form-control" name="name" required
                               placeholder="Введите Имя">
                        <div id="error_name"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" name="surname" required
                               placeholder="Введите фамилию">
                        <div id="error_surname"></div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                               required placeholder="Введите email">
                        <div id="error_email"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="password" required
                               placeholder="Введите пароль">
                        <div id="error_password"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               required placeholder="Повторите пароль">
                        <div id="error_password_confirmation"></div>
                    </div>
                    <input class="btn btn-dark" type="submit" name="send" id="send" value="Отправить">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $("#form").on("submit", function (e) {
            e.preventDefault();


            $.ajax({
                url: '/register.php',
                method: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (data) {
                    if (data.error == 'true') {
                        $('#message').html("");
                        $("#message").append(data.text);
                    } else {
                        $('#formDelete').html("");
                        $("#messageDelete").append(data.text);
                    }

                }
            });
        });
    });
</script>

</body>
</html>