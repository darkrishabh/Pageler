<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pageler provides a dynamic web content builder. Unlike others it provides a simple layout that generates a page for you which can be exported to any where as a static template">
    <meta name="author" content="Rishabh Mehan">
    <meta name="keyword" content="Pageler, web design, Fluid">
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
        .black-bg {
            background: rgba(68, 143, 162, 0.6);
        }
        #main-content{
            background: white;
            margin-left:0px !important;
            width:100%;
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
    <style>
        html,body{
            -webkit-user-select: text;
            -khtml-user-select: text;
            -moz-user-select: text;
            -o-user-select: text;
            user-select: text;
            background: #ffffff !important;
        }
        textarea{
            font-weight: normal;
        }
        .initImage{
            width:100px;
            height:100px;
        }
        *[contenteditable] {-webkit-user-select: text;
            -khtml-user-select: text;
            -moz-user-select: text;
            -o-user-select: text;
            user-select: text;
        }

        .file{
            display: none !important;
        }
        .gridster-delete{
            color: white;
            float:right;
            margin-top:2px;
            margin-right: 10px !important;
            cursor: pointer;
        }
        .d[type="text"]{
            float:right;
            width:93px;
        }
        .d[type="image"]{
            float:left;
            width:93px;
        }
        .ImageHolder{
            width:inherit;
            height:inherit;
        }
        .editor{
            height: inherit !important;
        }
        .new{
            border:2px solid #2F93E7;
            -webkit-box-shadow: 1px 0px 14px 0px rgba(50, 50, 50, 0.75);
            -moz-box-shadow:    1px 0px 14px 0px rgba(50, 50, 50, 0.75);
            box-shadow:         1px 0px 14px 0px rgba(50, 50, 50, 0.75);
        }
        .d{
            padding: 10px;
            height: 100px;
            /* width: 30%; */
            text-align: center;
            cursor: move;
            font-size: 1em;
            font-weight: 100;
            border-radius: 5px;
            border: 1px solid grey;
            background: rgb(51, 59, 73);
        }
        .draggable:active{
            border:1px solid #fff;
            padding:5px;
            -webkit-box-shadow: 1px 0px 14px 0px rgba(50, 50, 50, 0.75);
            -moz-box-shadow:    1px 0px 14px 0px rgba(50, 50, 50, 0.75);
            box-shadow:         1px 0px 14px 0px rgba(50, 50, 50, 0.75);
        }
        .drags{
            height:100px;
        }
        .gridster li[type='image']{

        }
        .gridster li header {
            background: #2F93E7;
            display: block;
            font-size: 11px;
            height: 17px;
            padding: 0px 0 0px;
            margin-bottom: 0px;
            cursor: move;
        }
        .gridster ul{
            background: white !important;
            width:100% !important;
        }
        .gridster li form a{
            font-size:1em;
            color: #333333;
            text-decoration: none;
            cursor: hand;
        }
        .gridster li{
            overflow: hidden;
            border:1px solid rgba(207, 204, 202, 0.64);
            border-radius: 10px ;
            font-weight: normal;
            line-height: normal;
            text-align: start;

            background: #fff !important;
        }
        .gridster li textarea{
            border:0px;
            margin-top:5px;
            outline: none;
            margin-left:5px;
        }
        .gridster{
            min-height:auto;
            width:100%;
            background:white !important;
        }
        .gridster li textarea:focus{
            border:0px;
            outline: none;

        }

    </style>
</head>
<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">

    </div>
    <!--logo start-->
    <a href="<?php echo URL;?>" class="logo"><b>Pageler</b></a>
    <!--logo end-->
</header>
<!--header end-->
<section id="container" >
<section id="main-content">
    <section class="wrapper">
        <div class="col-lg-12 col-md-4 col-sm-4 mb" style="display: none;">
            <div class="row">
                <br>
                <div class="weather-2">
                    <div class="weather-2-header">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <p>Page Information</p>
                            </div>
                            <div class="col-sm-6 col-xs-6 goright">
                                <p class="small">Thu Apr 14, 2014</p>
                            </div>
                        </div>
                    </div><!-- /weather-2 header -->
                    <div class="row centered">
                        <div id="desc col-sm-6 ">
                            <h3><i class="fa fa-file"></i> <?php echo $this->pageValues['pageName'];?></h3>
<h5>Page Description</h5>
</div>
</div>
<div class="row data">
    <div class="col-sm-6 col-xs-6 goleft">
        <h5><button class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button></h5>

    </div>
    <div class="col-sm-6 col-xs-6 goright">
        <h5>
            <button class="btn btn-default"><i class="fa fa-arrow-up"></i> Export</button>
            <button class="btn btn-info"><i class="fa fa-arrow-down"></i> Import</button>
        </h5>
    </div>
</div>

</div>
</div>
</div>

<div class="row mt">
<div class="col-lg-12">

<link rel="stylesheet" type="text/css" href="http://gridster.net/dist/jquery.gridster.css">
<link rel="stylesheet" type="text/css" href="http://gridster.net/demos/assets/demo.css">


<div class="gridster">
    <ul>
    </ul>
</div>

<script src="http://gridster.net/dist/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript"
        src="http://api.filepicker.io/v1/filepicker.js"></script>
<script src="<?php echo URL;?>public/js/jquery.autogrow-textarea.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
</script>


<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript">
var gridster;
var serialization = <?php echo $this->pageValues['pageData'];?>;
var prev_col=1;var m = "text";var prev_row=1;var col = 1;var row=1;var prev = null;

$(function(){
    gridster = $(".gridster ul").gridster({
        widget_base_dimensions: [105, 55],
        widget_margins: [5, 5],
        helper: 'clone',
        resize: {
            enabled: true
        },
        draggable: {
            handle: 'header'
        },
        serialize_params: function($w, wgd) {
            return {
                id: $($w).attr('id'),
                col: wgd.col,
                row: wgd.row,
                size_x: wgd.size_x,
                size_y: wgd.size_y,
                type  : $($w).attr('type'),
                htmlData: $($w).children('.editor').html()
            };
        }
    }).data('gridster');

    $(function() {
        gridster.remove_all_widgets();
        $.each(serialization, function() {
            if(this.type == "text") {
                gridster.add_widget('<li type=\"' + this.type
                + '\"><header><div class=\"gridster-delete\" onclick=\"gridDelete(this);\">X</div>' +
                '</header><div class=\"editor\">' + this.htmlData +
                '</div></li>', this.size_x, this.size_y, this.col, this.row);
            } else {
                gridster.add_widget('<li type=\"' + this.type
                + '\"><header><div class=\"gridster-delete\" onclick=\"gridDelete(this);\">X</div>' +
                '</header><div class=\"ImageHolder editor\" align=\"center\">' + this.htmlData + '</div></li>', this.size_x, this.size_y, this.col, this.row);
            }
        });
        $(function() {
            $('.gridster li header').hide();
            $('.gridster li textarea').attr('disabled','disabled');
            $('.gridster li textarea').attr('spellcheck',false);
            $('a.upload_link').css('pointer-events', 'none');
            $('a.upload_link').css('display', 'none');
            gridster.disable();
            gridster.disable_resize();
        });
    });

});


</script>

</div>
</div>
</section>
</section>
</section>
