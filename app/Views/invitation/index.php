<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
        background-image: url('/img/bg/bottom-navbar.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
        width: 60%;
        position: fixed;
        left: 50%;
        transform: translateX(-50%);
        bottom: 0;
        margin-bottom: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 1px 1px 10px 0px lightblue;
    }

    .navbar a {
        color: #78a2cc;
        text-align: center;
        display: inline-block;
        padding: 15px 20px;
        text-decoration: none;
        font-size: 17px;
        margin: 0px auto;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .navbar a.active {
        background-color: #04AA6D;
        color: white;
    }

    @media screen and (max-width: 600px) {}
    </style>
</head>

<body>

    <div class="navbar" id="myNavbar">
        <a href="#home">
            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#"
                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
                xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" height="20pt" viewBox="0 0 512 512.00025"
                width="20pt" version="1.1" id="svg9" sodipodi:docname="home.svg"
                inkscape:version="1.0.2-2 (e86c870879, 2021-01-15)">
                <path
                    d="m266 492c0 11.046875-8.953125 20-20 20h-226c-11.046875 0-20-8.953125-20-20v-275.332031c0-5.9375 2.636719-11.566407 7.195312-15.363281l236-196.667969c7.417969-6.183594 18.191407-6.183594 25.609376 0l236 196.667969c8.484374 7.070312 9.628906 19.679687 2.558593 28.167968-7.070312 8.484375-19.683593 9.628906-28.167969 2.558594l-223.195312-185.996094-216 180v245.964844h206c11.046875 0 20 8.953125 20 20zm214.339844-54.105469c-21.945313 26.457031-54.714844 50.679688-97.402344 72-5.628906 2.808594-12.246094 2.808594-17.875 0-42.6875-21.320312-75.457031-45.542969-97.398438-72-65.140624-78.527343-19.78125-165.195312 47.335938-165.195312 26.746094 0 46.421875 10.949219 59 21.226562 12.578125-10.277343 32.253906-21.226562 59-21.226562 67.246094 0 112.316406 86.859375 47.339844 165.195312zm-47.339844-125.195312c-27.667969 0-42.191406 20.742187-42.332031 20.949219-8.304688 12.527343-25.816407 11.761718-33.285157.082031-1.226562-1.722657-15.585937-21.03125-42.382812-21.03125-43.109375 0-80.136719 83.078125 59 156.8125 139.136719-73.734375 102.117188-156.8125 59-156.8125zm0 0"
                    fill="url(#a)" id="path7" style="fill:#aaaaaa" />
            </svg>
        </a>
        <a href="#couple">COUPLE</a>
        <a href="#event">EVENT</a>
        <a href="#gallery">GALLERY</a>
        <a href="#guest">GUEST</a>
    </div>

    <div style="padding-left:16px">
        <h2>Responsive Bottom Navbar Example</h2>
        <p>Resize the browser window to see how it works.
        </p>
    </div>

    <script>
    </script>

</body>

</html>