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
        @if($data->flgSM || $data->flgPC || $data->flgWL)
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
                                        <center><h4 style="color: red;">{{$data->MAR2023_CORE_SMLabel}}</h4>
                                        </center>
                                        <div id="flipbook-container-response" class="container-response">
                                            <div class="flipbook">
                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->MAR2023_CORE_SMResult1}}"
                                                   data-odd="1" id="page-1" data-lightbox="big" class="page"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult1}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->MAR2023_CORE_SMResult2}}"
                                                   data-even="2" id="page-2" data-lightbox="big" class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult2}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->MAR2023_CORE_SMResult3}}"
                                                   data-odd="3" id="page-3" data-lightbox="big" class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult3}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->MAR2023_CORE_SMResult4}}"
                                                   data-even="4" id="page-4" data-lightbox="big" class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult4}}')"></a>
                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->MAR2023_CORE_SMResult5}}"
                                                   data-even="5" id="page-5" data-lightbox="big" class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult5}}')"></a>
                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->MAR2023_CORE_SMResult6}}"
                                                   data-even="6" id="page-6" data-lightbox="big" class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult6}}')"></a>

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
                                         src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult1}}"
                                         alt=""/>

                                    <div class="space">
                                        <img onclick="onPageClick(2)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult2}}"
                                             alt=""/>
                                        <img onclick="onPageClick(3)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult3}}"
                                             alt=""/>
                                    </div>

                                    <div class="space">
                                        <img onclick="onPageClick(4)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult4}}"
                                             alt=""/>
                                        <img onclick="onPageClick(5)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->MAR2023_CORE_SMResult5}}"
                                             alt=""/>
                                    </div>
                                    <div class="space">

                                        <img onclick="onPageClick(6)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/lo_res/{{$data->MAR2023_CORE_SMResult6}}"
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
                @if($data->New_Years_Eve_Invite_6pg)
                    <div class="row">
                        <div class="col-md-12">
                            <script type="text/javascript"
                                    src="{{asset('flipbook_assets/js/modernizr.2.5.3.min.js')}}"></script>
                            <link rel="stylesheet" href="{{asset('flipbook_assets/css/lightbox.min.css')}}"/>
                            <script type="text/javascript"
                                    src="{{asset('flipbook_assets/js/lightbox-third-mar-scroll-to-top.min.js')}}"></script>
                            <style>
                                table {
                                    border-collapse: inherit !important;
                                }

                                .lb-details {
                                    display: none;
                                }


                                .firstname {
                                    font-family: myFirstFont;
                                    font-weight: 700;
                                    font-size: 16pt;
                                }


                                .dollar-amount {
                                    font-family: 'totalfb';
                                    font-weight: 700;
                                    font-size: 16pt;
                                }

                                /* .dollar-amount62 {
                                                  font-family: 'Steelfish', sans-serif;
                                                  font-weight: 700;
                                                  font-size: 16pt;
                                                } */

                                #img-magnifier-container-third {
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

                                #toggle-zoom-third {
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

                                #toggle-zoom-third.toggle-on {
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
                            <div class="flipbook-viewport-third-mar">
                                <div class="container">
                                    <div>
                                        <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}"" target="blank"><img
                                                id="printer"
                                                src="{{asset('flipbook_assets/pages/printer-large.png')}}"/></a>
                                    </div>
                                    <div class="tool-zoom">
                                        <a id="toggle-zoom-third-mar" onclick="toggleZoom()"></a>
                                    </div>

                                    <div class="arrows">
                                        <div class="arrow-prev">
                                            <a id="prev-third-mar"><img class="previous" width="20"
                                                                        src="{{asset('flipbook_assets/pages/left-arrow.svg')}}"
                                                                        alt=""/></a>
                                        </div>
                                        <center>
                                            <h4 style="color: red;">{{$data->New_Years_Eve_Invite_6pgLabel}}</h4>
                                        </center>
                                        <div id="flipbook-container-response" class="container-response">
                                            <div class="flipbook-container-third-mar">
                                                <div class="flipbook-third-mar" style="margin: 0 auto !important;">
                                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/hi_res/{{$data->New_Years_Eve_Invite_6pgResult1}}"
                                                       data-odd="1" id="page-1" data-lightbox-third-mar="big"
                                                       class="page"
                                                       style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult1}}')"></a>

                                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/hi_res/{{$data->New_Years_Eve_Invite_6pgResult2}}"
                                                       data-even="2" id="page-2" data-lightbox-third-mar="big"
                                                       class="single"
                                                       style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult2}}')"></a>

                                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/hi_res/{{$data->New_Years_Eve_Invite_6pgResult3}}"
                                                       data-odd="3" id="page-3" data-lightbox-third-mar="big"
                                                       class="single"
                                                       style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult3}}')"></a>

                                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/hi_res/{{$data->New_Years_Eve_Invite_6pgResult4}}"
                                                       data-even="4" id="page-4" data-lightbox-third-mar="big"
                                                       class="single"
                                                       style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult4}}')"></a>

                                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/hi_res/{{$data->New_Years_Eve_Invite_6pgResult5}}"
                                                       data-even="5" id="page-5" data-lightbox-third-mar="big"
                                                       class="single"
                                                       style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult5}}')"></a>

                                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/hi_res/{{$data->New_Years_Eve_Invite_6pgResult6}}"
                                                       data-even="6" id="page-6" data-lightbox-third-mar="big"
                                                       class="single"
                                                       style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult6}}')"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="arrow-next">
                                            <a id="next-third-mar"><img class="next" width="20"
                                                                        src="{{asset('flipbook_assets/pages/right-arrow.svg')}}"
                                                                        alt=""/></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="flipbook-slider-thumb-hide-on-mobile" class="flipbook-slider-thumb-third-mar">
                                <div class="drag-third-mar">
                                    <!-- <img id="prev-arrow-third-mar" class="thumb-arrow" src="assets/pages/left-arrow.svg" alt=""> -->
                                    <img onclick="onPageClickThirdMar(1)" class="thumb-img left-img"
                                         src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult1}}"
                                         alt=""/>

                                    <div class="space">
                                        <img onclick="onPageClickThirdMar(2)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult2}}"
                                             alt=""/>
                                        <img onclick="onPageClickThirdMar(3)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult3}}"
                                             alt=""/>
                                    </div>

                                    <div class="space">
                                        <img onclick="onPageClickThirdMar(4)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult4}}"
                                             alt=""/>
                                        <img onclick="onPageClickThirdMar(5)" class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult5}}"
                                             alt=""/>
                                    </div>

                                    <div class="space">
                                        <img onclick="onPageClickThirdMar(6)" class="thumb-img active"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/november_2022/lo_res/{{$data->New_Years_Eve_Invite_6pgResult6}}"
                                             alt=""/>
                                    </div>
                                <!-- <img id="next-arrow-third-mar" class="thumb-arrow" src="{{asset('flipbook_assets/pages/right-arrow.svg')}}" alt=""> -->
                                </div>

                                <ul class="flipbook-slick-dots-third-mar" role="tablist">
                                    <li onclick="onPageClickThirdMar(1)" class="dot">
                                        <a type="button" style="color: #7f7f7f">1</a>
                                    </li>
                                    <li onclick="onPageClickThirdMar(2)" class="dot">
                                        <a type="button" style="color: #7f7f7f">2</a>
                                    </li>
                                    <li onclick="onPageClickThirdMar(3)" class="dot">
                                        <a type="button" style="color: #7f7f7f">3</a>
                                    </li>
                                    <li onclick="onPageClickThirdMar(4)" class="dot">
                                        <a type="button" style="color: #7f7f7f">4</a>
                                    </li>
                                    <li onclick="onPageClickThirdMar(5)" class="dot">
                                        <a type="button" style="color: #7f7f7f">5</a>
                                    </li>
                                    <li onclick="onPageClickThirdMar(6)" class="dot">
                                        <a type="button" style="color: #7f7f7f">6</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="img-magnifier-container-third-mar">
                                <img id="zoomed-image-container" class="glass" src=""/>
                            </div>
                            <div id="log"></div>
                            <audio id="audio" style="display: none"
                                   src="{{asset('flipbook_assets/page-flip.mp3')}}"></audio>
                            <script type="text/javascript">
                                function scaleFlipBookThirdMar() {
                                    var imageWidth = 508;
                                    var imageHeight = 969;
                                    var pageHeight = 630;
                                    var pageWidth = parseInt((pageHeight / imageHeight) * imageWidth);

                                    $(".flipbook-viewport-third-mar .container").css({
                                        width: 40 + pageWidth * 2 + 40 + "px",
                                    });

                                    $(".flipbook-viewport-third-mar .flipbook-third-mar").css({
                                        width: pageWidth * 2 + "px",
                                        height: pageHeight + "px",
                                    });

                                    $(".flipbook-viewport-third-mar .flipbook-third-mar").css('margin-bottom', 20);

                                    $(".flipbook-container-third-mar").css("margin-left", 50);
                                }

                                function doResizeThirdMar() {
                                    $("html").css({
                                        zoom: 1
                                    });
                                    var $viewportThird = $(".flipbook-viewport-third-mar");
                                    var viewHeight = $viewportThird.height();
                                    var viewWidth = $viewportThird.width();

                                    var $el = $(".flipbook-viewport-third-mar .container");
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

                                function loadAppThirdMar() {
                                    scaleFlipBookThirdMar();
                                    var flipbookThird = $(".flipbook-third-mar");

                                    // Check if the CSS was already loaded

                                    if (flipbookThird.width() == 0 || flipbookThird.height() == 0) {
                                        setTimeout(loadAppThirdMar, 10);
                                        return;
                                    }

                                    $(".flipbook-third-mar .double").scissor();

                                    // Create the flipbook-third-mar

                                    $(".flipbook-third-mar").turn({
                                        // Elevation

                                        elevation: 50,

                                        // Enable gradients

                                        gradients: true,

                                        // Auto center this flipbook-third-mar

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
                                    doResizeThirdMar();
                                }

                                $(window).resize(function () {
                                    doResizeThirdMar();
                                });
                                $(window).bind("keydown", function (e) {
                                    if (e.keyCode == 37) $(".flipbook-third-mar").turn("previous");
                                    else if (e.keyCode == 39) $(".flipbook-third-mar").turn("next");
                                });
                                $("#prev-third-mar").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-third-mar").turn("previous");
                                });

                                $("#next-third-mar").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-third-mar").turn("next");
                                });

                                $("#prev-arrow-third-mar").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-third-mar").turn("previous");
                                });

                                $("#next-arrow-third-mar").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-third-mar").turn("next");
                                });

                                function onPageClickThirdMar(i) {
                                    $(".flipbook-third-mar").turn("page", i);
                                }

                                // Load the HTML4 version if there's not CSS transform
                                yepnope({
                                    test: Modernizr.csstransforms,
                                    yep: ["{{asset('flipbook_assets/js/turn.min.js')}}"],
                                    nope: ["{{asset('flipbook_assets/js/turn.html4.min.js')}}"],
                                    both: ["{{asset('flipbook_assets/js/scissor.min.js')}}", "{{asset('flipbook_assets/css/double-page-third-mar.css')}}"],
                                    complete: loadAppThirdMar,
                                });

                                zoomToolEnabled = false;

                                function toggleZoom() {
                                    if (zoomToolEnabled) {
                                        $(".flipbook-third-mar a").off("mousemove");
                                        $("#toggle-zoom-third-mar").removeClass("toggle-on");
                                        $("#img-magnifier-container-third-mar").hide();

                                        zoomToolEnabled = false;
                                    } else {
                                        $(".flipbook-third-mar a").mousemove(function (event) {
                                            var magnifier = $("#img-magnifier-container-third-mar");
                                            $("#img-magnifier-container-third-mar").css(
                                                "left",
                                                event.pageX - magnifier.width() / 2
                                            );
                                            $("#img-magnifier-container-third-mar").css(
                                                "top",
                                                event.pageY - magnifier.height() / 2
                                            );
                                            $("#img-magnifier-container-third-mar").show();
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

                                            $("#img-magnifier-container-third-mar .glass").attr("src", bg);
                                            $("#img-magnifier-container-third-mar .glass").css(
                                                "top",
                                                "" + targetTop + "px"
                                            );
                                            $("#img-magnifier-container-third-mar .glass").css(
                                                "left",
                                                "" + targetLeft + "px"
                                            );
                                        });

                                        $("#toggle-zoom-third-mar").addClass("toggle-on");
                                        zoomToolEnabled = true;
                                    }
                                }
                            </script>
                        </div>
                    </div>
                @endif
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
                                                style="color: red;">{{$data->FEB2023_CORE_SMLabel}}</h5>
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
                <div class="row">
                    @if(1 ===2 && $data->BSH_Mar2023_Legend_Party_Invite)
                        <div class="col-md-12">
                            <script type="text/javascript"
                                    src="{{asset('flipbook_assets/js/lightbox-sixth.min.js')}}"></script>
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

                                #img-magnifier-container-sixth {
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

                                #toggle-zoom-sixth {
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

                                #toggle-zoom-sixth.toggle-on {
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
                            <div class="flipbook-viewport-sixth">
                                <div class="container">
                                    <div>
                                        <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}""
                                           target="blank"><img
                                                id="printer"
                                                src="{{asset('flipbook_assets/pages/printer-large.png')}}"/></a>
                                    </div>
                                    <div class="tool-zoom">
                                        <a id="toggle-zoom-sixth"
                                           onclick="toggleZoom()"></a>
                                    </div>

                                    <div class="arrows">
                                        <div class="arrow-prev">
                                            <a id="prev-sixth"><img
                                                    class="previous" width="20"
                                                    src="{{asset('flipbook_assets/pages/left-arrow.svg')}}"
                                                    alt=""/></a>
                                        </div>
                                        <center><h5
                                                style="color: red;">{{$data->BSH_Mar2023_Legend_Party_InviteLabel}}</h5>
                                        </center>
                                        <div id="flipbook-container-response" class="container-response">
                                            <div class="flipbook-sixth">

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult1}}"
                                                   data-odd="1"
                                                   id="page-1"
                                                   data-lightbox-sixth="big"
                                                   class="page"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult1}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult2}}"
                                                   data-even="2"
                                                   id="page-2"
                                                   data-lightbox-sixth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult2}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult3}}"
                                                   data-odd="3"
                                                   id="page-3"
                                                   data-lightbox-sixth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult3}}')"></a>

                                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult4}}"
                                                   data-even="4"
                                                   id="page-4"
                                                   data-lightbox-sixth="big"
                                                   class="single"
                                                   style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/lo_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult4}}')"></a>
                                            </div>
                                        </div>
                                        <div class="arrow-next">
                                            <a id="next-sixth"><img class="next"
                                                                    width="20"
                                                                    src="{{asset('flipbook_assets/pages/right-arrow.svg')}}"
                                                                    alt=""/></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="flipbook-slider-thumb-hide-on-mobile" class="flipbook-slider-thumb-sixth">
                                <div class="drag-sixth">
                                    <img onclick="onPageClickSixth(1)"
                                         class="thumb-img left-img"
                                         src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult1}}"
                                         alt=""/>

                                    <div class="space">
                                        <img onclick="onPageClickSixth(2)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult2}}"
                                             alt=""/>
                                        <img onclick="onPageClickSixth(3)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult3}}"
                                             alt=""/>
                                    </div>
                                    <div class="space">
                                        <img onclick="onPageClickSixth(4)"
                                             class="thumb-img"
                                             src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/january_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult4}}"
                                             alt=""/>
                                    </div>
                                </div>

                                <ul class="flipbook-slick-dots-sixth"
                                    role="tablist">
                                    <li onclick="onPageClickSixth(1)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">1</a>
                                    </li>
                                    <li onclick="onPageClickSixth(2)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">2</a>
                                    </li>
                                    <li onclick="onPageClickSixth(3)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">3</a>
                                    </li>
                                    <li onclick="onPageClickSixth(4)" class="dot">
                                        <a type="button"
                                           style="color: #7f7f7f">4</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="img-magnifier-container-sixth">
                                <img id="zoomed-image-container" class="glass"
                                     src=""/>
                            </div>
                            <div id="log"></div>
                            <audio id="audio" style="display: none"
                                   src="{{asset('flipbook_assets/page-flip.mp3')}}"></audio>
                            <script type="text/javascript">
                                function scaleFlipBookSixth() {
                                    var imageWidth = 508;
                                    var imageHeight = 969;
                                    var pageHeight = 630;
                                    var pageWidth = parseInt((pageHeight / imageHeight) * imageWidth);

                                    $(".flipbook-viewport-sixth .container").css({
                                        width: 40 + pageWidth * 2 + 40 + "px",
                                    });

                                    $(".flipbook-viewport-sixth .flipbook-sixth").css({
                                        width: pageWidth * 2 + "px",
                                        height: pageHeight + "px",
                                    });

                                    $(".flipbook-viewport-sixth .flipbook-sixth").css('margin-bottom', 20);
                                }

                                function doResizeSixth() {
                                    $("html").css({
                                        zoom: 1
                                    });
                                    var $viewportSixth = $(".flipbook-viewport-sixth");
                                    var viewHeight = $viewportSixth.height();
                                    var viewWidth = $viewportSixth.width();

                                    var $el = $(".flipbook-viewport-sixth .container");
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

                                function loadAppSixth() {
                                    scaleFlipBookSixth();
                                    var flipbookSixth = $(".flipbook-sixth");

                                    // Check if the CSS was already loaded

                                    if (flipbookSixth.width() == 0 || flipbookSixth.height() == 0) {
                                        setTimeout(loadAppSixth, 10);
                                        return;
                                    }

                                    $(".flipbook-sixth .double").scissor();

                                    // Create the flipbook-sixth

                                    $(".flipbook-sixth").turn({
                                        // Elevation

                                        elevation: 50,

                                        // Enable gradients

                                        gradients: true,

                                        // Auto center this flipbook-sixth

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
                                    doResizeSixth();
                                }

                                $(window).resize(function () {
                                    doResizeSixth();
                                });
                                $(window).bind("keydown", function (e) {
                                    if (e.keyCode == 37) $(".flipbook-sixth").turn("previous");
                                    else if (e.keyCode == 39) $(".flipbook-sixth").turn("next");
                                });
                                $("#prev-sixth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-sixth").turn("previous");
                                });

                                $("#next-sixth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-sixth").turn("next");
                                });

                                $("#prev-arrow-sixth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-sixth").turn("previous");
                                });

                                $("#next-arrow-sixth").click(function (e) {
                                    e.preventDefault();
                                    $(".flipbook-sixth").turn("next");
                                });

                                function onPageClickSixth(i) {
                                    $(".flipbook-sixth").turn("page", i);
                                }

                                // Load the HTML4 version if there's not CSS transform
                                yepnope({
                                    test: Modernizr.csstransforms,
                                    yep: ["{{asset('flipbook_assets/js/turn.min.js')}}"],
                                    nope: ["{{asset('flipbook_assets/js/turn.html4.min.js')}}"],
                                    both: ["{{asset('flipbook_assets/js/scissor.min.js')}}", "{{asset('flipbook_assets/css/double-page-sixth.css')}}"],
                                    complete: loadAppSixth,
                                });

                                zoomToolEnabled = false;

                                function toggleZoom() {
                                    if (zoomToolEnabled) {
                                        $(".flipbook-sixth a").off("mousemove");
                                        $("#toggle-zoom-sixth").removeClass("toggle-on");
                                        $("#img-magnifier-container-sixth").hide();

                                        zoomToolEnabled = false;
                                    } else {
                                        $(".flipbook-sixth a").mousemove(function (event) {
                                            var magnifier = $("#img-magnifier-container-sixth");
                                            $("#img-magnifier-container-sixth").css(
                                                "left",
                                                event.pageX - magnifier.width() / 2
                                            );
                                            $("#img-magnifier-container-sixth").css(
                                                "top",
                                                event.pageY - magnifier.height() / 2
                                            );
                                            $("#img-magnifier-container-sixth").show();
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

                                            $("#img-magnifier-container-sixth .glass").attr("src", bg);
                                            $("#img-magnifier-container-sixth .glass").css(
                                                "top",
                                                "" + targetTop + "px"
                                            );
                                            $("#img-magnifier-container-sixth .glass").css(
                                                "left",
                                                "" + targetLeft + "px"
                                            );
                                        });

                                        $("#toggle-zoom-sixth").addClass("toggle-on");
                                        zoomToolEnabled = true;
                                    }
                                }
                            </script>
                        </div>
                    @endif
                </div>

