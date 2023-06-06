<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">

    <title>使用者登入</title>

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui-timepicker-addon.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
</head>

<body>
    <div class="m-4">
        <form id="loginForm" method="POST">
            <div class="mt-2">
                帳號：<br>
                <input type="text" name="account" size="20" required />
            </div>
            <div class="mt-2">
                密碼：<br>
                <input type="password" name="password" size="20" required />
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-success login">登入</button>
                <a href="/register">建立帳號</a>
            </div>
        </form>
    </div>
</body>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

<script>
    $('.login').click(function() {
        var account = $('[name="account"]').val();
        var password = $('[name="password"]').val();

        if (account == '') {
            alert("請輸入帳號");
            return false;
        }

        if (password == '') {
            alert("請輸入密碼");
            return false;
        }

        $.ajax({
            url: '/doLogin',
            data: {
                '_token': '{{ csrf_token() }}',
                'account': $('[name="account"]').val(),
                'password': $('[name="password"]').val(),
            },
            type: 'POST',
            dataType: 'json',
            complete: function (jqXhr) {
                let data = jqXhr.responseJSON;

                alert(data.msg);
            }
        });
    })
</script>

</html>
