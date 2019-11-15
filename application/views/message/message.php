<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image:url(<?= assets_url('img/bg-img/hero-1.jpg') ?>)"></div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<section class="dorne-features-destinations-area p-1" style="height: 100%">
    <div class="jumbotron m-0 p-2 bg-transparent">
        <div class=" p-0 m-0 row" style=" bottom: 0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.10), 0 6px 10px 0 rgba(0, 0, 0, 0.01);">
            <div class="card col-4 p-0 m-0" style="overflow: hidden;">
                <div class="card bg-sohbet border-0 m-0 p-0" style="height: 100%; overflow: scroll; ">
                    <div class="card border-0 m-0 p-0 position-relative bg-white" style="overflow-y: auto; height: 100%;">
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item bg-success text-white">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card border-0 col-8 p-0 m-0" style="overflow: hidden;">

                <div class="card-header p-1 bg-light border border-top-0 border-left-0 border-right-0" style="color: rgb(52,156,59);">
                    <h6 class="float-left" style="margin: 0px; margin-left: 10px;"> Yusuf Bulgurcu  </br><small> İstanbul, TR </small></h6>

                </div>

                <div class="card bg-sohbet border-0 m-0 p-0" style="height: 70vh;overflow: scroll; ">
                    <div id="sohbet" class="card border-0 m-0 p-0 position-relative bg-transparent" style="overflow-y: auto; height: 100%;">

                        <div class="balon1 p-2 m-0 position-relative" data-is="You - 3:20 pm">

                            <a class="float-right"> Hey there! What's up? </a>

                        </div>

                        <div class="balon2 p-2 m-0 position-relative" data-is="Yusuf - 3:22 pm">

                            <a class="float-left sohbet2"> Checking out iOS7 you know.. </a>

                        </div>

                        <div class="balon1 p-2 m-0 position-relative" data-is="You - 3:23 pm">

                            <a class="float-right"> Check out this bubble! </a>

                        </div> <div class="balon1 p-2 m-0 position-relative" data-is="You - 3:20 pm">

                            <a class="float-right"> Hey there! What's up? </a>

                        </div>

                        <div class="balon2 p-2 m-0 position-relative" data-is="Yusuf - 3:22 pm">

                            <a class="float-left sohbet2"> Checking out iOS7 you know.. </a>

                        </div>

                        <div class="balon1 p-2 m-0 position-relative" data-is="You - 3:23 pm">

                            <a class="float-right"> Check out this bubble! </a>

                        </div>

                        <div class="balon2 p-2 m-0 position-relative" data-is="Yusuf - 3:26 pm">

                            <a class="float-left sohbet2"> It's pretty cool! </a>

                        </div>

                        <div class="balon1 p-2 m-0 position-relative" data-is="You - 3:28 pm">

                            <a class="float-right"> Yeah it's pure CSS & HTML </a>

                        </div>

                        <div class="balon2 p-2 m-0 position-relative" data-is="Yusuf - 3:33 pm">

                            <a class="float-left sohbet2"> Wow that's impressive. But what's even more impressive is that this bubble is really high. </a>

                        </div>

                    </div>
                </div>
                <div class=" p-0 bg-light border border-bottom-0 border-left-0 border-right-0">
                    <form class="m-0 p-0" action="" method="POST" autocomplete="off">

                        <div class="row m-0 p-0">
                            <div class="col-9 m-0 p-1">

                                <input id="text" class="mw-100 border form-control" type="text" name="text" title="Type a message..." placeholder="Type a message..." required>

                            </div>
                            <div class="col-3 m-0 p-1">

                                <button class="btn btn-outline-secondary border w-100" title="Gönder!" style="padding-right: 16px;"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>

                            </div>
                        </div>

                    </form>

                </div>


            </div>
        </div>
    </div>
