<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <link rel="stylesheet" href="/assets/styles/login.css">
</head>
<body>
<form method="POST" action="/auth">
    {{ csrf_field() }}
    <section>
        <div class="box">
            <div class="form">
                <h2>Login</h2>
                <div class="inputBx">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color: red;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                </div>
                    <div class="inputBx">
                        <input  id="email" placeholder="имя пользователя..." class="form-control is-invalid" name="email" required autocomplete="email" autofocus>
                        <img src="/assets/images/user.png" style="width:30px;" alt="">
                    </div>
                    <span class="invalid-feedback" role="alert" style="color:red;font-weight:bold;"></span><br/>
                    <div class="inputBx">
                        <input id="password" type="password" placeholder="password..." class="form-control is-invalid " name="password" required autocomplete="current-password">
                        <img src="/web/assets/images/padlock.png" style="width:30px;" alt="">
                    </div>
                    <span class="invalid-feedback" role="alert" style="color:red;font-weight:bold;"></span><br/>
                    <div class="inputBx">
                        <input type="submit" value="login"/>
                    </div>

            </div>
        </div>
    </section>
</form>
</body>
</html>
