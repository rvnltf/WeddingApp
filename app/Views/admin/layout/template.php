<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | <?=$title?></title>
    <link href="/img/icon/en.png" rel="shortcut icon" type="image/x-icon" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style>
    .file {
        visibility: hidden;
        position: absolute;
    }

    .img-thumbnail {
        margin-bottom: 10px;
    }
    </style>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light"><a class="nav-link" href="/admin">Admin</a></div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/data_undangan">Data Undangan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/orangtua">Orangtua</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/background">Background</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/gallery">Gallery</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/timeline">Timeline Pasangan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/ucapan">Ucapan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/wedding_gift">Wedding Gift</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="/admin/buku_undangan">Buku
                    Undangan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/logout">Logout</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-default" id="sidebarToggle"><span
                            class="navbar-toggler-icon"></span></button>
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout"><span class="glyphicon glyphicon-log-out"></span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <?= $this->renderSection('content') ?>

        </div>
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        $(function() {
            $('#akad_awal').timepicker({
                showInputs: false
            });
            $('#akad_akhir').timepicker({
                showInputs: false
            });
            $('#resepsi_awal').timepicker({
                showInputs: false
            });
            $('#resepsi_akhir').timepicker({
                showInputs: false
            });
            $('#tanggal_akad').datepicker({
                uiLibrary: 'bootstrap4'
            });
            $('#tanggal_resepsi').datepicker({
                uiLibrary: 'bootstrap4'
            });
            $('#tanggal_timeline').datepicker({
                uiLibrary: 'bootstrap4'
            });

            $(document).on("click", ".browse-background", function() {
                var file = $(this).parents().find(".file-background");
                file.trigger("click");
            });
            $('.file-background').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file-background").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-background").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
            $(document).on("click", ".browse-gallery", function() {
                var file = $(this).parents().find(".file-gallery");
                file.trigger("click");
            });

            $('.file-gallery').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file-gallery").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-gallery").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            $(document).on("click", ".browse-pria", function() {
                var file = $(this).parents().find(".file-pria");
                file.trigger("click");
            });
            $('.file-pria').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file-pria").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-pria").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            $(document).on("click", ".browse-wanita", function() {
                var file = $(this).parents().find(".file-wanita");
                file.trigger("click");
            });
            $('.file-wanita').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file-wanita").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-wanita").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        });

        // var isNS = (navigator.appName == "Netscape") ? 1 : 0;
        // if (navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN || Event.MOUSEUP);

        // function mischandler() {
        //     return false;
        // }

        // function mousehandler(e) {
        //     var myevent = (isNS) ? e : event;
        //     var eventbutton = (isNS) ? myevent.which : myevent.button;
        //     if ((eventbutton == 2) || (eventbutton == 3)) return false;
        // }
        // document.oncontextmenu = mischandler;
        // document.onmousedown = mousehandler;
        // document.onmouseup = mousehandler;
        </script>
</body>

</html>