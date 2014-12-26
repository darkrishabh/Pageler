<section id="main-content">
    <section class="wrapper site-min-height">
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
<style>
   html,body{
       -webkit-user-select: text;
       -khtml-user-select: text;
       -moz-user-select: text;
       -o-user-select: text;
       user-select: text;
    }

    *[contenteditable] {-webkit-user-select: text;
        -khtml-user-select: text;
        -moz-user-select: text;
        -o-user-select: text;
        user-select: text;
    }
    .gridster-delete{
        color: white;
        float:right;
        margin-right: 10px !important;
        cursor: pointer;
    }
    .gridster li header {
        background: #2F93E7;
        display: block;
        font-size: 11px;
        height: 17px;
        padding: 0px 0 0px;
        margin-bottom: 20px;
        cursor: move;
    }
    .gridster li{
        overflow: hidden;
        border:1px dashed #00c5de;
        background: white !important;
    }
    .gridster li textarea{
        border:0px;
        outline: none;
    }
   .gridster li textarea:focus{
       border:0px;
       outline: none;

   }
</style>

                <div id="text">
                    <input id="txtBox" type="textbox" value="" style="display:none;" />
                </div>

                <div class="gridster">
                    <ul>

                    </ul>
                </div>


                <script src="http://gridster.net/dist/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>
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
                    var prev_col=1;
                    var m = "text";
                    var prev_row=1;
                    var col = 1;
                    var row=1;
                    var prev = null;


                    $(function(){

                        gridster = $(".gridster ul").gridster({
                            widget_base_dimensions: [100, 55],
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
                                    htmlData: $($w).children('.editor').val()
                                };
                            }

                        }).data('gridster');
                        $(function() {
                            gridster.remove_all_widgets();
                            $.each(serialization, function() {
                                gridster.add_widget('<li><header><div class=\"gridster-delete\" onclick=\"gridDelete(this);\">X</div></header><textarea class=\"editor\" style=\"resize: none; width: 95%;\">'+this.htmlData+'</textarea></li>', this.size_x, this.size_y, this.col, this.row);
                            });
                            $(function() {
                                $('.gridster li header').hide();
                                $('.gridster li textarea').attr('disabled','disabled');
                                gridster.disable();
                                gridster.disable_resize();
                            });
                        });

                        $( ".draggable" ).draggable({
                            revert: true,
                            opacity: 0.7,
                            start: function(){

                                m = $(this).attr('type');
                                console.log(m);
                                prev_col=1;
                                prev_row=1;
                                col = 1;
                                row=1;
                                prev = null;
                            }
                        });
                        $( ".gridster " ).droppable({
                            over: function( event, ui ) {

                                $(".gridster li").on('mouseenter', function(e){
                                    col = $(e.target).attr('data-col');
                                    row = $(e.target).attr('data-row');
                                    console.log($(e.target).attr('data-col') +"," + $(e.target).attr('data-row') );
                                    if(((prev_col!=col || prev_row!=row) && (col!=null || row!=null))
                                        || (prev_col==1 && prev_row ==1 && col == 1 && row == 1)){
                                        try{

                                            console.log("remove");

                                            gridster.remove_widget($(".new"));
                                        }
                                        catch(e)
                                        {
                                            console.log(e);
                                        }
                                        if(m == "image"){
                                            x = "gridster.add_widget('<li class=\"new\">add image</li>', 1, 1, "+$(e.target).attr('data-col')+", "+$(e.target).attr('data-row')+");";
                                            prev = eval(x);
                                        }
                                        else{
                                            x = "gridster.add_widget('<li class=\"new\">new</li>', 1, 1, "+$(e.target).attr('data-col')+", "+$(e.target).attr('data-row')+");";
                                            prev = eval(x);
                                        }
                                        //prev = gridster.add_widget('<li id="new">new</li>', 1, 1, $(e.target).attr('data-col'), $(e.target).attr('data-row'));
                                        //prev = eval(x);
                                        prev_col=col;
                                        prev_row=row;
                                    }
                                });
                            },
                            drop: function( event, ui ) {
                                //$( ".draggable" ).removeAttr("style");

                                $(".gridster li").off('mouseenter');
                                try{

                                    console.log("remove");
                                    gridster.remove_widget($(".new"));
                                }
                                catch(e)
                                {
                                    console.log(e);
                                }
                                y = "gridster.add_widget('<li id =\"new\"  > <header><div class=\"gridster-delete\" onclick=\"gridDelete(this);\">X</div></header><textarea class=\"editor\" style=\"resize: none; width: 95%;\">hi</textarea> </li>', 3, 3,"+prev_col+","+prev_row+")";
                                eval(y);
                                prev_col=1;
                                prev_row=1;
                                col = 1;
                                row=1;
                                m="";
                                $(function() {
                                    $('.editor').autogrow();
                                });
                            }
                        });
                        $(function() {
                            $('.editor').autogrow();
                        });
                    });



                    $(function(){
                        clicked=0;


                        $('.js-resize-random').on('click', function() {
                            gridster.resize_widget(gridster.$widgets.eq(getRandomInt(0, 9)),
                                getRandomInt(1, 4), getRandomInt(1, 4))
                        });

                        $(".editor").focus(function(){
                            $(this).parent().css("border","1px solid #9ecaed");
                            $(this).parent().css("box-shadow", "#9ecaed");


                        })
                            .blur(function(){
                                $(this).parent().css("border","0px solid #9ecaed");
                                $(this).parent().css("box-shadow", "none");
                            });




                    });
                    $('input#edit').click(function(){
                        $('.gridster li header').show();
                        $('.gridster li textarea').removeAttr('disabled');
                        gridster.enable();
                        gridster.enable_resize();
                        $(".drags").show();
                    })
                    $('input#save').click(function(){
                        gridData = gridster.serialize();
                        gridData = "pageData="+JSON.stringify(gridData);
                        console.log(JSON.stringify(gridData));
                        $('.gridster li header').hide();
                        $('.gridster li textarea').attr('disabled','disabled');
                        gridster.disable();
                        gridster.disable_resize();
                        $.post( "<?PHP echo URL;?>page/update/<?php echo $this->pageValues['pageID'] ?>", gridData)
                            .done(function( result ) {

                                $(function () {
                                    var unique_id = $.gritter.add({
                                        // (string | mandatory) the heading of the notification
                                        title: 'Page Updated',
                                        // (string | mandatory) the text inside the notification
                                        text: 'Page Succesfully Updated',
                                        // (string | optional) the image to display on the left
                                        image: false,
                                        // (bool | optional) if you want it to fade out on its own or just sit there
                                        sticky: false,
                                        // (int | optional) the time you want it to be alive for before fading out
                                        time: '',
                                        // (string | optional) the class name you want to apply to that specific message
                                        class_name: 'my-sticky-class'
                                    });


                                });


                            });
                        $(".drags").hide();
                    })
                    function gridDelete(element){
                       console.log(gridster.remove_widget($(element).parent().parent()));
                    }
                </script>

                </div>
            </div>
        </section>
    </section>
