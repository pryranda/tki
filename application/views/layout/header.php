<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IF Projects</title>
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/datepicker3.css" rel="stylesheet">
<!--    <link href="--><?//= base_url() ?><!--assets/css/bootstrap-table.css" rel="stylesheet">-->
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/datatables/jquery.dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--Theme Switcher-->
    <style id="hide-theme">
        body{
            display:none;
        }
    </style>
    <script type="text/javascript">
        var ROOT = "<?=base_url()?>";
        function setTheme(name){
            var theme = document.getElementById('theme-css');
            var style = ROOT+'assets/css/theme-' + name + '.css';
            if(theme){
                theme.setAttribute('href', style);
            } else {
                var head = document.getElementsByTagName('head')[0];
                theme = document.createElement("link");
                theme.setAttribute('rel', 'stylesheet');
                theme.setAttribute('href', style);
                theme.setAttribute('id', 'theme-css');
                head.appendChild(theme);
            }
            localStorage.setItem('lumino-theme', name);
        }
        var selectedTheme = localStorage.getItem('lumino-theme');
        if(selectedTheme) {
            setTheme(selectedTheme);
        }
        window.setTimeout(function(){
            var el = document.getElementById('hide-theme');
            el.parentNode.removeChild(el);
        }, 5);
    </script>
    <!-- End Theme Switcher -->

    <!--Theme-->
<!--    <link href="--><?//= base_url() ?><!--assets/css/theme-default.css" rel="stylesheet" id="theme">-->

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="<?= base_url() ?>assets/js/html5shiv.js"></script>
    <script src="<?= base_url() ?>assets/js/respond.min.js"></script>

    <![endif]-->

</head>
<script>
    var ROOT = "<?=base_url()?>";
</script>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="<?= base_url() ?>"><span>IF </span>Project</a>
            <ul class="navbar-right theme-switcher" id ="theme-css">
                <li><span>Choose Theme:</span></li>
                <li><a href="" title="Default" data-theme="default" class="theme-btn theme-btn-default">Default</a></li>
                <li><a href="" title="Iris" data-theme="iris" class="theme-btn theme-btn-iris">Iris</a></li>
                <li><a href="" title="Midnight" data-theme="midnight" class="theme-btn theme-btn-midnight">Midnight</a></li>
                <li><a href="" title="Lime" data-theme="lime" class="theme-btn theme-btn-lime">Lime</a></li>
                <li><a href="" title="Rose" data-theme="rose" class="theme-btn theme-btn-rose">Rose</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
