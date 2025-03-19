@extends('layouts.app')
@section('content')
    <style>
        .vertical-tab-container {
            display: flex;
            min-height: 600px;
            border: 1px solid #ccc;
        }

        .vertical-tab-buttons {
            display: flex;
            flex-direction: column;
            width: 170px;
            border-right: 1px solid #ccc;
            background: #f1f1f1;
        }

        .vertical-tab-buttons button {
            background-color: inherit;
            color: black;
            padding: 14px 16px;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: 0.3s;
        }

        .vertical-tab-buttons button:hover {
            background-color: #ddd;
        }

        .vertical-tab-buttons button.active {
            background-color: #5c8d33;
            color: white;
        }
        .vertical-tab-content {
            flex: 1;
            padding: 20px;
            display: none;
        }

        .vertical-tab-content.show {
            display: block;
        }
        .outer-wrap {
            margin: auto;
            padding: 50px;
            background: white;
        }
        .progress {
            background-color: #e9ecef;
            border-radius: 0.25rem;
            overflow: hidden;
            height: 20px;
            margin-top: 15px;
            margin-bottom: 15px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .progress-bar {
            background-color: #5c8d33;
            text-align: center;
            color: #fff;
            white-space: nowrap;
            transition: width 0.6s ease;
        }
        .card-and-points {
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-wrapper {
            position: relative;
            display: inline-block;
        }

        .card-wrapper img {
            max-width: 300px;
            display: block;
        }
        .card-overlay {
            position: absolute;
            top: 150px;
            left: 90px;
            color: #fff;
            font-weight: 600;
            line-height: 1.2;
        }

        .card-overlay .account-line {
            margin-top: 4px;
            font-size: 14px;
        }

        /* Chặn slick bóp ảnh */
        .slider-big.slick-initialized .slick-track {
            width: 100% !important;
            transform: none !important;
        }

        .slider-big.slick-initialized .slick-list {
            overflow: visible !important;
            width: 100% !important;
        }

        /* Đảm bảo slick-track luôn căn giữa */
        .slick-track {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important; /* Đảm bảo slick-track luôn full width */
        }

        /* Slick slide phải có kích thước chuẩn */
        .slick-slide {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            text-align: center !important;
            width: auto !important; /* Đảm bảo slide không bị bóp méo */
            max-width: 100% !important;
        }

        /* Slick list cần đủ rộng */
        .slick-list {
            overflow: hidden !important;
            width: 100% !important;
            text-align: center !important;
        }

        /* Đảm bảo hình ảnh không bị bóp méo */
        .thumb-image {
            height: auto !important;
            display: block !important;
            margin: auto !important;
        }
    </style>

    <div class="row justify-content-center outer-wrap">
        <div class="col-md-10">
            <div class="vertical-tab-container">
                <!-- Tabs -->
                <div class="vertical-tab-buttons">
                    <button class="tablinks active" onclick="openTab(event, 'playerInfoTab')" id="defaultOpen">
                        Player Information
                    </button>
                    <button class="tablinks" onclick="openTab(event, 'offersTab')">Offers</button>
                    @if(!empty($data->survey))
                        <button class="tablinks" onclick="openTab(event, 'surveyTab')">Survey</button>
                    @endif
                </div>

                <!-- Content area -->
                <div style="flex:1;">
                    <!-- Player Info Tab -->
                    <div id="playerInfoTab" class="vertical-tab-content show">
                        @php
                            $cardImage = asset('cardImages/Gold_Card.png');
                            $tierName  = strtoupper($data->Tier ?: 'Pro');
                        @endphp

                        <div class="card-and-points">
                            <div>
                                <div style="font-weight: bold; margin-bottom: 4px;">
                                    Tier Level: {{ $tierName }}
                                </div>
                                <div>
                                    Tier Points:
                                    <span style="color: #527428;">
                                        {{ number_format($data->Points ?? 0) }}
                                    </span>
                                </div>
                                <div>
                                    DigitalDogDirect Bucks:
                                    <span style="color: #527428;">
                                        ${{ $data->Comp_Dollars ?: 0 }}
                                    </span>
                                </div>
                                @if($data->Poker_Rating > 0)
                                    <div>
                                        Poker Rewards:
                                        <span style="color: #527428;">
                                            ${{ $data->Poker_Rating ?: 0 }}
                                        </span>
                                    </div>
                                @endif
                                <h6 style="color: #527428;text-align: center;"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a
                                        href="https://shreveport.pcwebserv.com/admin/logout"
                                        style="color: #527428">Logout</a>
                                </h6>
                            </div>
                            <div class="card-wrapper">
                                <img src="{{ $cardImage }}" alt="VIP Card">
                                <div class="card-overlay">
                                    <div>{{ $data->first_name }} {{ $data->last_name }}</div>
                                    <div class="account-line">#{{ $data->Account }}</div>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:10px; font-size:12px; font-style:italic; color:darkgrey;">
                            Data updated at {{ $data->updated_at }}
                        </div>
                        @php
                            $pointsNow = $data->Points ?? 0;
                            $pointsMax = 5000;
                            $percent   = ($pointsNow / $pointsMax) * 100;
                            if($percent > 100) $percent = 100;
                        @endphp
                        <div style="text-align:center; margin-top:10px;">
                            <label>Progress to Next Tier:</label>
                            <div class="progress">
                                <div class="progress-bar"
                                     role="progressbar"
                                     style="width: {{ $percent }}%;"
                                     aria-valuenow="{{ $pointsNow }}"
                                     aria-valuemin="0"
                                     aria-valuemax="{{ $pointsMax }}">
                                    {{ number_format($pointsNow) }}
                                    /
                                    {{ number_format($pointsMax) }}
                                </div>
                            </div>
                        </div>

                        <div class="text-center" style="margin-top:20px;">
                            <img src="{{ $data->hostImage_Name }}"
                                 alt=""
                                 style="max-width:90px; margin:10px"><br>
                            <span style="color:black;font-size:14px;">
                                <b>{{ $data->hostMarketing_Name }}</b>
                            </span><br>
                            <span style="color:black;font-size:12px;">
                                <b>Phone:</b>
                                <a href="tel:{{ $data->hostPhone }}">
                                    {{ $data->hostPhone }}
                                </a>
                            </span><br>
                            @if($data->hostEmail)
                                <span style="color:black;font-size:12px;">
                                    <b>Mail:</b>
                                    <a href="mailto:{{ $data->hostEmail }}">
                                        {{ $data->hostEmail }}
                                    </a>
                                </span>
                            @endif
                        </div>

                        <div class="pwsWinLoss" style="margin:20px auto; text-align:center; cursor:pointer;">
                            <a style="color: #527428" id="showHideWL">SHOW WIN LOSS</a>
                        </div>
                        <div id="winloss-container">
                            <div id="promosWLoss" style="display: none">
                                <h4 style="text-align: center; color: #527428">Win/Loss</h4>
                                @if($data->flgWL)
                                    <div class="row text-center">
                                        @foreach($data->winLoss as $winLoss)
                                            <div class="col-md-3" style="margin-bottom:20px;">
                                                <h4 style="color:#527428">
                                                    Win Loss Report {{ $winLoss->Year }}
                                                </h4>
                                                <div class="modal-wrap">
                                                    <a href="{{ $winLoss->imgLink }}"
                                                       data-lightbox-{{ $winLoss->Year }}="roadtrip">
                                                        <img src="{{ $winLoss->imgLink }}"
                                                             style="max-width:300px;"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <script
                                                src="/weekender_assets/js/modal_lightbox_{{ $winLoss->Year }}.min.js"></script>
                                        @endforeach
                                    </div>
                                @else
                                    <div style="font-size:24px;">
                                        <p>Sorry, no Win Loss information is available.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- end PlayerInfoTab -->

                    <!-- Offers Tab -->
                    <div id="offersTab" class="vertical-tab-content">
                        @if(!empty($data->offers_sm) || !empty($data->offers_pc))
                            <!-- Bọc SM + PC trong row có min-height và align-items-center -->
                            <div class="row d-flex justify-content-center align-items-center" style="min-height: 600px; width: 100%;">
                                <!-- Cột SM -->
                                <div class="col-md-6 d-flex flex-column justify-content-center"
                                     style="gap:20px; border: 0px solid red;">

                                @if(count($data->offers_sm) > 0)
                                        @foreach($data->offers_sm as $index => $offer)
                                            @php
                                                $jobNumber = $offer['offer']->Job_Number;
                                                $thumbUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$jobNumber}_Thumb.jpg";
                                                $firstImage = !empty($offer['results']) ? "https://digitaldogdirect.s3.us-east-1.amazonaws.com/" . $offer['results'][0] : '';
                                            @endphp
                                            <!-- Mỗi item => center vertical với min-height -->
                                            <div class="d-flex flex-column align-items-center justify-content-center"
                                                 style="text-align:center; min-height:200px;">
                                                <h4 style="color:#5c8d33;">
                                                    {{ $offer['label'] }}
                                                </h4>
                                                <img src="{{ $thumbUrl }}"
                                                     alt="thumbnail"
                                                     class="thumb-image"
                                                     style="cursor:pointer; max-width:300px;"
                                                     data-bs-toggle="modal"
                                                     data-bs-target="#flipbookModal_sm_{{ $loop->index }}"/>

                                                @php
                                                    $firstImage = !empty($offer['results']) ? "https://digitaldogdirect.s3.us-east-1.amazonaws.com/" . $offer['results'][0] : '';
                                                @endphp
                                                    <!-- Modal -->
                                                <div class="modal fade" id="flipbookModal_sm_{{ $loop->index }}"
                                                     tabindex="-1"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-flipbook">
                                                        <!-- Sử dụng modal-fullscreen để fullscreen -->
                                                        <div
                                                            class="modal-content flipbook-content border border-white border-4"
                                                            style="background: #fff;">
                                                            <div class="modal-background"
                                                                 style="background-image: url('{{ $firstImage }}');"></div>
                                                            <div class="modal-header">
                                                                <h4 class="modal-title-custom"
                                                                    style="min-width: 200px">{{ $offer['label'] }}</h4>
                                                                <nav id="flipbook-toolbar">
                                                                    <ul style="list-style: none !important;">
                                                                        <li><a id="first_sm_{{ $loop->index }}"
                                                                               class="wowbook-first" href="#">First
                                                                                page</a></li>
                                                                        <li><a id="back_sm_{{ $loop->index }}"
                                                                               class="wowbook-back" href="#">Back</a>
                                                                        </li>
                                                                        <li><a id="next_sm_{{ $loop->index }}"
                                                                               class="wowbook-next" href="#">Next</a>
                                                                        </li>
                                                                        <li><a id="last_sm_{{ $loop->index }}"
                                                                               class="wowbook-last" href="#">Last
                                                                                page</a></li>
                                                                        <li><a id="zoomin_sm_{{ $loop->index }}"
                                                                               class="wowbook-zoomin"
                                                                               href="#">Zoom In</a></li>
                                                                        <li><a id="zoomout_sm_{{ $loop->index }}"
                                                                               class="wowbook-zoomout"
                                                                               href="#">Zoom Out</a></li>
                                                                        <li><a id="slideshow_sm_{{ $loop->index }}"
                                                                               class="wowbook-slideshow"
                                                                               href="#">Slide Show</a></li>
                                                                        <li><a id="flipsound_sm_{{ $loop->index }}"
                                                                               class="wowbook-flipsound"
                                                                               href="#">Flip sound</a></li>
                                                                        <li><a id="fullscreen_sm_{{ $loop->index }}"
                                                                               class="wowbook-fullscreen"
                                                                               href="#">Fullscreen</a></li>
                                                                        <li><a id="thumbs_sm_{{ $loop->index }}"
                                                                               class="wowbook-thumbs"
                                                                               href="#">Thumbs</a></li>
                                                                    </ul>
                                                                </nav>
                                                                <button type="button" class="btn-close btn-close-white"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>

                                                            <div id="new-flipbook" class="modal-body"
                                                                 style="position: relative;">
                                                                <!-- Container wowBook -->
                                                                <div id="wowbookContainer_sm_{{ $loop->index }}"
                                                                     style="width: 1000px; height: 600px; margin:auto;">
                                                                    @foreach($offer['results'] as $img)
                                                                        @php
                                                                            $fullUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$img}";
                                                                        @endphp
                                                                        <div class="page"
                                                                             data-image="{{ $fullUrl }}"></div>
                                                                    @endforeach
                                                                </div>
                                                                <div id="thumbs_holder_sm_{{ $loop->index }}"
                                                                     style="min-height: 120px"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end modal -->

                                                <!-- Khi modal show => init wowBook -->
                                                <script>
                                                    $(document).ready(function () {
                                                        // Lắng nghe sự kiện modal show
                                                        $('#flipbookModal_sm_{{ $loop->index }}').on('shown.bs.modal', function () {
                                                            // Kiểm tra nếu wowBook chưa init
                                                            if (!$("#wowbookContainer_sm_{{ $loop->index }}").data("wowBook")) {
                                                                $("#wowbookContainer_sm_{{ $loop->index }}").wowBook({
                                                                    width: 975,
                                                                    height: 650,
                                                                    centeredWhenClosed: true,
                                                                    hardcovers: true,
                                                                    turnPageDuration: 1200,
                                                                    flipSound: true,
                                                                    bookShadow: true,
                                                                    gutterShadow: true,
                                                                    shadowThreshold: 10,
                                                                    shadows: true,
                                                                    foldGradient: true,
                                                                    pageNumbers: true,
                                                                    firstPageNumber: 1,
                                                                    controls: {
                                                                        zoomIn: "#zoomin_sm_{{ $loop->index }}",
                                                                        zoomOut: "#zoomout_sm_{{ $loop->index }}",
                                                                        next: "#next_sm_{{ $loop->index }}",
                                                                        back: "#back_sm_{{ $loop->index }}",
                                                                        first: "#first_sm_{{ $loop->index }}",
                                                                        last: "#last_sm_{{ $loop->index }}",
                                                                        slideShow: "#slideshow_sm_{{ $loop->index }}",
                                                                        flipSound: "#flipsound_sm_{{ $loop->index }}",
                                                                        thumbnails: "#thumbs_sm_{{ $loop->index }}",
                                                                        fullscreen: "#fullscreen_sm_{{ $loop->index }}"
                                                                    },
                                                                    use3d: true,
                                                                    perspective: 4000,
                                                                    transparentPages: false,
                                                                    useTranslate3d: true,
                                                                    responsive: true,
                                                                    {{--scaleToFit: "#flipbookModal_sm_{{ $loop->index }}",--}}
                                                                    thumbnails: true,
                                                                    slideShow: false,
                                                                    fullscreen: true,
                                                                    mouseWheel: true,
                                                                    thumbnailsPosition: 'bottom',
                                                                    thumbnailsParent: "#thumbs_holder_sm_{{ $loop->index }}",
                                                                    onFullscreenError: function () {
                                                                        var msg = "Fullscreen failed.";
                                                                        if (self != top) msg = "The frame is blocking full screen mode. Click on 'remove frame' button above and try to go full screen again."
                                                                        alert(msg);
                                                                    },
                                                                }).css({
                                                                    'display': 'none',
                                                                    'margin': 'auto'
                                                                }).fadeIn(1000);
                                                            }
                                                        });

                                                        // Khi modal ẩn => tắt slideshow, v.v. (nếu cần)
                                                        $('#flipbookModal_sm_{{ $loop->index }}').on('hidden.bs.modal', function () {
                                                            let wb = $("#wowbookContainer_sm_{{ $loop->index }}").data("wowBook");
                                                            if (wb) {
                                                                // Dừng slideshow:
                                                                wb.stopSlideShow();
                                                                // Optionally: wb.destroy();
                                                                //    => Nếu muốn init lại từ đầu mỗi lần
                                                                //    => Nên cẩn thận performance
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        @endforeach
                                @endif
                            </div>

                                <!-- Cột PC -->
                                <div class="col-md-6 d-flex flex-column justify-content-center"
                                     style="gap:20px; border: 0px solid blue;">

                                @if(count($data->offers_pc) > 0)
                                        @foreach($data->offers_pc as $index => $offer)
                                            @php
                                                $jobNumber = $offer['offer']->Job_Number;
                                                 $thumbUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$jobNumber}_Thumb.jpg";
                                                 $firstImage = !empty($offer['results']) ? "https://digitaldogdirect.s3.us-east-1.amazonaws.com/" . $offer['results'][0] : '';
                                            @endphp
                                            <div class="d-flex flex-column align-items-center justify-content-center"
                                                 style="text-align:center; min-height:200px;">
                                                <h4 style="color:#5c8d33;">
                                                    {{ $offer['label'] }}
                                                </h4>
                                                    <div class="slider-big">
                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                                           data-lightbox-fifth="roadtrip">
                                                            <center><img
                                                                    src="{{$thumbUrl}}"
                                                                    class="thumb-image"
                                                                    style="max-width: 300px" alt=""></center>
                                                        </a>
                                                        <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][1]}}"
                                                           data-lightbox-fifth="roadtrip"
                                                           style="display:none;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <script src="/weekender_assets/js/modal_lightbox_fifth.min.js"></script>
                                            </div>
                                        @endforeach
                                @endif
                            </div>
                    </div>
                    @else
                        <p>No offers available at this time.</p>
                    @endif
                </div>

                <!-- Survey Tab (nếu có) -->
                @if(!empty($data->survey))
                    <div id="surveyTab" class="vertical-tab-content">
                        <h3>Survey</h3>
                        <p>Display your survey or survey link here.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <!-- Hidden logout form -->
    <form id="logout-form" action="{{ route('voyager.logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <script>
        function openTab(evt, tabName) {
            // Ẩn tất cả các .vertical-tab-content
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("vertical-tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                tabcontent[i].classList.remove("show");
            }
            // Bỏ active ở tất cả nút
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            // Hiện tab được click
            document.getElementById(tabName).style.display = "block";
            document.getElementById(tabName).classList.add("show");
            evt.currentTarget.classList.add("active");
        }

        // Mặc định mở tab đầu
        document.getElementById("defaultOpen").click();

        // Win/Loss toggle
        (function ($) {
            $(document).ready(function () {
                $('.pwsWinLoss').click(function (event) {
                    event.preventDefault();
                    var $promosWLoss = $('#promosWLoss');
                    if ($promosWLoss.hasClass('show')) {
                        $promosWLoss.removeClass('show').fadeOut("slow", function () {
                            $('#showHideWL').text("SHOW WIN LOSS");
                        });
                    } else {
                        $promosWLoss.css("display", "block");
                        $promosWLoss.addClass('show').fadeIn("slow", function () {
                            $('#showHideWL').text("HIDE WIN LOSS");
                        });
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