@if($data->MAY2023_CORE_SM)
<div class="row">
    <div class="col-md-12">
        <script type="text/javascript"
                src="{{asset('flipbook_assets/js/modernizr.2.5.3.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('flipbook_assets/css/lightbox.min.css')}}"/>
        <script type="text/javascript"
                src="{{asset('flipbook_assets/js/lightbox-third-may-scroll-to-top.min.js')}}"></script>
        <style>
            table {
                border-collapse: inherit !important;
            }

            .lb-details {
                display: none;
            }


            .firstname {
                font-family: myFirstFont;
                font-weight: 700;
                font-size: 16pt;
            }


            .dollar-amount {
                font-family: 'totalfb';
                font-weight: 700;
                font-size: 16pt;
            }

            /* .dollar-amount62 {
                                font-family: 'Steelfish', sans-serif;
                                font-weight: 700;
                                font-size: 16pt;
                            } */

            #img-magnifier-container-third {
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

            #toggle-zoom-third {
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
                gin-right: 20px;
                display: none;
            }

            #toggle-zoom-third.toggle-on {
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
        <div class="flipbook-viewport-third-may">
            <div class="container">
                <div>
                    <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}"" target="blank"><img
                            id="printer"
                            src="{{asset('flipbook_assets/pages/printer-large.png')}}"/></a>
                </div>
                <div class="tool-zoom">
                    <a id="toggle-zoom-third-may" onclick="toggleZoom()"></a>
                </div>

                <div class="arrows">
                    <div class="arrow-prev">
                        <a id="prev-third-may"><img class="previous" width="20"
                                                    src="{{asset('flipbook_assets/pages/left-arrow.svg')}}"
                                                    alt=""/></a>
                    </div>
                    <center>
                        <h4 style="color: red;">{{$data->MAY2023_CORE_SMLabel}}</h4>
                    </center>
                    <div id="flipbook-container-response" class="container-response">
                        <div class="flipbook-container-third-may">
                            <div class="flipbook-third-may" style="gin: 0 auto !important;">
                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->MAY2023_CORE_SMResult1}}"
                                    data-odd="1" id="page-1" data-lightbox-third-may="big"
                                    class="page"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult1}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->MAY2023_CORE_SMResult2}}"
                                    data-even="2" id="page-2" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult2}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->MAY2023_CORE_SMResult3}}"
                                    data-odd="3" id="page-3" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult3}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->MAY2023_CORE_SMResult4}}"
                                    data-even="4" id="page-4" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult4}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->MAY2023_CORE_SMResult5}}"
                                    data-even="5" id="page-5" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult5}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->MAY2023_CORE_SMResult6}}"
                                    data-even="6" id="page-6" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult6}}')"></a>
                            </div>
                        </div>
                    </div>
                    <div class="arrow-next">
                        <a id="next-third-may"><img class="next" width="20"
                                                    src="{{asset('flipbook_assets/pages/right-arrow.svg')}}"
                                                    alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="flipbook-slider-thumb-hide-on-mobile" class="flipbook-slider-thumb-third-may">
            <div class="drag-third-may">
                <!-- <img id="prev-arrow-third-may" class="thumb-arrow" src="assets/pages/left-arrow.svg" alt=""> -->
                <img onclick="onPageClickThirdMay(1)" class="thumb-img left-img"
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult1}}"
                        alt=""/>

                <div class="space">
                    <img onclick="onPageClickThirdMay(2)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult2}}"
                            alt=""/>
                    <img onclick="onPageClickThirdMay(3)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult3}}"
                            alt=""/>
                </div>

                <div class="space">
                    <img onclick="onPageClickThirdMay(4)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult4}}"
                            alt=""/>
                    <img onclick="onPageClickThirdMay(5)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult5}}"
                            alt=""/>
                </div>

                <div class="space">
                    <img onclick="onPageClickThirdMay(6)" class="thumb-img active"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->MAY2023_CORE_SMResult6}}"
                            alt=""/>
                </div>
            <!-- <img id="next-arrow-third-may" class="thumb-arrow" src="{{asset('flipbook_assets/pages/right-arrow.svg')}}" alt=""> -->
            </div>

            <ul class="flipbook-slick-dots-third-may" role="tablist">
                <li onclick="onPageClickThirdMay(1)" class="dot">
                    <a type="button" style="color: #7f7f7f">1</a>
                </li>
                <li onclick="onPageClickThirdMay(2)" class="dot">
                    <a type="button" style="color: #7f7f7f">2</a>
                </li>
                <li onclick="onPageClickThirdMay(3)" class="dot">
                    <a type="button" style="color: #7f7f7f">3</a>
                </li>
                <li onclick="onPageClickThirdMay(4)" class="dot">
                    <a type="button" style="color: #7f7f7f">4</a>
                </li>
                <li onclick="onPageClickThirdMay(5)" class="dot">
                    <a type="button" style="color: #7f7f7f">5</a>
                </li>
                <li onclick="onPageClickThirdMay(6)" class="dot">
                    <a type="button" style="color: #7f7f7f">6</a>
                </li>
            </ul>r
        </div>
        <div id="img-magnifier-container-third-may">
            <img id="zoomed-image-container" class="glass" src=""/>
        </div>
        <div id="log"></div>
        <audio id="audio" style="display: none"
                src="{{asset('flipbook_assets/page-flip.mp3')}}"></audio>
        <script type="text/javascript">
            function scaleFlipBookThirdMay() {
                var imageWidth = 508;
                var imageHeight = 969;
                var pageHeight = 630;
                var pageWidth = parseInt((pageHeight / imageHeight) * imageWidth);

                $(".flipbook-viewport-third-may .container").css({
                    width: 40 + pageWidth * 2 + 40 + "px",
                });

                $(".flipbook-viewport-third-may .flipbook-third-may").css({
                    width: pageWidth * 2 + "px",
                    height: pageHeight + "px",
                });

                $(".flipbook-viewport-third-may .flipbook-third-may").css('margin-bottom', 20);

                $(".flipbook-container-third-may").css("margin-left", 50);
            }

            function doResizeThirdMay() {
                $("html").css({
                    zoom: 1
                });
                var $viewportThird = $(".flipbook-viewport-third-may");
                var viewHeight = $viewportThird.height();
                var viewWidth = $viewportThird.width();

                var $el = $(".flipbook-viewport-third-may .container");
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

            function loadAppThirdMay() {
                scaleFlipBookThirdMay();
                var flipbookThird = $(".flipbook-third-may");

                // Check if the CSS was already loaded

                if (flipbookThird.width() == 0 || flipbookThird.height() == 0) {
                    setTimeout(loadAppThirdMay, 10);
                    return;
                }

                $(".flipbook-third-may .double").scissor();

                // Create the flipbook-third-may

                $(".flipbook-third-may").turn({
                    // Elevation

                    elevation: 50,

                    // Enable gradients

                    gradients: true,

                    // Auto center this flipbook-third-may

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
                doResizeThirdMay();
            }

            $(window).resize(function () {
                doResizeThirdMay();
            });
            $(window).bind("keydown", function (e) {
                if (e.keyCode == 37) $(".flipbook-third-may").turn("previous");
                else if (e.keyCode == 39) $(".flipbook-third-may").turn("next");
            });
            $("#prev-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("previous");
            });

            $("#next-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("next");
            });

            $("#prev-arrow-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("previous");
            });

            $("#next-arrow-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("next");
            });

            function onPageClickThirdMay(i) {
                $(".flipbook-third-may").turn("page", i);
            }

            // Load the HTML4 version if there's not CSS transform
            yepnope({
                test: Modernizr.csstransforms,
                yep: ["{{asset('flipbook_assets/js/turn.min.js')}}"],
                nope: ["{{asset('flipbook_assets/js/turn.html4.min.js')}}"],
                both: ["{{asset('flipbook_assets/js/scissor.min.js')}}", "{{asset('flipbook_assets/css/double-page-third-may.css')}}"],
                complete: loadAppThirdMay,
            });

            zoomToolEnabled = false;

            function toggleZoom() {
                if (zoomToolEnabled) {
                    $(".flipbook-third-may a").off("mousemove");
                    $("#toggle-zoom-third-may").removeClass("toggle-on");
                    $("#img-magnifier-container-third-may").hide();

                    zoomToolEnabled = false;
                } else {
                    $(".flipbook-third-may a").mousemove(function (event) {
                        var magnifier = $("#img-magnifier-container-third-may");
                        $("#img-magnifier-container-third-may").css(
                            "left",
                            event.pageX - magnifier.width() / 2
                        );
                        $("#img-magnifier-container-third-may").css(
                            "top",
                            event.pageY - magnifier.height() / 2
                        );
                        $("#img-magnifier-container-third-may").show();
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

                        $("#img-magnifier-container-third-may .glass").attr("src", bg);
                        $("#img-magnifier-container-third-may .glass").css(
                            "top",
                            "" + targetTop + "px"
                        );
                        $("#img-magnifier-container-third-may .glass").css(
                            "left",
                            "" + targetLeft + "px"
                        );
                    });

                    $("#toggle-zoom-third-may").addClass("toggle-on");
                    zoomToolEnabled = true;
                }
            }
        </script>
    </div>
