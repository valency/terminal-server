<html>
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <style>
        @font-face {
            font-family: "Droid Sans Mono";
            font-style: normal;
            font-weight: 400;
            src: local("Droid Sans Mono"), local("DroidSansMono"), url(font.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        span {
            font-family: "Droid Sans Mono", monospace;
            font-size: 16px;
        }

        #wrap:after {
            content: "_";
            opacity: 0;
            animation: cursor 1s infinite;
        }

        @keyframes cursor {
            0% {
                opacity: 0;
            }
            40% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }

        html {
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, #fff 0%, #aaa 100%) no-repeat;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        body {
            text-align: center;
            display: table;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        #wrap {
            box-sizing: border-box;
            display: table-cell;
            vertical-align: middle;
        }

        a {
            color: white;
            text-decoration: none;
            background: #DA3D41;
            padding: 0 2px;
        }

        a:hover {
            background: black;
        }

        .footer {
            position: fixed;
            bottom: 50px;
            right: 50px;
            font-size: 12px;
        }
    </style>
    <title>The Avatar System</title>
</head>
<body>
<div id="wrap">
    <span id="cmd">avatarsys.org:~$ </span>
    <span id="cursor"></span>
</div>
<span class="footer">(C) 2013 - 2017 Themed by <a href="http://www.cse.ust.hk/~valency/" target="_blank">Valency</a></span>
</body>
<script>
    var apps = [<?php
        foreach (preg_grep("/^([^.])/", scandir(".")) as $f) {
            $ext = pathinfo($f, PATHINFO_EXTENSION);
            if ($f != "." && $f != ".." && is_dir($f)) {
                echo "'" . $f . "'" . ",";
            }
        }
        ?>];
    document.addEventListener("keypress", function (e) {
        document.getElementById("wrap").lastElementChild.appendChild(document.createTextNode(String.fromCharCode(e.keyCode)));
    }, false);
    document.addEventListener("keydown", function (e) {
        var cmd = document.getElementById("wrap").lastElementChild;
        if (e.keyCode == 13) {
            var s = cmd.innerHTML.trim();
            if (s == "ls") {
                cmd.innerHTML = "";
                for (var i = 0; i < apps.length; i++) {
                    var a = document.createElement("a");
                    a.setAttribute("href", apps[i]);
                    a.appendChild(document.createTextNode(apps[i]));
                    cmd.appendChild(a);
                    cmd.appendChild(document.createTextNode(" "))
                }
            } else {
                location.href = s;
            }
        } else if (e.keyCode == 8) {
            if (cmd.children.length > 0) {
                cmd.innerHTML = "";
            } else {
                cmd.innerHTML = cmd.innerHTML.substring(0, cmd.innerHTML.length - 1);
            }
        }
    }, false);
</script>
</html>
