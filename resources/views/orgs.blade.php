<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">

    <title>建立單位</title>

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui-timepicker-addon.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
</head>

<body>
    <div class="m-4">
        <form method="POST">
            <div class="mt-2">
                單位編號：<br>
                <input type="text" name="org_no" size="20" required />
            </div>
            <div class="mt-2">
                單位名稱：<br>
                <input type="text" name="title" size="20" required />
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-success create">建立</button>
            </div>
        </form>
    </div>
</body>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

<script>
    $('.create').click(function() {
        var org_no = $('[name="org_no"]').val();
        var title = $('[name="title"]').val();

        if (org_no == '') {
            alert("請輸入單位編號");
            return false;
        }

        if (title == '') {
            alert("請輸入單位名稱");
            return false;
        }

        $.ajax({
            url: '/doOrgs',
            data: {
                '_token': '{{ csrf_token() }}',
                'org_no': org_no,
                'title': title,
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
