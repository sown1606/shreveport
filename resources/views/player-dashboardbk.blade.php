@extends('layouts.app')
@section('content')
    <style>
        /*reponse for flipbook*/
        #flipbook-container-overriding-viewport-attr {
            width: 1140px;
        }

        #flipbook-container-response {
            width: 100% !important;
            margin-left: 25%;
        }

        #flipbook-arrow-next {
            position: absolute;
            top: 50%;
            right: 56px;
        }

        @media screen and (max-width: 1800px) {
            #flipbook-container-response {
                zoom: 0.9;
                width: 100% !important;
                margin-left: 25%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 56px;
            }
        }

        @media screen and (max-width: 1480px) {
            #flipbook-container-response {
                zoom: 0.8;
                width: 100% !important;
                margin-left: 24.5%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 56px;
            }
        }


        @media screen and (max-width: 1200px) {
            #flipbook-container-overriding-viewport-attr {
                width: 992px;
            }

            #flipbook-container-response {
                zoom: 0.7;
                width: 100% !important;
                margin-left: 22%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 56px;
            }
        }

        @media screen and (max-width: 1100px) {
            #flipbook-container-overriding-viewport-attr {
                width: 992px;
            }

            #flipbook-container-response {
                zoom: 0.6;
                width: 100% !important;
                margin-left: 23%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 56px;
            }
        }

        @media screen and (max-width: 992px) {
            #flipbook-container-overriding-viewport-attr {
                width: 912px;
            }

            #flipbook-container-response {
                zoom: 0.6;
                width: 100% !important;
                margin-left: 28%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 56px;
            }
        }

        @media screen and (max-width: 912px) {
            #flipbook-container-overriding-viewport-attr {
                width: 820px;
            }

            #flipbook-container-response {
                zoom: 0.6;
                width: 100% !important;
                margin-left: 25%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 56px;
            }
        }

        @media screen and (max-width: 820px) {
            #flipbook-container-overriding-viewport-attr {
                width: 768px;
            }

            #flipbook-container-response {
                zoom: 0.5;
                width: 100% !important;
                margin-left: 27%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 10px;
            }
        }

        @media screen and (max-width: 768px) {
            #flipbook-container-overriding-viewport-attr {
                width: 360px;
            }

            #flipbook-container-response {
                zoom: 0.5;
                width: 100% !important;
                margin-left: 26%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 10px;
            }
        }

        @media screen and (max-width: 620px) {
            #flipbook-container-overriding-viewport-attr {
                width: 360px;
            }

            #flipbook-container-response {
                zoom: 0.45;
                width: 100% !important;
                margin-left: 23%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 10px;
            }
        }

        @media screen and (max-width: 520px) {
            #flipbook-container-overriding-viewport-attr {
                width: 390px;
            }

            #flipbook-container-response {
                zoom: 0.35;
                width: 100% !important;
                margin-left: 23%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 10px;
            }
        }

        @media screen and (max-width: 480px) {
            #flipbook-container-overriding-viewport-attr {
                width: 390px;
            }

            #flipbook-container-response {
                zoom: 0.30;
                width: 100% !important;
                margin-left: 23%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 30px;
            }
        }

        @media screen and (max-width: 420px) {
            #flipbook-container-overriding-viewport-attr {
                width: 360px;
            }

            #flipbook-container-response {
                zoom: 0.275;
                width: 100% !important;
                margin-left: 23%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 10px;
            }
        }


        @media screen and (max-width: 400px) {
            #flipbook-container-overriding-viewport-attr {
                width: 320px;
            }

            #flipbook-container-response {
                zoom: 0.265;
                width: 100% !important;
                margin-left: 23%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 10px;
            }
        }

        @media screen and (max-width: 370px) {
            #flipbook-container-overriding-viewport-attr {
                width: 280px;
            }

            #flipbook-container-response {
                zoom: 0.235;
                width: 100% !important;
                margin-left: 23%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 10px;
            }
        }

        @media screen and (max-width: 320px) {
            #flipbook-container-overriding-viewport-attr {
                width: 240px;
            }

            #flipbook-container-response {
                zoom: 0.2;
                width: 100% !important;
                margin-left: 25%;
            }

            #flipbook-arrow-next {
                position: absolute;
                top: 50%;
                right: 0;
            }
        }

        @media only screen and (max-width: 1100px) {
            #flipbook-slider-thumb-hide-on-mobile {
                display: none;
            }
        }
    </style>
    <div class="row justify-content-center" style="padding-top: 20px;background: white">
        <form id="logout-form" action="{{ route('voyager.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="col-md-9">
        @if($data->flgSM || $data->flgPC)
            <!-- SM here -->
                <div class="row">
                    @if($data->MAR2023_CORE_SM)
                        <div class="col-md-12">
                            <script type="text/javascript"
                                    src="{{asset('flipbook_assets/js/modernizr.2.5.3.min.js')}}"></script>
                            <link rel="stylesheet" href="{{asset('flipbook_assets/css/lightbox.min.css')}}"/>
                            <script type="text/javascript"
                                    src="{{asset('flipbook_assets/js/lightbox.min.js')}}"></script>
                            <style>
                                table {
                                    border-collapse: inherit !important;
                                }

                                #img-magnifier-container {
                                    display: none;
                                    background: rgba(0, 0, 0, 0.8);
                                    border: 5px solid rgb(255, 255, 255);
                                    border-radius: 20px;
                                    box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85),
                                    0 0 7px 7px rgba(0, 0, 0, 0.25),
                                    inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
                                    cursor: none;
                                    position: absolute;
                                    pointer-events: none;
                                    width: 400px;
                                    height: 200px;
                                    overflow: hidden;
                                    z-index: 999;
                                }

                                .glass {
                                    position: absolute;
                                    background-repeat: no-repeat;
                                    background-size: auto;
                                    cursor: none;
                                    z-index: 1000;
                                }

                                #toggle-zoom {
                                    background-image: url("{{asset('flipbook_assets/images/magnifying-glass-large_BLACK.png')}}");
                                    background-size: 40px;
                                    display: block;
                                    width: 40px;
                                    display: none;
                                    height: 40px;
                                }

                                #printer {
                                    float: right;
                                    display: block;
                                    width: 40px;
                                    height: 40px;
                                    margin-right: 20px;
                                    display: none;
                                }

                                #toggle-zoom.toggle-on {
                                    background-image: url("{{asset('flipbook_assets/images/magnifying-glass-large_BLUE.png')}}");
                                }

                                @media (hover: none) {
                                    .tool-zoom {
                                        display: none;
                                    }

                                    #printer {
                                        display: none;
                                    }
                                }
                            </style>
                            <div class="flipbook-viewport">
                                <div class="container">
                                    <div>
                                        <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}"" target="blank"><img
                                                id="printer"
                                                src="{{asset('flipbook_assets/pages/printer-large.png')}}"/></a>
                                    </div>
                                    <div class="tool-zoom">
                                        <a id="toggle-zoom" onclick="toggleZoom()"></a>
                                    </div>

                                    <div class="arrows">
                                        <div class="arrow-prev">
                                            <a id="prev"><img class="previous" width="20"
                                                              src="{{asset('flipbook_assets/pages/left-arrow.svg')}}"
                                                              alt=""/></a>
                                        </div>
                                        <center><h4 style="color: #5c8d33;">{{$data->MAR2023_CORE_SMLabel}}</h4>
                                        </center>
                                        <div id="flipbook-container-response" class="container-response">
                                            <div class="flipbook">
                                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult1}}"
                                                   data-odd="1" id="page-1" data-lightbox="big" class="page"
                                                   style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult1}}')"></a>

                                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult2}}"
                                                   data-even="2" id="page-2" data-lightbox="big" class="single"
                                                   style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult2}}')"></a>

                                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult3}}"
                                                   data-odd="3" id="page-3" data-lightbox="big" class="single"
                                                   style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult3}}')"></a>

                                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult4}}"
                                                   data-even="4" id="page-4" data-lightbox="big" class="single"
                                                   style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult4}}')"></a>
                                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult5}}"
                                                   data-even="5" id="page-5" data-lightbox="big" class="single"
                                                   style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult5}}')"></a>
                                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult6}}"
                                                   data-even="6" id="page-6" data-lightbox="big" class="single"
                                                   style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult6}}')"></a>

                                            </div>
                                        </div>
                                        <div class="arrow-next">
                                            <a id="next"><img class="next" width="20"
                                                              src="{{asset('flipbook_assets/pages/right-arrow.svg')}}"
                                                              alt=""/></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="flipbook-slider-thumb-hide-on-mobile" class="flipbook-slider-thumb">
                                <div class="drag">
                                    <!-- <img id="prev-arrow" class="thumb-arrow" src="assets/pages/left-arrow.svg" alt=""> -->
                                    <img onclick="onPageClick(1)" class="thumb-img left-img"
                                         src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult1}}"
                                         alt=""/>

                                    <div class="space">
                                        <img onclick="onPageClick(2)" class="thumb-img"
                                             src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult2}}"
                                             alt=""/>
                                        <img onclick="onPageClick(3)" class="thumb-img"
                                             src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult3}}"
                                             alt=""/>
                                    </div>

                                    <div class="space">
                                        <img onclick="onPageClick(4)" class="thumb-img"
                                             src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult4}}"
                                             alt=""/>
                                        <img onclick="onPageClick(5)" class="thumb-img"
                                             src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult5}}"
                                             alt=""/>
                                    </div>
                                    <div class="space">

                                        <img onclick="onPageClick(6)" class="thumb-img"
                                             src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->MAR2023_CORE_SMResult6}}"
                                             alt=""/>

                                    </div>

                                <!-- <img id="next-arrow" class="thumb-arrow" src="{{asset('flipbook_assets/pages/right-arrow.svg')}}" alt=""> -->
                                </div>

                                <ul class="flipbook-slick-dots" role="tablist">
                                    <li onclick="onPageClick(1)" class="dot">
                                        <a type="button" style="color: #7f7f7f">1</a>
                                    </li>
                                    <li onclick="onPageClick(2)" class="dot">
                                        <a type="button" style="color: #7f7f7f">2</a>
                                    </li>
                                    <li onclick="onPageClick(3)" class="dot">
                                        <a type="button" style="color: #7f7f7f">3</a>
                                    </li>
                                    <li onclick="onPageClick(4)" class="dot">
                                        <a type="button" style="color: #7f7f7f">4</a>
                                    </li>
                                    <li onclick="onPageClick(5)" class="dot">
                                        <a type="button" style="color: #7f7f7f">5</a>
                                    </li>
                                    <li onclick="onPageClick(6)" class="dot">
                                        <a type="button" style="color: #7f7f7f">6</a>
                                    </li>

                                </ul>
                            </div>
                            <div id="img-magnifier-container">
                                <img id="zoomed-image-container" class="glass" src=""/>
                            </div>
                            <div id="log"></div>
                            <audio id="audio" style="display: none"
                                   src="{{asset('flipbook_assets/page-flip.mp3')}}"></audio>
                            <script type="text/javascript">
                                function scaleFlipBook() {
                                    var imageWidth = 508;
                                    var imageHeight = 969;
                                    var pageHeight = 630;
                                    var pageWidth = parseInt((pageHeight / imageHeight) * imageWidth);

                                    $(".flipbook-viewport .container").css({
                                        width: 40 + pageWidth * 2 + 40 + "px",
                                    });

                                    $(".flipbook-viewport .flipbook").css({
                                        width: pageWidth * 2 + "px",
                                        height: pageHeight + "px",
                                    });

                                    $(".flipbook-viewport .flipbook").css('margin-bottom', 20);
                                }

                                function doResize() {
                                    $("html").css({
                                        zoom: 1
                                    });
                                    var $viewport = $(".flipbook-viewport");
                                    var viewHeight = $viewport.height();
                                    var viewWidth = $viewport.width();

                                    var $el = $(".flipbook-viewport .container");
                                    var elHeight = $el.outerHeight();
                                    var elWidth = $el.outerWidth();

                                    var scale = Math.min(viewWidth / elWidth, viewHeight / elHeight);
                                    //console.log(viewWidth , elWidth, viewHeight , elHeight, scale);
                                    if (scale < 1) {
                                        scale *= 0.95;
                                    } else {
                                        scale = 1;
                                    }
                                    // $("html").css({
                                    //     zoom: scale
                                    // });
                                }

                                function loadApp() {
                                    scaleFlipBook();
                                    var flipbook = $(".flipbook");

                                    // Check if the CSS was already loaded

                                    if (flipbook.width() == 0 || flipbook.height() == 0) {
                                        setTimeout(loadApp, 10);
                                        return;
                                    }

                                    $(".flipbook .double").scissor();

                                    // Create the flipbook

                                    $(".flipbook").turn({
                                        // Elevation

                                        elevation: 50,

                                        // Enable gradients

                                        gradients: true,

                                        // Auto center this flipbook

                                        autoCenter: true,
                                        when: {
                                            turning: function (event, page, view) {
                                                var audio = document.getElementById("audio");
                                                audio.play();
                                            },
                                            turned: function (e, page) {
                                                //console.log('Current view: ', $(this).turn('view'));
                                                var thumbs = document.getElementsByClassName("thumb-img");
                                                for (var i = 0; i < thumbs.length; i++) {
                                                    var element = thumbs[i];
                                                    if (element.className.indexOf("active") !== -1) {
                                                        $(element).removeClass("active");
                                                    }
                                                }

                                                $(
                                                    document.getElementsByClassName("thumb-img")[page - 1]
                                                ).addClass("active");

                                                var dots = document.getElementsByClassName("dot");
                                                for (var i = 0; i < dots.length; i++) {
                                                    var dot = dots[i];
                                                    if (dot.className.indexOf("dot-active") !== -1) {
                                                        $(dot).removeClass("dot-active");
                                                    }
                                                }
                                            },
                                        },
                                    });
                                    doResize();
                                }

                                $(window).resize(function () {
                                    doResize();
                                });
                                $(window).bind("keydown", function (e) {
                                    if (e.keyCode == 37) $(".flipbook").turn("previous");
                                    else if (e.keyCode == 39) $(".flipbook").turn("next");
                                });
                                $("#prev").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook").turn("previous");
                                });

                                $("#next").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook").turn("next");
                                });

                                $("#prev-arrow").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook").turn("previous");
                                });

                                $("#next-arrow").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook").turn("next");
                                });

                                function onPageClick(i) {
                                    $(".flipbook").turn("page", i);
                                }

                                // Load the HTML4 version if there's not CSS transform
                                yepnope({
                                    test: Modernizr.csstransforms,
                                    yep: ["{{asset('flipbook_assets/js/turn.min.js')}}"],
                                    nope: ["{{asset('flipbook_assets/js/turn.html4.min.js')}}"],
                                    both: ["{{asset('flipbook_assets/js/scissor.min.js')}}", "{{asset('flipbook_assets/css/double-page.css')}}"],
                                    complete: loadApp,
                                });

                                zoomToolEnabled = false;

                                function toggleZoom() {
                                    if (zoomToolEnabled) {
                                        $(".flipbook a").off("mousemove");
                                        $("#toggle-zoom").removeClass("toggle-on");
                                        $("#img-magnifier-container").hide();

                                        zoomToolEnabled = false;
                                    } else {
                                        $(".flipbook a").mousemove(function (event) {
                                            var magnifier = $("#img-magnifier-container");
                                            $("#img-magnifier-container").css(
                                                "left",
                                                event.pageX - magnifier.width() / 2
                                            );
                                            $("#img-magnifier-container").css(
                                                "top",
                                                event.pageY - magnifier.height() / 2
                                            );
                                            $("#img-magnifier-container").show();
                                            var hoveredImage = $(event.target).css("background-image");
                                            var bg = hoveredImage
                                                .replace("url(", "")
                                                .replace(")", "")
                                                .replace(/\"/gi, "");
                                            // Find relative position of cursor in image.
                                            var targetPage = $(event.target);
                                            var targetLeft = 400 / 2; // Width of glass container/2
                                            var targetTop = 200 / 2; // Height of glass container/2

                                            var zoomedImageContainer = document.getElementById(
                                                "zoomed-image-container"
                                            );
                                            var zoomedImageWidth = zoomedImageContainer.width;
                                            var zoomedImageHeight = zoomedImageContainer.height;

                                            var imgXPercent =
                                                (event.pageX - $(event.target).offset().left) /
                                                targetPage.width();
                                            targetLeft -= zoomedImageWidth * imgXPercent;
                                            var imgYPercent =
                                                (event.pageY - $(event.target).offset().top) /
                                                targetPage.height();
                                            targetTop -= zoomedImageHeight * imgYPercent;

                                            $("#img-magnifier-container .glass").attr("src", bg);
                                            $("#img-magnifier-container .glass").css(
                                                "top",
                                                "" + targetTop + "px"
                                            );
                                            $("#img-magnifier-container .glass").css(
                                                "left",
                                                "" + targetLeft + "px"
                                            );
                                        });

                                        $("#toggle-zoom").addClass("toggle-on");
                                        zoomToolEnabled = true;
                                    }
                                }
                            </script>
                        </div>
                    @endif
                </div>
                <div class="row">
                    @if($data->FEB2023_CORE_SM)
                        <div class="col-md-12">
                            <script type="text/javascript"
                                    src="{{asset('flipbook_assets/js/lightbox-ninth-scroll-to-top.min.js')}}"></script>
                            <style>
                                table {
                                    border-collapse: inherit !important;
                                }

                                .lb-details {
                                    display: none;
                                }

                                @font-face {
                                    font-family: myFirstFont;
                                    src: url({{asset('flipbook_assets/ProximaNova-Bold.otf')}}) format('opentype');
                                }

                                @font-face {
                                    font-family: totalfb;
                                    src: url({{asset('flipbook_assets/Steelfish-Bold.ttf')}}) format('truetype');

                                }

                                .dollar-amount {
                                    font-family: 'totalfb';
                                    font-weight: 700;
                                    font-size: 16pt;
                                }

                                #img-magnifier-container-ninth {
                                    display: none;
                                    background: rgba(0, 0, 0, 0.8);
                                    border: 5px solid rgb(255, 255, 255);
                                    border-radius: 20px;
                                    box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85),
                                    0 0 7px 7px rgba(0, 0, 0, 0.25),
                                    inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
                                    cursor: none;
                                    position: absolute;
                                    pointer-events: none;
                                    width: 400px;
                                    height: 200px;
                                    overflow: hidden;
                                    z-index: 999;
                                }

                                .glass {
                                    position: absolute;
                                    background-repeat: no-repeat;
                                    background-size: auto;
                                    cursor: none;
                                    z-index: 1000;
                                }

                                #toggle-zoom-ninth {
                                    background-image: url("{{asset('flipbook_assets/images/magnifying-glass-large_BLACK.png')}}");
                                    background-size: 40px;
                                    display: block;
                                    width: 40px;
                                    display: none;
                                    height: 40px;
                                }

                                #printer {
                                    float: right;
                                    display: block;
                                    width: 40px;
                                    height: 40px;
                                    margin-right: 20px;
                                    display: none;
                                }

                                #toggle-zoom-ninth.toggle-on {
                                    background-image: url("{{asset('flipbook_assets/images/magnifying-glass-large_BLUE.png')}}");
                                }

                                @media (hover: none) {
                                    .tool-zoom {
                                        display: none;
                                    }

                                    #printer {
                                        display: none;
                                    }
                                }
                            </style>
                            <div class="flipbook-viewport-ninth">
                                <div class="container">
                                    <div>
                                        <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}""
                                           target="blank"><img
                                                id="printer"
                                                src="{{asset('flipbook_assets/pages/printer-large.png')}}"/></a>
                                    </div>
                                    <div class="tool-zoom">
                                        <a id="toggle-zoom-ninth"
                                           onclick="toggleZoom()"></a>
                                    </div>

                                    <div class="arrows">
                                        <div class="arrow-prev">
                                            <a id="prev-ninth"><img
                                                    class="previous" width="20"
                                                    src="{{asset('flipbook_assets/pages/left-arrow.svg')}}"
                                                    alt=""/></a>
                                        </div>
                                        <center><h5
                                                style="color: #5c8d33;">{{$data->FEB2023_CORE_SMLabel}}</h5>
                                        </center>
                                        <div id="flipbook-container-response" class="container-response">
                                            <div class="flipbook-ninth">

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult1}}"
                                                   data-odd="1"
                                                   id="page-1"
                                                   data-lightbox-ninth="big"
                                                   class="page"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult1}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult2}}"
                                                   data-even="2"
                                                   id="page-2"
                                                   data-lightbox-ninth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult2}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult3}}"
                                                   data-odd="3"
                                                   id="page-3"
                                                   data-lightbox-ninth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult3}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult4}}"
                                                   data-even="4"
                                                   id="page-4"
                                                   data-lightbox-ninth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/lo_res/{{$data->FEB2023_CORE_SMResult4}}')"></a>
                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult5}}"
                                                   data-odd="3"
                                                   id="page-3"
                                                   data-lightbox-ninth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult5}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult6}}"
                                                   data-even="4"
                                                   id="page-4"
                                                   data-lightbox-ninth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/lo_res/{{$data->FEB2023_CORE_SMResult6}}')"></a>
                                            </div>
                                        </div>
                                        <div class="arrow-next">
                                            <a id="next-ninth"><img class="next"
                                                                    width="20"
                                                                    src="{{asset('flipbook_assets/pages/right-arrow.svg')}}"
                                                                    alt=""/></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="flipbook-slider-thumb-hide-on-mobile" class="flipbook-slider-thumb-ninth">
                                <div class="drag-ninth">
                                    <img onclick="onPageClickNinth(1)"
                                         class="thumb-img left-img"
                                         src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult1}}"
                                         alt=""/>

                                    <div class="space">
                                        <img onclick="onPageClickNinth(2)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult2}}"
                                             alt=""/>
                                        <img onclick="onPageClickNinth(3)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult3}}"
                                             alt=""/>
                                    </div>
                                    <div class="space">
                                        <img onclick="onPageClickNinth(4)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult4}}"
                                             alt=""/>
                                        <img onclick="onPageClickNinth(5)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult5}}"
                                             alt=""/>
                                    </div>
                                    <div class="space">
                                        <img onclick="onPageClickNinth(6)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_SMResult6}}"
                                             alt=""/>
                                    </div>
                                </div>

                                <ul class="flipbook-slick-dots-ninth"
                                    role="tablist">
                                    <li onclick="onPageClickNinth(1)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">1</a>
                                    </li>
                                    <li onclick="onPageClickNinth(2)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">2</a>
                                    </li>
                                    <li onclick="onPageClickNinth(3)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">3</a>
                                    </li>
                                    <li onclick="onPageClickNinth(4)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">4</a>
                                    </li>
                                    <li onclick="onPageClickNinth(5)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">5</a>
                                    </li>
                                    <li onclick="onPageClickNinth(6)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">6</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="img-magnifier-container-ninth">
                                <img id="zoomed-image-container" class="glass"
                                     src=""/>
                            </div>
                            <div id="log"></div>
                            <audio id="audio" style="display: none"
                                   src="{{asset('flipbook_assets/page-flip.mp3')}}"></audio>
                            <script type="text/javascript">
                                function scaleFlipBookNinth() {
                                    var imageWidth = 508;
                                    var imageHeight = 969;
                                    var pageHeight = 630;
                                    var pageWidth = parseInt((pageHeight / imageHeight) * imageWidth);

                                    $(".flipbook-viewport-ninth .container").css({
                                        width: 40 + pageWidth * 2 + 40 + "px",
                                    });

                                    $(".flipbook-viewport-ninth .flipbook-ninth").css({
                                        width: pageWidth * 2 + "px",
                                        height: pageHeight + "px",
                                    });

                                    $(".flipbook-viewport-ninth .flipbook-ninth").css('margin-bottom', 20);
                                }

                                function doResizeNinth() {
                                    $("html").css({
                                        zoom: 1
                                    });
                                    var $viewportNinth = $(".flipbook-viewport-ninth");
                                    var viewHeight = $viewportNinth.height();
                                    var viewWidth = $viewportNinth.width();

                                    var $el = $(".flipbook-viewport-ninth .container");
                                    var elHeight = $el.outerHeight();
                                    var elWidth = $el.outerWidth();

                                    var scale = Math.min(viewWidth / elWidth, viewHeight / elHeight);
                                    //console.log(viewWidth , elWidth, viewHeight , elHeight, scale);
                                    if (scale < 1) {
                                        scale *= 0.95;
                                    } else {
                                        scale = 1;
                                    }
                                    // $("html").css({
                                    //     zoom: scale
                                    // });
                                }

                                function loadAppNinth() {
                                    scaleFlipBookNinth();
                                    var flipbookNinth = $(".flipbook-ninth");

                                    // Check if the CSS was already loaded

                                    if (flipbookNinth.width() == 0 || flipbookNinth.height() == 0) {
                                        setTimeout(loadAppNinth, 10);
                                        return;
                                    }

                                    $(".flipbook-ninth .double").scissor();

                                    // Create the flipbook-ninth

                                    $(".flipbook-ninth").turn({
                                        // Elevation

                                        elevation: 50,

                                        // Enable gradients

                                        gradients: true,

                                        // Auto center this flipbook-ninth

                                        autoCenter: true,
                                        when: {
                                            turning: function (event, page, view) {
                                                var audio = document.getElementById("audio");
                                                audio.play();
                                            },
                                            turned: function (e, page) {
                                                //console.log('Current view: ', $(this).turn('view'));
                                                var thumbs = document.getElementsByClassName("thumb-img");
                                                for (var i = 0; i < thumbs.length; i++) {
                                                    var element = thumbs[i];
                                                    if (element.className.indexOf("active") !== -1) {
                                                        $(element).removeClass("active");
                                                    }
                                                }

                                                $(
                                                    document.getElementsByClassName("thumb-img")[page - 1]
                                                ).addClass("active");

                                                var dots = document.getElementsByClassName("dot");
                                                for (var i = 0; i < dots.length; i++) {
                                                    var dot = dots[i];
                                                    if (dot.className.indexOf("dot-active") !== -1) {
                                                        $(dot).removeClass("dot-active");
                                                    }
                                                }
                                            },
                                        },
                                    });
                                    doResizeNinth();
                                }

                                $(window).resize(function () {
                                    doResizeNinth();
                                });
                                $(window).bind("keydown", function (e) {
                                    if (e.keyCode == 37) $(".flipbook-ninth").turn("previous");
                                    else if (e.keyCode == 39) $(".flipbook-ninth").turn("next");
                                });
                                $("#prev-ninth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-ninth").turn("previous");
                                });

                                $("#next-ninth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-ninth").turn("next");
                                });

                                $("#prev-arrow-ninth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-ninth").turn("previous");
                                });

                                $("#next-arrow-ninth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-ninth").turn("next");
                                });

                                function onPageClickNinth(i) {
                                    $(".flipbook-ninth").turn("page", i);
                                }

                                // Load the HTML4 version if there's not CSS transform
                                yepnope({
                                    test: Modernizr.csstransforms,
                                    yep: ["{{asset('flipbook_assets/js/turn.min.js')}}"],
                                    nope: ["{{asset('flipbook_assets/js/turn.html4.min.js')}}"],
                                    both: ["{{asset('flipbook_assets/js/scissor.min.js')}}", "{{asset('flipbook_assets/css/double-page-ninth.css')}}"],
                                    complete: loadAppNinth,
                                });

                                zoomToolEnabled = false;

                                function toggleZoom() {
                                    if (zoomToolEnabled) {
                                        $(".flipbook-ninth a").off("mousemove");
                                        $("#toggle-zoom-ninth").removeClass("toggle-on");
                                        $("#img-magnifier-container-ninth").hide();

                                        zoomToolEnabled = false;
                                    } else {
                                        $(".flipbook-ninth a").mousemove(function (event) {
                                            var magnifier = $("#img-magnifier-container-ninth");
                                            $("#img-magnifier-container-ninth").css(
                                                "left",
                                                event.pageX - magnifier.width() / 2
                                            );
                                            $("#img-magnifier-container-ninth").css(
                                                "top",
                                                event.pageY - magnifier.height() / 2
                                            );
                                            $("#img-magnifier-container-ninth").show();
                                            var hoveredImage = $(event.target).css("background-image");
                                            var bg = hoveredImage
                                                .replace("url(", "")
                                                .replace(")", "")
                                                .replace(/\"/gi, "");
                                            // Find relative position of cursor in image.
                                            var targetPage = $(event.target);
                                            var targetLeft = 400 / 2; // Width of glass container/2
                                            var targetTop = 200 / 2; // Height of glass container/2

                                            var zoomedImageContainer = document.getElementById(
                                                "zoomed-image-container"
                                            );
                                            var zoomedImageWidth = zoomedImageContainer.width;
                                            var zoomedImageHeight = zoomedImageContainer.height;

                                            var imgXPercent =
                                                (event.pageX - $(event.target).offset().left) /
                                                targetPage.width();
                                            targetLeft -= zoomedImageWidth * imgXPercent;
                                            var imgYPercent =
                                                (event.pageY - $(event.target).offset().top) /
                                                targetPage.height();
                                            targetTop -= zoomedImageHeight * imgYPercent;

                                            $("#img-magnifier-container-ninth .glass").attr("src", bg);
                                            $("#img-magnifier-container-ninth .glass").css(
                                                "top",
                                                "" + targetTop + "px"
                                            );
                                            $("#img-magnifier-container-ninth .glass").css(
                                                "left",
                                                "" + targetLeft + "px"
                                            );
                                        });

                                        $("#toggle-zoom-ninth").addClass("toggle-on");
                                        zoomToolEnabled = true;
                                    }
                                }
                            </script>
                        </div>
                    @endif
                </div>
                <!-- PC here -->
                <br>
                <div class="row">
                    @if($data->BSH_JUN2023_CORE_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_JUN2023_CORE_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_CORE_PCResult1}}"
                                       data-lightbox-fifth="roadtrip">
                                        <center><img
                                                src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_CORE_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_CORE_PCResult2}}"
                                       data-lightbox-fifth="roadtrip">
                                        <img
                                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_CORE_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_fifth.min.js"></script>
                        </div>
                    @endif
                    @if($data->BSH_Jun2023_Player_Party_PC)
                    <div class="col-sm-4">
                        <div class="modal-wrap">
                            <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_Jun2023_Player_Party_PCLabel}}</h4>

                            <div class="slider-big">
                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Player_Party_PCResult1}}"
                                   data-lightbox-sixth="roadtrip">
                                    <center><img
                                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Player_Party_PCResult1}}"
                                            style="width: 40%" alt=""></center>
                                </a>
                                <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Player_Party_PCResult2}}"
                                   data-lightbox-sixth="roadtrip">
                                    <img
                                        src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Player_Party_PCResult2}}"
                                        style="width: 100%" alt="">
                                </a>
                            </div>
                        </div>
                        <script src="/weekender_assets/js/modal_lightbox_sixth.min.js"></script>
                    </div>
                @endif
                @if($data->BSH_Jun2023_Hi_End_Gift_PC)
                <div class="col-sm-4">
                    <div class="modal-wrap">
                        <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_Jun2023_Hi_End_Gift_PCLabel}}</h4>

                        <div class="slider-big">
                            <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult1}}"
                               data-lightbox-seventh="roadtrip">
                                <center><img
                                        src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult1}}"
                                        style="width: 40%" alt=""></center>
                            </a>
                            <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult2}}"
                               data-lightbox-seventh="roadtrip">
                                <img
                                    src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult2}}"
                                    style="width: 100%" alt="">
                            </a>
                        </div>
                    </div>
                    <script src="/weekender_assets/js/modal_lightbox_seventh.min.js"></script>
                </div>
            @endif

            @if($data->BSH_Jun2023_Trop_LV_Event_PC)
            <div class="col-sm-4">
                <div class="modal-wrap">
                    <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_Jun2023_Trop_LV_Event_PCLabel}}</h4>

                    <div class="slider-big">
                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult1}}"
                           data-lightbox-eighth="roadtrip">
                            <center><img
                                    src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult1}}"
                                    style="width: 40%" alt=""></center>
                        </a>
                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult2}}"
                           data-lightbox-eighth="roadtrip">
                            <img
                                src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult2}}"
                                style="width: 100%" alt="">
                        </a>
                    </div>
                </div>
                <script src="/weekender_assets/js/modal_lightbox_eighth.min.js"></script>
            </div>
        @endif

        @if($data->BSH_JUN2023_INACTIVE_PC)
        <div class="col-sm-4">
            <div class="modal-wrap">
                <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_JUN2023_INACTIVE_PCLabel}}</h4>

                <div class="slider-big">
                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_INACTIVE_PCResult1}}"
                       data-lightbox-ninth="roadtrip">
                        <center><img
                                src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_INACTIVE_PCResult1}}"
                                style="width: 40%" alt=""></center>
                    </a>
                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_INACTIVE_PCResult2}}"
                       data-lightbox-ninth="roadtrip">
                        <img
                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_JUN2023_INACTIVE_PCResult2}}"
                            style="width: 100%" alt="">
                    </a>
                </div>
            </div>
            <script src="/weekender_assets/js/modal_lightbox_ninth.min.js"></script>
        </div>
    @endif

    @if($data->BSH_JUL2023_CORE_PC)
    <div class="col-sm-4">
        <div class="modal-wrap">
            <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_JUL2023_CORE_PCLabel}}</h4>

            <div class="slider-big">
                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_PCResult1}}"
                   data-lightbox-tenth="roadtrip">
                    <center><img
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_PCResult1}}"
                            style="width: 40%" alt=""></center>
                </a>
                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_PCResult2}}"
                   data-lightbox-tenth="roadtrip">
                    <img
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_PCResult2}}"
                        style="width: 100%" alt="">
                </a>
            </div>
        </div>
        <script src="/weekender_assets/js/modal_lightbox_tenth.min.js"></script>
    </div>
