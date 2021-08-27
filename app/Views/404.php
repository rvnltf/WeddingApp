<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Error 404 - Page Not Found!</title>
    <link rel="stylesheet" type="text/css" href="/css/style404.css" />
    <link href="/img/icon/en.png" rel="shortcut icon" type="image/x-icon" />
</head>

<body>
    <div class="container">
        <img class="ops" src="./img/icon/404.svg" />
        <br />
        <h3>Halaman yang Anda cari tidak ditemukan.
            <br /> Bisa jadi karena url tersebut salah atau tidak tersedia.
        </h3>
    </div>
</body>

<script>
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
if (navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN || Event.MOUSEUP);

function mischandler() {
    return false;
}

function mousehandler(e) {
    var myevent = (isNS) ? e : event;
    var eventbutton = (isNS) ? myevent.which : myevent.button;
    if ((eventbutton == 2) || (eventbutton == 3)) return false;
}
document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;
</script>

</html>