</div>
@endif

@if($data->BSH_JUN2023_CORE_SM_6PG)
<div class="row">
    <div class="col-md-12">
        <script type="text/javascript"
                src="{{asset('flipbook_assets/js/modernizr.2.5.3.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('flipbook_assets/css/lightbox.min.css')}}"/>
        <script type="text/javascript"
                src="{{asset('flipbook_assets/js/lightbox-third-mar-scroll-to-top.min.js')}}"></script>
        <style>
            table {
                border-collapse: inherit !important;
            }

            .lb-details {
                display: none;
            }


            .firstname {
                font-family: myFirstFont;
                font-weight: 700;
                font-size: 16pt;
            }


            .dollar-amount {
                font-family: 'totalfb';
                font-weight: 700;
                font-size: 16pt;
            }

            /* .dollar-amount62 {
                                font-family: 'Steelfish', sans-serif;
                                font-weight: 700;
                                font-size: 16pt;
                            } */

            #img-magnifier-container-third {
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

            #toggle-zoom-third {
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

            #toggle-zoom-third.toggle-on {
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
        <div class="flipbook-viewport-third-mar">
            <div class="container">
                <div>
                    <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}"" target="blank"><img
                            id="printer"
                            src="{{asset('flipbook_assets/pages/printer-large.png')}}"/></a>
                </div>
                <div class="tool-zoom">
                    <a id="toggle-zoom-third-mar" onclick="toggleZoom()"></a>
                </div>

                <div class="arrows">
                    <div class="arrow-prev">
                        <a id="prev-third-mar"><img class="previous" width="20"
                                                    src="{{asset('flipbook_assets/pages/left-arrow.svg')}}"
                                                    alt=""/></a>
                    </div>
                    <center>
                        <h4 style="color: red;">{{$data->BSH_JUN2023_CORE_SM_6PGLabel}}</h4>
                    </center>
                    <div id="flipbook-container-response" class="container-response">
                        <div class="flipbook-container-third-mar">
                            <div class="flipbook-third-mar" style="margin: 0 auto !important;">
                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult1}}"
                                    data-odd="1" id="page-1" data-lightbox-third-mar="big"
                                    class="page"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult1}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult2}}"
                                    data-even="2" id="page-2" data-lightbox-third-mar="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult2}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult3}}"
                                    data-odd="3" id="page-3" data-lightbox-third-mar="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult3}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult4}}"
                                    data-even="4" id="page-4" data-lightbox-third-mar="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult4}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult5}}"
                                    data-even="5" id="page-5" data-lightbox-third-mar="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult5}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult6}}"
                                    data-even="6" id="page-6" data-lightbox-third-mar="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult6}}')"></a>
                            </div>
                        </div>
                    </div>
                    <div class="arrow-next">
                        <a id="next-third-mar"><img class="next" width="20"
                                                    src="{{asset('flipbook_assets/pages/right-arrow.svg')}}"
                                                    alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="flipbook-slider-thumb-hide-on-mobile" class="flipbook-slider-thumb-third-mar">
            <div class="drag-third-mar">
                <!-- <img id="prev-arrow-third-mar" class="thumb-arrow" src="assets/pages/left-arrow.svg" alt=""> -->
                <img onclick="onPageClickThirdMar(1)" class="thumb-img left-img"
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult1}}"
                        alt=""/>

                <div class="space">
                    <img onclick="onPageClickThirdMar(2)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult2}}"
                            alt=""/>
                    <img onclick="onPageClickThirdMar(3)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult3}}"
                            alt=""/>
                </div>

                <div class="space">
                    <img onclick="onPageClickThirdMar(4)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult4}}"
                            alt=""/>
                    <img onclick="onPageClickThirdMar(5)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult5}}"
                            alt=""/>
                </div>

                <div class="space">
                    <img onclick="onPageClickThirdMar(6)" class="thumb-img active"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_SM_6PGResult6}}"
                            alt=""/>
                </div>
            <!-- <img id="next-arrow-third-mar" class="thumb-arrow" src="{{asset('flipbook_assets/pages/right-arrow.svg')}}" alt=""> -->
            </div>

            <ul class="flipbook-slick-dots-third-mar" role="tablist">
                <li onclick="onPageClickThirdMar(1)" class="dot">
                    <a type="button" style="color: #7f7f7f">1</a>
                </li>
                <li onclick="onPageClickThirdMar(2)" class="dot">
                    <a type="button" style="color: #7f7f7f">2</a>
                </li>
                <li onclick="onPageClickThirdMar(3)" class="dot">
                    <a type="button" style="color: #7f7f7f">3</a>
                </li>
                <li onclick="onPageClickThirdMar(4)" class="dot">
                    <a type="button" style="color: #7f7f7f">4</a>
                </li>
                <li onclick="onPageClickThirdMar(5)" class="dot">
                    <a type="button" style="color: #7f7f7f">5</a>
                </li>
                <li onclick="onPageClickThirdMar(6)" class="dot">
                    <a type="button" style="color: #7f7f7f">6</a>
                </li>
            </ul>
        </div>
        <div id="img-magnifier-container-third-mar">
            <img id="zoomed-image-container" class="glass" src=""/>
        </div>
        <div id="log"></div>
        <audio id="audio" style="display: none"
                src="{{asset('flipbook_assets/page-flip.mp3')}}"></audio>
        <script type="text/javascript">
            function scaleFlipBookThirdMar() {
                var imageWidth = 508;
                var imageHeight = 969;
                var pageHeight = 630;
                var pageWidth = parseInt((pageHeight / imageHeight) * imageWidth);

                $(".flipbook-viewport-third-mar .container").css({
                    width: 40 + pageWidth * 2 + 40 + "px",
                });

                $(".flipbook-viewport-third-mar .flipbook-third-mar").css({
                    width: pageWidth * 2 + "px",
                    height: pageHeight + "px",
                });

                $(".flipbook-viewport-third-mar .flipbook-third-mar").css('margin-bottom', 20);

                $(".flipbook-container-third-mar").css("margin-left", 50);
            }

            function doResizeThirdMar() {
                $("html").css({
                    zoom: 1
                });
                var $viewportThird = $(".flipbook-viewport-third-mar");
                var viewHeight = $viewportThird.height();
                var viewWidth = $viewportThird.width();

                var $el = $(".flipbook-viewport-third-mar .container");
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

            function loadAppThirdMar() {
                scaleFlipBookThirdMar();
                var flipbookThird = $(".flipbook-third-mar");

                // Check if the CSS was already loaded

                if (flipbookThird.width() == 0 || flipbookThird.height() == 0) {
                    setTimeout(loadAppThirdMar, 10);
                    return;
                }

                $(".flipbook-third-mar .double").scissor();

                // Create the flipbook-third-mar

                $(".flipbook-third-mar").turn({
                    // Elevation

                    elevation: 50,

                    // Enable gradients

                    gradients: true,

                    // Auto center this flipbook-third-mar

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
                doResizeThirdMar();
            }

            $(window).resize(function () {
                doResizeThirdMar();
            });
            $(window).bind("keydown", function (e) {
                if (e.keyCode == 37) $(".flipbook-third-mar").turn("previous");
                else if (e.keyCode == 39) $(".flipbook-third-mar").turn("next");
            });
            $("#prev-third-mar").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-mar").turn("previous");
            });

            $("#next-third-mar").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-mar").turn("next");
            });

            $("#prev-arrow-third-mar").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-mar").turn("previous");
            });

            $("#next-arrow-third-mar").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-mar").turn("next");
            });

            function onPageClickThirdMar(i) {
                $(".flipbook-third-mar").turn("page", i);
            }

            // Load the HTML4 version if there's not CSS transform
            yepnope({
                test: Modernizr.csstransforms,
                yep: ["{{asset('flipbook_assets/js/turn.min.js')}}"],
                nope: ["{{asset('flipbook_assets/js/turn.html4.min.js')}}"],
                both: ["{{asset('flipbook_assets/js/scissor.min.js')}}", "{{asset('flipbook_assets/css/double-page-third-mar.css')}}"],
                complete: loadAppThirdMar,
            });

            zoomToolEnabled = false;

            function toggleZoom() {
                if (zoomToolEnabled) {
                    $(".flipbook-third-mar a").off("mousemove");
                    $("#toggle-zoom-third-mar").removeClass("toggle-on");
                    $("#img-magnifier-container-third-mar").hide();

                    zoomToolEnabled = false;
                } else {
                    $(".flipbook-third-mar a").mousemove(function (event) {
                        var magnifier = $("#img-magnifier-container-third-mar");
                        $("#img-magnifier-container-third-mar").css(
                            "left",
                            event.pageX - magnifier.width() / 2
                        );
                        $("#img-magnifier-container-third-mar").css(
                            "top",
                            event.pageY - magnifier.height() / 2
                        );
                        $("#img-magnifier-container-third-mar").show();
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

                        $("#img-magnifier-container-third-mar .glass").attr("src", bg);
                        $("#img-magnifier-container-third-mar .glass").css(
                            "top",
                            "" + targetTop + "px"
                        );
                        $("#img-magnifier-container-third-mar .glass").css(
                            "left",
                            "" + targetLeft + "px"
                        );
                    });

                    $("#toggle-zoom-third-mar").addClass("toggle-on");
                    zoomToolEnabled = true;
                }
            }
        </script>
    </div>
