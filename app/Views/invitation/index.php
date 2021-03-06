<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Font Awesome Icons-->
    <script src="https://kit.fontawesome.com/f2c150d561.js" crossorigin="anonymous">
    </script>
    <!--jQuery CDN-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/css/gallery-grid.css">
    <link rel="stylesheet" href="/css/form-comment.css">
    <link rel="stylesheet" href="/css/timeline.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js">
    </script>
    <link rel="icon" type="image/png" href="/img/icon/favicon.png" />
    <title>
        <?=$data_undangan['fullname_wanita']?> &
        <?=$data_undangan['fullname_pria']?>
    </title>
    <?php 
        $background1 = '';
        $background2 = '';
        foreach ($background as $value_bg) {
            if($value_bg['id_data'] == $data_undangan['id']){
                $value_bg['jenis']=='bg1'?$background1=$value_bg['foto'] : $background2=$value_bg['foto'];
            }
        }
        $orangtuaPria = '';
        $orangtuaWanita = '';
        $anakPria = '';
        $anakWanita = '';
        foreach ($orangtua as $value_orangtua) {
            if($value_orangtua['id_data'] == $data_undangan['id']){
                $orangtuaPria = $value_orangtua['orangtua_pria'];
                $orangtuaWanita = $value_orangtua['orangtua_wanita'];
                $anakPria = $value_orangtua['anak_pria'];
                $anakWanita = $value_orangtua['anak_wanita'];
            }
        }
    ?>
    <style>
    html {
        scroll-behavior: smooth;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Questrial", Sans-serif;
    }

    body {
        background-image: url('/img/bg/pattern.png');
        background-size: 7%;
        line-height: 2;
        color: #06526a;
        overflow: hidden;
        margin-bottom: 120px;
    }

    body.scroll {
        overflow: visible;
    }

    .audio {
        background-image: url('/img/bg/bottom-navbar.jpg');
        background-repeat: no-repeat;
        border: none;
        padding: 5px 8px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        border-radius: 50%;
        position: fixed;
        right: 1%;
        bottom: 50%;
        box-shadow: 1px 1px 10px 0px lightblue;
        transition: 0.2s;
        z-index: 100;
    }

    .navbar {
        background-image: url('/img/bg/bottom-navbar.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
        width: 60%;
        position: fixed;
        left: 50%;
        transform: translateX(-50%);
        bottom: -100px;
        margin-bottom: 10px;
        border-radius: 10px;
        box-shadow: 1px 1px 10px 0px lightblue;
        transition: 0.2s;
        z-index: 100;
    }

    .navbar.sticky {
        bottom: 0;
    }

    .navbar>ul>li>a {
        text-align: center;
        display: inline-block;
        padding: 5px 20px;
        font-size: 14px;
        line-height: 2;
        transition: font-size 0.2s;
    }

    .navbar>ul>li>a:hover {
        border-radius: 10px;
        background-color: lightblue;
    }

    .small {
        color: #06526a;
        text-transform: uppercase;
        font-weight: 500;
    }

    svg {
        width: 40px;
        transition: width 0.2s;
    }

    svg>path,
    svg>g>path {
        fill: #06526a;
    }

    .jumbotron {
        min-height: 660px;
        background-image: url("/img/bg/<?=$background1?$background1:'prewedding.jpg'?>");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        color: #f7f2ed;
        transition: 0.2s;
        border-radius: 0;
        margin: 0;
        padding: 0;
    }

    .box {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        content: '';
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        background-color: rgba(5, 5, 5, 0.25);
        overflow: hidden;
    }

    .nickname {
        font-size: 72px;
        font-family: 'Dancing Script', cursive;
        text-shadow: 1px 1px lightblue;
    }

    .fullname {
        font-size: 28xp;
        font-weight: bold;
    }

    .the-wedding-of {
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 5px;
        text-shadow: 1px 1px lightblue;
    }

    .untuk {
        font-size: 20px;
        line-height: 5;
    }

    a.buka-undangan {
        text-transform: uppercase;
        text-decoration: none;
        color: #06526a;
        background-color: #FFFFFF;
        border-radius: 35px;
        padding: 20px 50px 20px 50px;
        transition: 0.5s;
    }

    a.buka-undangan:hover,
    a.lokasi:hover,
    #post:hover,
    button.btn-gift:hover {
        color: #FFFFFF;
        background-color: #06526a;
    }

    .couple-page {
        padding: 30px 0;
    }

    .card {
        border-radius: 25px;
        overflow: hidden;
        align-items: center;
        justify-content: center;
        display: inline-block;
    }

    p {
        white-space: pre-line;
    }


    .event-page {
        min-height: 616px;
        background-image: url("/img/bg/<?=$background2?$background2:'prewedding2.jpg'?>");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        color: #f7f2ed;
        transition: 0.2s;
        border-radius: 0;
        margin: 0;
        padding: 50px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .event-page .card {
        background-color: rgba(5, 5, 5, 0.5);
        overflow: hidden;
    }

    .title {
        font-size: 36px;
        font-family: 'Dancing Script', cursive;
        text-shadow: 1px 1px lightblue;
    }

    .subtitle {
        font-size: 24px;
        text-shadow: 1px 1px lightblue;
    }

    a.lokasi,
    #post,
    button.btn-gift {
        text-decoration: none;
        color: #06526a;
        background-color: #FFFFFF;
        border-radius: 24px;
        padding: 12px 20px;
        transition: 0.5s;
    }

    @media screen and (max-width: 600px) {
        .navbar {
            width: 95%;
            transition: width 0.2s;
        }

        .navbar>ul>li>a {
            font-size: 11px;
            transition: font-size 0.2s;
        }

        .jumbotron {
            min-height: 820px;
        }

        svg {
            width: 30px;
            transition: width 0.2s;
        }

        .the-wedding-of {
            font-size: 16px;
        }

        .nickname {
            word-spacing: 100vw;
        }
    }
    </style>
</head>

<body>
    <div id="home" class="jumbotron text-center">
        <div class="box">
            <h3 class="item the-wedding-of">The Wedding of</h3>
            <h1 class="item nickname">
                <?=$data_undangan['nick_wanita']?> & <?=$data_undangan['nick_pria']?>
            </h1>
            <h3 class="item the-wedding-of">
                <?=date('d.m.Y', strtotime($data_undangan['tanggal_akad']))?>
            </h3>
            <p class="item untuk the-wedding-of">Dear : Anonim</p>
            <a href="#couple" class="item buka-undangan">Buka Undangan</a>
        </div>
    </div>
    <div id="couple" class="couple-page text-center">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-10">
                    <img src="/img/icon/en.png" alt="E & N" width="150" class="mb-5">
                    <?=$data_undangan['kalimat']?$data_undangan['kalimat']:'<p>Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu
                        dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di
                        antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda
                        (kebesaran Allah) bagi kaum yang berpikir.
                        (Ar-Rum: 21)</p>'?>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-10">
                    <div class="row">
                        <div class="col pas-foto">
                            <div class="card" style="width: 200px;">
                                <img src="/img/foto/<?=$data_undangan['foto_wanita']?$data_undangan['foto_wanita']:'avatar.jpg'?>"
                                    class="card-img-top" alt="Foto Wanita">
                            </div>
                            <h4 class="nickname"><?=$data_undangan['nick_wanita']?></h4>
                            <h5 class="fullname"><?=$data_undangan['fullname_wanita']?></h5>
                            <p>Putri <?=$anakWanita?urutan_anak($anakWanita):''?> dari:
                                <?=$orangtuaWanita?$orangtuaWanita:''?>
                            </p>
                        </div>
                        <div class="col pas-foto">
                            <div class="card" style="width: 200px;">
                                <img src="/img/foto/<?=$data_undangan['foto_pria']?$data_undangan['foto_pria']:'avatar.jpg'?>"
                                    class="card-img-top" alt="Foto Pria">
                            </div>
                            <h4 class="nickname"><?=$data_undangan['nick_pria']?></h4>
                            <h5 class="fullname"><?=$data_undangan['fullname_pria']?></h5>
                            <p>Putra <?=$anakPria?urutan_anak($anakPria):''?> dari:
                                <?=$orangtuaPria?$orangtuaPria:''?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
    <!-- <audio src="/musik/<?=$data_undangan['musik']?>" autoplay></audio> -->
    <button type="button" class="btn active audio" data-toggle="button" aria-pressed="false" autocomplete="off">
        <i id="volume" class="fas fa-volume-up"></i>
    </button>
    <div id="event" class="event-page text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width:100%;">
                        <div class="card-body">
                            <h5 class="card-title title">Detail Acara</h5>
                            <hr style="background-color: grey;">
                            <h6 class="card-subtitle subtitle">Akad Nikah</h6>
                            <p class="card-text tanggal">
                                <?= tanggal_indonesia_lengkap($data_undangan['tanggal_akad'])?></p>
                            <p><?=date('H:i', strtotime($data_undangan['akad_awal']))?>
                                ??? <?=date('H:i', strtotime($data_undangan['akad_akhir']))?>
                                WIB
                            </p>
                            <p class="card-text">
                                <?=$data_undangan['alamat_akad']?>
                            </p>
                            <?=$data_undangan['link_akad']?'<a href="'.$data_undangan['link_akad'].'" class="item lokasi">Petunjuk Lokasi</a>':''?>
                            <hr style="background-color: grey;">
                            <h6 class="card-subtitle subtitle">Resepsi</h6>
                            <p class="card-text tanggal">
                                <?= tanggal_indonesia_lengkap($data_undangan['tanggal_resepsi'])?></p>
                            <p><?=date('H:i', strtotime($data_undangan['resepsi_awal']))?>
                                ??? <?=date('H:i', strtotime($data_undangan['resepsi_akhir']))?>
                                WIB
                            </p>
                            <p class="card-text">
                                <?=$data_undangan['alamat_resepsi']?>
                            </p>
                            <?=$data_undangan['link_resepsi']?'<a href="'.$data_undangan['link_resepsi'].'" class="item lokasi">Petunjuk Lokasi</a>':''?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="gallery" class="gallery-page text-center mt-5">
        <div class="container gallery-container">
            <h5 class="title">Gallery</h5>
            <div class="tz-gallery">

                <div class="row">
                    <?php foreach($gallery as $value_gallery):?>
                    <?php if($value_gallery['id_data'] == $data_undangan['id']):?>
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="/img/bg/<?=$value_gallery['foto']?>">
                            <img src="/img/bg/<?=$value_gallery['foto']?>" alt="Gallery Foto">
                        </a>
                    </div>
                    <?php endif ?>
                    <?php endforeach ?>
                </div>

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-timeline7">
                            <?php foreach($timeline as $value_timeline):?>
                            <div class="timeline">
                                <div class="timeline-icon"><i class="fa fa-heart-o"></i></div>
                                <span class="year">
                                    <?=$value_timeline['tanggal']?>
                                </span>
                                <div class="timeline-content">
                                    <h5 class="title"><?=$value_timeline['judul']?></h5>
                                    <p class="description">
                                        <?=$value_timeline['rincian']?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="background-color:lightblue;">
    <div id="guest" class="guest-page text-center">
        <div class="container">
            <h5 class="title">Ucapan dan Do'a</h5>
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    <form id="align-form" action="/home/kirimUcapan" method="POST">
                        <?=csrf_field();?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control <?=$validation->hasError('nama')?'is-invalid':''?>"
                                value="<?=old('nama')?>">
                            <div class="invalid-feedback"><?=$validation->getError('nama')?></div>
                        </div>
                        <div class="form-group">
                            <label for="ucapan">Ucapan dan Do'a</label>
                            <textarea name="ucapan" id="ucapan" msg cols="30" rows="5"
                                class="form-control <?=$validation->hasError('ucapan')?'is-invalid':''?>"
                                value="<?=old('ucapan')?>"> </textarea>
                            <div class="invalid-feedback"><?=$validation->getError('ucapan')?></div>
                        </div>
                        <div class="form-group"> <button type="submit" id="post" class="btn">Kirim Ucapan</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <?php $i = 1;?>
                    <?php foreach($ucapan as $valueUcapan): ?>
                    <?php if($i%2==0): ?>
                    <div class="comment mt-4 text-justify">
                        <h4><?=$valueUcapan['nama']?></h4> <span>- <?= date('d/m/Y')?></span>
                        <hr style="background-color:lightblue;margin:0;">
                        <p><?=$valueUcapan['ucapan']?></p>
                    </div>
                    <?php else: ?>
                    <div class="text-justify darker mt-4">
                        <h4><?=$valueUcapan['nama']?></h4> <span>- <?= date('d/m/Y')?></span>
                        <hr style="background-color:lightblue;margin:0;">
                        <p><?=$valueUcapan['ucapan']?></p>
                    </div>
                    <?php endif; ?>
                    <?php $i++;?>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-gift" data-toggle="modal" data-target="#giftModal">
                        Wedding Gift
                    </button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-info navbar-expand" id="myNavbar">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="#home" class="nav-link">
                    <svg class="home" xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 512 512"
                        width="100%">
                        <path
                            d="m266 492c0 11.046875-8.953125 20-20 20h-226c-11.046875 0-20-8.953125-20-20v-275.332031c0-5.9375 2.636719-11.566407 7.195312-15.363281l236-196.667969c7.417969-6.183594 18.191407-6.183594 25.609376 0l236 196.667969c8.484374 7.070312 9.628906 19.679687 2.558593 28.167968-7.070312 8.484375-19.683593 9.628906-28.167969 2.558594l-223.195312-185.996094-216 180v245.964844h206c11.046875 0 20 8.953125 20 20zm214.339844-54.105469c-21.945313 26.457031-54.714844 50.679688-97.402344 72-5.628906 2.808594-12.246094 2.808594-17.875 0-42.6875-21.320312-75.457031-45.542969-97.398438-72-65.140624-78.527343-19.78125-165.195312 47.335938-165.195312 26.746094 0 46.421875 10.949219 59 21.226562 12.578125-10.277343 32.253906-21.226562 59-21.226562 67.246094 0 112.316406 86.859375 47.339844 165.195312zm-47.339844-125.195312c-27.667969 0-42.191406 20.742187-42.332031 20.949219-8.304688 12.527343-25.816407 11.761718-33.285157.082031-1.226562-1.722657-15.585937-21.03125-42.382812-21.03125-43.109375 0-80.136719 83.078125 59 156.8125 139.136719-73.734375 102.117188-156.8125 59-156.8125zm0 0"
                            fill="url(#a)" id="path7" />
                    </svg>
                    <span class="small d-block">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#couple" class="nav-link">
                    <svg class="couple" xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 512 512"
                        width="100%">
                        <path
                            d="m164.166 440.414c11.213 0 21.274-6.679 25.632-17.016 1.395-3.308-.156-7.12-3.464-8.514-3.309-1.395-7.12.156-8.515 3.464-2.321 5.507-7.681 9.065-13.653 9.065-5.973 0-11.332-3.559-13.654-9.065-1.394-3.309-5.206-4.859-8.514-3.464s-4.859 5.207-3.465 8.514c4.358 10.337 14.419 17.016 25.633 17.016z" />
                        <path
                            d="m154.085 402.891h20.172c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5h-20.172c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5z" />
                        <path
                            d="m98.812 376.429h2.691c-.264 1.491-.397 3.037-.397 4.599 0 9.031 4.453 16.379 9.927 16.379s9.928-7.348 9.928-16.379c0-9.032-4.454-16.379-9.928-16.379-.345 0-.701.031-1.014.09h-11.207c-3.223 0-5.845 2.622-5.845 5.845s2.622 5.845 5.845 5.845z" />
                        <path
                            d="m217.308 397.407c5.474 0 9.928-7.348 9.928-16.379 0-1.56-.133-3.105-.397-4.599h3.437c3.223 0 5.845-2.622 5.845-5.845s-2.622-5.845-5.845-5.845l-11.91.004c-.356-.062-.712-.094-1.057-.094-5.474 0-9.928 7.348-9.928 16.379-.001 9.031 4.452 16.379 9.927 16.379z" />
                        <path
                            d="m512 394.993c0-2.887-.32-5.767-.951-8.56-1.627-7.208-6.1-12.722-12.072-15.62 17.469-62.559 14.409-107.422-9.139-133.4-24.706-27.256-63.081-23.918-73.139-22.491-11.508-4.848-64.968-24.746-118.203-1.26-11.77 5.193-21.726 11.881-29.86 20.022-17.801-17.226-41.642-26.966-66.626-26.966h-75.68c-52.835 0-95.82 42.984-95.82 95.82 0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5c0-44.564 36.256-80.82 80.82-80.82h75.68c21.441 0 41.885 8.505 56.979 23.513-9.245 13.336-14.804 29.567-16.604 48.608-1.045 11.055-.75 22.101.279 32.666-13.057-13.136-20.916-28.906-21.015-29.109-1.064-2.176-3.114-3.705-5.503-4.104-2.388-.397-4.824.381-6.538 2.095-16.687 16.687-54.413 32.293-100.915 41.747-17.891 3.628-35.503 5.92-48.321 6.29-4.056.117-7.284 3.439-7.284 7.497v14.279c-1.84-.674-3.798-1.157-5.873-1.389-.574-.064-1.141-.09-1.707-.116v-31.157c0-4.142-3.358-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v35.6c-4.309 3.206-7.478 7.973-8.802 13.838-.649 2.876-.979 5.841-.979 8.812 0 12.684 5.961 23.994 15.221 31.301v18.744h-.651c-19.462.001-35.297 15.836-35.297 35.299 0 9.417 3.669 18.28 10.343 24.967 6.677 6.662 15.54 10.332 24.956 10.332h257.737c15.063 0 28.009-9.365 33.044-22.853 6.44 1.669 13.19 2.559 20.145 2.559h54.198c36.419 0 67.237-24.365 77.058-57.645 19.382-2.106 34.519-18.566 34.519-38.499zm-254.681-99.742c3.121-33.022 18.57-55.221 47.231-67.865 52.453-23.141 107.442 1.836 107.984 2.087 1.429.667 3.045.865 4.592.571.391-.075 39.389-7.154 61.666 17.52 19.791 21.922 21.527 63.873 5.095 121.495-1.08.22-2.114.526-3.121.877v-10.089c0-3.716-2.722-6.873-6.398-7.418-13.768-2.045-25.691-10.292-35.439-24.512-7.65-11.16-10.98-21.925-11.01-22.02-.76-2.527-2.792-4.468-5.351-5.112s-5.269.103-7.135 1.97c-30.202 30.203-94.471 44.458-143.068 51.098-3.715.508-6.484 3.681-6.484 7.431v8.651c-4.671-19.345-11.134-47.471-8.562-74.684zm1.521 88.358c1.174.131 7.02 1.125 7.041 7.835v19.35c0 2.297.12 4.566.31 6.814-9.58-3.054-16.54-12.036-16.54-22.615 0-1.775.196-3.544.583-5.256 1.485-6.579 7.423-6.257 8.606-6.128zm-147.162-31.774c57.601-11.71 87.257-28.675 101.197-39.455 5.949 9.744 17.325 25.766 32.972 36.203 1.425 7.652 3.043 14.777 4.554 21.129-7.326 2.413-12.933 8.454-14.801 16.722-.631 2.795-.951 5.675-.951 8.559 0 15.258 8.872 28.48 21.725 34.789-9.471 27.015-34.962 45.371-64.128 45.371h-56.169c-37.489 0-67.989-30.5-67.989-67.989v-20.018h.007c0-.053-.007-.104-.007-.157v-28.933c12.623-.861 27.793-3.018 43.59-6.221zm-75.339 33.446c1.591-7.046 7.955-6.699 9.215-6.562 1.252.14 7.46 1.2 7.535 8.304v20.141c0 2.508.131 4.984.35 7.436-10.233-3.082-17.71-12.588-17.71-23.813 0-1.86.206-3.713.61-5.506zm256.697 111.15h-257.737c-5.416 0-10.516-2.113-14.35-5.938-3.836-3.844-5.949-8.944-5.949-14.36 0-11.193 9.106-20.299 20.299-20.299h8.151c4.142 0 7.5-3.358 7.5-7.5v-18.865c1.784.445 3.614.774 5.484.969 10.088 34.464 41.963 59.716 79.644 59.716h56.169c35.088 0 65.82-21.773 77.766-53.979 6.97 20.873 22.273 37.958 41.958 47.276-2.934 7.666-10.329 12.98-18.935 12.98zm172.731-85.637c0 36.03-29.313 65.343-65.344 65.343h-54.198c-36.03 0-65.344-29.313-65.344-65.343v-42.999c45.949-6.748 103.205-20.239 136.835-47.029 2.027 4.395 4.848 9.749 8.576 15.242 10.61 15.638 24.157 25.883 39.475 29.939zm14.69 6.815c.19-2.249.31-4.518.31-6.815v-19.314h.001c0-6.744 5.867-7.739 7.043-7.871 1.18-.13 7.121-.453 8.607 6.128.386 1.71.582 3.479.582 5.256 0 10.581-6.961 19.564-16.543 22.616z" />
                        <path
                            d="m322.052 369.886c-5.218 0-9.463 7.038-9.463 15.688s4.245 15.689 9.463 15.689 9.463-7.038 9.463-15.689-4.245-15.688-9.463-15.688z" />
                        <path
                            d="m424.599 369.886c-5.218 0-9.463 7.038-9.463 15.688s4.245 15.689 9.463 15.689 9.463-7.038 9.463-15.689-4.246-15.688-9.463-15.688z" />
                        <path
                            d="m394.807 413.638c-3.31-1.394-7.119.157-8.515 3.464-2.205 5.229-7.294 8.608-12.965 8.608s-10.76-3.379-12.965-8.608c-1.395-3.308-5.206-4.859-8.515-3.464-3.308 1.395-4.858 5.207-3.464 8.515 4.241 10.058 14.032 16.558 24.943 16.558s20.702-6.5 24.943-16.558c1.396-3.309-.155-7.121-3.462-8.515z" />
                        <path
                            d="m363.593 406.935h19.465c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-19.465c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5z" />
                        <path
                            d="m214.833 182.569c14.091 10.519 29.849 20.316 45.569 28.332 1.07.545 2.238.818 3.407.818 1.171 0 2.342-.274 3.414-.822 52.587-26.881 113.996-77.302 113.996-130.938 0-3.073-.157-6.201-.467-9.297-.413-4.122-4.093-7.127-8.21-6.716-4.121.413-7.128 4.088-6.716 8.21.261 2.601.393 5.227.393 7.803 0 42.91-50.882 88.638-102.413 115.811-13.837-7.29-27.597-15.962-40.01-25.229-54.281-40.384-62.386-74.087-62.386-90.583 0-35.505 24.027-64.39 53.56-64.39 22.794 0 41.339 22.434 41.339 50.01 0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5c0-27.576 18.546-50.01 41.341-50.01 16.52 0 31.869 8.986 42.117 24.662 1.253 1.911 2.406 3.884 3.426 5.864 1.898 3.683 6.424 5.129 10.103 3.231 3.683-1.898 5.129-6.421 3.231-10.103-1.259-2.442-2.677-4.87-4.21-7.208-13.065-19.984-32.991-31.445-54.667-31.445-20.855 0-39.101 13.142-48.841 32.627-9.74-19.485-27.984-32.627-48.839-32.627-37.804 0-68.56 35.614-68.56 79.39 0 44.988 42.876 83.603 68.423 102.61z" />
                        <path
                            d="m98.212 172.243c1.464 1.464 3.384 2.197 5.303 2.197s3.839-.732 5.303-2.197c2.929-2.929 2.929-7.678 0-10.606l-21.148-21.149c-2.929-2.929-7.678-2.929-10.606 0-2.929 2.929-2.929 7.678 0 10.607z" />
                        <path
                            d="m118.001 155.206c1.145 2.983 3.988 4.814 7.003 4.814.893 0 1.802-.161 2.686-.5 3.867-1.484 5.799-5.822 4.314-9.689l-8.117-21.149c-1.484-3.867-5.821-5.799-9.689-4.314-3.867 1.484-5.799 5.822-4.314 9.689z" />
                        <path
                            d="m65.257 187.312 21.149 8.118c.884.339 1.792.5 2.686.5 3.015 0 5.858-1.832 7.003-4.814 1.484-3.867-.447-8.205-4.314-9.689l-21.149-8.118c-3.868-1.484-8.205.448-9.689 4.314-1.485 3.867.447 8.205 4.314 9.689z" />
                        <path
                            d="m418.805 172.243c1.465 1.465 3.384 2.197 5.304 2.197 1.919 0 3.839-.732 5.303-2.197l21.149-21.148c2.93-2.929 2.93-7.678.001-10.607-2.93-2.928-7.679-2.929-10.606 0l-21.149 21.149c-2.931 2.928-2.931 7.677-.002 10.606z" />
                        <path
                            d="m399.933 159.52c.884.339 1.792.5 2.686.5 3.016 0 5.858-1.832 7.004-4.814l8.118-21.149c1.484-3.867-.447-8.205-4.314-9.69s-8.204.448-9.689 4.314l-8.118 21.149c-1.486 3.867.445 8.206 4.313 9.69z" />
                        <path
                            d="m431.528 191.115c1.146 2.983 3.988 4.814 7.004 4.814.893 0 1.802-.161 2.686-.5l21.148-8.118c3.867-1.484 5.799-5.823 4.314-9.689s-5.819-5.8-9.689-4.314l-21.148 8.118c-3.867 1.484-5.799 5.823-4.315 9.689z" />
                    </svg>
                    <span class="small d-block">Couple</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#event" class="nav-link">
                    <svg class="event" xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 512 512"
                        width="100%">
                        <path
                            d="m473.271 28.859h-67.713c-.659-15.035-13.093-27.065-28.288-27.065s-27.628 12.03-28.287 27.065h-185.966c-.659-15.035-13.093-27.065-28.288-27.065s-27.628 12.03-28.287 27.065h-67.713c-21.355 0-38.729 17.374-38.729 38.729v328.428c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-328.428c0-13.084 10.645-23.729 23.729-23.729h67.682v25.076h-48.825c-10.334 0-18.742 8.407-18.742 18.742v363.709c0 10.335 8.408 18.742 18.742 18.742h315.508c7.952 0 15.72-3.241 21.312-8.893l70.079-70.808c5.592-5.651 8.672-13.142 8.672-21.092 0-24.858 0-193.009 0-212.837 0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v26.837h-404.313v-95.657c0-2.063 1.679-3.742 3.742-3.742h48.843c.391 15.277 12.931 27.585 28.3 27.585s27.909-12.308 28.301-27.585h185.941c.391 15.277 12.931 27.585 28.3 27.585s27.909-12.308 28.301-27.585h48.843c2.063 0 3.742 1.679 3.742 3.742v31.643c0 4.143 3.357 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-31.643c0-10.335-8.407-18.742-18.742-18.742h-48.825v-25.077h67.682c13.084 0 23.729 10.645 23.729 23.729v403.89c0 13.084-10.645 23.729-23.729 23.729h-434.543c-13.084-.001-23.729-10.645-23.729-23.729v-40.462c0-4.143-3.358-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v40.462c0 21.355 17.374 38.729 38.729 38.729h434.543c21.355 0 38.729-17.373 38.729-38.729v-403.89c-.001-21.355-17.374-38.729-38.73-38.729zm-83.611 415.848v-53.74c0-2.383 1.939-4.322 4.322-4.322h53.143zm68.496-246.37v173.308h-64.174c-10.654 0-19.322 8.668-19.322 19.322v64.162h-317.074c-2.063 0-3.742-1.679-3.742-3.742v-253.05zm-295.108-154.478h185.904v25.076h-185.904zm-15 39.343c0 7.344-5.975 13.318-13.319 13.318s-13.319-5.975-13.319-13.318v-53.089c0-7.345 5.975-13.319 13.319-13.319s13.319 5.975 13.319 13.319zm242.542 0c0 7.344-5.975 13.318-13.319 13.318s-13.318-5.975-13.318-13.318v-53.089c0-7.345 5.975-13.319 13.318-13.319 7.345 0 13.319 5.975 13.319 13.319z" />
                        <path
                            d="m227.119 133.501c0 15.615 12.704 28.319 28.319 28.319s28.319-12.704 28.319-28.319-12.704-28.318-28.319-28.318-28.319 12.703-28.319 28.318zm41.638 0c0 7.345-5.975 13.319-13.319 13.319s-13.319-5.975-13.319-13.319 5.975-13.318 13.319-13.318 13.319 5.974 13.319 13.318z" />
                        <path
                            d="m99.337 139.721c-4.142 0-7.5 3.357-7.5 7.5s3.358 7.5 7.5 7.5h70.785c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5z" />
                        <path
                            d="m341.879 140.241c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5h70.784c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5z" />
                        <path
                            d="m138.792 425.991c4.092 4.408 11.933 8.33 19.272 8.242 6.891-.001 13.402-2.613 18.396-7.395l28.674-27.459 22.569 23.649c6.076 6.547 16.472 11.288 26.201 11.204 9.367 0 18.22-3.552 25.008-10.052l28.619-27.406c2.991-2.865 3.094-7.612.229-10.604-2.866-2.991-7.613-3.093-10.604-.229l-28.619 27.406c-4.093 3.92-9.457 5.995-15.131 5.88-5.665-.127-10.939-2.455-14.851-6.554l-22.587-23.668 19.375-18.554c11.756-11.259 17.132-27.569 14.382-43.632-.699-4.082-4.57-6.822-8.659-6.127-4.083.699-6.826 4.576-6.126 8.658 1.909 11.146-1.819 22.46-9.972 30.267l-58.882 56.388c-2.245 2.149-5.206 3.319-8.298 3.225-3.106-.069-5.999-1.346-8.144-3.594l-54.729-57.347c-6.257-6.556-9.586-15.155-9.374-24.215.211-9.059 3.938-17.493 10.494-23.75 12.754-12.298 34.623-12.798 47.964 1.12l10.653 11.163c1.375 1.44 3.266 2.275 5.257 2.32 2.009.04 3.918-.704 5.356-2.081l12.773-12.232c10.848-10.391 27.488-12.391 40.467-4.868 3.583 2.077 8.172.857 10.25-2.727 2.077-3.584.856-8.173-2.728-10.25-18.723-10.854-42.722-7.971-58.364 7.011l-7.347 7.036-5.466-5.728c-3.951-4.14-8.505-7.498-13.472-9.99-.662-15.733 5.338-30.752 16.862-41.749 10.562-10.081 24.43-15.449 39.012-15.103 14.596.341 28.185 6.345 38.264 16.906l15.985 16.75c1.375 1.44 3.266 2.275 5.257 2.32 2.013.045 3.918-.703 5.356-2.081l19.166-18.354c21.766-20.847 56.435-20.094 77.279 1.672 10.098 10.544 15.485 24.39 15.169 38.985-.315 14.596-6.297 28.195-16.841 38.293l-34.448 32.988c-2.991 2.865-3.094 7.612-.229 10.604 2.258 2.186 6.689 3.558 10.604.229l34.448-32.988c27.74-26.566 28.696-70.747 2.131-98.487-26.569-27.74-70.749-28.697-98.488-2.131l-13.739 13.158-10.798-11.314c-12.846-13.461-30.165-21.112-48.766-21.547-18.592-.436-36.258 6.401-49.718 19.247-13.178 12.575-20.834 29.932-21.504 47.941-13.129-2.22-30.558 2.818-40.703 13.032-9.454 9.022-14.829 21.187-15.134 34.252-.305 13.064 4.496 25.467 13.519 34.92z" />
                    </svg>
                    <span class="small d-block">Event</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#gallery" class="nav-link">
                    <svg class="gallery" xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 0 512 512"
                        width="100%">
                        <path
                            d="m 310.19189,92.853609 h -21.59902 a 7.2723976,7.4025305 0 0 1 0,-14.805061 h 21.59902 a 7.2723976,7.4025305 0 0 1 0,14.805061 z"
                            id="path2" style="stroke-width:7.33718" />
                        <path
                            d="M 373.31629,413.53122 H 36.895187 A 33.562114,34.162678 0 0 1 3.3694409,379.40555 V 112.10019 A 33.525752,34.125665 0 0 1 36.895187,78.048548 H 165.68935 a 7.2723976,7.4025305 0 0 1 0,14.805061 H 36.895187 A 18.966412,19.305799 0 0 0 17.914238,112.10019 v 267.30536 a 19.002774,19.342812 0 0 0 18.980949,19.32061 H 373.31629 a 7.2723986,7.4025315 0 0 1 0,14.80506 z"
                            id="path4" style="stroke-width:7.33718" />
                        <path
                            d="m 237.68609,92.853609 h -21.08996 a 7.2723976,7.4025305 0 0 1 0,-14.805061 h 21.08996 a 7.2723976,7.4025305 0 0 1 0,14.805061 z"
                            id="path6" style="stroke-width:7.33718" />
                        <path
                            d="m 457.02159,320.51842 a 7.2723974,7.4025303 0 0 1 -7.2724,-7.36551 V 112.10019 A 18.966412,19.305799 0 0 0 430.76823,92.853609 h -69.66956 a 7.2723976,7.4025305 0 0 1 0,-14.805061 h 69.66956 a 33.525752,34.125665 0 0 1 33.52576,34.051642 v 200.97869 a 7.2723974,7.4025303 0 0 1 -7.2724,7.43954 z"
                            id="path8" style="stroke-width:7.33718" />
                        <path
                            d="M 369.51283,373.46872 H 63.141271 a 20.420892,20.786305 0 0 1 -20.36271,-20.8011 V 138.85293 a 20.362713,20.727085 0 0 1 20.36271,-20.72708 H 404.50761 a 20.362713,20.727085 0 0 1 20.36271,20.72708 v 173.95946 a 7.2724,7.4025329 0 0 1 -14.5448,0 V 138.85293 a 5.8179179,5.9220242 0 0 0 -5.81791,-5.92203 H 63.141271 a 5.8179179,5.9220242 0 0 0 -5.817913,5.92203 v 213.81469 a 5.8542799,5.9590369 0 0 0 5.817913,5.99604 H 369.51283 a 7.2723986,7.4025315 0 1 1 0,14.80506 z"
                            id="path10" style="stroke-width:7.33718" />
                        <path
                            d="M 155.04256,373.46872 A 7.2723974,7.4025303 0 0 1 149.66098,361.0917 L 280.98594,214.10706 a 7.2723974,7.4025303 0 0 1 9.91954,-0.79948 l 120.35818,97.96508 a 7.2745282,7.4046992 0 1 1 -9.0905,11.56275 L 287.14565,229.20081 160.45323,371.04069 a 7.2723974,7.4025303 0 0 1 -5.41067,2.42803 z"
                            id="path12" style="stroke-width:7.33718" />
                        <path
                            d="M 50.029139,316.52106 A 7.2723974,7.4025303 0 0 1 45.003915,303.7739 l 78.767335,-76.71241 a 7.2723974,7.4025303 0 0 1 10.01409,0 l 78.44008,75.13567 a 7.2723974,7.4025303 0 1 1 -9.97046,10.77808 l -73.41485,-70.32403 -73.785748,71.81935 a 7.2723974,7.4025303 0 0 1 -5.025223,2.0505 z"
                            id="path14" style="stroke-width:7.33718" />
                        <path
                            d="m 192.25542,226.38046 a 33.453028,34.05164 0 1 1 33.45303,-34.05165 33.496662,34.096054 0 0 1 -33.45303,34.05165 z m 0,-53.29823 a 18.908233,19.246579 0 1 0 18.90823,19.24658 18.908233,19.246579 0 0 0 -18.90823,-19.25398 z"
                            id="path16" style="stroke-width:7.33718" />
                        <path
                            d="m 436.69524,456.7916 a 75.742019,77.097353 0 1 1 75.74201,-77.09735 75.829287,77.186183 0 0 1 -75.74201,77.09735 z m 0,-139.38964 a 61.197225,62.292293 0 1 0 61.19722,62.29229 61.269948,62.366318 0 0 0 -61.19722,-62.29229 z"
                            id="path18" style="stroke-width:7.33718" />
                        <path
                            d="m 436.69524,421.19284 a 7.2723974,7.4025303 0 0 1 -4.6907,-1.7396 c -5.61429,-4.81904 -33.65666,-29.75077 -33.65666,-47.51684 a 26.72606,27.204299 0 0 1 25.91883,-27.90754 24.47889,24.916917 0 0 1 12.42853,3.47919 24.413438,24.850295 0 0 1 12.42125,-3.47919 26.72606,27.204299 0 0 1 25.91155,27.90754 c 0,17.76607 -28.02781,42.6978 -33.64938,47.51684 a 7.2723974,7.4025303 0 0 1 -4.68342,1.7396 z m -12.42853,-62.35892 a 12.210355,12.428849 0 0 0 -11.37403,13.10248 c 0,6.42539 11.63584,20.66047 23.80256,32.00114 12.18126,-11.34067 23.788,-25.56835 23.788,-32.00114 a 12.203083,12.421446 0 0 0 -11.36675,-13.10248 10.552248,10.741071 0 0 0 -7.35239,3.2349 7.2723974,7.4025303 0 0 1 -10.13046,0 10.603156,10.792889 0 0 0 -7.36693,-3.2349 z"
                            id="path20" style="stroke-width:7.33718" />
                    </svg>
                    <span class="small d-block">Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#guest" class="nav-link">
                    <svg class="guest" xmlns="http://www.w3.org/2000/svg" height="100%" viewBox="0 -94 512 512"
                        width="100%">
                        <path
                            d="m501.96875 0h-364.453125c-5.539063 0-10.03125 4.492188-10.03125 10.03125v80.484375c-13.191406-8.441406-28.53125-12.972656-44.574219-12.972656-22.15625 0-42.984375 8.628906-58.652344 24.296875-32.34375 32.34375-32.34375 84.96875 0 117.308594l99.917969 99.917968c3.484375 3.484375 8.054688 5.222656 12.632813 5.222656 4.574218 0 9.148437-1.738281 12.632812-5.222656l67.464844-67.464844h108.808594l127.96875 71.09375c1.527344.851563 3.203125 1.265626 4.871094 1.265626 2.386718 0 4.753906-.851563 6.628906-2.503907 3.1875-2.804687 4.261718-7.3125 2.683594-11.253906l-23.441407-58.601563h57.542969c5.539062 0 10.03125-4.492187 10.03125-10.03125v-231.539062c0-5.539062-4.488281-10.03125-10.03125-10.03125zm-365.160156 303.332031-98.363282-98.367187c-24.523437-24.519532-24.523437-64.417969 0-88.9375 11.875-11.878906 27.667969-18.421875 44.46875-18.421875 16.796876 0 32.589844 6.542969 44.46875 18.421875l2.332032 2.332031c2.050781 2.050781 4.765625 3.015625 7.453125 2.917969.117187.003906.230469.019531.347656.019531 3.894531 0 7.265625-2.226563 8.925781-5.46875 11.855469-11.75 27.558594-18.222656 44.261719-18.222656 16.796875 0 32.59375 6.542969 44.46875 18.421875 11.878906 11.875 18.421875 27.667968 18.421875 44.46875 0 16.796875-6.542969 32.589844-18.421875 44.46875zm355.132812-71.789062h-62.332031c-3.328125 0-6.441406 1.648437-8.308594 4.40625-1.863281 2.757812-2.242187 6.257812-1.003906 9.347656l18.464844 46.164063-105.578125-58.65625c-1.488282-.828126-3.167969-1.261719-4.871094-1.261719h-91.34375l12.390625-12.394531c15.667969-15.664063 24.296875-36.496094 24.296875-58.652344s-8.628906-42.988282-24.296875-58.65625c-15.667969-15.667969-36.5-24.296875-58.65625-24.296875-15.46875 0-30.285156 4.222656-43.15625 12.09375v-69.574219h344.394531zm0 0" />
                        <path
                            d="m417.140625 117.839844h-120.929687c-5.539063 0-10.03125 4.492187-10.03125 10.03125 0 5.539062 4.492187 10.03125 10.03125 10.03125h120.929687c5.539063 0 10.03125-4.492188 10.03125-10.03125 0-5.539063-4.492187-10.03125-10.03125-10.03125zm0 0" />
                        <path
                            d="m294.207031 91.164062h81.742188c5.539062 0 10.03125-4.492187 10.03125-10.03125 0-5.539062-4.492188-10.03125-10.03125-10.03125h-81.742188c-5.539062 0-10.03125 4.492188-10.03125 10.03125 0 5.539063 4.492188 10.03125 10.03125 10.03125zm0 0" />
                        <path
                            d="m417.074219 168.488281h-120.863281c-5.539063 0-10.03125 4.488281-10.03125 10.027344s4.492187 10.03125 10.03125 10.03125h120.863281c5.539062 0 10.027343-4.492187 10.027343-10.03125s-4.488281-10.027344-10.027343-10.027344zm0 0" />
                        <path
                            d="m74.488281 189.914062c-3.933593-3.898437-10.285156-3.871093-14.1875.066407-3.898437 3.9375-3.867187 10.289062.070313 14.1875l35.292968 34.964843c1.957032 1.9375 4.507813 2.902344 7.058594 2.902344 2.582032 0 5.167969-.988281 7.128906-2.972656 3.898438-3.933594 3.867188-10.285156-.070312-14.183594zm0 0" />
                        <path
                            d="m138.695312 252.820312c-2.070312-5.136718-7.914062-7.621093-13.054687-5.554687-5.136719 2.070313-7.625 7.917969-5.554687 13.054687l.136718.332032c1.574219 3.910156 5.335938 6.285156 9.304688 6.285156 1.25 0 2.519531-.234375 3.746094-.730469 5.140624-2.070312 7.625-7.914062 5.554687-13.050781zm0 0" />
                        <path
                            d="m407.914062 85.074219c1.582032 3.894531 5.335938 6.257812 9.296876 6.257812 1.257812 0 2.535156-.234375 3.769531-.738281 5.132812-2.082031 7.605469-7.933594 5.523437-13.066406l-.136718-.332032c-2.082032-5.132812-7.933594-7.605468-13.066407-5.523437-5.132812 2.085937-7.605469 7.933594-5.519531 13.066406zm0 0" />
                    </svg>
                    <span class="small d-block">Guest</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="modal fade" id="giftModal" tabindex="-1" role="dialog" aria-labelledby="giftModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="title text-center">Wedding Gift</h5>
                    <?php foreach($wedding_gift as $value_wg): ?>
                    <?php if($value_wg['id_data'] == $data_undangan['id']):?>
                    <div class="mt-3 text-center">
                        <h4><?=$value_wg['jenis']?></h4></span>
                        <hr style="background-color:lightblue;margin:0;">
                        <p><?=$value_wg['rincian']?></p>
                    </div>
                    <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    window.addEventListener('load', () => {
        // noinspection JSUnresolvedVariable
        let audioCtx = new(window.AudioContext || window.webkitAudioContext)();
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/musik/<?=$data_undangan['musik']?>');
        xhr.responseType = 'arraybuffer';
        xhr.addEventListener('load', () => {
            let playsound = (audioBuffer) => {
                let source = audioCtx.createBufferSource();
                source.buffer = audioBuffer;
                source.connect(audioCtx.destination);
                source.loop = true;
                source.start();
            };

            audioCtx.decodeAudioData(xhr.response).then(playsound);
        });
        xhr.send();
    });
    // $(".fas").click(function() {
    //     $(".audio").innerHTML = $("audio").prop("muted", true) ?
    //         '<i class="fas fa-volume-up"></i>' :
    //         '<i class="fas fa-volume-mute"></i>';
    //     $("audio").prop("muted", !$("audio").prop("muted"));
    // });
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


    baguetteBox.run('.tz-gallery');

    const nav = document.querySelector('nav');
    const body = document.querySelector('body');
    const audio = document.querySelector('audio');
    const audioButton = document.querySelector('.audio');
    const i = document.querySelector('i');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('sticky', window.scrollY > 300);
    });
    window.addEventListener('scroll', () => {
        body.classList.toggle('scroll', window.scrollY > 0);
    });
    audioButton.addEventListener('click', () => {
        i.classList.toggle('fa-volume-mute');
        $("audio").prop("muted", !$("audio").prop("muted"));
    });
    </script>

</body>

</html>