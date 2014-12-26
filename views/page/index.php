

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
<section class="wrapper site-min-height">
<h3><i class="fa fa-angle-right"></i> Your Pages</h3>
<div class="row mt">
<div class="col-lg-12">
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
            echo '</div><div class="row mtbox"><div class="col-md-2 col-sm-2 col-md-offset-1 box0">';
        }
    else if($key==0){
        echo '<div class="col-md-2 col-sm-2 col-md-offset-1 box0">';
    }
    else{
        echo '<div class="col-md-2 col-sm-2 box0">';
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
</div>

</section>
</section>

<!--main content end-->

</body>
</html>
