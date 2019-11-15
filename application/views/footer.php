<!-- Footer section -->
<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>About</h2>
                    <P class="text-white">Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</P>
                    <img src="<?php echo assets_url('img/core-img/logo.png') ?>" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget about-widget">
                    <h2>Questions</h2>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Track Orders</a></li>
                        <li><a href="">Returns</a></li>
                        <li><a href="">Jobs</a></li>
                        <li><a href="">Shipping</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                    <ul>
                        <li><a href="">Partners</a></li>
                        <li><a href="">Bloggers</a></li>
                        <li><a href="">Support</a></li>
                        <li><a href="">Terms of Use</a></li>
                        <li><a href="">Press</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget contact-widget">
                    <h2>Questions</h2>
                    <div class="con-info">
                        <span>A.</span>
                        <p>Aviguide Cameroun</p>
                    </div>
                    <div class="con-info">
                        <span>N.</span>
                        <p>Yoko-Ngaoundéré, Cameroun </p>
                    </div>
                    <div class="con-info">
                        <span>T.</span>
                        <p>+237 695 95 67 07</p>
                    </div>
                    <div class="con-info">
                        <span>E.</span>
                        <p>aviguide-cameroun@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-links-warp">
        <div class="container">
            <div class="social-links text-center">
                <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
                <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
            </div>

            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

        </div>
    </div>
</section>
<!-- Footer section end -->

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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/r-2.2.2/datatables.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>    <script type="text/javascript">

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