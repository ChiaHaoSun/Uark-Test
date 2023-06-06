<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">

    <title>建立帳號</title>

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui-timepicker-addon.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
</head>

<body>
    <div class="m-4">
        <form id="registerForm" method="POST">
            <div class="mt-2">
                *單位編號：<a href="/orgs">建立單位</a><br>
                <input type="text" name="org_no" size="50" required />
            </div>
            <div class="mt-2">
                *姓名：<br>
                <input type="text" name="name" size="50" required />
            </div>
            <div class="mt-2">
                生日：<br>
                <input type="date" name="birthday" size="50" required />
            </div>
            <div class="mt-2">
                *E-mail：<br>
                <input type="text" name="email" size="50" required/>
            </div>
            <div class="mt-2">
                *帳號：<br>
                <input type="text" name="account" size="50"/>
            </div>
            <div class="mt-2">
                *密碼：<br>
                <input type="password" name="password" size="50"/>
            </div>
            <div class="mt-2">
                *申請附檔：<br>
                <input type="file" name="file" id="file" size="50"/>
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-success register">建立</button>
            </div>
        </form>
    </div>
</body>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

<script>
    $('.register').click(function() {
        var formData = new FormData($("#registerForm")[0]);
        var name = $('[name="name"]').val();
        var email = $('[name="email"]').val();
        var account = $('[name="account"]').val();
        var password = $('[name="password"]').val();
        var file = $('[name="file"]').val();

        if (name == '') {
            alert("請輸入姓名");
            return false;
        }

        if (email == '') {
            alert("請輸入E-mail");
            return false;
        }

        if (account == '') {
            alert("請輸入帳號");
            return false;
        }

        if (password == '') {
            alert("請輸入密碼");
            return false;
        }

        if (file == '') {
            alert("請上傳檔案");
            return false;
        }

        formData.append("_token", "{{ csrf_token() }}");

        $.ajax({
            url: '/doRegister',
            data: formData,
            processData: false,
            contentType: false,
            enctype: "multipart/form-data",
            type: 'POST',
            dataType: 'json',
            complete: function (jqXhr) {
                let data = jqXhr.responseJSON;

                alert(data.text);

                if (data.status == 'success')
                    location.replace('/login')
            }
        });
    })
</script>

</html>
