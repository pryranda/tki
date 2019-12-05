<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/datepicker3.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?= base_url() ?>assets/js/html5shiv.js"></script>
    <script src="<?= base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<script>
    var ROOT="<?=base_url()?>";
</script>
<body>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body">
                <form role="form" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" id="username" type="text" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <button class="btn btn-primary login-btn">Login</button></fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>


<script src="<?= base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<script>
    $(".login-btn").click(function() {
        $("#overlay").fadeIn(300);
        $.ajax({
            url: ROOT + 'index.php/Auth/ajax_login',
            type: 'post',
            dataType: 'json',
            data: {
                "username": $("#username").val(),
                "password": $("#password").val()
            }
        })
            .done(function (data) {
                if (data.is_error == true) {
                    setTimeout(function(){
                        $("#overlay").fadeOut(300);
                    },500);
                    alert(data.error_message);
                    window.location = ROOT+'index.php/Dashboard/index';
                    return;
                }
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                },500);
                window.location = ROOT+'index.php/Dashboard/index';
            })
            .fail(function (data){
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                },500);
                alert(data.error_message);
                window.location = ROOT+'index.php/Dashboard/index';
            })
            .always(function () {

            });
    });
</script>



</body>
</html>
