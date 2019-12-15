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



    <!--Theme-->
    <link href="<?= base_url() ?>assets/css/theme-default.css" rel="stylesheet">

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
<!--            <ul class="nav navbar-top-links navbar-right">-->
<!--                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">-->
<!--                        <em class="fa fa-envelope"></em><span class="label label-info">15</span>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu dropdown-messages">-->
<!--                        <li>-->
<!--                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">-->
<!--                                    <img alt="image" class="img-circle" src="" width="40">-->
<!--                                </a>-->
<!--                                <div class="message-body">-->
<!--                                    <small class="pull-right">3 mins ago</small>-->
<!--                                    <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>-->
<!--                                    <br/>-->
<!--                                    <small class="text-muted">1:24 pm - 25/03/2015</small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li>-->
<!--                            <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">-->
<!--                                    <img alt="image" class="img-circle" src="" width="40">-->
<!--                                </a>-->
<!--                                <div class="message-body">-->
<!--                                    <small class="pull-right">1 hour ago</small>-->
<!--                                    <a href="#">New message from <strong>Jane Doe</strong>.</a>-->
<!--                                    <br/>-->
<!--                                    <small class="text-muted">12:27 pm - 25/03/2015</small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li>-->
<!--                            <div class="all-button"><a href="#">-->
<!--                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>-->
<!--                                </a></div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">-->
<!--                        <em class="fa fa-bell"></em><span class="label label-primary">5</span>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu dropdown-alerts">-->
<!--                        <li><a href="#">-->
<!--                                <div><em class="fa fa-envelope"></em> 1 New Message-->
<!--                                    <span class="pull-right text-muted small">3 mins ago</span></div>-->
<!--                            </a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">-->
<!--                                <div><em class="fa fa-heart"></em> 12 New Likes-->
<!--                                    <span class="pull-right text-muted small">4 mins ago</span></div>-->
<!--                            </a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">-->
<!--                                <div><em class="fa fa-user"></em> 5 New Followers-->
<!--                                    <span class="pull-right text-muted small">4 mins ago</span></div>-->
<!--                            </a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            </ul>-->
            <ul class="navbar-right theme-switcher" id ="theme-css">
                <li><span>Choose Theme:</span></li>
                <li><a href="" title="Default" data-theme="default" class="theme-btn theme-btn-default"onclick="setTheme(default)">Default</a></li>
                <li><a href="" title="Iris" data-theme="iris" class="theme-btn theme-btn-iris" onclick="setTheme(iris)">Iris</a></li>
                <li><a href="" title="Midnight" data-theme="midnight" class="theme-btn theme-btn-midnight" onclick="setTheme(midnight)">Midnight</a></li>
                <li><a href="" title="Lime" data-theme="lime" class="theme-btn theme-btn-lime" onclick="setTheme(lime)">Lime</a></li>
                <li><a href="" title="Rose" data-theme="rose" class="theme-btn theme-btn-rose" onclick="setTheme(rose)">Rose</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
