<?php use Cake\Routing\Router;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
       Sistema de Soporte
    </title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css
                        (
                            array
                                (
                                    'metro-ui/metro.css',
                                    'metro-ui/metro-icons.css',
                                    'metro-ui/metro-responsive.css',
                                )
                        );
    //echo $this->Html->script(array('jquery'));
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <?php
    echo $this->Flash->render();
    echo $this->fetch('content');
    echo $this->Html->script
                            (
                                array
                                    (
                                      'libs/jquery/jquery-3.1.0.min.js',
                                      'metro-ui/metro.js'
                                    )
                            );
    ?>
    <!-- <script src="//maps.googleapis.com/maps/api/js?sensor=false"></script> -->
    <style>
        .tile-area-controls {
            position: fixed;
            right: 40px;
            top: 40px;
        }

        .tile-group {
            left: 100px;
        }

        .tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super {
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }

        #charmSettings .button {
            margin: 5px;
        }

        .schemeButtons {
            /*width: 300px;*/
        }

        @media screen and (max-width: 640px) {
            .tile-area {
                overflow-y: scroll;
            }
            .tile-area-controls {
                display: none;
            }
        }

        @media screen and (max-width: 320px) {
            .tile-area {
                overflow-y: scroll;
            }

            .tile-area-controls {
                display: none;
            }

        }
    </style>

    <script>

        /*
         * Do not use this is a google analytics fro Metro UI CSS
         * */
        // if (window.location.hostname !== 'localhost') {
        //
        //     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        //         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        //             m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        //     })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        //
        //     ga('create', 'UA-58849249-3', 'auto');
        //     ga('send', 'pageview');
        //
        // }

    </script>

    <script>
        (function($) {
            $.StartScreen = function(){
                var plugin = this;
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

                plugin.init = function(){
                    setTilesAreaSize();
                    if (width > 640) addMouseWheel();
                };
                var setTilesAreaSize = function(){
                    var groups = $(".tile-group");
                    var tileAreaWidth = 80;
                    $.each(groups, function(i, t){
                        if (width <= 640) {
                            tileAreaWidth = width;
                        } else {
                            tileAreaWidth += $(t).outerWidth() + 80;
                        }
                    });
                    $(".tile-area").css({
                        width: tileAreaWidth
                    });
                };
                var addMouseWheel = function (){
                    $("body").mousewheel(function(event, delta, deltaX, deltaY){
                        var page = $(document);
                        var scroll_value = delta * 50;
                        page.scrollLeft(page.scrollLeft() - scroll_value);
                        return false;
                    });
                };
                plugin.init();
            }
        })(jQuery);
        $(function(){
            $.StartScreen();
            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super");
            $.each(tiles, function(){
                var tile = $(this);
                setTimeout(function(){
                    tile.css({
                        opacity: 1,
                        "-webkit-transform": "scale(1)",
                        "transform": "scale(1)",
                        "-webkit-transition": ".3s",
                        "transition": ".3s"
                    });
                }, Math.floor(Math.random()*500));
            });

            $(".tile-group").animate({
                left: 0
            });
        });
        function showCharms(id){
            var  charm = $(id).data("charm");
            if (charm.element.data("opened") === true) {
                charm.close();
            } else {
                charm.open();
            }
        }
        function setSearchPlace(el){
            var a = $(el);
            var text = a.text();
            var toggle = a.parents('label').children('.dropdown-toggle');

            toggle.text(text);
        }
        $(function(){
            var current_tile_area_scheme = localStorage.getItem('tile-area-scheme') || "tile-area-scheme-dark";
            $(".tile-area").removeClass (function (index, css) {
                return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
            }).addClass(current_tile_area_scheme);

            $(".schemeButtons .button").hover(
                    function(){
                        var b = $(this);
                        var scheme = "tile-area-scheme-" +  b.data('scheme');
                        $(".tile-area").removeClass (function (index, css) {
                            return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                        }).addClass(scheme);
                    },
                    function(){
                        $(".tile-area").removeClass (function (index, css) {
                            return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                        }).addClass(current_tile_area_scheme);
                    }
            );
            $(".schemeButtons .button").on("click", function(){
                var b = $(this);
                var scheme = "tile-area-scheme-" +  b.data('scheme');

                $(".tile-area").removeClass (function (index, css) {
                    return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                }).addClass(scheme);

                current_tile_area_scheme = scheme;
                localStorage.setItem('tile-area-scheme', scheme);
                showSettings();
            });
        });
    </script>