</section>
<!-- ***** Contact Area End ***** -->
<script type="text/javascript">
    $(document).ready(function(){
        <?php if($val = get_flash_data()){
        echo 'setTimeout(function(){
                    alertify.'.$val[0].'("'.$val[1].'");
                }, 750);';
        } ?>
    });
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<style>
    body{
        background: #ddd;
        height: 100%;
    }
    a {
        text-decoration: none !important;
    }
    label {
        color: rgb(52, 156, 59) !important;
    }
    .btn:focus, .btn:active:focus, .btn.active:focus {
        outline: none !important;
        box-shadow: 0 0px 0px rgb(34, 140, 50) inset, 0 0 0px rgba(52, 156, 59, 0.8);
    }

    .card{
        overflow-y: hidden ;
    }

    .card ::-webkit-scrollbar { display: none;}             /* 1 */
    .card ::-webkit-scrollbar-button {display: none;}      /* 2 */
    .card ::-webkit-scrollbar-track {}       /* 3 */
    .card ::-webkit-scrollbar-track-piece {display: none;} /* 4 */
    ::-webkit-scrollbar-thumb {}       /* 5 */
    .card ::-webkit-scrollbar-corner {}      /* 6 */
    .card ::-webkit-resizer {display: none;}


    textarea:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="color"]:focus,
    .uneditable-input:focus {
        border-color: rgb(111, 156, 110); color: rgb(34, 140, 50); opacity: 0.9;
        box-shadow: 0 0px 0px rgb(119, 156, 130) inset, 0 0 10px rgba(120, 144, 156,0.3);
        outline: 0 none; }
    .card::-webkit-scrollbar {
        width: 1px;
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 9px;
        background: rgba(111, 156, 110, 0.99);
    }
    .balon1, .balon2 {

        margin-top: 5px !important;
        margin-bottom: 5px !important;

    }
    .balon1 a {

        background: #65f580;
        color: #fff !important;
        border-radius: 20px 20px 3px 20px;
        display: block;
        max-width: 75%;
        padding: 7px 13px 7px 13px;

    }

    .balon1:before {

        content: attr(data-is);
        position: absolute;
        right: 15px;
        bottom: -0.8em;
        display: block;
        font-size: .750rem;
        color: rgba(84, 110, 122,1.0);

    }

    .balon2 a {

        background: #f1f1f1;
        color: #000 !important;
        border-radius: 20px 20px 20px 3px;
        display: block;
        max-width: 75%;
        padding: 7px 13px 7px 13px;

    }

    .balon2:before {

        content: attr(data-is);
        position: absolute;
        left: 13px;
        bottom: -0.8em;
        display: block;
        font-size: .750rem;
        color: rgba(84, 110, 122,1.0);

    }

    .bg-sohbet:before {

        content: "";
        background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTAgOCkiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGNpcmNsZSBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgY3g9IjE3NiIgY3k9IjEyIiByPSI0Ii8+PHBhdGggZD0iTTIwLjUuNWwyMyAxMW0tMjkgODRsLTMuNzkgMTAuMzc3TTI3LjAzNyAxMzEuNGw1Ljg5OCAyLjIwMy0zLjQ2IDUuOTQ3IDYuMDcyIDIuMzkyLTMuOTMzIDUuNzU4bTEyOC43MzMgMzUuMzdsLjY5My05LjMxNiAxMC4yOTIuMDUyLjQxNi05LjIyMiA5LjI3NC4zMzJNLjUgNDguNXM2LjEzMSA2LjQxMyA2Ljg0NyAxNC44MDVjLjcxNSA4LjM5My0yLjUyIDE0LjgwNi0yLjUyIDE0LjgwNk0xMjQuNTU1IDkwcy03LjQ0NCAwLTEzLjY3IDYuMTkyYy02LjIyNyA2LjE5Mi00LjgzOCAxMi4wMTItNC44MzggMTIuMDEybTIuMjQgNjguNjI2cy00LjAyNi05LjAyNS0xOC4xNDUtOS4wMjUtMTguMTQ1IDUuNy0xOC4xNDUgNS43IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTg1LjcxNiAzNi4xNDZsNS4yNDMtOS41MjFoMTEuMDkzbDUuNDE2IDkuNTIxLTUuNDEgOS4xODVIOTAuOTUzbC01LjIzNy05LjE4NXptNjMuOTA5IDE1LjQ3OWgxMC43NXYxMC43NWgtMTAuNzV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjcxLjUiIGN5PSI3LjUiIHI9IjEuNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjE3MC41IiBjeT0iOTUuNSIgcj0iMS41Ii8+PGNpcmNsZSBmaWxsPSIjMDAwIiBjeD0iODEuNSIgY3k9IjEzNC41IiByPSIxLjUiLz48Y2lyY2xlIGZpbGw9IiMwMDAiIGN4PSIxMy41IiBjeT0iMjMuNSIgcj0iMS41Ii8+PHBhdGggZmlsbD0iIzAwMCIgZD0iTTkzIDcxaDN2M2gtM3ptMzMgODRoM3YzaC0zem0tODUgMThoM3YzaC0zeiIvPjxwYXRoIGQ9Ik0zOS4zODQgNTEuMTIybDUuNzU4LTQuNDU0IDYuNDUzIDQuMjA1LTIuMjk0IDcuMzYzaC03Ljc5bC0yLjEyNy03LjExNHpNMTMwLjE5NSA0LjAzbDEzLjgzIDUuMDYyLTEwLjA5IDcuMDQ4LTMuNzQtMTIuMTF6bS04MyA5NWwxNC44MyA1LjQyOS0xMC44MiA3LjU1Ny00LjAxLTEyLjk4N3pNNS4yMTMgMTYxLjQ5NWwxMS4zMjggMjAuODk3TDIuMjY1IDE4MGwyLjk0OC0xOC41MDV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxwYXRoIGQ9Ik0xNDkuMDUgMTI3LjQ2OHMtLjUxIDIuMTgzLjk5NSAzLjM2NmMxLjU2IDEuMjI2IDguNjQyLTEuODk1IDMuOTY3LTcuNzg1LTIuMzY3LTIuNDc3LTYuNS0zLjIyNi05LjMzIDAtNS4yMDggNS45MzYgMCAxNy41MSAxMS42MSAxMy43MyAxMi40NTgtNi4yNTcgNS42MzMtMjEuNjU2LTUuMDczLTIyLjY1NC02LjYwMi0uNjA2LTE0LjA0MyAxLjc1Ni0xNi4xNTcgMTAuMjY4LTEuNzE4IDYuOTIgMS41ODQgMTcuMzg3IDEyLjQ1IDIwLjQ3NiAxMC44NjYgMy4wOSAxOS4zMzEtNC4zMSAxOS4zMzEtNC4zMSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjEuMjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPjwvZz48L3N2Zz4=');
        opacity: 0.06;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        height:100%;
        position: absolute;

    }
</style>