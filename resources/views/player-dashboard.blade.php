@extends('layouts.app')
@section('content')
    <div class="row justify-content-center" style="padding: 50px;background: white">
        <form id="logout-form" action="{{ route('voyager.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="col-md-9">
            {{-- Offers Section --}}
            @if($data->offers && count($data->offers) > 0)
                <div class="row">
                    @foreach($data->offers as $offer)
                        @php
                            // Tạo link thumbnail, ví dụ 99991 => 99991_Thumb.jpg
                            $jobNumber = $offer['offer']->Job_Number;
                            $thumbUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$jobNumber}_Thumb.jpg";
                        @endphp

                        <div class="col-md-4" style="margin-bottom: 30px; text-align:center;">
                            <h5 style="color: #5c8d33;">{{ $offer['label'] }}</h5>

                            <!-- Ảnh thumbnail ngoài trang, bấm => mở modal -->
                            <img src="{{ $thumbUrl }}"
                                 alt="thumbnail"
                                 style="cursor:pointer; max-width:100%;"
                                 data-bs-toggle="modal"
                                 data-bs-target="#flipbookModal_{{ $loop->index }}"/>

                            <!-- Modal -->
                            <div class="modal fade" id="flipbookModal_{{ $loop->index }}" tabindex="-1"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-flipbook">
                                    <!-- Sử dụng modal-fullscreen để fullscreen -->
                                    <div class="modal-content flipbook-content" style="background: #fff;">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $offer['label'] }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>

                                        <div id="new-flipbook" class="modal-body" style="position: relative;">
                                            <!-- Thanh toolbar yoyapro -->
                                            <nav>
                                                <ul style="list-style: none !important;">
                                                    <li><a id="first_{{ $loop->index }}" class="wowbook-first" href="#">First
                                                            page</a></li>
                                                    <li><a id="back_{{ $loop->index }}" class="wowbook-back" href="#">Back</a>
                                                    </li>
                                                    <li><a id="next_{{ $loop->index }}" class="wowbook-next" href="#">Next</a>
                                                    </li>
                                                    <li><a id="last_{{ $loop->index }}" class="wowbook-last" href="#">Last
                                                            page</a></li>
                                                    <li><a id="zoomin_{{ $loop->index }}" class="wowbook-zoomin"
                                                           href="#">Zoom In</a></li>
                                                    <li><a id="zoomout_{{ $loop->index }}" class="wowbook-zoomout"
                                                           href="#">Zoom Out</a></li>
                                                    <li><a id="slideshow_{{ $loop->index }}" class="wowbook-slideshow"
                                                           href="#">Slide Show</a></li>
                                                    <li><a id="flipsound_{{ $loop->index }}" class="wowbook-flipsound"
                                                           href="#">Flip sound</a></li>
                                                    <li><a id="fullscreen_{{ $loop->index }}" class="wowbook-fullscreen"
                                                           href="#">Fullscreen</a></li>
                                                    <li><a id="thumbs_{{ $loop->index }}" class="wowbook-thumbs"
                                                           href="#">Thumbs</a></li>
                                                </ul>
                                            </nav>

                                            <!-- Container wowBook -->
                                            <div id="wowbookContainer_{{ $loop->index }}"
                                                 style="width: 1000px; height: 600px; margin:auto;">
                                                @foreach($offer['results'] as $img)
                                                    @php
                                                        $fullUrl = "https://digitaldogdirect.s3.us-east-1.amazonaws.com/{$img}";
                                                    @endphp
                                                    <div class="page" data-image="{{ $fullUrl }}"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end modal -->

                            <!-- Khi modal show => init wowBook -->
                            <script>
                                $(document).ready(function () {
                                    // Lắng nghe sự kiện modal show
                                    $('#flipbookModal_{{ $loop->index }}').on('shown.bs.modal', function () {
                                        // Kiểm tra nếu wowBook chưa init
                                        if (!$("#wowbookContainer_{{ $loop->index }}").data("wowBook")) {
                                            console.log("DEBUG: init wowBook cho offer index {{ $loop->index }}");

                                            $("#wowbookContainer_{{ $loop->index }}").wowBook({
                                                width: 800,
                                                height: 600,
                                                centeredWhenClosed: true,
                                                hardcovers: true,
                                                turnPageDuration: 1000,
                                                flipSound: true,
                                                controls: {
                                                    zoomIn: "#zoomin_{{ $loop->index }}",
                                                    zoomOut: "#zoomout_{{ $loop->index }}",
                                                    next: "#next_{{ $loop->index }}",
                                                    back: "#back_{{ $loop->index }}",
                                                    first: "#first_{{ $loop->index }}",
                                                    last: "#last_{{ $loop->index }}",
                                                    slideShow: "#slideshow_{{ $loop->index }}",
                                                    flipSound: "#flipsound_{{ $loop->index }}",
                                                    thumbnails: "#thumbs_{{ $loop->index }}",
                                                    fullscreen: "#fullscreen_{{ $loop->index }}"
                                                },
                                                use3d: true,
                                                scaleToFit: false,
                                                onFullscreenError: function () {
                                                    alert("Fullscreen failed.");
                                                }
                                            }).css({'margin': 'auto'});
                                        }
                                    });

                                    // Khi modal ẩn => tắt slideshow, v.v. (nếu cần)
                                    $('#flipbookModal_{{ $loop->index }}').on('hidden.bs.modal', function () {
                                        let wb = $("#wowbookContainer_{{ $loop->index }}").data("wowBook");
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
