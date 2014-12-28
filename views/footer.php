</div>

<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        2014 - Rishabh Mehan
        <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo URL; ?>public/assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript"
        src="<?php echo URL; ?>public/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo URL; ?>public/assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo URL; ?>public/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>public/assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="<?php echo URL; ?>public/assets/js/common-scripts.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>public/assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="<?php echo URL; ?>public/assets/js/sparkline-chart.js"></script>
<script src="<?php echo URL; ?>public/assets/js/zabuto_calendar.js"></script>


<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event",}
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>

<script>
    $("#addpagebtn").click(function () {
        //add page - post silently
        var page_name = $("input#addpagetext").val();
        console.log(page_name);
        var data = $("form#addPage").serialize();
        console.log(data);
        var x = $('input:text[value=""]', '#addPage');
        console.log(x.size());
        if (x.size() != 0) {
            $("input#addpagetext").parent().css('border-color', 'red');
            alert("Enter a Name");

        } else {
            $("input#addpagetext").parent().css('border-color', 'white');
            $.post("<?PHP echo URL;?>page/add", data)
                .done(function (result) {

                    var html = "<li><div class='page_container' id='cont_" + result + "'>"
                        + "<a href='<?php echo URL;?>page/view/" + result + " ' id='pageNameLink'>" + page_name + "</a>"
                        + "<a href='javascript:;' class='pageEdit'  onclick='editPageName(this);'><i class='fa fa-pencil'></i></a>"
                        + "<a href='javascript:void(0);' class='pageDelete' onclick='deletePage($(this));'><i class='fa fa-trash-o'></i></a>"
                        + "</div></li>";


                    console.log(html);
                    $("form#addPage").parent().before(html);
                    $("form#addPage")[0].reset();

                });

        }
        return false;
    })
    function deletePage(object) {
        var page_id = object.parent().attr("id").split('_')[1];
        $.post("<?PHP echo URL;?>page/delete/" + page_id)
            .done(function () {
                object.parent().remove();

            });


    }
    function editPageName(ele) {
        nameEle = $(ele).parent().children('#pageNameLink');
        var page_id = $(ele).parent().attr("id").split('_')[1];
        console.log(page_id);
        $(nameEle).attr('style', 'display:none !important');
        nameEle.after('<input type="text" id="editpageNameLink" style="background:rgb(54, 61, 77); width:65%;' +
        'border:1px solid white;" value="' + nameEle.text() + '"/>');
        $('#editpageNameLink').focus();
        $('#editpageNameLink').blur(function () {
            //update pageName
            pageName = $('#editpageNameLink').val();
            data = "pageName=" + pageName;
            console.log(data);
            $(nameEle).removeAttr('style');
            $(this).remove();
            $.post("<?PHP echo URL;?>page/update/" + page_id, data)
                .done(function (result) {
                    console.log(result);
                    if(result != "Success"){
                        // no change in the name
                        alert(1);
                        return false;
                    } else {

                        // change the name
                        $(nameEle).html( pageName );
                    }
                });
        });
    }
</script>

<div id="footer">
    (C) Rishabh Mehan
</div>


</body>
</html>