</div>
@endif


@if($data->BSH_JUL2023_CORE_SM_6PG)
<div class="row">
    <div class="col-md-12">
        <script type="text/javascript"
                src="{{asset('flipbook_assets/js/modernizr.2.5.3.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('flipbook_assets/css/lightbox.min.css')}}"/>
        <script type="text/javascript"
                src="{{asset('flipbook_assets/js/lightbox-third-may-scroll-to-top.min.js')}}"></script>
        <style>
            table {
                border-collapse: inherit !important;
            }

            .lb-details {
                display: none;
            }


            .firstname {
                font-family: myFirstFont;
                font-weight: 700;
                font-size: 16pt;
            }


            .dollar-amount {
                font-family: 'totalfb';
                font-weight: 700;
                font-size: 16pt;
            }

            /* .dollar-amount62 {
                                font-family: 'Steelfish', sans-serif;
                                font-weight: 700;
                                font-size: 16pt;
                            } */

            #img-magnifier-container-third {
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

            #toggle-zoom-third {
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
                gin-right: 20px;
                display: none;
            }

            #toggle-zoom-third.toggle-on {
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
        <div class="flipbook-viewport-third-may">
            <div class="container">
                <div>
                    <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}"" target="blank"><img
                            id="printer"
                            src="{{asset('flipbook_assets/pages/printer-large.png')}}"/></a>
                </div>
                <div class="tool-zoom">
                    <a id="toggle-zoom-third-may" onclick="toggleZoom()"></a>
                </div>

                <div class="arrows">
                    <div class="arrow-prev">
                        <a id="prev-third-may"><img class="previous" width="20"
                                                    src="{{asset('flipbook_assets/pages/left-arrow.svg')}}"
                                                    alt=""/></a>
                    </div>
                    <center>
                        <h4 style="color: red;">{{$data->BSH_JUL2023_CORE_SM_6PGLabel}}</h4>
                    </center>
                    <div id="flipbook-container-response" class="container-response">
                        <div class="flipbook-container-third-may">
                            <div class="flipbook-third-may" style="gin: 0 auto !important;">
                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult1}}"
                                    data-odd="1" id="page-1" data-lightbox-third-may="big"
                                    class="page"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult1}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult2}}"
                                    data-even="2" id="page-2" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult2}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult3}}"
                                    data-odd="3" id="page-3" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult3}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult4}}"
                                    data-even="4" id="page-4" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult4}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult5}}"
                                    data-even="5" id="page-5" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult5}}')"></a>

                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/hi_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult6}}"
                                    data-even="6" id="page-6" data-lightbox-third-may="big"
                                    class="single"
                                    style="background-image: url('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult6}}')"></a>
                            </div>
                        </div>
                    </div>
                    <div class="arrow-next">
                        <a id="next-third-may"><img class="next" width="20"
                                                    src="{{asset('flipbook_assets/pages/right-arrow.svg')}}"
                                                    alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="flipbook-slider-thumb-hide-on-mobile" class="flipbook-slider-thumb-third-may">
            <div class="drag-third-may">
                <!-- <img id="prev-arrow-third-may" class="thumb-arrow" src="assets/pages/left-arrow.svg" alt=""> -->
                <img onclick="onPageClickThirdMay(1)" class="thumb-img left-img"
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult1}}"
                        alt=""/>

                <div class="space">
                    <img onclick="onPageClickThirdMay(2)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult2}}"
                            alt=""/>
                    <img onclick="onPageClickThirdMay(3)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult3}}"
                            alt=""/>
                </div>

                <div class="space">
                    <img onclick="onPageClickThirdMay(4)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult4}}"
                            alt=""/>
                    <img onclick="onPageClickThirdMay(5)" class="thumb-img"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult5}}"
                            alt=""/>
                </div>

                <div class="space">
                    <img onclick="onPageClickThirdMay(6)" class="thumb-img active"
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/july_2023/lo_res/{{$data->BSH_JUL2023_CORE_SM_6PGResult6}}"
                            alt=""/>
                </div>
            <!-- <img id="next-arrow-third-may" class="thumb-arrow" src="{{asset('flipbook_assets/pages/right-arrow.svg')}}" alt=""> -->
            </div>

            <ul class="flipbook-slick-dots-third-may" role="tablist">
                <li onclick="onPageClickThirdMay(1)" class="dot">
                    <a type="button" style="color: #7f7f7f">1</a>
                </li>
                <li onclick="onPageClickThirdMay(2)" class="dot">
                    <a type="button" style="color: #7f7f7f">2</a>
                </li>
                <li onclick="onPageClickThirdMay(3)" class="dot">
                    <a type="button" style="color: #7f7f7f">3</a>
                </li>
                <li onclick="onPageClickThirdMay(4)" class="dot">
                    <a type="button" style="color: #7f7f7f">4</a>
                </li>
                <li onclick="onPageClickThirdMay(5)" class="dot">
                    <a type="button" style="color: #7f7f7f">5</a>
                </li>
                <li onclick="onPageClickThirdMay(6)" class="dot">
                    <a type="button" style="color: #7f7f7f">6</a>
                </li>
            </ul>r
        </div>
        <div id="img-magnifier-container-third-may">
            <img id="zoomed-image-container" class="glass" src=""/>
        </div>
        <div id="log"></div>
        <audio id="audio" style="display: none"
                src="{{asset('flipbook_assets/page-flip.mp3')}}"></audio>
        <script type="text/javascript">
            function scaleFlipBookThirdMay() {
                var imageWidth = 508;
                var imageHeight = 969;
                var pageHeight = 630;
                var pageWidth = parseInt((pageHeight / imageHeight) * imageWidth);

                $(".flipbook-viewport-third-may .container").css({
                    width: 40 + pageWidth * 2 + 40 + "px",
                });

                $(".flipbook-viewport-third-may .flipbook-third-may").css({
                    width: pageWidth * 2 + "px",
                    height: pageHeight + "px",
                });

                $(".flipbook-viewport-third-may .flipbook-third-may").css('margin-bottom', 20);

                $(".flipbook-container-third-may").css("margin-left", 50);
            }

            function doResizeThirdMay() {
                $("html").css({
                    zoom: 1
                });
                var $viewportThird = $(".flipbook-viewport-third-may");
                var viewHeight = $viewportThird.height();
                var viewWidth = $viewportThird.width();

                var $el = $(".flipbook-viewport-third-may .container");
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

            function loadAppThirdMay() {
                scaleFlipBookThirdMay();
                var flipbookThird = $(".flipbook-third-may");

                // Check if the CSS was already loaded

                if (flipbookThird.width() == 0 || flipbookThird.height() == 0) {
                    setTimeout(loadAppThirdMay, 10);
                    return;
                }

                $(".flipbook-third-may .double").scissor();

                // Create the flipbook-third-may

                $(".flipbook-third-may").turn({
                    // Elevation

                    elevation: 50,

                    // Enable gradients

                    gradients: true,

                    // Auto center this flipbook-third-may

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
                doResizeThirdMay();
            }

            $(window).resize(function () {
                doResizeThirdMay();
            });
            $(window).bind("keydown", function (e) {
                if (e.keyCode == 37) $(".flipbook-third-may").turn("previous");
                else if (e.keyCode == 39) $(".flipbook-third-may").turn("next");
            });
            $("#prev-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("previous");
            });

            $("#next-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("next");
            });

            $("#prev-arrow-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("previous");
            });

            $("#next-arrow-third-may").click(function (e) {
                e.preventDefault();
                $(".flipbook-third-may").turn("next");
            });

            function onPageClickThirdMay(i) {
                $(".flipbook-third-may").turn("page", i);
            }

            // Load the HTML4 version if there's not CSS transform
            yepnope({
                test: Modernizr.csstransforms,
                yep: ["{{asset('flipbook_assets/js/turn.min.js')}}"],
                nope: ["{{asset('flipbook_assets/js/turn.html4.min.js')}}"],
                both: ["{{asset('flipbook_assets/js/scissor.min.js')}}", "{{asset('flipbook_assets/css/double-page-third-may.css')}}"],
                complete: loadAppThirdMay,
            });

            zoomToolEnabled = false;

            function toggleZoom() {
                if (zoomToolEnabled) {
                    $(".flipbook-third-may a").off("mousemove");
                    $("#toggle-zoom-third-may").removeClass("toggle-on");
                    $("#img-magnifier-container-third-may").hide();

                    zoomToolEnabled = false;
                } else {
                    $(".flipbook-third-may a").mousemove(function (event) {
                        var magnifier = $("#img-magnifier-container-third-may");
                        $("#img-magnifier-container-third-may").css(
                            "left",
                            event.pageX - magnifier.width() / 2
                        );
                        $("#img-magnifier-container-third-may").css(
                            "top",
                            event.pageY - magnifier.height() / 2
                        );
                        $("#img-magnifier-container-third-may").show();
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

                        $("#img-magnifier-container-third-may .glass").attr("src", bg);
                        $("#img-magnifier-container-third-may .glass").css(
                            "top",
                            "" + targetTop + "px"
                        );
                        $("#img-magnifier-container-third-may .glass").css(
                            "left",
                            "" + targetLeft + "px"
                        );
                    });

                    $("#toggle-zoom-third-may").addClass("toggle-on");
                    zoomToolEnabled = true;
                }
            }
        </script>
    </div>
