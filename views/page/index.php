

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
<section class="wrapper site-min-height">
<div class="row">
<div class="col-lg-9">
    <div class="row mtbox">
    <?php
    try {
        include_once "models/page_model.php";

        $pageModel = new Page_Model();
        $this->data = $pageModel->getList();
    }
    catch(Exception $e){
        var_dump($e);
    }
    foreach($this->data as $key=>$value){
        if(($key+1) % 4 == 0){
            echo '</div><div class="row mtbox"><div class="col-md-3 col-sm-3 col-md-offset-1 box0">';
        }
    else if($key==0){
        echo '<div class="col-md-3 col-sm-3 col-md-offset-1 box0">';
    }
    else{
        echo '<div class="col-md-3 col-sm-3 box0">';
    }

        ?>


            <div class="box1" id="page_<?php echo $value['pageID'];?>">
                <!--<span class="li_news"></span>-->
                <h3><?php echo $value['pageName'];?></h3>
            </div>
            <br>
            <p>
                <button type="button" class="btn btn-danger" id="page_<?php echo $value['pageID'];?>" ><i class="fa fa-minus-square"></i> Delete</button>
                <button type="button" class="btn btn-primary" id="page_<?php echo $value['pageID'];?>"><i class="fa fa-pencil-square"></i> Update</button>
            </p>
        </div>

        <?php
}
    ?>
    </div>
</div>
    <!-- col 9 close -->
    <div class="col-lg-3 ds">
        <!--COMPLETED ACTIONS DONUTS CHART-->
        <div class="col-lg-14">
            <!-- WHITE PANEL - TOP USER -->
            <div class="white-panel pn">
                <div class="white-header">
                    <h5>Account</h5>
                </div>
                <p><h4>Your API Details</h4></p>
                <p>API Key:<br><b> <?php echo $this->apiKey;?></b></p>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <p class="small mt">MEMBER SINCE</p>
                        <p>2014</p>
                    </div>
                    <div class="col-md-6">
                        <p class="small mt">TOTAL PAGES</p>
                        <p><?php echo sizeof($this->data);?></p>
                    </div>
                </div>
            </div>
        </div><!-- /col-md-4 -->
        <br>



        <!-- CALENDAR-->
        <div id="calendar" class="mb">
            <div class="panel green-panel no-margin">
                <div class="panel-body">
                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                        <div class="arrow"></div>
                        <h3 class="popover-title" style="disadding: none;"></h3>
                        <div id="date-popover-content" class="popover-content"></div>
                    </div>
                    <div id="my-calendar"></div>
                </div>
            </div>
        </div><!-- / calendar -->

    </div><!-- /col-lg-3 -->

</div>

</section>
</section>

<!--main content end-->

</body>
</html>
