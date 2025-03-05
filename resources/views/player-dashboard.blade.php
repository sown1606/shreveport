@extends('layouts.app')
@section('content')
    <div class="row justify-content-center" style="padding: 50px;background: white">
        <form id="logout-form" action="{{ route('voyager.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="col-md-9">
            <div class="row">
                {{-- Offers Section --}}
                @if($data->offers && count($data->offers) > 0)
                    <div class="row">
                        @foreach($data->offers as $offer)
                            @if($offer['job_type'] == 'SM')
                                <div class="col-md-12">
                                    <script type="text/javascript"
                                            src="{{asset('flipbook_assets/js/modernizr.2.5.3.min.js')}}"></script>
                                    <link rel="stylesheet"
                                          href="{{asset('flipbook_assets/css/lightbox.min.css')}}"/>
                                    <script type="text/javascript"
                                            src="{{asset('flipbook_assets/js/lightbox.min.js')}}"></script>
                                    <div class="flipbook-viewport">
                                        <div class="container">
                                            <div>
                                                <a href={{asset('flipbook_assets/pages/Booklet.pdf')}}""
                                                   target="blank"><img
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
                                                <center><h4 style="color: #5c8d33;">{{$offer['label']}}</h4>
                                                </center>
                                                <div id="flipbook-container-response" class="container-response">
                                                    <div class="flipbook">
                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                           data-odd="1" id="page-1" data-lightbox="big" class="page"
                                                           style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}')"></a>

                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][1]}}"
                                                           data-even="2" id="page-2" data-lightbox="big"
                                                           class="single"
                                                           style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}')"></a>

                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][2]}}"
                                                           data-odd="3" id="page-3" data-lightbox="big"
                                                           class="single"
                                                           style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}')"></a>

                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                           data-even="4" id="page-4" data-lightbox="big"
                                                           class="single"
                                                           style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}')"></a>
                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                           data-even="5" id="page-5" data-lightbox="big"
                                                           class="single"
                                                           style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}')"></a>
                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                           data-even="6" id="page-6" data-lightbox="big"
                                                           class="single"
                                                           style="background-image: url('https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}')"></a>

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
                                                 src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                 alt=""/>

                                            <div class="space">
                                                <img onclick="onPageClick(2)" class="thumb-img"
                                                     src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                     alt=""/>
                                                <img onclick="onPageClick(3)" class="thumb-img"
                                                     src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                     alt=""/>
                                            </div>

                                            <div class="space">
                                                <img onclick="onPageClick(4)" class="thumb-img"
                                                     src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                     alt=""/>
                                                <img onclick="onPageClick(5)" class="thumb-img"
                                                     src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                     alt=""/>
                                            </div>
                                            <div class="space">

                                                <img onclick="onPageClick(6)" class="thumb-img"
                                                     src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
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
                                            var imageWidth = 600;  // Đổi chiều rộng và chiều cao phù hợp với ảnh ngang
                                            var imageHeight = 400; // Ảnh ngang có chiều rộng lớn hơn chiều cao

                                            var pageWidth = 600; // Điều chỉnh chiều rộng trang mong muốn
                                            var pageHeight = parseInt((pageWidth / imageWidth) * imageHeight);

                                            $(".flipbook-viewport .container").css({
                                                width: (pageWidth * 2) + 0 + "px", // Điều chỉnh chiều rộng tổng thể
                                            });

                                            $(".flipbook-viewport .flipbook").css({
                                                width: (pageWidth * 2) + "px",
                                                height: pageHeight + "px",
                                            });

                                            $(".flipbook-viewport .flipbook").css('margin-bottom', 20);
                                        }


                                        function doResize() {
                                            $("html").css({ zoom: 1 });

                                            var $viewport = $(".flipbook-viewport");
                                            var viewWidth = $viewport.width();
                                            var viewHeight = $viewport.height();

                                            var $el = $(".flipbook-viewport .container");
                                            var elWidth = $el.outerWidth();
                                            var elHeight = $el.outerHeight();

                                            var scale = Math.min(viewWidth / elWidth, viewHeight / elHeight);

                                            if (scale < 1) {
                                                scale *= 0.95;
                                            } else {
                                                scale = 1;
                                            }

                                            $(".flipbook-viewport .container").css({
                                                transform: `scale(${scale})`,
                                                transformOrigin: "top center"
                                            });
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
                                                display: 'double', // Đảm bảo hiển thị hai trang khi cần
                                                acceleration: true,
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
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach($data->offers as $offer)
                            @if($offer['job_type'] == 'PC')
                                <div class="col-sm-4">
                                    <div class="modal-wrap">
                                        <h4 style="color: #5c8d33;text-align: center;">{{$offer['label']}}</h4>

                                        <div class="slider-big">
                                            <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                               data-lightbox-fifth="roadtrip">
                                                <center><img
                                                        src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                        style="width: 40%" alt=""></center>
                                            </a>
                                            <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][1]}}"
                                               data-lightbox-fifth="roadtrip">
                                                <img
                                                    src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][1]}}"
                                                    style="width: 100%" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <script src="/weekender_assets/js/modal_lightbox_fifth.min.js"></script>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <script src="/weekender_assets/js/modal_slick.min.js"></script>
                    <script src="/weekender_assets/js/modal_main.js"></script>
                @else
                    <p>No offers available at this time.</p>
                @endif
            </div>
            <!-- WinLoss here -->
            <div id="winloss-container">

                <div id="promosWLoss" style="display: none">
                    <h4 style="text-align: center;color: #527428">Win/Loss</h4>
                    @if($data->flgWL)
                        <div class="row text-center">
                            @foreach($data->winLoss as $winLoss)
                                <div class="col-md-3">
                                    <div class="promoGridBoxTextDisplayWLoss">
                                        <h4 style="text-align: center;color: #527428">Win Loss
                                            Report {{$winLoss->Year}}</h4>
                                    </div>
                                    <div class="modal-wrap">
                                        <div class="slider-big">
                                            <a href="{{$winLoss->imgLink}}"
                                               data-lightbox-{{$winLoss->Year}}="roadtrip"
                                               style="max-width: 100px;">
                                                <img src="{{$winLoss->imgLink}}"
                                                     style="max-width: 100px; margin-left: -47px;" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <script
                                    src="/weekender_assets/js/modal_lightbox_{{$winLoss->Year}}.min.js"></script>
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
        </div>
        <div class="col-md-3">
            <a href="/" rel="nofollow">
                @switch($data->Tier)
                    @case('Gold')
                        <img
                            src="https://digitaldogdirect.s3.us-east-1.amazonaws.com/Gold_Card.png"
                            alt=""
                            style="max-width:300px">
                        <h5 style="font-weight: 600;color: #232325;text-align:center;">
                            Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                        <h5 style="font-weight: 600;color: white;text-align:center;background: #5c8d33;">
                            Player Account: {{ $data->Account}}</h5>

                        <h6 style="color: #527428;text-align: center;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                                href="https://shreveport.pcwebserv.com/admin/logout"
                                style="color: #527428">Logout</a>
                        </h6>
                        <div id="TierLevel" class="textlineRed">Tier Level Gold</div>

                        <div id="yourMembershipLevel">
                            <div id="pointsBalanceNextLevel">Tier Points <span
                                    style="color: #527428;">{{ number_format($data->Points ?? 0) }}</span>
                            </div>
                            <div id="pointsBalanceNextLevel"> DigitalDogDirect Bucks <span
                                    style="color: #527428;">${{ $data->Comp_Dollars?$data->Comp_Dollars:0 }}</span>
                            </div>
                            @if($data-> Poker_Rating > 0)
                                <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                        style="color: #527428;">${{ $data-> Poker_Rating?$data-> Poker_Rating:0 }}</span>
                                </div>
                            @endif
                            <span
                                style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                        </div>
                        <br>

                        @break
                    @case('SUPERSTAR')
                        <img
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/tier_cards/DigitalDogDirect_RewardsCards-SUPERSTAR.png"
                            alt="">
                        <h5 style="font-weight: 600;color: #232325;text-align:center;">
                            Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                        <h5 style="font-weight: 600;color: white;text-align:center;background: #5c8d33;">
                            Player Account: {{ $data->Account}}</h5>
                        <h6 style="color: #527428;text-align: center;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                                href="https://shreveport.pcwebserv.com/admin/logout"
                                style="color: #527428">Logout</a>
                        </h6>
                        <div id="TierLevel" class="textlineBlack">Tier Level SuperStar</div>

                        <div id="yourMembershipLevel">
                            <div id="pointsBalanceNextLevel">Tier Points <span
                                    style="color: #527428;">{{ number_format($data->Points ?? 0) }}</span>
                            </div>
                            <div id="pointsBalanceNextLevel"> DigitalDogDirect Bucks <span
                                    style="color: #527428;">${{ $data->Comp_Dollars?$data->Comp_Dollars:0 }}</span>
                            </div>
                            @if($data-> Poker_Rating > 0)
                                <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                        style="color: #527428;">${{ $data-> Poker_Rating?$data-> Poker_Rating:0 }}</span>
                                </div>
                            @endif
                            <span
                                style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                        </div>
                        <br>

                        @break
                    @case('STAR')
                        <img
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/tier_cards/DigitalDogDirect_RewardsCards-STAR.png"
                            alt="">
                        <h5 style="font-weight: 600;color: #232325;text-align:center;">
                            Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                        <h5 style="font-weight: 600;color: white;text-align:center;background: #5c8d33;">
                            Player Account: {{ $data->Account}}</h5>
                        <h6 style="color: #527428;text-align: center;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                                href="https://shreveport.pcwebserv.com/admin/logout"
                                style="color: #527428">Logout</a>
                        </h6>
                        <div id="TierLevel" class="textlinePlatinum">Tier Level Star</div>

                        <div id="yourMembershipLevel">
                            <div id="pointsBalanceNextLevel">Tier Points <span
                                    style="color: #527428;">{{ number_format($data->Points ?? 0) }}</span>
                            </div>
                            <div id="pointsBalanceNextLevel"> DigitalDogDirect Bucks <span
                                    style="color: #527428;">${{ $data->Comp_Dollars?$data->Comp_Dollars:0 }}</span>
                            </div>
                            @if($data-> Poker_Rating > 0)
                                <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                        style="color: #527428;">${{ $data-> Poker_Rating?$data-> Poker_Rating:0 }}</span>
                                </div>
                            @endif
                            <span
                                style="font-size: 12px;font-style: italic;color: darkgrey;"> Data updated at {{$data->updated_at}}</span>
                        </div>
                        <br>

                        @break
                    @case('LEGEND')
                        <img
                            src="https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/tier_cards/DigitalDogDirect_RewardsCards-LEGEND.png"
                            alt="">
                        <h5 style="font-weight: 600;color: #232325;text-align:center;">
                            Welcome, {{ $data->first_name }} {{ $data->last_name}}</h5>
                        <h5 style="font-weight: 600;color: white;text-align:center;background: #5c8d33;">
                            Player Account: {{ $data->Account}}</h5>
                        <h6 style="color: #527428;text-align: center;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                                href="https://shreveport.pcwebserv.com/admin/logout"
                                style="color: #527428">Logout</a>
                        </h6>
                        <div id="TierLevel" class="textlinePlatinum">Tier Level Legend</div>

                        <div id="yourMembershipLevel">
                            <div id="pointsBalanceNextLevel">Tier Points <span
                                    style="color: #527428;">{{ number_format($data->Points ?? 0) }}</span>
                            </div>
                            <div id="pointsBalanceNextLevel"> DigitalDogDirect Bucks <span
                                    style="color: #527428;">${{ $data->Comp_Dollars?$data->Comp_Dollars:0 }}</span>
                            </div>
                            @if($data-> Poker_Rating > 0)
                                <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                        style="color: #527428;">${{ $data-> Poker_Rating?$data-> Poker_Rating:0 }}</span>
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
                        <h5 style="font-weight: 600;color: white;text-align:center;background: #5c8d33;">
                            Player Account: {{ $data->Account}}</h5>
                        <h6 style="color: #527428;text-align: center;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                                href="https://shreveport.pcwebserv.com/admin/logout"
                                style="color: #527428">Logout</a>
                        </h6>
                        <div id="TierLevel" class="textlineGold">Tier Level Pro</div>

                        <div id="yourMembershipLevel">
                            <div id="pointsBalanceNextLevel">Tier Points <span
                                    style="color: #527428;">{{ number_format($data->Points ?? 0) }}</span>
                            </div>
                            <div id="pointsBalanceNextLevel"> DigitalDogDirect Bucks <span
                                    style="color: #527428;">${{ $data->Comp_Dollars?$data->Comp_Dollars:0 }}</span>
                            </div>
                            @if($data-> Poker_Rating > 0)
                                <div id="pointsBalanceNextLevel"> Poker Rewards <span
                                        style="color: #527428;">${{ $data-> Poker_Rating?$data-> Poker_Rating:0 }}</span>
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
                        <a style="color: #527428" id="showHideWL">SHOW WIN LOSS</a>
                    </div>
                    <!-- Host Here -->
                    <div class="col-md-12 text-center">
                        <img
                            src={{$data->hostImage_Name}}
                            alt="" style="max-width: 90px;margin:10px"></br>
                        <span
                            style="color:black; margin:10px; font-size: 14px"><b>{{$data->hostMarketing_Name}}</b></span></br>
                        <span style="color:black; margin:10px; font-size: 12px"><b>Phone: <a
                                    href="tel:{{$data->hostPhone}}">{{$data->hostPhone}}</a></b></span><br>
                        @if($data->hostEmail !== '')
                            <span style="color:black; margin:10px; font-size: 12px"><b>Mail: <a
                                        href="mailto:{{$data->hostEmail}}">{{$data->hostEmail}}</a></b></span>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    </div>
    <br>
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
