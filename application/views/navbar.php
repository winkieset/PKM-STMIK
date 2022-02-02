<!DOCTYPE html>
<html>

<head>
    <title>Home - Website PKM STMIK</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datatable/datatables.css' ?>">
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/jquery.datatables.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/datatables.js'; ?>"></script>
    <style>
        i {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="<?php echo base_url() . 'welcome'; ?>">
                <img src="<?php echo base_url() . 'assets/logo.jpg' ?>" width="30" height="30" alt="">
            </a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-examplenavbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() . 'welcome'; ?>">Website PKM STMIK Madira Indonesia</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-examplenavbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url() . 'welcome'; ?>"><i class="glyphicon glyphicon-home"></i>Home</a></li>
                    <li><a href="<?php echo base_url() . 'welcome/loginpage'; ?>"><i class="glyphicon glyphicon-user"></i>Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">