</head>
<body style="overflow-y: hidden;">
    <div data-role="charm" id="charmSearch">
        <h1 class="text-light">Buscar</h1>
        <hr class="thin"/>
        <br />
        <div class="input-control text full-size">
            <label>
                <span class="dropdown-toggle drop-marker-light">Todo</span>
                <ul class="d-menu" data-role="dropdown">
                    <li><a onclick="setSearchPlace(this)">Todo</a></li>
                    <li><a onclick="setSearchPlace(this)">Movimientos</a></li>
                    <li><a onclick="setSearchPlace(this)">Valores</a></li>
                    <li><a onclick="setSearchPlace(this)">Consultas</a></li>
                </ul>
            </label>
            <input type="text">
            <button class="button"><span class="mif-search"></span></button>
        </div>
    </div>

    <div data-role="charm" id="charmSettings" data-position="top">
        <h1 class="text-light">Configuraci&oacute;n</h1>
        <hr class="thin"/>
        <br />
        <div class="schemeButtons">
            <div class="button square-button tile-area-scheme-dark" data-scheme="dark"></div>
            <div class="button square-button tile-area-scheme-darkBrown" data-scheme="darkBrown"></div>
            <div class="button square-button tile-area-scheme-darkCrimson" data-scheme="darkCrimson"></div>
            <div class="button square-button tile-area-scheme-darkViolet" data-scheme="darkViolet"></div>
            <div class="button square-button tile-area-scheme-darkMagenta" data-scheme="darkMagenta"></div>
            <div class="button square-button tile-area-scheme-darkCyan" data-scheme="darkCyan"></div>
            <div class="button square-button tile-area-scheme-darkCobalt" data-scheme="darkCobalt"></div>
            <div class="button square-button tile-area-scheme-darkTeal" data-scheme="darkTeal"></div>
            <div class="button square-button tile-area-scheme-darkEmerald" data-scheme="darkEmerald"></div>
            <div class="button square-button tile-area-scheme-darkGreen" data-scheme="darkGreen"></div>
            <div class="button square-button tile-area-scheme-darkOrange" data-scheme="darkOrange"></div>
            <div class="button square-button tile-area-scheme-darkRed" data-scheme="darkRed"></div>
            <div class="button square-button tile-area-scheme-darkPink" data-scheme="darkPink"></div>
            <div class="button square-button tile-area-scheme-darkIndigo" data-scheme="darkIndigo"></div>
            <div class="button square-button tile-area-scheme-darkBlue" data-scheme="darkBlue"></div>
            <div class="button square-button tile-area-scheme-lightBlue" data-scheme="lightBlue"></div>
            <div class="button square-button tile-area-scheme-lightTeal" data-scheme="lightTeal"></div>
            <div class="button square-button tile-area-scheme-lightOlive" data-scheme="lightOlive"></div>
            <div class="button square-button tile-area-scheme-lightOrange" data-scheme="lightOrange"></div>
            <div class="button square-button tile-area-scheme-lightPink" data-scheme="lightPink"></div>
            <div class="button square-button tile-area-scheme-grayed" data-scheme="grayed"></div>
        </div>
    </div>

    <div class="tile-area tile-area-scheme-dark fg-white" style="height: 100%; max-height: 100% !important;">
        <h1 class="tile-area-title">Inicio</h1>
        <div class="tile-area-controls">
            <!-- <button class="image-button icon-right bg-darker fg-white bg-hover-dark no-border">
                <span class="sub-header no-margin text-light">
                    <?php
                        $session = $this->request->session();
                        //echo "Bienvenido" . "<br>";
                        echo $session->read('User.username');
                    ?>
                </span>
                <span class="icon mif-user"></span>
            </button> -->
            <li style="text-decoration: none; list-style: none; display: inline;">
                <a href="" class="dropdown-toggle image-button icon-right bg-darker fg-white bg-hover-dark no-border">
                    <span class="sub-header no-margin text-light">
                        <?php
                            $session = $this->request->session();
                            //echo "Bienvenido" . "<br>";
                            echo $session->read('User.username');
                        ?>
                    </span>
                    <span class="icon mif-user"></span>
                </a>
                <ul class="d-menu" data-role="dropdown">
                    <li>
                        <?php
                            echo $this->Html->link
                                    (
                                        'Cambiar contrase&ntilde;a',
                                        array
                                            (
                                                'controller'=>'Users',
                                                'action'=>'cambiarPassword',
                                                $session->read('Auth.User.id')
                                            ),
                                        array
                                            (
                                                'escape'=>false
                                            )
                                    );
                        ?>
                    </li>
                </ul>
            </li>
            <button class="square-button bg-grayLight fg-white bg-hover-dark no-border" onclick="showCharms('#charmSearch')"><span class="mif-search"></span></button>
            <button class="square-button bg-grayLight fg-white bg-hover-dark no-border" onclick="showCharms('#charmSettings')"><span class="mif-cog"></span></button>
            <?php
            echo $this->Html->link
                    (
                        '<span class="mif-switch"></span></a>',
                        array
                            (
                                'controller'=>'Users',
                                'action'=>'logout'
                            ),
                        array
                            (
                                'escape'=>false,
                                'class'=>"square-button bg-grayLight fg-white bg-hover-white no-border"
                            )
                    );
            ?>
            <!-- <a href="../tiles.html" class="square-button bg-grayLight fg-white bg-hover-white no-border"><span class="mif-switch"></span></a> -->
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Operaciones</span>

            <div class="tile-container">

                <!-- <a href="http://calendar.google.com" class="tile bg-indigo fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-calendar"></span>
                    </div>
                    <span class="tile-label">Calendar</span>
                </a> -->

                <a href="bugs" class="tile bg-indigo fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-folder-open">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCIgdmlld0JveD0iMCAwIDk4NC44NSA5ODQuODUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDk4NC44NSA5ODQuODU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNNjUyLjA3NSw5NTQuNzkxYzEyLjEwMSwxMiwyOC43LDIwLjEsNDUuNywyMS41YzE3LjIsMS4zOTksMzQuOS0yLjgsNDkuMi0xMi41YzMuOS0yLjYwMSw3LjYtNS43LDEwLjktOWwwLjEtMC4xMDEgICBsMjA0LjktMjA0Ljg5OWMyOS4zLTI5LjMsMjkuMy03Ni44LDAtMTA2LjEwMWMtMjkuMzAxLTI5LjMtNzYuODAxLTI5LjMtMTA2LjEwMSwwbC03Ni44OTksNzYuOXYtNjM3YzAtNDEuNC0zMy42MDEtNzUtNzUtNzUgICBjLTQxLjQsMC03NSwzMy42LTc1LDc1djYzN2wtNzguOS03OC45Yy0yOS4zLTI5LjMtNzYuOC0yOS4zLTEwNi4xLDBjLTI5LjMwMSwyOS4zMDEtMjkuMzAxLDc2LjgwMSwwLDEwNi4xMDFsMjA3LDIwNyAgIEM2NTEuOTc1LDk1NC42OSw2NTEuOTc1LDk1NC43OTEsNjUyLjA3NSw5NTQuNzkxeiIgZmlsbD0iI0ZGRkZGRiIvPgoJPHBhdGggZD0iTTc0Ljk3NSwzNjUuNDkxYzE5LjIsMCwzOC40LTcuMyw1My0yMmw3OC45LTc4Ljl2NjM3YzAsNDEuNCwzMy42LDc1LDc1LDc1czc1LTMzLjYsNzUtNzV2LTYzN2w3Ni44OTksNzYuOSAgIGMxNC42MDEsMTQuNiwzMy44LDIyLDUzLDIyczM4LjQtNy4zLDUzLTIyYzI5LjMtMjkuMywyOS4zLTc2LjgsMC0xMDYuMWMtNS4zOTktNS40LTEwLjg5OS0xMC45LTE2LjMtMTYuMyAgIGMtMTMuMy0xMy4zLTI2LjUtMjYuNy0zOS45LTM5LjljLTE3LjE5OS0xNy4xLTM0LjMtMzQuMi01MS4zOTktNTEuNGMtMTYuOC0xNy0zNC4yLTMzLjUtNTAuOS01MC43ICAgYy0xNi4yLTE2LjYtMzIuNi0zMi45LTQ5Ljg5OS00OC41Yy0xOC0xNi4yLTQxLjUtMjQuMi02NS43LTE4LjVjLTYuMiwxLjQtMTIuOCwzLjgtMTguNCw2LjljLTE2LjcsOS40LTMwLDI0LjktNDMuNSwzOC4zICAgYy0xNi41LDE2LjMtMzIuNywzMi45LTQ5LjEsNDkuNGMtMTkuNSwxOS42LTM5LjIsMzkuMS01OC44LDU4LjZjLTE2LjQsMTYuNi0zMywzMy4yLTQ5LjUsNDkuOGMtOCw4LTE2LDE1LjktMjQsMjMuOSAgIGMtMC4xLDAuMS0wLjMsMC4zLTAuNCwwLjRjLTI5LjMsMjkuMy0yOS4zLDc2LjgsMCwxMDYuMUMzNi41NzUsMzU4LjE5MSw1NS43NzUsMzY1LjQ5MSw3NC45NzUsMzY1LjQ5MXoiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Reportes Abiertos</span>
                </a>

                <a href="bugs/finalizados" class="tile bg-darkBlue fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-sync-disabled">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTI4cHgiIGhlaWdodD0iMTI4cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMTk3LjkxNCw0NDMuNTVsLTQxLjYxNy0yMi43MDdjLTAuNzQyLTAuNDAxLTIuNjk3LTEuNDY4LTIuNjk3LTcuNDMzdi0xNC40NjRjMy4xMTUtNC44ODEsMTAuMDEtMTYuNzg1LDE0LjEwNi0zMi4yMjIgICAgIGM1LjA2LTMuNDksMTEuNDk0LTkuMDExLDExLjQ5NC0xNy4wMjR2LTE4LjY2MmMwLTYuNjEzLTQuNzYyLTExLjE2Mi04LjUzMy0xNC4zMjd2LTIyLjU3OSAgICAgYzAuMzA3LTMuNTI0LDAuOTY0LTE5LjcyMS0xMC43ODYtMzMuMTA5Yy0xMC4zMzQtMTEuNzc2LTI2Ljc5NS0xNy43NjYtNDguOTY0LTE3LjgxOGMtMjIuMTQ0LDAuMDUxLTM4LjU5Niw2LjA1LTQ4LjkwNSwxNy44MjYgICAgIGMtMTEuNzA4LDEzLjM4LTExLjAxNywyOS41NTEtMTAuNzAxLDMzLjEwOXYyMi41NTRjLTMuODA2LDMuMTQ5LTguNjQ0LDcuNjk3LTguNjQ0LDE0LjM0NVYzNDkuNyAgICAgYzAsOC4wMTMsNi40MzQsMTMuNTM0LDExLjQ4NiwxNy4wMjRjNC4wOTYsMTUuNDM3LDEwLjk5MSwyNy4zNDEsMTQuMTE0LDMyLjIyMnYxNC40NjRjMCw1Ljk2NS0xLjk2Myw3LjAzMS0yLjY5Nyw3LjQzMyAgICAgTDIzLjk0NSw0NDMuNTVDOS4xNzMsNDUxLjYwNSwwLDQ2Ny4wNjgsMCw0ODMuODk1djE1LjNjMCw0LjcxLDMuODE0LDguNTMzLDguNTMzLDguNTMzaDIwNC44YzQuNzEsMCw4LjUzMy0zLjgyMyw4LjUzMy04LjUzMyAgICAgdi0xNS4zQzIyMS44NjcsNDY3LjA2OCwyMTIuNjg1LDQ1MS42MDUsMTk3LjkxNCw0NDMuNTV6IiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik00ODguMDQ3LDIwNC42MTdsLTQxLjYxNy0yMi42OTljLTEuNjY0LTAuOTEzLTIuNjk3LTIuNjU0LTIuNjk3LTQuNTQ4di0xNy4zNjVjMi45NzgtNC42NTksOS40MjEtMTUuNzQ0LDEzLjU1MS0zMC4xODIgICAgIGMwLjI2NS0wLjkzLDAuNzk0LTIuMTg1LDEuODM1LTIuOTUzYzIuNTI2LTEuODY5LDEwLjIxNC03LjUyNiwxMC4yMTQtMTYuMTAyVjkyLjEwNWMwLTYuNTM2LTQuOTY2LTExLjExOS02LjU5Ni0xMi42MjkgICAgIGMtMS4yMjktMS4xMzUtMS45MzctMi43MzktMS45MzctNC4zOTVWNTUuMTk4YzAuMzA3LTMuNTI0LDAuOTY0LTE5LjcyMS0xMC43ODYtMzMuMTA5QzQzOS42OCwxMC4zMTMsNDIzLjIxOSw0LjMyMiw0MDEuMDUsNC4yNzEgICAgIGMtMjIuMTQ0LDAuMDUxLTM4LjU5Niw2LjA1LTQ4LjkwNSwxNy44MjZjLTExLjcwOCwxMy4zOC0xMS4wMTcsMjkuNTUxLTEwLjcwMSwzMy4xMDl2MTkuODMxYzAsMS42NzMtMC43MjUsMy4yODUtMS45NzEsNC40MjkgICAgIGMtMS42NDcsMS41MDItNi42NzMsNi4wNzYtNi42NzMsMTIuNjM4djE4LjY2MmMwLDguNTc2LDcuNjgsMTQuMjM0LDEwLjIwNiwxNi4xMDJjMS4wNDEsMC43NjgsMS41NzksMi4wMjIsMS44MzUsMi45NDQgICAgIGM0LjEzLDE0LjQzOCwxMC41NzMsMjUuNTMyLDEzLjU2LDMwLjE5MXYxNy4zNjVjMCwxLjg5NC0xLjAzMywzLjYzNS0yLjY5Nyw0LjU0bC00MS42MjYsMjIuNzA3ICAgICBjLTE0Ljc3MSw4LjA1NS0yMy45NDUsMjMuNTE4LTIzLjk0NSw0MC4zNDZ2MTUuM2MwLDQuNzEsMy44MTQsOC41MzMsOC41MzMsOC41MzNoMjA0LjhjNC43MSwwLDguNTMzLTMuODIzLDguNTMzLTguNTMzdi0xNS4zICAgICBDNTEyLDIyOC4xMzQsNTAyLjgxOCwyMTIuNjcyLDQ4OC4wNDcsMjA0LjYxN3oiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBhdGggZD0iTTM4MS41MDUsMjk2LjkwNGMtMC43OTQtMC43OTQtMS43MzItMS40MTctMi43ODItMS44NTJjLTIuMDgyLTAuODYyLTQuNDM3LTAuODYyLTYuNTE5LDAgICAgIGMtMS4wNSwwLjQzNS0xLjk4OCwxLjA1OC0yLjc4MiwxLjg1MmwtMjUuNTkxLDI1LjU5MWMtMy4zMzcsMy4zMzctMy4zMzcsOC43MywwLDEyLjA2NmMzLjMzNiwzLjMzNyw4LjczLDMuMzM3LDEyLjA2NiwwICAgICBsOC43ODEtOC43ODFjLTEwLjcwMSw1NC45NzItNTkuMTUzLDk2LjYxNC0xMTcuMjE0LDk2LjYxNGMtNC43MTksMC04LjUzMywzLjgyMy04LjUzMyw4LjUzM2MwLDQuNzEsMy44MTQsOC41MzMsOC41MzMsOC41MzMgICAgIGM2OC43ODcsMCwxMjUuNjk2LTUxLjE4MywxMzUuMDMxLTExNy40MjdsMTIuNTM1LDEyLjUyN2MxLjY2NCwxLjY2NCwzLjg0OSwyLjUsNi4wMzMsMi41YzIuMTg1LDAsNC4zNjktMC44MzYsNi4wMzMtMi41ICAgICBjMy4zMzctMy4zMzcsMy4zMzctOC43MywwLTEyLjA2NkwzODEuNTA1LDI5Ni45MDR6IiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik0xMTMuNDIyLDIxNS4wODhjMC43OTQsMC43OTQsMS43MzIsMS40MTcsMi43ODIsMS44NTJjMS4wNDEsMC40MzUsMi4xNSwwLjY1NywzLjI2LDAuNjU3czIuMjE5LTAuMjIyLDMuMjYtMC42NTcgICAgIGMxLjA1LTAuNDM1LDEuOTg4LTEuMDU4LDIuNzgyLTEuODUybDI1LjU5MS0yNS41OTFjMy4zMzctMy4zMzYsMy4zMzctOC43MywwLTEyLjA2NnMtOC43My0zLjMzNy0xMi4wNjYsMGwtOC43ODEsOC43ODEgICAgIGMxMC43MDEtNTQuOTcyLDU5LjE1My05Ni42MTQsMTE3LjIxNC05Ni42MTRjNC43MTksMCw4LjUzMy0zLjgyMyw4LjUzMy04LjUzM3MtMy44MTQtOC41MzMtOC41MzMtOC41MzMgICAgIGMtNjguNzg3LDAtMTI1LjY5Niw1MS4xODMtMTM1LjAzMSwxMTcuNDI3TDk5Ljg5NiwxNzcuNDNjLTMuMzM2LTMuMzM3LTguNzMtMy4zMzctMTIuMDY2LDBzLTMuMzM3LDguNzMsMCwxMi4wNjYgICAgIEwxMTMuNDIyLDIxNS4wODh6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Reportes Cerrados</span>
                </a>

                <a href="bugs" class="tile bg-amber fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-list-numbered">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4IiB2aWV3Qm94PSIwIDAgOTAuMjg5IDkwLjI4OSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgOTAuMjg5IDkwLjI4OTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwb2x5Z29uIHBvaW50cz0iNzIuMjA0LDU1LjQyNSA2Ny40MDcsNTUuNDI1IDY3LjQwNyw3MS4yMDcgODAuODY0LDcxLjIwNyA4MC44NjQsNjYuNDEgNzIuMjA0LDY2LjQxICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTcwLjA0LDQ3LjM5NWMtNS4yNjksMC0xMC4wNTYsMi4wMzYtMTMuNjU2LDUuMzQ4bC0wLjcyMy0wLjMzMmwtNC45NDctNC4xNzNsLTguNTAyLDguNDU1bC04LjUyMy04LjQ1NWwtNC45NDcsNC4xNzMgICAgbC0xMC4yOTcsNC43MzljLTEuNTIzLDAuNjI3LTIuODc1LDEuNzA3LTMuNzgxLDMuMjI4TDAsODQuODg2aDU5LjQ4YzMuMDc4LDEuODk1LDYuNjg2LDMuMDA5LDEwLjU1OSwzLjAwOSAgICBjMTEuMTY2LDAsMjAuMjUtOS4wODQsMjAuMjUtMjAuMjVTODEuMjA2LDQ3LjM5NSw3MC4wNCw0Ny4zOTV6IE03MC4wNCw4MS44OTVjLTcuODU2LDAtMTQuMjUtNi4zOTMtMTQuMjUtMTQuMjUgICAgczYuMzk0LTE0LjI1LDE0LjI1LTE0LjI1czE0LjI1LDYuMzkzLDE0LjI1LDE0LjI1Uzc3Ljg5Niw4MS44OTUsNzAuMDQsODEuODk1eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik00Mi4xNDUsNDkuMjU2djAuMDA1YzAuMDEsMCwwLjAyLTAuMDAyLDAuMDI5LTAuMDAyYzAuMDA2LDAsMC4wMTQsMC4wMDIsMC4wMiwwLjAwMmMwLjAwMiwwLDAuMDA0LDAsMC4wMDgsMCAgICBjMC4wMDIsMCwwLjAwNiwwLDAuMDA2LDBjMC4wMDgsMCwwLjAxNi0wLjAwMiwwLjAyLTAuMDAyYzAuMDEsMCwwLjAyLDAuMDAyLDAuMDI5LDAuMDAydi0wLjAwNSAgICBjMTIuMDA3LDAuMTg0LDE5LjMwNC0xMC4zMjMsMTkuNDktMjcuNjQ2YzAuMTIxLTEyLjAxOC03LjMzLTE4Ljg4OS0xOS40NjktMTkuMjEzVjIuMzk1Yy0wLjAxOCwwLTAuMDMxLDAuMDAyLTAuMDUxLDAuMDAyVjIuMzk1ICAgIGMtMC4wMSwwLTAuMDE4LDAtMC4wMjUsMC4wMDJjLTAuMDA4LTAuMDAyLTAuMDE4LTAuMDAyLTAuMDI4LTAuMDAydjAuMDAyYy0wLjAxOCwwLTAuMDMzLTAuMDAyLTAuMDQ5LTAuMDAydjAuMDA0ICAgIGMtMTIuMTM2LDAuMzI0LTE5LjU5MSw3LjE5NS0xOS40NywxOS4yMTNDMjIuODQ0LDM4LjkzMywzMC4xNDEsNDkuNDM5LDQyLjE0NSw0OS4yNTZ6IiBmaWxsPSIjRkZGRkZGIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Todos los reportes</span>
                </a>

                <a href="users/chat" class="tile bg-darker fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-bubbles">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4IiB2aWV3Qm94PSIwIDAgOTAuMjg5IDkwLjI4OSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgOTAuMjg5IDkwLjI4OTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwb2x5Z29uIHBvaW50cz0iNzIuMjA0LDU1LjQyNSA2Ny40MDcsNTUuNDI1IDY3LjQwNyw3MS4yMDcgODAuODY0LDcxLjIwNyA4MC44NjQsNjYuNDEgNzIuMjA0LDY2LjQxICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTcwLjA0LDQ3LjM5NWMtNS4yNjksMC0xMC4wNTYsMi4wMzYtMTMuNjU2LDUuMzQ4bC0wLjcyMy0wLjMzMmwtNC45NDctNC4xNzNsLTguNTAyLDguNDU1bC04LjUyMy04LjQ1NWwtNC45NDcsNC4xNzMgICAgbC0xMC4yOTcsNC43MzljLTEuNTIzLDAuNjI3LTIuODc1LDEuNzA3LTMuNzgxLDMuMjI4TDAsODQuODg2aDU5LjQ4YzMuMDc4LDEuODk1LDYuNjg2LDMuMDA5LDEwLjU1OSwzLjAwOSAgICBjMTEuMTY2LDAsMjAuMjUtOS4wODQsMjAuMjUtMjAuMjVTODEuMjA2LDQ3LjM5NSw3MC4wNCw0Ny4zOTV6IE03MC4wNCw4MS44OTVjLTcuODU2LDAtMTQuMjUtNi4zOTMtMTQuMjUtMTQuMjUgICAgczYuMzk0LTE0LjI1LDE0LjI1LTE0LjI1czE0LjI1LDYuMzkzLDE0LjI1LDE0LjI1Uzc3Ljg5Niw4MS44OTUsNzAuMDQsODEuODk1eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik00Mi4xNDUsNDkuMjU2djAuMDA1YzAuMDEsMCwwLjAyLTAuMDAyLDAuMDI5LTAuMDAyYzAuMDA2LDAsMC4wMTQsMC4wMDIsMC4wMiwwLjAwMmMwLjAwMiwwLDAuMDA0LDAsMC4wMDgsMCAgICBjMC4wMDIsMCwwLjAwNiwwLDAuMDA2LDBjMC4wMDgsMCwwLjAxNi0wLjAwMiwwLjAyLTAuMDAyYzAuMDEsMCwwLjAyLDAuMDAyLDAuMDI5LDAuMDAydi0wLjAwNSAgICBjMTIuMDA3LDAuMTg0LDE5LjMwNC0xMC4zMjMsMTkuNDktMjcuNjQ2YzAuMTIxLTEyLjAxOC03LjMzLTE4Ljg4OS0xOS40NjktMTkuMjEzVjIuMzk1Yy0wLjAxOCwwLTAuMDMxLDAuMDAyLTAuMDUxLDAuMDAyVjIuMzk1ICAgIGMtMC4wMSwwLTAuMDE4LDAtMC4wMjUsMC4wMDJjLTAuMDA4LTAuMDAyLTAuMDE4LTAuMDAyLTAuMDI4LTAuMDAydjAuMDAyYy0wLjAxOCwwLTAuMDMzLTAuMDAyLTAuMDQ5LTAuMDAydjAuMDA0ICAgIGMtMTIuMTM2LDAuMzI0LTE5LjU5MSw3LjE5NS0xOS40NywxOS4yMTNDMjIuODQ0LDM4LjkzMywzMC4xNDEsNDkuNDM5LDQyLjE0NSw0OS4yNTZ6IiBmaWxsPSIjRkZGRkZGIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Chat en línea</span>
                </a>

                <!-- <div class="tile-large bg-steel fg-white" data-role="tile" data-on-click="document.location.href='http://forecast.io'">
                    <div class="tile-content" id="weather_bg" style="background: top left no-repeat; background-size: cover">
                        <div class="padding10">
                            <h1 id="weather_icon" style="font-size: 6em;position: absolute; top: 10px; right: 10px;"></h1>
                            <h1 id="city_temp"></h1>
                            <h2 id="city_name" class="text-light"></h2>
                            <h4 id="city_weather"></h4>
                            <p id="city_weather_daily"></p>

                            <p class="no-margin text-shadow">Pressure: <span class="text-bold" id="pressure"></span> mm</p>
                            <p class="no-margin text-shadow">Ozone: <span class="text-bold" id="ozone"></span></p>
                            <p class="no-margin text-shadow">Wind bearing: <span class="text-bold" id="wind_bearing"></span></p>
                            <p class="no-margin text-shadow">Wind speed: <span class="text-bold" id="wind_speed">0</span> m/s</p>
                        </div>
                    </div>
                    <span class="tile-label">Weather</span>
                </div> -->
            </div>
        </div>

        <div class="tile-group one">
            <span class="tile-group-title">Actualizaciones</span>

            <div class="tile-container">

                <a href="actualizaciones/recientes" class="tile bg-indigo fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-file-download">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCIgdmlld0JveD0iMCAwIDk4NC44NSA5ODQuODUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDk4NC44NSA5ODQuODU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNNjUyLjA3NSw5NTQuNzkxYzEyLjEwMSwxMiwyOC43LDIwLjEsNDUuNywyMS41YzE3LjIsMS4zOTksMzQuOS0yLjgsNDkuMi0xMi41YzMuOS0yLjYwMSw3LjYtNS43LDEwLjktOWwwLjEtMC4xMDEgICBsMjA0LjktMjA0Ljg5OWMyOS4zLTI5LjMsMjkuMy03Ni44LDAtMTA2LjEwMWMtMjkuMzAxLTI5LjMtNzYuODAxLTI5LjMtMTA2LjEwMSwwbC03Ni44OTksNzYuOXYtNjM3YzAtNDEuNC0zMy42MDEtNzUtNzUtNzUgICBjLTQxLjQsMC03NSwzMy42LTc1LDc1djYzN2wtNzguOS03OC45Yy0yOS4zLTI5LjMtNzYuOC0yOS4zLTEwNi4xLDBjLTI5LjMwMSwyOS4zMDEtMjkuMzAxLDc2LjgwMSwwLDEwNi4xMDFsMjA3LDIwNyAgIEM2NTEuOTc1LDk1NC42OSw2NTEuOTc1LDk1NC43OTEsNjUyLjA3NSw5NTQuNzkxeiIgZmlsbD0iI0ZGRkZGRiIvPgoJPHBhdGggZD0iTTc0Ljk3NSwzNjUuNDkxYzE5LjIsMCwzOC40LTcuMyw1My0yMmw3OC45LTc4Ljl2NjM3YzAsNDEuNCwzMy42LDc1LDc1LDc1czc1LTMzLjYsNzUtNzV2LTYzN2w3Ni44OTksNzYuOSAgIGMxNC42MDEsMTQuNiwzMy44LDIyLDUzLDIyczM4LjQtNy4zLDUzLTIyYzI5LjMtMjkuMywyOS4zLTc2LjgsMC0xMDYuMWMtNS4zOTktNS40LTEwLjg5OS0xMC45LTE2LjMtMTYuMyAgIGMtMTMuMy0xMy4zLTI2LjUtMjYuNy0zOS45LTM5LjljLTE3LjE5OS0xNy4xLTM0LjMtMzQuMi01MS4zOTktNTEuNGMtMTYuOC0xNy0zNC4yLTMzLjUtNTAuOS01MC43ICAgYy0xNi4yLTE2LjYtMzIuNi0zMi45LTQ5Ljg5OS00OC41Yy0xOC0xNi4yLTQxLjUtMjQuMi02NS43LTE4LjVjLTYuMiwxLjQtMTIuOCwzLjgtMTguNCw2LjljLTE2LjcsOS40LTMwLDI0LjktNDMuNSwzOC4zICAgYy0xNi41LDE2LjMtMzIuNywzMi45LTQ5LjEsNDkuNGMtMTkuNSwxOS42LTM5LjIsMzkuMS01OC44LDU4LjZjLTE2LjQsMTYuNi0zMywzMy4yLTQ5LjUsNDkuOGMtOCw4LTE2LDE1LjktMjQsMjMuOSAgIGMtMC4xLDAuMS0wLjMsMC4zLTAuNCwwLjRjLTI5LjMsMjkuMy0yOS4zLDc2LjgsMCwxMDYuMUMzNi41NzUsMzU4LjE5MSw1NS43NzUsMzY1LjQ5MSw3NC45NzUsMzY1LjQ5MXoiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Recientes</span>
                </a>

                <a href="actualizaciones/add" class="tile bg-darkBlue fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-magic-wand">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTI4cHgiIGhlaWdodD0iMTI4cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMTk3LjkxNCw0NDMuNTVsLTQxLjYxNy0yMi43MDdjLTAuNzQyLTAuNDAxLTIuNjk3LTEuNDY4LTIuNjk3LTcuNDMzdi0xNC40NjRjMy4xMTUtNC44ODEsMTAuMDEtMTYuNzg1LDE0LjEwNi0zMi4yMjIgICAgIGM1LjA2LTMuNDksMTEuNDk0LTkuMDExLDExLjQ5NC0xNy4wMjR2LTE4LjY2MmMwLTYuNjEzLTQuNzYyLTExLjE2Mi04LjUzMy0xNC4zMjd2LTIyLjU3OSAgICAgYzAuMzA3LTMuNTI0LDAuOTY0LTE5LjcyMS0xMC43ODYtMzMuMTA5Yy0xMC4zMzQtMTEuNzc2LTI2Ljc5NS0xNy43NjYtNDguOTY0LTE3LjgxOGMtMjIuMTQ0LDAuMDUxLTM4LjU5Niw2LjA1LTQ4LjkwNSwxNy44MjYgICAgIGMtMTEuNzA4LDEzLjM4LTExLjAxNywyOS41NTEtMTAuNzAxLDMzLjEwOXYyMi41NTRjLTMuODA2LDMuMTQ5LTguNjQ0LDcuNjk3LTguNjQ0LDE0LjM0NVYzNDkuNyAgICAgYzAsOC4wMTMsNi40MzQsMTMuNTM0LDExLjQ4NiwxNy4wMjRjNC4wOTYsMTUuNDM3LDEwLjk5MSwyNy4zNDEsMTQuMTE0LDMyLjIyMnYxNC40NjRjMCw1Ljk2NS0xLjk2Myw3LjAzMS0yLjY5Nyw3LjQzMyAgICAgTDIzLjk0NSw0NDMuNTVDOS4xNzMsNDUxLjYwNSwwLDQ2Ny4wNjgsMCw0ODMuODk1djE1LjNjMCw0LjcxLDMuODE0LDguNTMzLDguNTMzLDguNTMzaDIwNC44YzQuNzEsMCw4LjUzMy0zLjgyMyw4LjUzMy04LjUzMyAgICAgdi0xNS4zQzIyMS44NjcsNDY3LjA2OCwyMTIuNjg1LDQ1MS42MDUsMTk3LjkxNCw0NDMuNTV6IiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik00ODguMDQ3LDIwNC42MTdsLTQxLjYxNy0yMi42OTljLTEuNjY0LTAuOTEzLTIuNjk3LTIuNjU0LTIuNjk3LTQuNTQ4di0xNy4zNjVjMi45NzgtNC42NTksOS40MjEtMTUuNzQ0LDEzLjU1MS0zMC4xODIgICAgIGMwLjI2NS0wLjkzLDAuNzk0LTIuMTg1LDEuODM1LTIuOTUzYzIuNTI2LTEuODY5LDEwLjIxNC03LjUyNiwxMC4yMTQtMTYuMTAyVjkyLjEwNWMwLTYuNTM2LTQuOTY2LTExLjExOS02LjU5Ni0xMi42MjkgICAgIGMtMS4yMjktMS4xMzUtMS45MzctMi43MzktMS45MzctNC4zOTVWNTUuMTk4YzAuMzA3LTMuNTI0LDAuOTY0LTE5LjcyMS0xMC43ODYtMzMuMTA5QzQzOS42OCwxMC4zMTMsNDIzLjIxOSw0LjMyMiw0MDEuMDUsNC4yNzEgICAgIGMtMjIuMTQ0LDAuMDUxLTM4LjU5Niw2LjA1LTQ4LjkwNSwxNy44MjZjLTExLjcwOCwxMy4zOC0xMS4wMTcsMjkuNTUxLTEwLjcwMSwzMy4xMDl2MTkuODMxYzAsMS42NzMtMC43MjUsMy4yODUtMS45NzEsNC40MjkgICAgIGMtMS42NDcsMS41MDItNi42NzMsNi4wNzYtNi42NzMsMTIuNjM4djE4LjY2MmMwLDguNTc2LDcuNjgsMTQuMjM0LDEwLjIwNiwxNi4xMDJjMS4wNDEsMC43NjgsMS41NzksMi4wMjIsMS44MzUsMi45NDQgICAgIGM0LjEzLDE0LjQzOCwxMC41NzMsMjUuNTMyLDEzLjU2LDMwLjE5MXYxNy4zNjVjMCwxLjg5NC0xLjAzMywzLjYzNS0yLjY5Nyw0LjU0bC00MS42MjYsMjIuNzA3ICAgICBjLTE0Ljc3MSw4LjA1NS0yMy45NDUsMjMuNTE4LTIzLjk0NSw0MC4zNDZ2MTUuM2MwLDQuNzEsMy44MTQsOC41MzMsOC41MzMsOC41MzNoMjA0LjhjNC43MSwwLDguNTMzLTMuODIzLDguNTMzLTguNTMzdi0xNS4zICAgICBDNTEyLDIyOC4xMzQsNTAyLjgxOCwyMTIuNjcyLDQ4OC4wNDcsMjA0LjYxN3oiIGZpbGw9IiNGRkZGRkYiLz4KCQkJPHBhdGggZD0iTTM4MS41MDUsMjk2LjkwNGMtMC43OTQtMC43OTQtMS43MzItMS40MTctMi43ODItMS44NTJjLTIuMDgyLTAuODYyLTQuNDM3LTAuODYyLTYuNTE5LDAgICAgIGMtMS4wNSwwLjQzNS0xLjk4OCwxLjA1OC0yLjc4MiwxLjg1MmwtMjUuNTkxLDI1LjU5MWMtMy4zMzcsMy4zMzctMy4zMzcsOC43MywwLDEyLjA2NmMzLjMzNiwzLjMzNyw4LjczLDMuMzM3LDEyLjA2NiwwICAgICBsOC43ODEtOC43ODFjLTEwLjcwMSw1NC45NzItNTkuMTUzLDk2LjYxNC0xMTcuMjE0LDk2LjYxNGMtNC43MTksMC04LjUzMywzLjgyMy04LjUzMyw4LjUzM2MwLDQuNzEsMy44MTQsOC41MzMsOC41MzMsOC41MzMgICAgIGM2OC43ODcsMCwxMjUuNjk2LTUxLjE4MywxMzUuMDMxLTExNy40MjdsMTIuNTM1LDEyLjUyN2MxLjY2NCwxLjY2NCwzLjg0OSwyLjUsNi4wMzMsMi41YzIuMTg1LDAsNC4zNjktMC44MzYsNi4wMzMtMi41ICAgICBjMy4zMzctMy4zMzcsMy4zMzctOC43MywwLTEyLjA2NkwzODEuNTA1LDI5Ni45MDR6IiBmaWxsPSIjRkZGRkZGIi8+CgkJCTxwYXRoIGQ9Ik0xMTMuNDIyLDIxNS4wODhjMC43OTQsMC43OTQsMS43MzIsMS40MTcsMi43ODIsMS44NTJjMS4wNDEsMC40MzUsMi4xNSwwLjY1NywzLjI2LDAuNjU3czIuMjE5LTAuMjIyLDMuMjYtMC42NTcgICAgIGMxLjA1LTAuNDM1LDEuOTg4LTEuMDU4LDIuNzgyLTEuODUybDI1LjU5MS0yNS41OTFjMy4zMzctMy4zMzYsMy4zMzctOC43MywwLTEyLjA2NnMtOC43My0zLjMzNy0xMi4wNjYsMGwtOC43ODEsOC43ODEgICAgIGMxMC43MDEtNTQuOTcyLDU5LjE1My05Ni42MTQsMTE3LjIxNC05Ni42MTRjNC43MTksMCw4LjUzMy0zLjgyMyw4LjUzMy04LjUzM3MtMy44MTQtOC41MzMtOC41MzMtOC41MzMgICAgIGMtNjguNzg3LDAtMTI1LjY5Niw1MS4xODMtMTM1LjAzMSwxMTcuNDI3TDk5Ljg5NiwxNzcuNDNjLTMuMzM2LTMuMzM3LTguNzMtMy4zMzctMTIuMDY2LDBzLTMuMzM3LDguNzMsMCwxMi4wNjYgICAgIEwxMTMuNDIyLDIxNS4wODh6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Nueva Actualización</span>
                </a>

                <a href="actualizaciones" class="tile bg-amber fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-tab">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4IiB2aWV3Qm94PSIwIDAgOTAuMjg5IDkwLjI4OSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgOTAuMjg5IDkwLjI4OTsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwb2x5Z29uIHBvaW50cz0iNzIuMjA0LDU1LjQyNSA2Ny40MDcsNTUuNDI1IDY3LjQwNyw3MS4yMDcgODAuODY0LDcxLjIwNyA4MC44NjQsNjYuNDEgNzIuMjA0LDY2LjQxICAgIiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTcwLjA0LDQ3LjM5NWMtNS4yNjksMC0xMC4wNTYsMi4wMzYtMTMuNjU2LDUuMzQ4bC0wLjcyMy0wLjMzMmwtNC45NDctNC4xNzNsLTguNTAyLDguNDU1bC04LjUyMy04LjQ1NWwtNC45NDcsNC4xNzMgICAgbC0xMC4yOTcsNC43MzljLTEuNTIzLDAuNjI3LTIuODc1LDEuNzA3LTMuNzgxLDMuMjI4TDAsODQuODg2aDU5LjQ4YzMuMDc4LDEuODk1LDYuNjg2LDMuMDA5LDEwLjU1OSwzLjAwOSAgICBjMTEuMTY2LDAsMjAuMjUtOS4wODQsMjAuMjUtMjAuMjVTODEuMjA2LDQ3LjM5NSw3MC4wNCw0Ny4zOTV6IE03MC4wNCw4MS44OTVjLTcuODU2LDAtMTQuMjUtNi4zOTMtMTQuMjUtMTQuMjUgICAgczYuMzk0LTE0LjI1LDE0LjI1LTE0LjI1czE0LjI1LDYuMzkzLDE0LjI1LDE0LjI1Uzc3Ljg5Niw4MS44OTUsNzAuMDQsODEuODk1eiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik00Mi4xNDUsNDkuMjU2djAuMDA1YzAuMDEsMCwwLjAyLTAuMDAyLDAuMDI5LTAuMDAyYzAuMDA2LDAsMC4wMTQsMC4wMDIsMC4wMiwwLjAwMmMwLjAwMiwwLDAuMDA0LDAsMC4wMDgsMCAgICBjMC4wMDIsMCwwLjAwNiwwLDAuMDA2LDBjMC4wMDgsMCwwLjAxNi0wLjAwMiwwLjAyLTAuMDAyYzAuMDEsMCwwLjAyLDAuMDAyLDAuMDI5LDAuMDAydi0wLjAwNSAgICBjMTIuMDA3LDAuMTg0LDE5LjMwNC0xMC4zMjMsMTkuNDktMjcuNjQ2YzAuMTIxLTEyLjAxOC03LjMzLTE4Ljg4OS0xOS40NjktMTkuMjEzVjIuMzk1Yy0wLjAxOCwwLTAuMDMxLDAuMDAyLTAuMDUxLDAuMDAyVjIuMzk1ICAgIGMtMC4wMSwwLTAuMDE4LDAtMC4wMjUsMC4wMDJjLTAuMDA4LTAuMDAyLTAuMDE4LTAuMDAyLTAuMDI4LTAuMDAydjAuMDAyYy0wLjAxOCwwLTAuMDMzLTAuMDAyLTAuMDQ5LTAuMDAydjAuMDA0ICAgIGMtMTIuMTM2LDAuMzI0LTE5LjU5MSw3LjE5NS0xOS40NywxOS4yMTNDMjIuODQ0LDM4LjkzMywzMC4xNDEsNDkuNDM5LDQyLjE0NSw0OS4yNTZ6IiBmaWxsPSIjRkZGRkZGIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Todas las actualizaciones</span>
                </a>

                <!-- <div class="tile-large bg-steel fg-white" data-role="tile" data-on-click="document.location.href='http://forecast.io'">
                    <div class="tile-content" id="weather_bg" style="background: top left no-repeat; background-size: cover">
                        <div class="padding10">
                            <h1 id="weather_icon" style="font-size: 6em;position: absolute; top: 10px; right: 10px;"></h1>
                            <h1 id="city_temp"></h1>
                            <h2 id="city_name" class="text-light"></h2>
                            <h4 id="city_weather"></h4>
                            <p id="city_weather_daily"></p>

                            <p class="no-margin text-shadow">Pressure: <span class="text-bold" id="pressure"></span> mm</p>
                            <p class="no-margin text-shadow">Ozone: <span class="text-bold" id="ozone"></span></p>
                            <p class="no-margin text-shadow">Wind bearing: <span class="text-bold" id="wind_bearing"></span></p>
                            <p class="no-margin text-shadow">Wind speed: <span class="text-bold" id="wind_speed">0</span> m/s</p>
                        </div>
                    </div>
                    <span class="tile-label">Weather</span>
                </div> -->
            </div>
        </div>

        <div class="tile-group one">
            <span class="tile-group-title">Configuración</span>
            <div class="tile-container">

                <a href="asignados" class="tile bg-lighterBlue fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-users">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0NTUgNDU1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NTUgNDU1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4Ij4KPGc+Cgk8cG9seWdvbiBwb2ludHM9IjM3MC41LDE1OC40OTggMzEwLjUsMTU4LjQ5OCAzMTAuNSwyMjcuNDk4IDI0MS41LDIyNy40OTggMjQxLjUsMjg3LjQ5OCAzMTAuNSwyODcuNDk4IDMxMC41LDM1Ni40OTggICAgMzcwLjUsMzU2LjQ5OCAzNzAuNSwyODcuNDk4IDQzOS41LDI4Ny40OTggNDM5LjUsMjI3LjQ5OCAzNzAuNSwyMjcuNDk4ICAiIGZpbGw9IiNGRkZGRkYiLz4KCTxwYXRoIGQ9Ik0yMTEuNSwxOTcuNDk4aDY5di02OWgxMjB2NjloMzQuNzk5YzEyLjQ2OC0yMCwxOS43MDEtNDIuNjc0LDE5LjcwMS02Ny41M0M0NTUsNjAuNjg2LDM5OC44NDcsNC41MSwzMjkuNTc5LDQuNTEgICBjLTQyLjA4NywwLTc5LjMyOSwyMC43MzEtMTAyLjA3OSw1Mi41NDRDMjA0Ljc1LDI1LjI0LDE2Ny41MDgsNC41MDEsMTI1LjQyMSw0LjUwMUM1Ni4xNTMsNC41MDEsMCw2MC42NjQsMCwxMjkuOTQ3ICAgYzAsMzAuMTE4LDEwLjYxMiw1Ny43NTIsMjguMjk5LDc5LjM3NkwyMjcuNSw0NTAuNDk5bDUzLTY0LjE2OXYtNjguODMyaC02OVYxOTcuNDk4eiIgZmlsbD0iI0ZGRkZGRiIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Supervisores</span>
                </a>

                <a href="sistemas" class="tile bg-orange fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-phonelink">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4IiB2aWV3Qm94PSIwIDAgNDYuMDE2IDQ2LjAxNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDYuMDE2IDQ2LjAxNjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zOC45MDIsMjkuNDQyYy0wLjczMywwLjg2NS0xLjMzOCwxLjg4Ny0xLjc0OCwzLjA0N0g4LjgyN2MtMC40MzctMS4xNTMtMS4wNzktMi4xNzYtMS44NS0zLjA0N0g0LjIzNSAgICBjLTEuMTY4LDAtMi4zMjYtMC4zMzItMy4zMzEtMC45NDVIMHYyLjkyMWMwLDEuMjkxLDAuODQsMi42ODcsMS41MjMsMy4yNzZjMC41NDMsMC40NywxLjY5NCwwLjk0NSwyLjcxMiwwLjk0NWgzNy41NDQgICAgYzIuMzI2LDAsNC4yMzYtMS44OTcsNC4yMzYtNC4yMjJ2LTMuNjAzYy0xLjEyMywxLjAxMS0yLjYwOCwxLjYyNy00LjIzNiwxLjYyN0gzOC45MDJ6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTQxLjc3OSwyLjA3NUg0LjIzNUMxLjkxLDIuMDc1LDAsMy45MjMsMCw2LjI0N3YxNi44NjFjMCwxLjI5MSwwLjgzOSwyLjY5MywxLjUyMywzLjI4NyAgICBjMC41NDMsMC40NywxLjY5NCwwLjk0NSwyLjcxMiwwLjk0NWgzNy41NDRjMi4zMjYsMCw0LjIzNi0xLjkwOCw0LjIzNi00LjIzMlY2LjI0N0M0Ni4wMTYsMy45MjMsNDQuMTA1LDIuMDc1LDQxLjc3OSwyLjA3NXogICAgIE00Mi44NjMsMTguMzcyYy0yLjQ2OSwwLjg4Ni00LjY4NiwyLjkyOC01LjcwOSw1LjgxNkg4LjgyN2MtMS4wNTQtMi43ODMtMy4zMTEtNC44MjktNS42NzUtNS43NTR2LTcuNDgzICAgIGMyLjQxNy0wLjg5Miw0LjYxNC0yLjg4OCw1LjY1OC01Ljc3N2gyOC4zN2MxLjAxOSwzLjA0NiwzLjE2Myw0Ljk3OSw1LjY4Niw1LjgzMXY3LjM2N0g0Mi44NjN6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTIyLjk3Myw3LjIyN2MtNC4xMjIsMC03LjQ2MywzLjM0MS03LjQ2Myw3LjQ2NGMwLDQuMTIyLDMuMzQxLDcuNDY0LDcuNDYzLDcuNDY0YzQuMTIzLDAsNy40NjQtMy4zNDIsNy40NjQtNy40NjQgICAgQzMwLjQzOCwxMC41NjgsMjcuMDk2LDcuMjI3LDIyLjk3Myw3LjIyN3ogTTIzLjU4NiwxOC45NjN2MS4zOTFoLTEuMzEzdi0xLjI5NWMtMC45NDYtMC4wNDEtMS44MzMtMC4yODktMi4zNTYtMC41OTNsMC40MDgtMS42MTMgICAgYzAuNTc5LDAuMzE3LDEuMzksMC42MDYsMi4yODUsMC42MDZjMC43ODYsMCwxLjMyMi0wLjMwNCwxLjMyMi0wLjg1NGMwLTAuNTI0LTAuNDQyLTAuODU1LTEuNDYyLTEuMiAgICBjLTEuNDc2LTAuNDk3LTIuNDc5LTEuMTg2LTIuNDc5LTIuNTI0YzAtMS4yMTMsMC44NjItMi4xNjUsMi4zMzMtMi40NTRWOS4xMTRoMS4zNjZ2MS4yMThjMC44OTMsMC4wNDEsMS41MzMsMC4yMzQsMS45ODcsMC40NTUgICAgbC0wLjQwMywxLjU1OGMtMC4zNTktMC4xNTEtMC45OTYtMC40NjktMS45ODgtMC40NjljLTAuODk2LDAtMS4xODcsMC4zODYtMS4xODcsMC43NzJjMCwwLjQ1NSwwLjQ4LDAuNzQ0LDEuNjUzLDEuMTg2ICAgIGMxLjY0MiwwLjU3OSwyLjI5NSwxLjMzNywyLjI5NSwyLjU3OUMyNi4wNDgsMTcuNjQsMjUuMTYyLDE4LjY4OCwyMy41ODYsMTguOTYzeiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik0zOC45MDIsMzcuNzQyYy0wLjczMywwLjg2NC0xLjMzOCwxLjg4Ni0xLjc0OCwzLjA0Nkg4LjgyN2MtMC40MzctMS4xNTItMS4wNzktMi4xNzYtMS44NS0zLjA0Nkg0LjIzNSAgICBjLTEuMTY4LDAtMi4zMjYtMC4zMzItMy4zMzEtMC45NDZIMHYyLjkyMmMwLDEuMjkxLDAuODQsMi42ODcsMS41MjMsMy4yNzZjMC41NDMsMC40NywxLjY5NCwwLjk0NiwyLjcxMiwwLjk0NmgzNy41NDQgICAgYzIuMzI2LDAsNC4yMzYtMS44OTgsNC4yMzYtNC4yMjN2LTMuNjAzYy0xLjEyMywxLjAxMS0yLjYwOCwxLjYyNy00LjIzNiwxLjYyN0gzOC45MDJ6IiBmaWxsPSIjRkZGRkZGIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Sistemas</span>
                </a>
            </div>
        </div>

        <div class="tile-group one">
            <span class="tile-group-title">Estadísticas</span>
            <div class="tile-container">

                <?php
                  // echo $this->Html->link( 'Reporte general'.$this->Html->tag('span','',array ('class'=>'mif-opencart')), ['action' => 'reportes', '_ext' => 'pdf'], array
                  //   (
                  //     'class'=>'button primary',
                  //     'target'=>'_blank'
                  //   ));
                  echo  $this->Html->link(
                  $this->Html->tag('div',$this->Html->tag('span','',array ('class'=>'icon mif-clipboard')),array ('class'=>'tile-content iconic')).$this->Html->tag('span','Reportes',array ('class'=>'tile-label')),array ('controller' => 'estadisticas','action' => 'reportes', '_ext' => 'pdf'),
                    array('escape'=>false,'class'=>'tile bg-lighterBlue fg-white', 'target' => '_blank'));
                ?>