</div>
@endif



                <!-- PC here -->
                <br>
                <div class="row">
                    @if($data->BSH_JUN2023_CORE_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: red;text-align: center;">{{$data->BSH_JUN2023_CORE_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_PCResult1}}"
                                       data-lightbox-fifth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_CORE_PCResult2}}"
                                       data-lightbox-fifth="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_CORE_PCResult2}}"
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
                            <h4 style="color: red;text-align: center;">{{$data->BSH_Jun2023_Player_Party_PCLabel}}</h4>

                            <div class="slider-big">
                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_Jun2023_Player_Party_PCResult1}}"
                                   data-lightbox-sixth="roadtrip">
                                    <center><img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_Jun2023_Player_Party_PCResult1}}"
                                            style="width: 40%" alt=""></center>
                                </a>
                                <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_Jun2023_Player_Party_PCResult2}}"
                                   data-lightbox-sixth="roadtrip">
                                    <img
                                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_Jun2023_Player_Party_PCResult2}}"
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
                        <h4 style="color: red;text-align: center;">{{$data->BSH_Jun2023_Hi_End_Gift_PCLabel}}</h4>

                        <div class="slider-big">
                            <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult1}}"
                               data-lightbox-seventh="roadtrip">
                                <center><img
                                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult1}}"
                                        style="width: 40%" alt=""></center>
                            </a>
                            <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult2}}"
                               data-lightbox-seventh="roadtrip">
                                <img
                                    src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_Jun2023_Hi_End_Gift_PCResult2}}"
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
                    <h4 style="color: red;text-align: center;">{{$data->BSH_Jun2023_Trop_LV_Event_PCLabel}}</h4>

                    <div class="slider-big">
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult1}}"
                           data-lightbox-eighth="roadtrip">
                            <center><img
                                    src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult1}}"
                                    style="width: 40%" alt=""></center>
                        </a>
                        <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult2}}"
                           data-lightbox-eighth="roadtrip">
                            <img
                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_Jun2023_Trop_LV_Event_PCResult2}}"
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
                <h4 style="color: red;text-align: center;">{{$data->BSH_JUN2023_INACTIVE_PCLabel}}</h4>

                <div class="slider-big">
                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_INACTIVE_PCResult1}}"
                       data-lightbox-ninth="roadtrip">
                        <center><img
                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_INACTIVE_PCResult1}}"
                                style="width: 40%" alt=""></center>
                    </a>
                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/hi_res/{{$data->BSH_JUN2023_INACTIVE_PCResult2}}"
                       data-lightbox-ninth="roadtrip">
                        <img
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/june_2023/lo_res/{{$data->BSH_JUN2023_INACTIVE_PCResult2}}"
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
            <h4 style="color: red;text-align: center;">{{$data->BSH_JUL2023_CORE_PCLabel}}</h4>

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
                    <h4 style="color: red;text-align: center;">{{$data->BSH_JUL2023_SLOT_PULL_SMLabel}}</h4>

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
                                <h4 style="color: red;text-align: center;">{{$data->BSH_Mar2023_Card_Tier_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Card_Tier_PCResult1}}"
                                       data-lightbox-fourtysix="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Card_Tier_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Card_Tier_PCResult2}}"
                                       data-lightbox-fourtysix="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Card_Tier_PCResult2}}"
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
                                <h4 style="color: red;text-align: center;">{{$data->BSH_Mar2023_Superstar_Party_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Superstar_Party_PCResult1}}"
                                       data-lightbox-fourth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Superstar_Party_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Superstar_Party_PCResult2}}"
                                       data-lightbox-fourth="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Superstar_Party_PCResult2}}"
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
                                <h4 style="color: red;text-align: center;">{{$data->BSH_APR2023_CORE_PCLabel}}</h4>

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
                                <h4 style="color: red;text-align: center;">{{$data->BSH_Apr2023_Cruise_PCLabel}}</h4>

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
                            <h4 style="color: red;text-align: center;">{{$data->BSH_MAY2023_CORE_PCLabel}}</h4>

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
                        <h4 style="color: red;text-align: center;">{{$data->BSH_May2023_2nd_Chance_Cruise_PCLabel}}</h4>

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
                    <h4 style="color: red;text-align: center;">{{$data->BSH_MAY2023_MINI_BAC_PCLabel}}</h4>

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
                                <h4 style="color: red;text-align: center;">{{$data->BSH_Mar2023_Legend_Party_InviteLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult1}}"
                                       data-lightbox-thirty="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult2}}"
                                       data-lightbox-thirty="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult3}}"
                                       data-lightbox-thirty="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult3}}"
                                            style="width: 100%" alt="">
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult4}}"
                                       data-lightbox-thirty="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/lo_res/{{$data->BSH_Mar2023_Legend_Party_InviteResult4}}"
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
                                <h4 style="color: red;text-align: center;">{{$data->FEB2023_CORE_PCLabel}}</h4>

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
                <div class="row">
                    @if($data->BSH_MAY2023_MYSTERY_PRIZE_DRAWING)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: red;text-align: center;">{{$data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGResult1}}"
                                       data-lightbox-eighth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGResult2}}"
                                       data-lightbox-eighth="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_eighth.min.js"></script>
                        </div>
                    @endif
                    @if($data->BSH_Apr2023_Poker_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: red;text-align: center;">{{$data->BSH_Apr2023_Poker_PCLabel}} </h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/hi_res/{{$data->BSH_Apr2023_Poker_PCResult1}}"
                                       data-lightbox-ninth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/lo_res/{{$data->BSH_Apr2023_Poker_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/hi_res/{{$data->BSH_Apr2023_Poker_PCResult2}}"
                                       data-lightbox-ninth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/april_2023/lo_res/{{$data->BSH_Apr2023_Poker_PCResult2}}"
                                                alt=""></center>
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_ninth.min.js"></script>
                        </div>
                    @endif
                    @if($data->BSH_MAR2023_MINI_BAC_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: red;text-align: center;">{{$data->BSH_MAR2023_MINI_BAC_PCLabel}} </h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_MAR2023_MINI_BAC_PCResult1}}"
                                       data-lightbox-ninth="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_MAR2023_MINI_BAC_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_MAR2023_MINI_BAC_PCResult2}}"
                                       data-lightbox-ninth="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2023/hi_res/{{$data->BSH_MAR2023_MINI_BAC_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_ninth.min.js"></script>
                        </div>
                    @endif
                </div>
                <br>
                <div class="row">
                    @if($data->BSH_MAY2023_MINI_BAC_TOURNEY_PC)
                        <div class="col-sm-4">
                            <div class="modal-wrap">
                                <h4 style="color: red;text-align: center;">{{$data->BSH_MAY2023_MINI_BAC_TOURNEY_PCLabel}}</h4>

                                <div class="slider-big">
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MINI_BAC_TOURNEY_PCResult1}}"
                                       data-lightbox-eleventh="roadtrip">
                                        <center><img
                                                src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_MAY2023_MINI_BAC_TOURNEY_PCResult1}}"
                                                style="width: 40%" alt=""></center>
                                    </a>
                                    <a href="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/hi_res/{{$data->BSH_MAY2023_MINI_BAC_TOURNEY_PCResult2}}"
                                       data-lightbox-eleventh="roadtrip">
                                        <img
                                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/may_2023/lo_res/{{$data->BSH_MAY2023_MINI_BAC_TOURNEY_PCResult2}}"
                                            style="width: 100%" alt="">
                                    </a>
                                </div>
                            </div>

                            <script src="/weekender_assets/js/modal_lightbox_eleventh.min.js"></script>
                        </div>
                    @endif
                </div>
                <br>
                <script src="/weekender_assets/js/modal_slick.min.js"></script>
                <script src="/weekender_assets/js/modal_main.js"></script>
                <!-- WinLoss here -->
                <div id="winloss-container">

                    <div id="promosWLoss" style="display: none">
                        <h4 style="text-align: center;color: #DA401B">Win/Loss</h4>
                        @if($data->flgWL)
                            <div class="row text-center">
                                @foreach($data->winLoss as $winLoss)
                                    <div class="col-md-3">
                                        <div class="promoGridBoxTextDisplayWLoss">
                                            <h4 style="text-align: center;color: #DA401B">Win Loss
                                                Report {{$winLoss->CSHRV_Year}}</h4>
                                        </div>
                                        <div class="modal-wrap">
                                            <div class="slider-big">
                                                <a href="{{$winLoss->imgLink}}"
                                                   data-lightbox-{{$winLoss->CSHRV_Year}}="roadtrip"
                                                   style="max-width: 100px;">
                                                    <img src="{{$winLoss->imgLink}}"
                                                         style="max-width: 100px; margin-left: -47px;" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <script
                                        src="/weekender_assets/js/modal_lightbox_{{$winLoss->CSHRV_Year}}.min.js"></script>
                                @endforeach
                            </div>
                        @else
                            <div id="promoMsgWLoss" style=" font-size: 24px;">
                                <p>
                                <span
                                    class="pwsContentLoginTitle">Sorry, no Win Loss information is available.<br></span>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="row">
                <span style="margin:0 auto;">
                                    We do not have anything for you to see at this time, please check back later.
                </span>
                </div>
                @endif</br>
        </div>
        <div class="col-md-3">
            <a href="/" rel="nofollow">
                @switch($data->CSHRV_Tier)
                    @case('PRO')
                    <img
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/tier_cards/Bally_RewardsCards-PRO.png"
                        alt="">
                    <h5 style="font-weight: 600;color: #232325;text-align:center;">
                        Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                    <h5 style="font-weight: 600;color: white;text-align:center;background: red;">
                        Player Account: {{ $data->CSHRV_Account}}</h5>

                    <h6 style="color:red;text-align: center;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                            href="https://shreveport.pcwebserv.com/admin/logout" style="color:red">Logout</a></h6>
                    <div id="TierLevel" class="textlineRed">Tier Level Pro</div>

                    <div id="yourMembershipLevel">
                        <div id="pointsBalanceNextLevel">Tier Points <span
                                style="color:red;">{{ number_format($data->CSHRV_Points ?? 0) }}</span>
                        </div>
                        <div id="pointsBalanceNextLevel"> Bally Bucks <span
                                style="color:red;">${{ $data->CSHRV_Comp_Dollars?$data->CSHRV_Comp_Dollars:0 }}</span>
                        </div>
                        @if($data-> CSHRV_Poker_Rating > 0)
                            <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                    style="color:red;">${{ $data-> CSHRV_Poker_Rating?$data-> CSHRV_Poker_Rating:0 }}</span>
                            </div>
                        @endif
                        <span
                            style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                    </div>
                    <br>

                    @break
                    @case('SUPERSTAR')
                    <img
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/tier_cards/Bally_RewardsCards-SUPERSTAR.png"
                        alt="">
                    <h5 style="font-weight: 600;color: #232325;text-align:center;">
                        Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                    <h5 style="font-weight: 600;color: white;text-align:center;background: red;">
                        Player Account: {{ $data->CSHRV_Account}}</h5>
                    <h6 style="color:red;text-align: center;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                            href="https://shreveport.pcwebserv.com/admin/logout" style="color:red">Logout</a></h6>
                    <div id="TierLevel" class="textlineBlack">Tier Level SuperStar</div>

                    <div id="yourMembershipLevel">
                        <div id="pointsBalanceNextLevel">Tier Points <span
                                style="color:red;">{{ number_format($data->CSHRV_Points ?? 0) }}</span>
                        </div>
                        <div id="pointsBalanceNextLevel"> Bally Bucks <span
                                style="color:red;">${{ $data->CSHRV_Comp_Dollars?$data->CSHRV_Comp_Dollars:0 }}</span>
                        </div>
                        @if($data-> CSHRV_Poker_Rating > 0)
                            <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                    style="color:red;">${{ $data-> CSHRV_Poker_Rating?$data-> CSHRV_Poker_Rating:0 }}</span>
                            </div>
                        @endif
                        <span
                            style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                    </div>
                    <br>

                    @break
                    @case('STAR')
                    <img
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/tier_cards/Bally_RewardsCards-STAR.png"
                        alt="">
                    <h5 style="font-weight: 600;color: #232325;text-align:center;">
                        Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                    <h5 style="font-weight: 600;color: white;text-align:center;background: red;">
                        Player Account: {{ $data->CSHRV_Account}}</h5>
                    <h6 style="color:red;text-align: center;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                            href="https://shreveport.pcwebserv.com/admin/logout" style="color:red">Logout</a></h6>
                    <div id="TierLevel" class="textlinePlatinum">Tier Level Star</div>

                    <div id="yourMembershipLevel">
                        <div id="pointsBalanceNextLevel">Tier Points <span
                                style="color:red;">{{ number_format($data->CSHRV_Points ?? 0) }}</span>
                        </div>
                        <div id="pointsBalanceNextLevel"> Bally Bucks <span
                                style="color:red;">${{ $data->CSHRV_Comp_Dollars?$data->CSHRV_Comp_Dollars:0 }}</span>
                        </div>
                        @if($data-> CSHRV_Poker_Rating > 0)
                            <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                    style="color:red;">${{ $data-> CSHRV_Poker_Rating?$data-> CSHRV_Poker_Rating:0 }}</span>
                            </div>
                        @endif
                        <span
                            style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                    </div>
                    <br>

                    @break
                    @case('LEGEND')
                    <img
                        src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/tier_cards/Bally_RewardsCards-LEGEND.png"
                        alt="">
                    <h5 style="font-weight: 600;color: #232325;text-align:center;">
                        Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                    <h5 style="font-weight: 600;color: white;text-align:center;background: red;">
                        Player Account: {{ $data->CSHRV_Account}}</h5>
                    <h6 style="color:red;text-align: center;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                            href="https://shreveport.pcwebserv.com/admin/logout" style="color:red">Logout</a></h6>
                    <div id="TierLevel" class="textlinePlatinum">Tier Level Legend</div>

                    <div id="yourMembershipLevel">
                        <div id="pointsBalanceNextLevel">Tier Points <span
                                style="color:red;">{{ number_format($data->CSHRV_Points ?? 0) }}</span>
                        </div>
                        <div id="pointsBalanceNextLevel"> Bally Bucks <span
                                style="color:red;">${{ $data->CSHRV_Comp_Dollars?$data->CSHRV_Comp_Dollars:0 }}</span>
                        </div>
                        @if($data-> CSHRV_Poker_Rating > 0)
                            <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                    style="color:red;">${{ $data-> CSHRV_Poker_Rating?$data-> CSHRV_Poker_Rating:0 }}</span>
                            </div>
                        @endif
                        <span
                            style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                    </div>
                    <br>

                    @break
                    @default

                    <h5 style="font-weight: 600;color: #232325;text-align:center;">
                        Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                    <h5 style="font-weight: 600;color: white;text-align:center;background: red;">
                        Player Account: {{ $data->CSHRV_Account}}</h5>
                    <h6 style="color:red;text-align: center;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                            href="https://shreveport.pcwebserv.com/admin/logout" style="color:red">Logout</a></h6>
                    <div id="TierLevel" class="textlineGold">Tier Level Pro</div>

                    <div id="yourMembershipLevel">
                        <div id="pointsBalanceNextLevel">Tier Points <span
                                style="color:red;">{{ number_format($data->CSHRV_Points ?? 0) }}</span>
                        </div>
                        <div id="pointsBalanceNextLevel"> Bally Bucks <span
                                style="color:red;">${{ $data->CSHRV_Comp_Dollars?$data->CSHRV_Comp_Dollars:0 }}</span>
                        </div>
                        @if($data-> CSHRV_Poker_Rating > 0)
                            <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                    style="color:red;">${{ $data-> CSHRV_Poker_Rating?$data-> CSHRV_Poker_Rating:0 }}</span>
                            </div>
                        @endif
                        <span
                            style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                    </div>
                    <br>
                @endswitch
                <div class="row">
                    <div class="pwsWinLoss"
                         style="margin:0 auto;text-align: center; cursor: pointer;padding-bottom:20px">
                        <a style="color: #DA401B" id="showHideWL">SHOW WIN LOSS</a>
                    </div>
                    <!-- Host Here -->
                    <div class="col-md-12 text-center">
                        <img
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/host_images/{{$data->hostImage_Name}}"
                            alt="" style="max-width: 90px"></br>
                        <span
                            style="color:black; margin:10px; font-size: 14px"><b>{{$data->hostMarketing_Name}}</b></span></br>
                        <span style="color:black; margin:10px; font-size: 12px"><b>Phone: <a
                                    href="tel:{{$data->hostPhone}}">{{$data->hostPhone}}</a></b></span><br>
                        @if($data->hostEmail !== '')<span style="color:black; margin:10px; font-size: 12px"><b>Mail: <a
                                    href="mailto:{{$data->hostEmail}}">{{$data->hostEmail}}</a></b></span>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    </div><br>
    <script>
        (function ($) {
            'use strict';

            $(document).ready(function () {
                $('.pwsWinLoss').click(function () {
                    event.preventDefault();
                    var anchor = document.getElementById('winloss-container');
                    if (anchor != null) {
                        anchor.scrollIntoView({behavior: "smooth", block: "center", inline: "center"});
                        if ($('#promosWLoss').css('display') !== "none") {
                            $('#promosWLoss').fadeOut("slow");
                            $('#showHideWL').text("SHOW WIN LOSS");
                        } else {
                            $('#promosWLoss').fadeIn("slow");
                            $('#showHideWL').text("HIDE WIN LOSS");
                        }
                        // $('#promosWLoss').show();
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
