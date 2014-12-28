<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?= (isset($this->title)) ? $this->title:"Pageler"; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL; ?>public/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo URL; ?>public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/assets/lineicons/style.css">
    <script type="text/javascript" src="http://gridster.net/demos/assets/jquery.js"></script>

    <!-- Custom styles for this template -->
    <link href="<?php echo URL; ?>public/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo URL;?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo URL; ?>favicon.ico" type="image/x-icon">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #main-content{
            background: white;
        }
        div.page_container{
            width: 140px;
            border: 2px solid white;
            padding: 0;
            border-radius: 10px;
            color: white;
            background: rgb(54, 61, 77);
            margin-top: 10px;
        }
        a#pageNameLink{
            float: left;
            width: 65%;
            text-align: left;
            padding: 0px 0px 0px 7px;
            color: white;
            overflow: hidden;
        }
        #settings {
            text-align: center;
            color: rgb(174, 178, 183);
            border-top: 2px solid rgb(97, 103, 118);
            border-bottom: 2px solid rgb(97, 103, 118);
            background: rgb(66, 74, 93);
            font-weight: 200;
        }
        .page_id_delete{

            padding: 0 !important;

            margin-left: 81%;
            -webkit-appearance: inherit;
            border-radius: 0px 10px 10px 0px;
            /* width: 20%; */
            font-size: 25px !important;
            /* float: right; */
            color: white !important;
            background: rgba(150, 56, 56, 0.75);
        }
        .pageDelete i:hover{
            color:red !important;

        }
    </style>
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?php echo URL;?>" class="logo"><b>Pageler</b></a>
        <!--logo end-->

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="<?php echo URL.'?logout';?>">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <?php Session::init(); ?>

    
    