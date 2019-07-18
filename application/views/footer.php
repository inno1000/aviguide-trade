    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="<?= js_url('jquery/jquery-2.2.4.min') ?>"></script>
    <!-- Popper js -->
    <script src="<?= js_url('bootstrap/popper.min') ?>"></script>
    <!-- Bootstrap-4 js -->
    <script src="<?= js_url('bootstrap/bootstrap.min') ?>"></script>
    <script src="<?php echo js_url('alertify/alertify.min')?>"></script>
    <!-- All Plugins js -->
    <script src="<?= js_url('others/plugins') ?>"></script>
    <!-- Active JS -->
    <script src="<?= js_url('active') ?>"></script>
    <script src="<?php echo  js_url('select2.min'); ?>"></script>
    <!-- daterange js -->
    <script src="<?php echo js_url('moment.min') ?>"></script>
    <script src="<?php echo js_url('daterangepicker/daterangepicker') ?>"></script>
    <script src="<?php echo  js_url('fileUpload/jquery.fileuploader.min'); ?>" type="text/javascript"></script>

    <script type="text/javascript">

        var initdTable=false;
        function initDataTable($element,$page,$button){

            initdTable = true;
            $($element).dataTable({

                pageLength: $page,
                buttons:  [
                    'copy', 'excel',{
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    }
                ],
                "language": {
                    "decimal": ".",
                    "thousands": ","
                },
                dom: 'Bfrtip',
                drawCallback: function () {
                    $('[data-toggle="popover"]').popover({
                        "html": true,
                        trigger: 'hover',
                        placement: 'left'
                    })
                    $(".btn-history").click(function(){

                        var $this = $(this);
                        $type = $this.attr('data-type');
                        $tick = $this.attr('data-tick');
//            console.log($tick);

                        $.post("/settings/getTransaction",{tick:$tick},function(data){
                            $('#info_t'+$tick).html(data);
                        });
                    });
                }
            });
        }

        function formatMoney(num , localize,fixedDecimalLength){
            num=num+"";
            var str=num;
            var reg=new RegExp(/(\D*)(\d*(?:[\.|,]\d*)*)(\D*)/g)
            if(reg.test(num)){
                var pref=RegExp.$1;
                var suf=RegExp.$3;
                var part=RegExp.$2;
                if(fixedDecimalLength/1)part=(part/1).toFixed(fixedDecimalLength/1);
                if(localize)part=(part/1).toLocaleString();
                str= pref +part.match(/(\d{1,3}(?:[\.|,]\d*)?)(?=(\d{3}(?:[\.|,]\d*)?)*$)/g ).join(' ')+suf ;
            };
            return str;
        }
        $(document).ready(function(){
            if(initdTable===false)
                initDataTable($('#dataTable'),25,['pdf', 'excel']);
        });

    </script>
</body>

</html>