@extends('layouts.app')
@section('content')
    <div class="row justify-content-center" style="padding: 50px;background: white">
        <form id="logout-form" action="{{ route('voyager.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="col-md-9">
            {{-- Offers Section --}}
            @if($data->offers_sm || $data->offers_pc)
                <div class="row">
                    @if(count($data->offers_sm) > 0)
                        <div class="row justify-content-center">
                            @foreach($data->offers_sm as $index => $offer)
                        @php
                            // Tạo link thumbnail, ví dụ 99991 => 99991_Thumb.jpg
                            $jobNumber = $offer['offer']->Job_Number;
                            $thumbUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$jobNumber}_Thumb.jpg";
                            $firstImage = !empty($offer['results']) ? "https://digitaldogdirect.s3.us-east-1.amazonaws.com/" . $offer['results'][0] : '';
                        @endphp

                        <div class="col-md-4" style="margin-bottom: 30px; text-align:center;">
                            <h5 style="color: #5c8d33;">{{ $offer['label'] }}</h5>

                            <!-- Ảnh thumbnail ngoài trang, bấm => mở modal -->
                            <img src="{{ $thumbUrl }}"
                                 alt="thumbnail"
                                 style="cursor:pointer; max-width:300px;"
                                 data-bs-toggle="modal"
                                 data-bs-target="#flipbookModal_sm_{{ $loop->index }}"/>

                            @php
                                $firstImage = !empty($offer['results']) ? "https://digitaldogdirect.s3.us-east-1.amazonaws.com/" . $offer['results'][0] : '';
                            @endphp
                                <!-- Modal -->
                            <div class="modal fade" id="flipbookModal_sm_{{ $loop->index }}" tabindex="-1"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-flipbook">
                                    <!-- Sử dụng modal-fullscreen để fullscreen -->
                                    <div class="modal-content flipbook-content border border-white border-4" style="background: #fff;">
                                        <div class="modal-background" style="background-image: url('{{ $firstImage }}');"></div>
                                        <div class="modal-header">
                                            <h5 class="modal-title-custom" style="min-width: 200px">{{ $offer['label'] }}</h5>
                                            <nav id="flipbook-toolbar">
                                                <ul style="list-style: none !important;">
                                                    <li><a id="first_sm_{{ $loop->index }}" class="wowbook-first" href="#">First
                                                            page</a></li>
                                                    <li><a id="back_sm_{{ $loop->index }}" class="wowbook-back" href="#">Back</a>
                                                    </li>
                                                    <li><a id="next_sm_{{ $loop->index }}" class="wowbook-next" href="#">Next</a>
                                                    </li>
                                                    <li><a id="last_sm_{{ $loop->index }}" class="wowbook-last" href="#">Last
                                                            page</a></li>
                                                    <li><a id="zoomin_sm_{{ $loop->index }}" class="wowbook-zoomin"
                                                           href="#">Zoom In</a></li>
                                                    <li><a id="zoomout_sm_{{ $loop->index }}" class="wowbook-zoomout"
                                                           href="#">Zoom Out</a></li>
                                                    <li><a id="slideshow_sm_{{ $loop->index }}" class="wowbook-slideshow"
                                                           href="#">Slide Show</a></li>
                                                    <li><a id="flipsound_sm_{{ $loop->index }}" class="wowbook-flipsound"
                                                           href="#">Flip sound</a></li>
                                                    <li><a id="fullscreen_sm_{{ $loop->index }}" class="wowbook-fullscreen"
                                                           href="#">Fullscreen</a></li>
                                                    <li><a id="thumbs_sm_{{ $loop->index }}" class="wowbook-thumbs"
                                                           href="#">Thumbs</a></li>
                                                </ul>
                                            </nav>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>

                                        <div id="new-flipbook" class="modal-body" style="position: relative;">
                                            <!-- Container wowBook -->
                                            <div id="wowbookContainer_sm_{{ $loop->index }}"
                                                 style="width: 1000px; height: 600px; margin:auto;">
                                                @foreach($offer['results'] as $img)
                                                    @php
                                                        $fullUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$img}";
                                                    @endphp
                                                    <div class="page" data-image="{{ $fullUrl }}"></div>
                                                @endforeach
                                            </div>
                                            <div id="thumbs_holder_sm_{{ $loop->index }}" style="min-height: 120px"></div>
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
                                            }).css({'display': 'none', 'margin': 'auto'}).fadeIn(1000);
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
                        </div>
                    @endif
                    @if(count($data->offers_pc) > 0)
                        <div class="row justify-content-center">
                            @foreach($data->offers_pc as $index => $offer)
                        @php
                            $jobNumber = $offer['offer']->Job_Number;
                             $thumbUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$jobNumber}_Thumb.jpg";
                             $firstImage = !empty($offer['results']) ? "https://digitaldogdirect.s3.us-east-1.amazonaws.com/" . $offer['results'][0] : '';
                        @endphp
                                <div class="col-sm-4">
                                    <div class="modal-wrap">
                                        <h4 style="color: #5c8d33;text-align: center;">{{$offer['label']}}</h4>

                                        <div class="slider-big">
                                            <a href="https://digitaldogdirect.s3.us-east-1.amazonaws.com/{{$offer['results'][0]}}"
                                               data-lightbox-fifth="roadtrip">
                                                <center><img
                                                        src="{{$thumbUrl}}"
                                                        style="max-width: 300px" alt=""></center>
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
                            @endforeach
                        </div>
                    @endif
                </div>
            @else
                <p>No offers available at this time.</p>
            @endif
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