<!--
                <a href="estadisticas/reportesView" class="tile bg-lighterBlue fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-clipboard">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0NTUgNDU1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NTUgNDU1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4Ij4KPGc+Cgk8cG9seWdvbiBwb2ludHM9IjM3MC41LDE1OC40OTggMzEwLjUsMTU4LjQ5OCAzMTAuNSwyMjcuNDk4IDI0MS41LDIyNy40OTggMjQxLjUsMjg3LjQ5OCAzMTAuNSwyODcuNDk4IDMxMC41LDM1Ni40OTggICAgMzcwLjUsMzU2LjQ5OCAzNzAuNSwyODcuNDk4IDQzOS41LDI4Ny40OTggNDM5LjUsMjI3LjQ5OCAzNzAuNSwyMjcuNDk4ICAiIGZpbGw9IiNGRkZGRkYiLz4KCTxwYXRoIGQ9Ik0yMTEuNSwxOTcuNDk4aDY5di02OWgxMjB2NjloMzQuNzk5YzEyLjQ2OC0yMCwxOS43MDEtNDIuNjc0LDE5LjcwMS02Ny41M0M0NTUsNjAuNjg2LDM5OC44NDcsNC41MSwzMjkuNTc5LDQuNTEgICBjLTQyLjA4NywwLTc5LjMyOSwyMC43MzEtMTAyLjA3OSw1Mi41NDRDMjA0Ljc1LDI1LjI0LDE2Ny41MDgsNC41MDEsMTI1LjQyMSw0LjUwMUM1Ni4xNTMsNC41MDEsMCw2MC42NjQsMCwxMjkuOTQ3ICAgYzAsMzAuMTE4LDEwLjYxMiw1Ny43NTIsMjguMjk5LDc5LjM3NkwyMjcuNSw0NTAuNDk5bDUzLTY0LjE2OXYtNjguODMyaC02OVYxOTcuNDk4eiIgZmlsbD0iI0ZGRkZGRiIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                        </span>
                    </div>
                    <span class="tile-label">Reportes</span>
                </a> -->

                <a href="estadisticas" class="tile bg-orange fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-chart-bars">
                            <!-- <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4IiB2aWV3Qm94PSIwIDAgNDYuMDE2IDQ2LjAxNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDYuMDE2IDQ2LjAxNjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zOC45MDIsMjkuNDQyYy0wLjczMywwLjg2NS0xLjMzOCwxLjg4Ny0xLjc0OCwzLjA0N0g4LjgyN2MtMC40MzctMS4xNTMtMS4wNzktMi4xNzYtMS44NS0zLjA0N0g0LjIzNSAgICBjLTEuMTY4LDAtMi4zMjYtMC4zMzItMy4zMzEtMC45NDVIMHYyLjkyMWMwLDEuMjkxLDAuODQsMi42ODcsMS41MjMsMy4yNzZjMC41NDMsMC40NywxLjY5NCwwLjk0NSwyLjcxMiwwLjk0NWgzNy41NDQgICAgYzIuMzI2LDAsNC4yMzYtMS44OTcsNC4yMzYtNC4yMjJ2LTMuNjAzYy0xLjEyMywxLjAxMS0yLjYwOCwxLjYyNy00LjIzNiwxLjYyN0gzOC45MDJ6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTQxLjc3OSwyLjA3NUg0LjIzNUMxLjkxLDIuMDc1LDAsMy45MjMsMCw2LjI0N3YxNi44NjFjMCwxLjI5MSwwLjgzOSwyLjY5MywxLjUyMywzLjI4NyAgICBjMC41NDMsMC40NywxLjY5NCwwLjk0NSwyLjcxMiwwLjk0NWgzNy41NDRjMi4zMjYsMCw0LjIzNi0xLjkwOCw0LjIzNi00LjIzMlY2LjI0N0M0Ni4wMTYsMy45MjMsNDQuMTA1LDIuMDc1LDQxLjc3OSwyLjA3NXogICAgIE00Mi44NjMsMTguMzcyYy0yLjQ2OSwwLjg4Ni00LjY4NiwyLjkyOC01LjcwOSw1LjgxNkg4LjgyN2MtMS4wNTQtMi43ODMtMy4zMTEtNC44MjktNS42NzUtNS43NTR2LTcuNDgzICAgIGMyLjQxNy0wLjg5Miw0LjYxNC0yLjg4OCw1LjY1OC01Ljc3N2gyOC4zN2MxLjAxOSwzLjA0NiwzLjE2Myw0Ljk3OSw1LjY4Niw1LjgzMXY3LjM2N0g0Mi44NjN6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPHBhdGggZD0iTTIyLjk3Myw3LjIyN2MtNC4xMjIsMC03LjQ2MywzLjM0MS03LjQ2Myw3LjQ2NGMwLDQuMTIyLDMuMzQxLDcuNDY0LDcuNDYzLDcuNDY0YzQuMTIzLDAsNy40NjQtMy4zNDIsNy40NjQtNy40NjQgICAgQzMwLjQzOCwxMC41NjgsMjcuMDk2LDcuMjI3LDIyLjk3Myw3LjIyN3ogTTIzLjU4NiwxOC45NjN2MS4zOTFoLTEuMzEzdi0xLjI5NWMtMC45NDYtMC4wNDEtMS44MzMtMC4yODktMi4zNTYtMC41OTNsMC40MDgtMS42MTMgICAgYzAuNTc5LDAuMzE3LDEuMzksMC42MDYsMi4yODUsMC42MDZjMC43ODYsMCwxLjMyMi0wLjMwNCwxLjMyMi0wLjg1NGMwLTAuNTI0LTAuNDQyLTAuODU1LTEuNDYyLTEuMiAgICBjLTEuNDc2LTAuNDk3LTIuNDc5LTEuMTg2LTIuNDc5LTIuNTI0YzAtMS4yMTMsMC44NjItMi4xNjUsMi4zMzMtMi40NTRWOS4xMTRoMS4zNjZ2MS4yMThjMC44OTMsMC4wNDEsMS41MzMsMC4yMzQsMS45ODcsMC40NTUgICAgbC0wLjQwMywxLjU1OGMtMC4zNTktMC4xNTEtMC45OTYtMC40NjktMS45ODgtMC40NjljLTAuODk2LDAtMS4xODcsMC4zODYtMS4xODcsMC43NzJjMCwwLjQ1NSwwLjQ4LDAuNzQ0LDEuNjUzLDEuMTg2ICAgIGMxLjY0MiwwLjU3OSwyLjI5NSwxLjMzNywyLjI5NSwyLjU3OUMyNi4wNDgsMTcuNjQsMjUuMTYyLDE4LjY4OCwyMy41ODYsMTguOTYzeiIgZmlsbD0iI0ZGRkZGRiIvPgoJCTxwYXRoIGQ9Ik0zOC45MDIsMzcuNzQyYy0wLjczMywwLjg2NC0xLjMzOCwxLjg4Ni0xLjc0OCwzLjA0Nkg4LjgyN2MtMC40MzctMS4xNTItMS4wNzktMi4xNzYtMS44NS0zLjA0Nkg0LjIzNSAgICBjLTEuMTY4LDAtMi4zMjYtMC4zMzItMy4zMzEtMC45NDZIMHYyLjkyMmMwLDEuMjkxLDAuODQsMi42ODcsMS41MjMsMy4yNzZjMC41NDMsMC40NywxLjY5NCwwLjk0NiwyLjcxMiwwLjk0NmgzNy41NDQgICAgYzIuMzI2LDAsNC4yMzYtMS44OTgsNC4yMzYtNC4yMjN2LTMuNjAzYy0xLjEyMywxLjAxMS0yLjYwOCwxLjYyNy00LjIzNiwxLjYyN0gzOC45MDJ6IiBmaWxsPSIjRkZGRkZGIi8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> -->
                        </span>
                    </div>
                    <span class="tile-label">Gráficas</span>
                </a>
            </div>
        </div>

        <div class="tile-group one">
            <span class="tile-group-title">Centro Atención</span>
            <div class="tile-container">
                <a href="<?php echo Router::url(['action'=>'index','controller'=>'Directorio'])?>" class="tile bg-steel fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-profile">
                        </span>
                    </div>
                    <span class="tile-label">Directorio</span>
                </a>

                <a href="<?php echo Router::url(['action'=>'index','controller'=>'RSeguimientoDirectorio'])?>" class="tile bg-violet fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-bookmarks">
                        </span>
                    </div>
                    <span class="tile-label">Seguimiento</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