@endif

        @if($data->BSH_JUL2023_SLOT_PULL_SM)
            <div class="col-sm-4">
                <div class="modal-wrap">
                    <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_JUL2023_SLOT_PULL_SMLabel}}</h4>

                    <div class="slider-big">
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult1}}"
                        data-lightbox-eleventh="roadtrip">
                            <center><img
                                    src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult1}}"
                                    style="width: 40%" alt=""></center>
                        </a>
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult2}}"
                        data-lightbox-eleventh="roadtrip">
                            <img
                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult2}}"
                                style="width: 100%" alt="">
                        </a>
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult3}}"
                            data-lightbox-eleventh="roadtrip">
                            <img
                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult3}}"
                                style="width: 100%" alt="">
                        </a>
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult4}}"
                            data-lightbox-eleventh="roadtrip">
                            <img
                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_SLOT_PULL_SMResult4}}"
                                style="width: 100%" alt="">
                        </a>
                    </div>
                </div>
                <script src="/weekender_assets/js/modal_lightbox_eleventh.min.js"></script>
            </div>
        @endif
                    @if($data->BSH_Mar2023_Card_Tier_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_Mar2023_Card_Tier_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Card_Tier_PCResult1}}"
                                       data-lightbox-fourtysix="roadtrip">
                                        <center><img
                                                src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Card_Tier_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Card_Tier_PCResult2}}"
                                       data-lightbox-fourtysix="roadtrip">
                                        <img
                                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Card_Tier_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_fourtysix.min.js"></script>
                        </div>
                    @endif
                    @if($data->BSH_Mar2023_Superstar_Party_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_Mar2023_Superstar_Party_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Superstar_Party_PCResult1}}"
                                       data-lightbox-fourth="roadtrip">
                                        <center><img
                                                src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Superstar_Party_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Superstar_Party_PCResult2}}"
                                       data-lightbox-fourth="roadtrip">
                                        <img
                                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Superstar_Party_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_fourth.min.js"></script>
                        </div>
                    @endif
                    @if($data->BSH_APR2023_CORE_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_APR2023_CORE_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/hi_res/{{$data->BSH_APR2023_CORE_PCResult1}}"
                                       data-lightbox-twelfth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/lo_res/{{$data->BSH_APR2023_CORE_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/hi_res/{{$data->BSH_APR2023_CORE_PCResult2}}"
                                       data-lightbox-twelfth="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/lo_res/{{$data->BSH_APR2023_CORE_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_twelfth.min.js"></script>
                        </div>
                    @endif
                </div>
                <br>
                <div class="row">
                    @if($data->BSH_Apr2023_Cruise_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_Apr2023_Cruise_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/hi_res/{{$data->BSH_Apr2023_Cruise_PCResult1}}"
                                       data-lightbox-third="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/lo_res/{{$data->BSH_Apr2023_Cruise_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/hi_res/{{$data->BSH_Apr2023_Cruise_PCResult2}}"
                                       data-lightbox-third="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/lo_res/{{$data->BSH_Apr2023_Cruise_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_third.min.js"></script>
                        </div>
                    @endif
                    @if($data->BSH_MAY2023_CORE_PC)
                    <div class="col-sm-4">
                        <div class="modal-wrap">
                            <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_MAY2023_CORE_PCLabel}}</h4>

                            <div class="slider-big">
                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_CORE_PCResult1}}"
                                   data-lightbox-thirteenth="roadtrip">
                                    <center><img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_MAY2023_CORE_PCResult1}}"
                                            style="width: 40%" alt=""></center>
                                </a>
                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_CORE_PCResult2}}"
                                   data-lightbox-thirteenth="roadtrip">
                                    <img
                                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_MAY2023_CORE_PCResult2}}"
                                        style="width: 100%" alt="">
                                </a>
                            </div>
                        </div>

                        <script src="/weekender_assets/js/modal_lightbox_thirteenth.min.js"></script>
                    </div>
                @endif
                @if($data->BSH_May2023_2nd_Chance_Cruise_PC)
                <div class="col-sm-4">
                    <div class="modal-wrap">
                        <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_May2023_2nd_Chance_Cruise_PCLabel}}</h4>

                        <div class="slider-big">
                            <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_May2023_2nd_Chance_Cruise_PCResult1}}"
                               data-lightbox-fourteenth="roadtrip">
                                <center><img
                                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_May2023_2nd_Chance_Cruise_PCResult1}}"
                                        style="width: 40%" alt=""></center>
                            </a>
                            <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_May2023_2nd_Chance_Cruise_PCResult2}}"
                               data-lightbox-fourteenth="roadtrip">
                                <img
                                    src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_May2023_2nd_Chance_Cruise_PCResult2}}"
                                    style="width: 100%" alt="">
                            </a>
                        </div>
                    </div>

                    <script src="/weekender_assets/js/modal_lightbox_fourteenth.min.js"></script>
                </div>
            @endif

            @if($data->BSH_MAY2023_MINI_BAC_PC)
            <div class="col-sm-4">
                <div class="modal-wrap">
                    <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_MAY2023_MINI_BAC_PCLabel}}</h4>

                    <div class="slider-big">
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MINI_BAC_PCResult1}}"
                           data-lightbox-fifteenth="roadtrip">
                            <center><img
                                    src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_MAY2023_MINI_BAC_PCResult1}}"
                                    style="width: 40%" alt=""></center>
                        </a>
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MINI_BAC_PCResult2}}"
                           data-lightbox-fifteenth="roadtrip">
                            <img
                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_MAY2023_MINI_BAC_PCResult2}}"
                                style="width: 100%" alt="">
                        </a>
                    </div>
                </div>

                <script src="/weekender_assets/js/modal_lightbox_fifteenth.min.js"></script>
            </div>
        @endif
                    @if($data->BSH_Mar2023_Legend_Party_Invite)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: #5c8d33;text-align: center;">{{$data->BSH_Mar2023_Legend_Party_InviteLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult1}}"
                                       data-lightbox-thirty="roadtrip">
                                        <center><img
                                                src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult2}}"
                                       data-lightbox-thirty="roadtrip">
                                        <img
                                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult3}}"
                                       data-lightbox-thirty="roadtrip">
                                        <img
                                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult3}}"
                                            style="width: 100%" alt="">
                                    </a>
                                    <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult4}}"
                                       data-lightbox-thirty="roadtrip">
                                        <img
                                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$data->BSH_Mar2023_Legend_Party_InviteResult4}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_thirty.min.js"></script>
                        </div>
                    @endif
                    @if($data->FEB2023_CORE_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: #5c8d33;text-align: center;">{{$data->FEB2023_CORE_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_PCResult1}}"
                                       data-lightbox-sixth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/lo_res/{{$data->FEB2023_CORE_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/hi_res/{{$data->FEB2023_CORE_PCResult2}}"
                                       data-lightbox-sixth="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/february_2023/lo_res/{{$data->FEB2023_CORE_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_sixth.min.js"></script>
                        </div>
                    @endif
                </div>
                <br>
                <script src="/weekender_assets/js/modal_slick.min.js"></script>
                <script src="/weekender_assets/js/modal_main.js"></script>
            @else
                <div class="row">
                <span style="margin:0 auto;">
                                    We do not have anything for you to see at this time, please check back later.
                </span>
                </div>
                @endif</br>
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection
