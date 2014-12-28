
<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->

<style>
    button:focus, input:focus {
        outline:none;
    }
    .page_container a{
        display:inline !important;

    }
    .switch {
        position: relative;
        margin: 20px auto;
        height: 26px;
        width: 120px;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 3px;
        -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
    }

    .switch-label {
        position: relative;
        z-index: 2;
        float: left;
        width: 58px;
        line-height: 26px;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.35);
        text-align: center;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.45);
        cursor: pointer;
    }
    .switch-label:active {
        font-weight: bold;
    }

    .switch-label-off {
        padding-left: 2px;
    }

    .switch-label-on {
        padding-right: 2px;
    }

    /*
     * Note: using adjacent or general sibling selectors combined with
     *       pseudo classes doesn't work in Safari 5.0 and Chrome 12.
     *       See this article for more info and a potential fix:
     *       http://css-tricks.com/webkit-sibling-bug/
     */
    .switch-input {
        display: none;
    }
    .switch-input:checked + .switch-label {
        font-weight: bold;
        color: rgba(0, 0, 0, 0.65);
        text-shadow: 0 1px rgba(255, 255, 255, 0.25);
        -webkit-transition: 0.15s ease-out;
        -moz-transition: 0.15s ease-out;
        -o-transition: 0.15s ease-out;
        transition: 0.15s ease-out;
    }
    .switch-input:checked + .switch-label-on ~ .switch-selection {
        left: 60px;
        /* Note: left: 50% doesn't transition in WebKit */
    }

    .switch-selection {
        display: block;
        position: absolute;
        z-index: 1;
        top: 2px;
        left: 2px;
        width: 58px;
        height: 22px;
        background: #65bd63;
        border-radius: 3px;
        background-image: -webkit-linear-gradient(top, #9dd993, #65bd63);
        background-image: -moz-linear-gradient(top, #9dd993, #65bd63);
        background-image: -o-linear-gradient(top, #9dd993, #65bd63);
        background-image: linear-gradient(to bottom, #9dd993, #65bd63);
        -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
        -webkit-transition: left 0.15s ease-out;
        -moz-transition: left 0.15s ease-out;
        -o-transition: left 0.15s ease-out;
        transition: left 0.15s ease-out;
    }
    .switch-blue .switch-selection {
        background: #3aa2d0;
        background-image: -webkit-linear-gradient(top, #4fc9ee, #3aa2d0);
        background-image: -moz-linear-gradient(top, #4fc9ee, #3aa2d0);
        background-image: -o-linear-gradient(top, #4fc9ee, #3aa2d0);
        background-image: linear-gradient(to bottom, #4fc9ee, #3aa2d0);
    }
    .switch-yellow .switch-selection {
        background: #c4bb61;
        background-image: -webkit-linear-gradient(top, #e0dd94, #c4bb61);
        background-image: -moz-linear-gradient(top, #e0dd94, #c4bb61);
        background-image: -o-linear-gradient(top, #e0dd94, #c4bb61);
        background-image: linear-gradient(to bottom, #e0dd94, #c4bb61);
    }

</style>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion" >

            <p class="centered"><a href="#"><img src="<?php echo $_SESSION['userpic']; ?>" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?php echo $_SESSION['name']; ?></h5><hr>
            <li class="mt">
                <a href="<?php echo URL;?>dashboard/index">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class='drags' style="display: none">
            <div id="row">
                <div class="col-md-6 d" type="image" style="border:1px solid white; color:white"><i class="fa fa-image fa-3x draggable" type="image"></i> Image</div>
                <div class="col-md-6 d" type = "text" style="border:1px solid white; color:white"><i class="fa fa-font fa-3x draggable" type="text"></i>Text</div>
            </div>
                <br>
            </li>
            <li class="sub-menu">
                <a href="<?php echo URL; ?>page" >
                    <i class="fa fa-desktop"></i>
                    <span>Pages</span>
                </a>
                <ul class="sub" style="display:block !important; text-align: center !important;">
                    <?php
                    try {
                        include_once "models/page_model.php";

                        $pageModel = new Page_Model();
                        $this->data = $pageModel->getList();
                    }
                    catch(Exception $e){
                        var_dump($e);
                    }
                    foreach($this->data as $key=>$value){;
                        echo "<li><div class='page_container' id='cont_".$value["pageID"]."'>"
                            ."<a href='".URL."page/view/".$value["pageID"]."' id='pageNameLink'>" . $value["pageName"] ."</a>"
                            ."<a href='javascript:void(0);' class='pageEdit'  onclick='editPageName(this);'><i class='fa fa-pencil'></i></a>"
                            ."<a href='javascript:void(0);' class='pageDelete' onclick='deletePage($(this));'><i class='fa fa-trash-o'></i></a>"
                            ."</div></li>";
                    }
                    ?>
                    <li>

                        <form method="post" action="#" id="addPage" style="
    width: 140px;
    border: 2px solid white;
    padding: 5px;
    background: rgb(93, 100, 118);
    border-radius: 10px;
    color: white;
    margin-top: 10px;
"><input type="text" autocomplete="off" name="pageName" required id="addpagetext" class="" style="
    width: 50%;
    border: 0px solid #FFEDE8;
    /* float: left; */     text-align: center;
    height: 20px;
    background: transparent;
    /* padding-right: 25px; */
    width: 80%;
"><button id="addpagebtn" style="
    -webkit-appearance: inherit;
    height: 20px;
    border: 0px;
    width: 20%;
    font-size: 25px;
    float: right;
    background: transparent;
">+</button></form></li>
                </ul>
            </li>


        </ul><br>
        <div id="settings"><i class="fa fa-gears"></i> Settings</div>
        <div class="switch">
            <input type="radio" class="switch-input" name="view" value="save" id="save" checked>
            <label for="save" class="switch-label switch-label-off">Save</label>
            <input type="radio" class="switch-input" name="view" value="edit" id="edit">
            <label for="edit" class="switch-label switch-label-on">Edit</label>
            <span class="switch-selection"></span>
        </div>
        <!-- sidebar menu end-->
    </div>

</aside>
<!--sidebar end-->