<?php

namespace App\Http\Controllers\Voyager;

use App\Data;
use App\DecemberCore;
use App\Flipbook;
use App\Host;
use App\JulyCore;
use App\JuneCoreSM;
use App\JulyCorePC;
use App\AugustCore;
use App\AprilCore;
use App\MayCore;
use App\JuneCore;
use App\SeptemberCore;
use App\JanuaryCore;
use App\OctoberCore;
use App\NovemberCore;
use App\FebruaryCore;
use App\MarchCore;
use App\User;
use App\WeekenderFlipbook;
use App\MayCoreSM;
use App\MayCorePC;
use App\WinLoss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use League\Flysystem\Util;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Controller;
use Carbon\Carbon;

class VoyagerController extends \TCG\Voyager\Http\Controllers\VoyagerController
{
    public function __construct()
    {
      $this->middleware(['auth', 'verified']);
    }

    public function makeImageWinLoss($accountId, $winLoss)
    {
        $img = Image::make('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/win_loss_statments/W2G.png');

        $img->text($accountId, 720, 375, function ($font) {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(68);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->CSHRV_FName . ' ' . $winLoss->CSHRV_LName, 720, 470, function ($font) {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->CSHRV_Address_01, 720, 565, function ($font) {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->CSHRV_City . ' ' . $winLoss->CSHRV_State . ' ' . $winLoss->CSHRV_Postal_Code, 720, 660, function ($font) {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->CSHRV_FName . ',', 420, 1195, function ($font) {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->CSHRV_Year.'*', 2400, 1510, function ($font) {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text('$ ' . $winLoss->CSHRV_Win_Loss, 920, 1810, function ($font) {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });

        if (!File::exists('WinLoss/ImageByAccountId/' . $accountId)) {
            File::makeDirectory('WinLoss/ImageByAccountId/' . $accountId, $mode = 0777, true, true);
            $img->save(public_path('WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->CSHRV_Year . '.jpg'));
        } else {
//            if (!File::exists('WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->BDD_ID . '.jpg'))
            {
                $img->save(public_path('WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->CSHRV_Year . '.jpg'));
            }
        }
    }

    public function makeImageForSeptemberCorePC($accountId, $imageTextData, $fileName)
    {
        $img = Image::make('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/september_2021/hi_res/' . $fileName . '.jpg');
        $img->text($imageTextData, 180, 270, function ($font) {
            $font->file(public_path('PostCardImage/SeptemberCorePC/fonts/steelfish rg.ttf'));
            $font->size(120);
            $font->color('#000');
            $font->align('left');
            $font->angle(0);
        });
        if (!File::exists('PostCardImage/SeptemberCorePC/ImageByAccountId/' . $accountId . '.jpg')) {
            $img->save(public_path('PostCardImage/SeptemberCorePC/ImageByAccountId/' . $accountId . '.jpg'));
        }
    }

    public function makeImageForMarhAlmostTherePC($imageTextData, $fileName)
    {
        $img = Image::make('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/march_2022/hi_res/' . $fileName . '.jpg');
        $img->text($imageTextData, 580, 760, function ($font) {
            $font->file(public_path('/MarchAlmostThere/fontb.ttf'));
            $font->size(70);
            $font->color('#000');
            $font->align('center');
            $font->angle(0);
        });
        if (!File::exists('/MarchAlmostThere/Images/' . $fileName . '.jpg')) {
            $img->save(public_path('/MarchAlmostThere/Images/' . $fileName . '.jpg'));
        }
    }

    //Function Get data by Account Id
    public function getDataByAccountId($accountId)
    {
        //define data return
        $data = new \stdClass();
        $data->first_name = '';
        $data->last_name = '';
        $data->CSHRV_Account = $accountId;
        $data->CSHRV_Tier = '';
        $data->CSHRV_MTD_Points = 0;
        $data->CSHRV_Points = 0;
        $data->CSHRV_Comp_Dollars = 0;
        $data->CSHRV_Points_Next_Tier = 0;
        $data->CSHRV_Poker_Rating = 0;
        $data->updated_at = now();

        //Flag to check if have SM or PC data
        $data->flgSM = 0;
        $data->flgPC = 0;
        $data->flgWL = 0;

        //Define Host
        $data->hostHost_Name = '';
        $data->hostMarketing_Name = 'Casino Host';
        $data->hostTitle = 'Casino Host';
        $data->hostPhone = '877.602.0711';
        $data->hostCell_Phone = '';
        $data->hostEmail = '';
        $data->hostHost_ID = '';
        $data->hostImage_Name = 'default.jpg';

        //Get data from Datas table
        $datas = Data::where('CSHRV_Player_ID', $accountId)->first();
        if ($datas) {
            $data->first_name = $datas->CSHRV_FName;
            $data->last_name = $datas->CSHRV_LName;
            $data->CSHRV_Tier = $datas->CSHRV_Tier;
            $data->CSHRV_MTD_Points = $datas->CSHRV_MTD_Points;
            if ($datas->CSHRV_Points !== '')
                $data->CSHRV_Points = $datas->CSHRV_Points;
            $data->CSHRV_Comp_Dollars = $datas->CSHRV_Comp_Dollars;
            $data->CSHRV_Points_Next_Tier = $datas->CSHRV_Points_Next_Tier;
            $data->CSHRV_Poker_Rating = $datas->CSHRV_Poker_Rating;
            $data->CSHRV_Host_Name = $datas->CSHRV_Host_Name;
            //Get Host

            $host = Host::where('Host_Name', $data->CSHRV_Host_Name)->first();
            if ($host) {
                $data->hostHost_Name = $host->Host_Name;
                $data->hostMarketing_Name = $host->Marketing_Name;
                $data->hostTitle = $host->Title;
                $data->hostPhone = $host->Phone;
                $data->hostCell_Phone = $host->Cell_Phone;
                $data->hostEmail = $host->Email;
                $data->hostHost_ID = $host->Host_ID;
                $data->hostImage_Name = $host->Image_Name;
                if($host->Host_Name === 'Dillon, Grace' || $host->Host_Name === 'Whipple, Kevin D')
                {
                    $data->hostImage_Name = 'default.jpg';
                    $data->hostPhone = '877.602.0711';
                }
            }
        }


        //Get data from WinLoss table
        $data->winLoss = WinLoss::where('CSHRV_Player_ID', $accountId)->get();
        //check if have data
        if (count($data->winLoss) > 0)
            $data->flgWL = 1;
        //Make Images For WinLoss
        foreach ($data->winLoss as $winLoss) {
            $this->makeImageWinLoss($accountId, $winLoss);
            $winLoss->imgLink = '/WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->CSHRV_Year . '.jpg';
        }

        //Get data from November2021 table
        //Define data type flag

        $data->NovemberSundayGiftPC = 0;
        $data->NovemberSundayGiftPCLabel = '';
        $data->NovemberHEGiftPC = 0;
        $data->NovemberHEGiftPCLabel = '';
        $data->NovemberCoreSM = 0;
        $data->NovemberCoreSMLabel = '';
        $data->NovemberCorePC = 0;
        $data->NovemberCorePCLabel = '';
        $data->NovemberHighLimitPC = 0;
        $data->NovemberHighLimitPCLabel = '';
        $data->NovemberMYSTERYPC = 0;
        $data->NovemberMYSTERYPCLabel = '';


        $dataFromNovember2021 = NovemberCore::where('CSHRV_Account', $accountId)->get();
        if ($dataFromNovember2021) {
            foreach ($dataFromNovember2021 as $singleDataFromNovember2021) {
                //CoreSM
                if ($singleDataFromNovember2021->CSHRV_Mailer_Type === "Core SM") {
                    $data->NovemberCoreSM = 0;
                    $data->NovemberCoreSMLabel = $singleDataFromNovember2021->CSHRV_Label;
                    $data->flgSM = 1;

                    $data->NovemberCoreSMResult1 = $singleDataFromNovember2021->CSHRV_Img_Page01 . ".jpg";
                    $data->NovemberCoreSMResult2 = $singleDataFromNovember2021->CSHRV_Img_Page02 . ".jpg";
                    $data->NovemberCoreSMResult3 = $singleDataFromNovember2021->CSHRV_Img_Page03 . ".jpg";
                    $data->NovemberCoreSMResult4 = $singleDataFromNovember2021->CSHRV_Img_Page04 . ".jpg";
                    $data->NovemberCoreSMResult5 = $singleDataFromNovember2021->CSHRV_Img_Page05 . ".jpg";
                    $data->NovemberCoreSMResult6 = $singleDataFromNovember2021->CSHRV_Img_Page06 . ".jpg";
                    $data->NovemberCoreSMResult7 = $singleDataFromNovember2021->CSHRV_Img_Page07 . ".jpg";
                    $data->NovemberCoreSMResult8 = $singleDataFromNovember2021->CSHRV_Img_Page08 . ".jpg";
                }

            }
        }

        $data->MarchCorePC = 0;
        $data->MarchCorePCLabel = '';
        $data->MarchSM = 0;
        $data->MarchSMLabel = '';

        $data->MarchHotSeatPC = 0;
        $data->MarchHotSeatPCLabel = '';

        $data->MarchAlmostTherePC = 0;
        $data->MarchAlmostTherePCLabel = '';

        $dataFromMarch2021 = MarchCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($dataFromMarch2021) {
            foreach ($dataFromMarch2021 as $singleDataFromMarch2021) {
                //CorePC
                if ($singleDataFromMarch2021->CSHRV_Mailer_Type === "CORE_PC") {
                    $data->MarchCorePC = 0;
                    $data->MarchCorePCLabel = $singleDataFromMarch2021->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->MarchCorePCResult1 = $singleDataFromMarch2021->CSHRV_Img_Page01 . ".jpg";
                    $data->MarchCorePCResult2 = $singleDataFromMarch2021->CSHRV_Img_Page02 . ".jpg";

                }
                if ($singleDataFromMarch2021->CSHRV_Mailer_Type === "HOT_SEAT_PC") {
                    $data->MarchHotSeatPC = 0;
                    $data->MarchHotSeatPCLabel = $singleDataFromMarch2021->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->MarchHotSeatPCResult1 = $singleDataFromMarch2021->CSHRV_Img_Page01 . ".jpg";
                    $data->MarchHotSeatPCResult2 = $singleDataFromMarch2021->CSHRV_Img_Page02 . ".jpg";

                }
                if ($singleDataFromMarch2021->CSHRV_Mailer_Type === "ALMOST_THERE_PC") {
//                    $data->MarchAlmostTherePC = 1;
//                    $data->MarchAlmostTherePCLabel = $singleDataFromMarch2021->CSHRV_Label;
//                    $data->flgPC = 1;
                    $this->makeImageForMarhAlmostTherePC($singleDataFromMarch2021->CSHRV_Reward_Variable, $singleDataFromMarch2021->CSHRV_Img_Page02);
                    $data->MarchAlmostTherePCResult1 = $singleDataFromMarch2021->CSHRV_Img_Page01 . ".jpg";
                    $data->MarchAlmostTherePCResult2 = $singleDataFromMarch2021->CSHRV_Img_Page02 . ".jpg";

                }
                if ($singleDataFromMarch2021->CSHRV_Mailer_Type === "CORE_SM") {
                    $data->MarchSM = 0;
                    $data->MarchSMLabel = $singleDataFromMarch2021->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->MarchCoreSMResult1 = $singleDataFromMarch2021->CSHRV_Img_Page01 . ".jpg";
                    $data->MarchCoreSMResult2 = $singleDataFromMarch2021->CSHRV_Img_Page02 . ".jpg";
                    $data->MarchCoreSMResult3 = $singleDataFromMarch2021->CSHRV_Img_Page03 . ".jpg";
                    $data->MarchCoreSMResult4 = $singleDataFromMarch2021->CSHRV_Img_Page04 . ".jpg";
                    $data->MarchCoreSMResult5 = $singleDataFromMarch2021->CSHRV_Img_Page05 . ".jpg";
                    $data->MarchCoreSMResult6 = $singleDataFromMarch2021->CSHRV_Img_Page06 . ".jpg";

                }


            }
        }

        $data->BSH_Apr2023_Poker_PC = 0;
        $data->BSH_Apr2023_Poker_PCLabel = '';

        $data->APR2023_CORE_SM = 0;
        $data->APR2023_CORE_SMLabel = '';

        $data->BSH_APR2023_CORE_PC = 0;
        $data->BSH_APR2023_CORE_PCLabel = '';

        $dataFromApril = AprilCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($dataFromApril) {
            foreach ($dataFromApril as $singleDataFromApril) {
                //CorePC

                if ($singleDataFromApril->CSHRV_Mailer_Type === "BSH_Apr2023_Poker_PC") {
                    $data->BSH_Apr2023_Poker_PC = 1;
                    $data->BSH_Apr2023_Poker_PCLabel = $singleDataFromApril->CSHRV_Label;
                    $data->flgPC = 1;

                    $data->BSH_Apr2023_Poker_PCResult1 = $singleDataFromApril->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Apr2023_Poker_PCResult2 = $singleDataFromApril->CSHRV_Img_Page02 . ".jpg";

                }

                if ($singleDataFromApril->CSHRV_Mailer_Type === "APR2023_CORE_SM") {
                    $data->APR2023_CORE_SM = 1;
                    $data->APR2023_CORE_SMLabel = $singleDataFromApril->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->APR2023_CORE_SMResult1 = $singleDataFromApril->CSHRV_Img_Page01 . ".jpg";
                    $data->APR2023_CORE_SMResult2 = $singleDataFromApril->CSHRV_Img_Page02 . ".jpg";
                    $data->APR2023_CORE_SMResult3 = $singleDataFromApril->CSHRV_Img_Page03 . ".jpg";
                    $data->APR2023_CORE_SMResult4 = $singleDataFromApril->CSHRV_Img_Page04 . ".jpg";
                    $data->APR2023_CORE_SMResult5 = $singleDataFromApril->CSHRV_Img_Page05 . ".jpg";
                    $data->APR2023_CORE_SMResult6 = $singleDataFromApril->CSHRV_Img_Page06 . ".jpg";
                }

                if ($singleDataFromApril->CSHRV_Mailer_Type === "BSH_APR2023_CORE_PC") {
                    $data->BSH_APR2023_CORE_PC = 1;
                    $data->BSH_APR2023_CORE_PCLabel = $singleDataFromApril->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_APR2023_CORE_PCResult1 = $singleDataFromApril->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_APR2023_CORE_PCResult2 = $singleDataFromApril->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }

        $data->FebruaryCorePC = 0;
        $data->FebruaryCorePCLabel = '';
        $data->FebruaryCoreSM = 0;
        $data->FebruaryCoreSMLabel = '';
        $data->February2ND_CRUISE_PC = 0;
        $data->February2ND_CRUISE_PCLabel = '';

        //get data from May

        $data->MAY2022_CORE_PC = 0;
        $data->MAY2022_CORE_PCLabel = '';

        $data->MAY2022_CORE_SM = 0;
        $data->MAY2022_CORE_SMLabel = '';

        $data->May_Jackpot_Booster_PC = 0;
        $data->May_Jackpot_Booster_PCLabel = '';

        $data->May_Supplemental_PC = 0;
        $data->May_Supplemental_PCLabel = '';

        $data->April_Inactive_PC = 0;
        $data->April_Inactive_PCLabel = '';

        // JOB 	212694_MAY2023_CORE_SM
        $data->MAY2023_CORE_SM = 0;
        $data->MAY2023_CORE_SMLabel = '';

        // JOB 	212695_MAY2023_CORE_PC
        $data->BSH_MAY2023_CORE_PC = 0;
        $data->BSH_MAY2023_CORE_PCLabel = '';

        // JOB 	212698_MAY2023_2ND_CHANCE_CRUISE_PC
        $data->BSH_May2023_2nd_Chance_Cruise_PC = 0;
        $data->BSH_May2023_2nd_Chance_Cruise_PCLabel = '';

        // JOB 	213487_MAY2023_MINI_BAC_INACTIVE_PC
        $data->BSH_MAY2023_MINI_BAC_PC = 0;
        $data->BSH_MAY2023_MINI_BAC_PCLabel = '';



        $datasFromMay = MayCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromMay) {
            foreach ($datasFromMay as $dataFromMay) {
                //CorePC
                if ($dataFromMay->CSHRV_Mailer_Type === "MAY2022_CORE_PC") {
                    $data->MAY2022_CORE_PC = 1;
                    $data->MAY2022_CORE_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;

                    $data->MAY2022_CORE_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->MAY2022_CORE_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";

                }

                if ($dataFromMay->CSHRV_Mailer_Type === "May_Jackpot_Booster_PC") {
                    $data->May_Jackpot_Booster_PC = 1;
                    $data->May_Jackpot_Booster_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->May_Jackpot_Booster_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->May_Jackpot_Booster_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";

                }

                if ($dataFromMay->CSHRV_Mailer_Type === "May_Supplemental_PC") {
                    $data->May_Supplemental_PC = 1;
                    $data->May_Supplemental_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->May_Supplemental_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->May_Supplemental_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";

                }

                if ($dataFromMay->CSHRV_Mailer_Type === "MAY2022_CORE_SM") {
                    $data->MAY2022_CORE_SM = 1;
                    $data->MAY2022_CORE_SMLabel = $dataFromMay->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->MAY2022_CORE_SMResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->MAY2022_CORE_SMResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                    $data->MAY2022_CORE_SMResult3 = $dataFromMay->CSHRV_Img_Page03 . ".jpg";
                    $data->MAY2022_CORE_SMResult4 = $dataFromMay->CSHRV_Img_Page04 . ".jpg";
                    $data->MAY2022_CORE_SMResult5 = $dataFromMay->CSHRV_Img_Page05 . ".jpg";
                    $data->MAY2022_CORE_SMResult6 = $dataFromMay->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromMay->CSHRV_Mailer_Type === "April_Inactive_PC") {
                    $data->April_Inactive_PC = 1;
                    $data->April_Inactive_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->April_Inactive_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->April_Inactive_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                    $data->April_Inactive_PCResult3 = $dataFromMay->CSHRV_Img_Page03 . ".jpg";
                    $data->April_Inactive_PCResult4 = $dataFromMay->CSHRV_Img_Page04 . ".jpg";
                   }


                   if ($dataFromMay->CSHRV_Mailer_Type === "MAY2023_CORE_SM") {
                    $data->MAY2023_CORE_SM = 1;
                    $data->MAY2023_CORE_SMLabel = $dataFromMay->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->MAY2023_CORE_SMResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->MAY2023_CORE_SMResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                    $data->MAY2023_CORE_SMResult3 = $dataFromMay->CSHRV_Img_Page03 . ".jpg";
                    $data->MAY2023_CORE_SMResult4 = $dataFromMay->CSHRV_Img_Page04 . ".jpg";
                    $data->MAY2023_CORE_SMResult5 = $dataFromMay->CSHRV_Img_Page05 . ".jpg";
                    $data->MAY2023_CORE_SMResult6 = $dataFromMay->CSHRV_Img_Page06 . ".jpg";
                }


                if ($dataFromMay->CSHRV_Mailer_Type === "BSH_MAY2023_CORE_PC") {
                    $data->BSH_MAY2023_CORE_PC = 1;
                    $data->BSH_MAY2023_CORE_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_MAY2023_CORE_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_MAY2023_CORE_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                    $data->BSH_MAY2023_CORE_PCResult3 = $dataFromMay->CSHRV_Img_Page03 . ".jpg";
                    $data->BSH_MAY2023_CORE_PCResult4 = $dataFromMay->CSHRV_Img_Page04 . ".jpg";
                    $data->BSH_MAY2023_CORE_PCResult5 = $dataFromMay->CSHRV_Img_Page05 . ".jpg";
                    $data->BSH_MAY2023_CORE_PCResult6 = $dataFromMay->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromMay->CSHRV_Mailer_Type === "BSH_May2023_2nd_Chance_Cruise_PC") {
                    $data->BSH_May2023_2nd_Chance_Cruise_PC = 1;
                    $data->BSH_May2023_2nd_Chance_Cruise_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_May2023_2nd_Chance_Cruise_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_May2023_2nd_Chance_Cruise_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromMay->CSHRV_Mailer_Type === "BSH_MAY2023_MINI_BAC_PC") {
                    $data->BSH_MAY2023_MINI_BAC_PC = 1;
                    $data->BSH_MAY2023_MINI_BAC_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_MAY2023_MINI_BAC_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_MAY2023_MINI_BAC_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                }


            }
        }

        $data->JUN2022_CORE_SM = 0;
        $data->JUN2022_CORE_SMLabel = '';

        $data->JUN2022_CORE_PC = 0;
        $data->JUN2022_CORE_PCLabel = '';

        $data->June_Cruise_PC = 0;
        $data->June_Cruise_PCLabel = '';

        $data->June_Dinner_PC = 0;
        $data->June_Dinner_PCLabel = '';

        $data->June_Supplemental_PC = 0;
        $data->June_Supplemental_PCLabel = '';

        $data->BSH_JUN2023_CORE_SM_6PG = 0;
        $data->BSH_JUN2023_CORE_SM_6PGLabel = '';

        $datasFromJune = JuneCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromJune) {
            foreach ($datasFromJune as $dataFromJune) {
                if ($dataFromJune->CSHRV_Mailer_Type === "JUN2022_CORE_SM") {
                    $data->JUN2022_CORE_SM = 1;
                    $data->JUN2022_CORE_SMLabel = $dataFromJune->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->JUN2022_CORE_SMResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->JUN2022_CORE_SMResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                    $data->JUN2022_CORE_SMResult3 = $dataFromJune->CSHRV_Img_Page03 . ".jpg";
                    $data->JUN2022_CORE_SMResult4 = $dataFromJune->CSHRV_Img_Page04 . ".jpg";
                    $data->JUN2022_CORE_SMResult5 = $dataFromJune->CSHRV_Img_Page05 . ".jpg";
                    $data->JUN2022_CORE_SMResult6 = $dataFromJune->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "JUN2022_CORE_PC") {
                    $data->JUN2022_CORE_PC = 1;
                    $data->JUN2022_CORE_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->JUN2022_CORE_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->JUN2022_CORE_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "June_Cruise_PC") {
                    $data->June_Cruise_PC = 1;
                    $data->June_Cruise_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->June_Cruise_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->June_Cruise_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "June_Dinner_PC") {
                    $data->June_Dinner_PC = 1;
                    $data->June_Dinner_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->June_Dinner_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->June_Dinner_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "June_Supplemental_PC") {
                    $data->June_Supplemental_PC = 1;
                    $data->June_Supplemental_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->June_Supplemental_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->June_Supplemental_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "BSH_JUN2023_CORE_SM_6PG") {
                    $data->BSH_JUN2023_CORE_SM_6PG = 1;
                    $data->BSH_JUN2023_CORE_SM_6PGLabel = $dataFromJune->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->BSH_JUN2023_CORE_SM_6PGResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_JUN2023_CORE_SM_6PGResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                    $data->BSH_JUN2023_CORE_SM_6PGResult3 = $dataFromJune->CSHRV_Img_Page03 . ".jpg";
                    $data->BSH_JUN2023_CORE_SM_6PGResult4 = $dataFromJune->CSHRV_Img_Page04 . ".jpg";
                    $data->BSH_JUN2023_CORE_SM_6PGResult5 = $dataFromJune->CSHRV_Img_Page05 . ".jpg";
                    $data->BSH_JUN2023_CORE_SM_6PGResult6 = $dataFromJune->CSHRV_Img_Page06 . ".jpg";
                }
            }
        }


        //get data from august core
        $data->August_POU_Inactive_PC = 0;
        $data->August_POU_Inactive_PCLabel = '';

        $data->August_Player_Party = 0;
        $data->August_Player_PartyLabel = '';

        $data->AUGUST2022_CORE_PC = 0;
        $data->AUGUST2022_CORE_PCLabel = '';

        $data->August2022_CORE_SM = 0;
        $data->August2022_CORE_SMLabel = '';

        $data->August_POU_Qualifier_0613_PC = 0;
        $data->August_POU_Qualifier_0613_PCLabel = '';

        $data->August2022_Crossover_SM = 0;
        $data->August2022_Crossover_SMLabel = '';

        $data->August_POU_Qualifier_0627_PC = 0;
        $data->August_POU_Qualifier_0627_PCLabel = '';

        $data->AUGUST2022_CORE_SM = 0;
        $data->AUGUST2022_CORE_SMLabel = '';

        $data->August_POU_Qualifier_0715_PC = 0;
        $data->August_POU_Qualifier_0715_PCLabel = '';

        $data->August2022_Inactive_PC = 0;
        $data->August2022_Inactive_PCLabel = '';

        $data->AUGUST2022_HOST_DINNER_PC = 0;
        $data->AUGUST2022_HOST_DINNER_PCLabel = '';

        $datasFromAugust = AugustCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromAugust) {
            foreach ($datasFromAugust as $dataFromAugust) {
                if ($dataFromAugust->CSHRV_Mailer_Type === "AUGUST2022_CORE_SM") {
                    $data->AUGUST2022_CORE_SM = 1;
                    $data->AUGUST2022_CORE_SMLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->AUGUST2022_CORE_SMResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->AUGUST2022_CORE_SMResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                    $data->AUGUST2022_CORE_SMResult3 = $dataFromAugust->CSHRV_Img_Page03 . ".jpg";
                    $data->AUGUST2022_CORE_SMResult4 = $dataFromAugust->CSHRV_Img_Page04 . ".jpg";
                    $data->AUGUST2022_CORE_SMResult5 = $dataFromAugust->CSHRV_Img_Page05 . ".jpg";
                    $data->AUGUST2022_CORE_SMResult6 = $dataFromAugust->CSHRV_Img_Page06 . ".jpg";
                }
                //disable
                if ($dataFromAugust->CSHRV_Mailer_Type === "August2022_Crossover_SM") {
                    $data->August2022_Crossover_SM = 0;
                    $data->August2022_Crossover_SMLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->August2022_Crossover_SMResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->August2022_Crossover_SMResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                    $data->August2022_Crossover_SMResult3 = $dataFromAugust->CSHRV_Img_Page03 . ".jpg";
                    $data->August2022_Crossover_SMResult4 = $dataFromAugust->CSHRV_Img_Page04 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "August_POU_Inactive_PC") {
                    $data->August_POU_Inactive_PC = 1;
                    $data->August_POU_Inactive_PCLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->August_POU_Inactive_PCResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->August_POU_Inactive_PCResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "August_POU_Qualifier_0627_PC") {
                    $data->August_POU_Qualifier_0627_PC = 1;
                    $data->August_POU_Qualifier_0627_PCLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->August_POU_Qualifier_0627_PCResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->August_POU_Qualifier_0627_PCResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "August_POU_Qualifier_0613_PC") {
                    $data->August_POU_Qualifier_0613_PC = 1;
                    $data->August_POU_Qualifier_0613_PCLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->August_POU_Qualifier_0613_PCResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->August_POU_Qualifier_0613_PCResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "August_Player_Party") {
                    $data->August_Player_Party = 1;
                    $data->August_Player_PartyLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->August_Player_PartyResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->August_Player_PartyResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "AUGUST2022_CORE_PC") {
                    $data->AUGUST2022_CORE_PC = 1;
                    $data->AUGUST2022_CORE_PCLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->AUGUST2022_CORE_PCResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->AUGUST2022_CORE_PCResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "August_POU_Qualifier_0715_PC") {
                    $data->August_POU_Qualifier_0715_PC = 1;
                    $data->August_POU_Qualifier_0715_PCLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->August_POU_Qualifier_0715_PCResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->August_POU_Qualifier_0715_PCResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "August2022_Inactive_PC") {
                    $data->August2022_Inactive_PC = 1;
                    $data->August2022_Inactive_PCLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->August2022_Inactive_PCResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->August2022_Inactive_PCResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromAugust->CSHRV_Mailer_Type === "AUGUST2022_HOST_DINNER_PC") {
                    $data->AUGUST2022_HOST_DINNER_PC = 1;
                    $data->AUGUST2022_HOST_DINNER_PCLabel = $dataFromAugust->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->AUGUST2022_HOST_DINNER_PCResult1 = $dataFromAugust->CSHRV_Img_Page01 . ".jpg";
                    $data->AUGUST2022_HOST_DINNER_PCResult2 = $dataFromAugust->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }
        //get data from September core
        $data->SEPT2022_CORE_PC = 0;
        $data->SEPT2022_CORE_PCLabel = '';

        $data->SEPTEMBER2022_HOST_DINNER_PC = 0;
        $data->SEPTEMBER2022_HOST_DINNER_PCLabel = '';

        $data->SEPT2022_CORE_SM = 0;
        $data->SEPT2022_CORE_SMLabel = '';

        $data->Sept2022_Crossover_SM = 0;
        $data->Sept2022_Crossover_SMLabel = '';

        $data->Sept2022_Free_Slot_Pull = 0;
        $data->Sept2022_Free_Slot_PullLabel = '';

        $datasFromSeptember = SeptemberCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromSeptember) {
            foreach ($datasFromSeptember as $dataFromSeptember) {
                if ($dataFromSeptember->CSHRV_Mailer_Type === "SEPT2022_CORE_PC") {
                    $data->SEPT2022_CORE_PC = 1;
                    $data->SEPT2022_CORE_PCLabel = $dataFromSeptember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->SEPT2022_CORE_PCResult1 = $dataFromSeptember->CSHRV_Img_Page01 . ".jpg";
                    $data->SEPT2022_CORE_PCResult2 = $dataFromSeptember->CSHRV_Img_Page02 . ".jpg";
                }
                if ($dataFromSeptember->CSHRV_Mailer_Type === "SEPTEMBER2022_HOST_DINNER_PC") {
                    $data->SEPTEMBER2022_HOST_DINNER_PC = 1;
                    $data->SEPTEMBER2022_HOST_DINNER_PCLabel = $dataFromSeptember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->SEPTEMBER2022_HOST_DINNER_PCResult1 = $dataFromSeptember->CSHRV_Img_Page01 . ".jpg";
                    $data->SEPTEMBER2022_HOST_DINNER_PCResult2 = $dataFromSeptember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromSeptember->CSHRV_Mailer_Type === "SEPT2022_CORE_SM") {
                    $data->SEPT2022_CORE_SM = 1;
                    $data->SEPT2022_CORE_SMLabel = $dataFromSeptember->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->SEPT2022_CORE_SMResult1 = $dataFromSeptember->CSHRV_Img_Page01 . ".jpg";
                    $data->SEPT2022_CORE_SMResult2 = $dataFromSeptember->CSHRV_Img_Page02 . ".jpg";
                    $data->SEPT2022_CORE_SMResult3 = $dataFromSeptember->CSHRV_Img_Page03 . ".jpg";
                    $data->SEPT2022_CORE_SMResult4 = $dataFromSeptember->CSHRV_Img_Page04 . ".jpg";
                    $data->SEPT2022_CORE_SMResult5 = $dataFromSeptember->CSHRV_Img_Page05 . ".jpg";
                    $data->SEPT2022_CORE_SMResult6 = $dataFromSeptember->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromSeptember->CSHRV_Mailer_Type === "Sept2022_Crossover_SM") {
                    $data->Sept2022_Crossover_SM = 1;
                    $data->Sept2022_Crossover_SMLabel = $dataFromSeptember->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->Sept2022_Crossover_SMResult1 = $dataFromSeptember->CSHRV_Img_Page01 . ".jpg";
                    $data->Sept2022_Crossover_SMResult2 = $dataFromSeptember->CSHRV_Img_Page02 . ".jpg";
                    $data->Sept2022_Crossover_SMResult3 = $dataFromSeptember->CSHRV_Img_Page03 . ".jpg";
                    $data->Sept2022_Crossover_SMResult4 = $dataFromSeptember->CSHRV_Img_Page04 . ".jpg";
                }

                if ($dataFromSeptember->CSHRV_Mailer_Type === "Sept2022_Free_Slot_Pull") {
                    $data->Sept2022_Free_Slot_Pull = 1;
                    $data->Sept2022_Free_Slot_PullLabel = $dataFromSeptember->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->Sept2022_Free_Slot_PullResult1 = $dataFromSeptember->CSHRV_Img_Page01 . ".jpg";
                    $data->Sept2022_Free_Slot_PullResult2 = $dataFromSeptember->CSHRV_Img_Page02 . ".jpg";
                    $data->Sept2022_Free_Slot_PullResult3 = $dataFromSeptember->CSHRV_Img_Page03 . ".jpg";
                    $data->Sept2022_Free_Slot_PullResult4 = $dataFromSeptember->CSHRV_Img_Page04 . ".jpg";
                }
            }
        }

        //get data from October core
        $data->October2022_Cruise_PC = 0;
        $data->October2022_Cruise_PCLabel = '';

        $data->OCT2022_HOST_DINNER_PC = 0;
        $data->OCT2022_HOST_DINNER_PCLabel = '';

        $data->OCT2022_CORE_PC = 0;
        $data->OCT2022_CORE_PCLabel = '';

        $data->OCT2022_PLAYER_PARTY_PC = 0;
        $data->OCT2022_PLAYER_PARTY_PCLabel = '';

        $data->OCT2022_CORE_SM = 0;
        $data->OCT2022_CORE_SMLabel = '';

        $datasFromOctober = OctoberCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromOctober) {
            foreach ($datasFromOctober as $dataFromOctober) {
                if ($dataFromOctober->CSHRV_Mailer_Type === "OCT2022_CORE_SM") {
                    $data->OCT2022_CORE_SM = 1;
                    $data->OCT2022_CORE_SMLabel = $dataFromOctober->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->OCT2022_CORE_SMResult1 = $dataFromOctober->CSHRV_Img_Page01 . ".jpg";
                    $data->OCT2022_CORE_SMResult2 = $dataFromOctober->CSHRV_Img_Page02 . ".jpg";
                    $data->OCT2022_CORE_SMResult3 = $dataFromOctober->CSHRV_Img_Page03 . ".jpg";
                    $data->OCT2022_CORE_SMResult4 = $dataFromOctober->CSHRV_Img_Page04 . ".jpg";
                    $data->OCT2022_CORE_SMResult5 = $dataFromOctober->CSHRV_Img_Page05 . ".jpg";
                    $data->OCT2022_CORE_SMResult6 = $dataFromOctober->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromOctober->CSHRV_Mailer_Type === "OCT2022_HOST_DINNER_PC") {
                    $data->OCT2022_HOST_DINNER_PC = 1;
                    $data->OCT2022_HOST_DINNER_PCLabel = $dataFromOctober->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->OCT2022_HOST_DINNER_PCResult1 = $dataFromOctober->CSHRV_Img_Page01 . ".jpg";
                    $data->OCT2022_HOST_DINNER_PCResult2 = $dataFromOctober->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromOctober->CSHRV_Mailer_Type === "October2022_Cruise_PC") {
                    $data->October2022_Cruise_PC = 1;
                    $data->October2022_Cruise_PCLabel = $dataFromOctober->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->October2022_Cruise_PCResult1 = $dataFromOctober->CSHRV_Img_Page01 . ".jpg";
                    $data->October2022_Cruise_PCResult2 = $dataFromOctober->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromOctober->CSHRV_Mailer_Type === "OCT2022_CORE_PC") {
                    $data->OCT2022_CORE_PC = 1;
                    $data->OCT2022_CORE_PCLabel = $dataFromOctober->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->OCT2022_CORE_PCResult1 = $dataFromOctober->CSHRV_Img_Page01 . ".jpg";
                    $data->OCT2022_CORE_PCResult2 = $dataFromOctober->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromOctober->CSHRV_Mailer_Type === "OCT2022_PLAYER_PARTY_PC") {
                    $data->OCT2022_PLAYER_PARTY_PC = 1;
                    $data->OCT2022_PLAYER_PARTY_PCLabel = $dataFromOctober->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->OCT2022_PLAYER_PARTY_PCResult1 = $dataFromOctober->CSHRV_Img_Page01 . ".jpg";
                    $data->OCT2022_PLAYER_PARTY_PCResult2 = $dataFromOctober->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }



//get data from November core
        $data->Nov2022_Karaoke_PC = 0;
        $data->Nov2022_Karaoke_PCLabel = '';

        $data->Nov2022_2nd_Chance_Cruise_PC = 0;
        $data->Nov2022_2nd_Chance_Cruise_PCLabel = '';

        $data->NOV2022_CORE_PC = 0;
        $data->NOV2022_CORE_PCLabel = '';

        $data->NOV2022_HOST_DINNER_PC = 0;
        $data->NOV2022_HOST_DINNER_PCLabel = '';

        $data->Holiday_POU_PC = 0;
        $data->Holiday_POU_PCLabel = '';

        $data->Nov_Tech_Up_PC = 0;
        $data->Nov_Tech_Up_PCLabel = '';

        $data->Nov2022_Card_Tier_3pg = 0;
        $data->Nov2022_Card_Tier_3pgLabel = '';

        $data->NOV2022_CORE_SM = 0;
        $data->NOV2022_CORE_SMLabel = '';

        $data->New_Years_Eve_Invite_6pg = 0;
        $data->New_Years_Eve_Invite_6pgLabel = '';

        $datasFromNovember = NovemberCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromNovember) {
            foreach ($datasFromNovember as $dataFromNovember) {
                if ($dataFromNovember->CSHRV_Mailer_Type === "NOV2022_CORE_SM") {
                    $data->NOV2022_CORE_SM = 1;
                    $data->NOV2022_CORE_SMLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->NOV2022_CORE_SMResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->NOV2022_CORE_SMResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                    $data->NOV2022_CORE_SMResult3 = $dataFromNovember->CSHRV_Img_Page03 . ".jpg";
                    $data->NOV2022_CORE_SMResult4 = $dataFromNovember->CSHRV_Img_Page04 . ".jpg";
                    $data->NOV2022_CORE_SMResult5 = $dataFromNovember->CSHRV_Img_Page05 . ".jpg";
                    $data->NOV2022_CORE_SMResult6 = $dataFromNovember->CSHRV_Img_Page06 . ".jpg";
                }
                if ($dataFromNovember->CSHRV_Mailer_Type === "New_Years_Eve_Invite_6pg") {
                    $data->New_Years_Eve_Invite_6pg = 1;
                    $data->New_Years_Eve_Invite_6pgLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->New_Years_Eve_Invite_6pgResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->New_Years_Eve_Invite_6pgResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                    $data->New_Years_Eve_Invite_6pgResult3 = $dataFromNovember->CSHRV_Img_Page03 . ".jpg";
                    $data->New_Years_Eve_Invite_6pgResult4 = $dataFromNovember->CSHRV_Img_Page04 . ".jpg";
                    $data->New_Years_Eve_Invite_6pgResult5 = $dataFromNovember->CSHRV_Img_Page05 . ".jpg";
                    $data->New_Years_Eve_Invite_6pgResult6 = $dataFromNovember->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromNovember->CSHRV_Mailer_Type === "Nov2022_2nd_Chance_Cruise_PC") {
                    $data->Nov2022_2nd_Chance_Cruise_PC = 1;
                    $data->Nov2022_2nd_Chance_Cruise_PCLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->Nov2022_2nd_Chance_Cruise_PCResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->Nov2022_2nd_Chance_Cruise_PCResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromNovember->CSHRV_Mailer_Type === "Nov2022_Karaoke_PC") {
                    $data->Nov2022_Karaoke_PC = 1;
                    $data->Nov2022_Karaoke_PCLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->Nov2022_Karaoke_PCResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->Nov2022_Karaoke_PCResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromNovember->CSHRV_Mailer_Type === "NOV2022_CORE_PC") {
                    $data->NOV2022_CORE_PC = 1;
                    $data->NOV2022_CORE_PCLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->NOV2022_CORE_PCResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->NOV2022_CORE_PCResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromNovember->CSHRV_Mailer_Type === "NOV2022_HOST_DINNER_PC") {
                    $data->NOV2022_HOST_DINNER_PC = 1;
                    $data->NOV2022_HOST_DINNER_PCLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->NOV2022_HOST_DINNER_PCResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->NOV2022_HOST_DINNER_PCResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromNovember->CSHRV_Mailer_Type === "Holiday_POU_PC") {
                    $data->Holiday_POU_PC = 1;
                    $data->Holiday_POU_PCLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->Holiday_POU_PCResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->Holiday_POU_PCResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromNovember->CSHRV_Mailer_Type === "Nov_Tech_Up_PC") {
                    $data->Nov_Tech_Up_PC = 1;
                    $data->Nov_Tech_Up_PCLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->Nov_Tech_Up_PCResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->Nov_Tech_Up_PCResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromNovember->CSHRV_Mailer_Type === "Nov2022_Card_Tier_3pg") {
                    $data->Nov2022_Card_Tier_3pg = 1;
                    $data->Nov2022_Card_Tier_3pgLabel = $dataFromNovember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->Nov2022_Card_Tier_3pgResult1 = $dataFromNovember->CSHRV_Img_Page01 . ".jpg";
                    $data->Nov2022_Card_Tier_3pgResult2 = $dataFromNovember->CSHRV_Img_Page02 . ".jpg";
                    $data->Nov2022_Card_Tier_3pgResult3 = $dataFromNovember->CSHRV_Img_Page03 . ".jpg";
                }
            }
        }


//get data from December core
        $data->DEC2022_CASH_COCKTAILS_PC = 0;
        $data->DEC2022_CASH_COCKTAILS_PCLabel = '';

        $data->DEC2022_CORE_PC = 0;
        $data->DEC2022_CORE_PCLabel = '';

        $data->DEC2022_HOST_DINNER_PC = 0;
        $data->DEC2022_HOST_DINNER_PCLabel = '';

        $data->DEC2022_CORE_SM = 0;
        $data->DEC2022_CORE_SMLabel = '';

        $datasFromDecember = DecemberCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromDecember) {
            foreach ($datasFromDecember as $dataFromDecember) {
                if ($dataFromDecember->CSHRV_Mailer_Type === "DEC2022_CORE_SM") {
                    $data->DEC2022_CORE_SM = 1;
                    $data->DEC2022_CORE_SMLabel = $dataFromDecember->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->DEC2022_CORE_SMResult1 = $dataFromDecember->CSHRV_Img_Page01 . ".jpg";
                    $data->DEC2022_CORE_SMResult2 = $dataFromDecember->CSHRV_Img_Page02 . ".jpg";
                    $data->DEC2022_CORE_SMResult3 = $dataFromDecember->CSHRV_Img_Page03 . ".jpg";
                    $data->DEC2022_CORE_SMResult4 = $dataFromDecember->CSHRV_Img_Page04 . ".jpg";
                    $data->DEC2022_CORE_SMResult5 = $dataFromDecember->CSHRV_Img_Page05 . ".jpg";
                    $data->DEC2022_CORE_SMResult6 = $dataFromDecember->CSHRV_Img_Page06 . ".jpg";
                }
                if ($dataFromDecember->CSHRV_Mailer_Type === "DEC2022_CASH_COCKTAILS_PC") {
                    $data->DEC2022_CASH_COCKTAILS_PC = 1;
                    $data->DEC2022_CASH_COCKTAILS_PCLabel = $dataFromDecember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->DEC2022_CASH_COCKTAILS_PCResult1 = $dataFromDecember->CSHRV_Img_Page01 . ".jpg";
                    $data->DEC2022_CASH_COCKTAILS_PCResult2 = $dataFromDecember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromDecember->CSHRV_Mailer_Type === "DEC2022_CORE_PC") {
                    $data->DEC2022_CORE_PC = 1;
                    $data->DEC2022_CORE_PCLabel = $dataFromDecember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->DEC2022_CORE_PCResult1 = $dataFromDecember->CSHRV_Img_Page01 . ".jpg";
                    $data->DEC2022_CORE_PCResult2 = $dataFromDecember->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromDecember->CSHRV_Mailer_Type === "DEC2022_HOST_DINNER_PC") {
                    $data->DEC2022_HOST_DINNER_PC = 1;
                    $data->DEC2022_HOST_DINNER_PCLabel = $dataFromDecember->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->DEC2022_HOST_DINNER_PCResult1 = $dataFromDecember->CSHRV_Img_Page01 . ".jpg";
                    $data->DEC2022_HOST_DINNER_PCResult2 = $dataFromDecember->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }



//get data from January core
        $data->BSH_Holiday_POU_PC = 0;
        $data->BSH_Holiday_POU_PCLabel = '';

        $data->BSH_Chinese_New_Year_PC = 0;
        $data->BSH_Chinese_New_Year_PCLabel = '';

        $data->JAN2023_CORE_PC = 0;
        $data->JAN2023_CORE_PCLabel = '';

        $data->BSH_January_Trop_LV_02_PC = 0;
        $data->BSH_January_Trop_LV_02_PCLabel = '';

        $data->BSH_January_Inactive_PC = 0;
        $data->BSH_January_Inactive_PCLabel = '';

        $data->BSH_January_Trop_LV_PC = 0;
        $data->BSH_January_Trop_LV_PCLabel = '';

        $data->JAN2023_FREE_SLOT_PULL_4PG = 0;
        $data->JAN2023_FREE_SLOT_PULL_4PGLabel = '';

        $data->JAN2023_CORE_SM = 0;
        $data->JAN2023_CORE_SMLabel = '';

        $datasFromJanuary = JanuaryCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromJanuary) {
            foreach ($datasFromJanuary as $dataFromJanuary) {
                if ($dataFromJanuary->CSHRV_Mailer_Type === "JAN2023_CORE_SM") {
                    $data->JAN2023_CORE_SM = 1;
                    $data->JAN2023_CORE_SMLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->JAN2023_CORE_SMResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->JAN2023_CORE_SMResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                    $data->JAN2023_CORE_SMResult3 = $dataFromJanuary->CSHRV_Img_Page03 . ".jpg";
                    $data->JAN2023_CORE_SMResult4 = $dataFromJanuary->CSHRV_Img_Page04 . ".jpg";
                    $data->JAN2023_CORE_SMResult5 = $dataFromJanuary->CSHRV_Img_Page05 . ".jpg";
                    $data->JAN2023_CORE_SMResult6 = $dataFromJanuary->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromJanuary->CSHRV_Mailer_Type === "BSH_Chinese_New_Year_PC") {
                    $data->BSH_Chinese_New_Year_PC = 1;
                    $data->BSH_Chinese_New_Year_PCLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Chinese_New_Year_PCResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Chinese_New_Year_PCResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJanuary->CSHRV_Mailer_Type === "BSH_Holiday_POU_PC") {
                    $data->BSH_Holiday_POU_PC = 1;
                    $data->BSH_Holiday_POU_PCLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Holiday_POU_PCResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Holiday_POU_PCResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJanuary->CSHRV_Mailer_Type === "JAN2023_CORE_PC") {
                    $data->JAN2023_CORE_PC = 1;
                    $data->JAN2023_CORE_PCLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->JAN2023_CORE_PCResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->JAN2023_CORE_PCResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJanuary->CSHRV_Mailer_Type === "BSH_January_Trop_LV_02_PC") {
                    $data->BSH_January_Trop_LV_02_PC = 1;
                    $data->BSH_January_Trop_LV_02_PCLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_January_Trop_LV_02_PCResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_January_Trop_LV_02_PCResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJanuary->CSHRV_Mailer_Type === "BSH_January_Inactive_PC") {
                    $data->BSH_January_Inactive_PC = 1;
                    $data->BSH_January_Inactive_PCLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_January_Inactive_PCResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_January_Inactive_PCResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJanuary->CSHRV_Mailer_Type === "BSH_January_Trop_LV_PC") {
                    $data->BSH_January_Trop_LV_PC = 1;
                    $data->BSH_January_Trop_LV_PCLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_January_Trop_LV_PCResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_January_Trop_LV_PCResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJanuary->CSHRV_Mailer_Type === "JAN2023_FREE_SLOT_PULL_4PG") {
                    $data->JAN2023_FREE_SLOT_PULL_4PG = 1;
                    $data->JAN2023_FREE_SLOT_PULL_4PGLabel = $dataFromJanuary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->JAN2023_FREE_SLOT_PULL_4PGResult1 = $dataFromJanuary->CSHRV_Img_Page01 . ".jpg";
                    $data->JAN2023_FREE_SLOT_PULL_4PGResult2 = $dataFromJanuary->CSHRV_Img_Page02 . ".jpg";
                    $data->JAN2023_FREE_SLOT_PULL_4PGResult3 = $dataFromJanuary->CSHRV_Img_Page03 . ".jpg";
                    $data->JAN2023_FREE_SLOT_PULL_4PGResult4 = $dataFromJanuary->CSHRV_Img_Page04 . ".jpg";
                }
            }
        }



//get data from February core
        $data->FEB2023_LESLIE_PARTY_PC = 0;
        $data->FEB2023_LESLIE_PARTY_PCLabel = '';

        $data->FEB2023_CORE_PC = 0;
        $data->FEB2023_CORE_PCLabel = '';

        $data->BSH_Feb2023_Player_Party_PC = 0;
        $data->BSH_Feb2023_Player_Party_PCLabel = '';

        $data->BSH_Feb2023_High_End_Gift_PC = 0;
        $data->BSH_Feb2023_High_End_Gift_PCLabel = '';

        $data->FEB2023_CORE_SM = 0;
        $data->FEB2023_CORE_SMLabel = '';

        $datasFromFebruary = FebruaryCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromFebruary) {
            foreach ($datasFromFebruary as $dataFromFebruary) {
                if ($dataFromFebruary->CSHRV_Mailer_Type === "FEB2023_CORE_SM") {
                    $data->FEB2023_CORE_SM = 1;
                    $data->FEB2023_CORE_SMLabel = $dataFromFebruary->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->FEB2023_CORE_SMResult1 = $dataFromFebruary->CSHRV_Img_Page01 . ".jpg";
                    $data->FEB2023_CORE_SMResult2 = $dataFromFebruary->CSHRV_Img_Page02 . ".jpg";
                    $data->FEB2023_CORE_SMResult3 = $dataFromFebruary->CSHRV_Img_Page03 . ".jpg";
                    $data->FEB2023_CORE_SMResult4 = $dataFromFebruary->CSHRV_Img_Page04 . ".jpg";
                    $data->FEB2023_CORE_SMResult5 = $dataFromFebruary->CSHRV_Img_Page05 . ".jpg";
                    $data->FEB2023_CORE_SMResult6 = $dataFromFebruary->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromFebruary->CSHRV_Mailer_Type === "FEB2023_LESLIE_PARTY_PC") {
                    $data->FEB2023_LESLIE_PARTY_PC = 1;
                    $data->FEB2023_LESLIE_PARTY_PCLabel = $dataFromFebruary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->FEB2023_LESLIE_PARTY_PCResult1 = $dataFromFebruary->CSHRV_Img_Page01 . ".jpg";
                    $data->FEB2023_LESLIE_PARTY_PCResult2 = $dataFromFebruary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromFebruary->CSHRV_Mailer_Type === "FEB2023_CORE_PC") {
                    $data->FEB2023_CORE_PC = 1;
                    $data->FEB2023_CORE_PCLabel = $dataFromFebruary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->FEB2023_CORE_PCResult1 = $dataFromFebruary->CSHRV_Img_Page01 . ".jpg";
                    $data->FEB2023_CORE_PCResult2 = $dataFromFebruary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromFebruary->CSHRV_Mailer_Type === "BSH_Feb2023_Player_Party_PC") {
                    $data->BSH_Feb2023_Player_Party_PC = 1;
                    $data->BSH_Feb2023_Player_Party_PCLabel = $dataFromFebruary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Feb2023_Player_Party_PCResult1 = $dataFromFebruary->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Feb2023_Player_Party_PCResult2 = $dataFromFebruary->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromFebruary->CSHRV_Mailer_Type === "BSH_Feb2023_High_End_Gift_PC") {
                    $data->BSH_Feb2023_High_End_Gift_PC = 1;
                    $data->BSH_Feb2023_High_End_Gift_PCLabel = $dataFromFebruary->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Feb2023_High_End_Gift_PCResult1 = $dataFromFebruary->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Feb2023_High_End_Gift_PCResult2 = $dataFromFebruary->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }

        //get data from March core

        $data->BSH_MAR2023_MINI_BAC_PC = 0;
        $data->BSH_MAR2023_MINI_BAC_PCLabel = '';

        $data->MAR2023_CORE_PC = 0;
        $data->MAR2023_CORE_PCLabel = '';

        $data->BSH_Mar2023_Card_Tier_PC = 0;
        $data->BSH_Mar2023_Card_Tier_PCLabel = '';

        $data->BSH_Mar2023_Superstar_Party_PC = 0;
        $data->BSH_Mar2023_Superstar_Party_PCLabel = '';

        $data->BSH_Mar2023_Legend_Party_Invite = 0;
        $data->BSH_Mar2023_Legend_Party_InviteLabel = '';

        $data->MAR2023_CORE_SM = 0;
        $data->MAR2023_CORE_SMLabel = '';

        $datasFromMarch = MarchCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromMarch) {
            foreach ($datasFromMarch as $dataFromMarch) {
                if ($dataFromMarch->CSHRV_Mailer_Type === "MAR2023_CORE_SM") {
                    $data->MAR2023_CORE_SM = 1;
                    $data->MAR2023_CORE_SMLabel = $dataFromMarch->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->MAR2023_CORE_SMResult1 = $dataFromMarch->CSHRV_Img_Page01 . ".jpg";
                    $data->MAR2023_CORE_SMResult2 = $dataFromMarch->CSHRV_Img_Page02 . ".jpg";
                    $data->MAR2023_CORE_SMResult3 = $dataFromMarch->CSHRV_Img_Page03 . ".jpg";
                    $data->MAR2023_CORE_SMResult4 = $dataFromMarch->CSHRV_Img_Page04 . ".jpg";
                    $data->MAR2023_CORE_SMResult5 = $dataFromMarch->CSHRV_Img_Page05 . ".jpg";
                    $data->MAR2023_CORE_SMResult6 = $dataFromMarch->CSHRV_Img_Page06 . ".jpg";
                }

                if ($dataFromMarch->CSHRV_Mailer_Type === "BSH_MAR2023_MINI_BAC_PC") {
                    $data->BSH_MAR2023_MINI_BAC_PC = 1;
                    $data->BSH_MAR2023_MINI_BAC_PCLabel = $dataFromMarch->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_MAR2023_MINI_BAC_PCResult1 = $dataFromMarch->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_MAR2023_MINI_BAC_PCResult2 = $dataFromMarch->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromMarch->CSHRV_Mailer_Type === "MAR2023_CORE_PC") {
                    $data->MAR2023_CORE_PC = 1;
                    $data->MAR2023_CORE_PCLabel = $dataFromMarch->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->MAR2023_CORE_PCResult1 = $dataFromMarch->CSHRV_Img_Page01 . ".jpg";
                    $data->MAR2023_CORE_PCResult2 = $dataFromMarch->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromMarch->CSHRV_Mailer_Type === "BSH_Mar2023_Card_Tier_PC") {
                    $data->BSH_Mar2023_Card_Tier_PC = 1;
                    $data->BSH_Mar2023_Card_Tier_PCLabel = $dataFromMarch->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Mar2023_Card_Tier_PCResult1 = $dataFromMarch->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Mar2023_Card_Tier_PCResult2 = $dataFromMarch->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromMarch->CSHRV_Mailer_Type === "BSH_Mar2023_Superstar_Party_PC") {
                    $data->BSH_Mar2023_Superstar_Party_PC = 1;
                    $data->BSH_Mar2023_Superstar_Party_PCLabel = $dataFromMarch->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Mar2023_Superstar_Party_PCResult1 = $dataFromMarch->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Mar2023_Superstar_Party_PCResult2 = $dataFromMarch->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromMarch->CSHRV_Mailer_Type === "BSH_Mar2023_Legend_Party_Invite") {
                    $data->BSH_Mar2023_Legend_Party_Invite = 1;
                    $data->BSH_Mar2023_Legend_Party_InviteLabel = $dataFromMarch->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Mar2023_Legend_Party_InviteResult1 = $dataFromMarch->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Mar2023_Legend_Party_InviteResult2 = $dataFromMarch->CSHRV_Img_Page02 . ".jpg";
                    $data->BSH_Mar2023_Legend_Party_InviteResult3 = $dataFromMarch->CSHRV_Img_Page03 . ".jpg";
                    $data->BSH_Mar2023_Legend_Party_InviteResult4 = $dataFromMarch->CSHRV_Img_Page04 . ".jpg";
                }
            }
        }



          //get data from April core
        $data->BSH_Apr2023_Cruise_PC = 0;
        $data->BSH_Apr2023_Cruise_PCLabel = '';


        $datasFromApril = AprilCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromApril) {
            foreach ($datasFromApril as $dataFromApril) {

                if ($dataFromApril->CSHRV_Mailer_Type === "BSH_Apr2023_Cruise_PC") {
                    $data->BSH_Apr2023_Cruise_PC = 1;
                    $data->BSH_Apr2023_Cruise_PCLabel = $dataFromApril->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Apr2023_Cruise_PCResult1 = $dataFromApril->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Apr2023_Cruise_PCResult2 = $dataFromApril->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }


//get data from May core
        $data->BSH_MAY2023_MINI_BAC_TOURNEY_PC = 0;
        $data->BSH_MAY2023_MINI_BAC_TOURNEY_PCLabel = '';

        $data->BSH_MAY2023_MYSTERY_PRIZE_DRAWING = 0;
        $data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGLabel = '';

        $datasFromMay = MayCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromMay) {
            foreach ($datasFromMay as $dataFromMay) {

                if ($dataFromMay->CSHRV_Mailer_Type === "BSH_MAY2023_MINI_BAC_TOURNEY_PC") {
                    $data->BSH_MAY2023_MINI_BAC_TOURNEY_PC = 1;
                    $data->BSH_MAY2023_MINI_BAC_TOURNEY_PCLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_MAY2023_MINI_BAC_TOURNEY_PCResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_MAY2023_MINI_BAC_TOURNEY_PCResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromMay->CSHRV_Mailer_Type === "BSH_MAY2023_MYSTERY_PRIZE_DRAWING") {
                    $data->BSH_MAY2023_MYSTERY_PRIZE_DRAWING = 1;
                    $data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGLabel = $dataFromMay->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGResult1 = $dataFromMay->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_MAY2023_MYSTERY_PRIZE_DRAWINGResult2 = $dataFromMay->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }
//get data from June core
        $data->BSH_JUN2023_CORE_PC = 0;
        $data->BSH_JUN2023_CORE_PCLabel = '';

        $data->BSH_Jun2023_Player_Party_PC = 0;
        $data->BSH_Jun2023_Player_Party_PCLabel = '';

        $data->BSH_Jun2023_Hi_End_Gift_PC	 = 0;
        $data->BSH_Jun2023_Hi_End_Gift_PCLabel = '';

        $data->BSH_Jun2023_Trop_LV_Event_PC	 = 0;
        $data->BSH_Jun2023_Trop_LV_Event_PCLabel = '';

        $data->BSH_JUN2023_INACTIVE_PC = 0;
        $data->BSH_JUN2023_INACTIVE_PCLabel = '';

        $datasFromJun = JuneCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromJun) {
            foreach ($datasFromJun as $dataFromJun) {
                if ($dataFromJun->CSHRV_Mailer_Type === "BSH_JUN2023_CORE_PC") {
                    $data->BSH_JUN2023_CORE_PC = 1;
                    $data->BSH_JUN2023_CORE_PCLabel = $dataFromJun->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_JUN2023_CORE_PCResult1 = $dataFromJun->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_JUN2023_CORE_PCResult2 = $dataFromJun->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "BSH_Jun2023_Player_Party_PC") {
                    $data->BSH_Jun2023_Player_Party_PC = 1;
                    $data->BSH_Jun2023_Player_Party_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Jun2023_Player_Party_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Jun2023_Player_Party_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "BSH_Jun2023_Hi_End_Gift_PC") {
                    $data->BSH_Jun2023_Hi_End_Gift_PC = 1;
                    $data->BSH_Jun2023_Hi_End_Gift_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Jun2023_Hi_End_Gift_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Jun2023_Hi_End_Gift_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "BSH_Jun2023_Trop_LV_Event_PC") {
                    $data->BSH_Jun2023_Trop_LV_Event_PC = 1;
                    $data->BSH_Jun2023_Trop_LV_Event_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_Jun2023_Trop_LV_Event_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_Jun2023_Trop_LV_Event_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJune->CSHRV_Mailer_Type === "BSH_JUN2023_INACTIVE_PC") {
                    $data->BSH_JUN2023_INACTIVE_PC = 1;
                    $data->BSH_JUN2023_INACTIVE_PCLabel = $dataFromJune->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_JUN2023_INACTIVE_PCResult1 = $dataFromJune->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_JUN2023_INACTIVE_PCResult2 = $dataFromJune->CSHRV_Img_Page02 . ".jpg";
                }
            }
        }

        // Job 215090_JUL2023_CORE_PC
        // Variable BSH_JUL2023_CORE_PC
        $data->BSH_JUL2023_CORE_PC = 0;
        $data->BSH_JUL2023_CORE_PCLabel = '';

        // Job 215089_JUL2023_CORE_SM_6PG
        // Variable BSH_JUL2023_CORE_SM_6PG
        $data->BSH_JUL2023_CORE_SM_6PG = 0;
        $data->BSH_JUL2023_CORE_SM_6PGLabel = '';

        // Job 215281_JUL2023_SLOT_PULL_SM
        // Variable BSH_JUL2023_SLOT_PULL_SM
        $data->BSH_JUL2023_SLOT_PULL_SM = 0;
        $data->BSH_JUL2023_SLOT_PULL_SMLabel = '';

        $datasFromJuly = JulyCore::where('CSHRV_Account', $accountId)->whereRaw("STR_TO_DATE(`CSHRV_Expire_Date`, '%m/%d/%Y') >= NOW()")->get();
        if ($datasFromJuly) {
            foreach ($datasFromJuly as $dataFromJuly) {
                if ($dataFromJuly->CSHRV_Mailer_Type === "BSH_JUL2023_CORE_PC") {
                    $data->BSH_JUL2023_CORE_PC = 1;
                    $data->BSH_JUL2023_CORE_PCLabel = $dataFromJuly->CSHRV_Label;
                    $data->flgPC = 1;
                    $data->BSH_JUL2023_CORE_PCResult1 = $dataFromJuly->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_JUL2023_CORE_PCResult2 = $dataFromJuly->CSHRV_Img_Page02 . ".jpg";
                }

                if ($dataFromJuly->CSHRV_Mailer_Type === "BSH_JUL2023_CORE_SM_6PG") {
                    $data->BSH_JUL2023_CORE_SM_6PG = 1;
                    $data->BSH_JUL2023_CORE_SM_6PGLabel = $dataFromJuly->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->BSH_JUL2023_CORE_SM_6PGResult1 = $dataFromJuly->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_JUL2023_CORE_SM_6PGResult2 = $dataFromJuly->CSHRV_Img_Page02 . ".jpg";
                    $data->BSH_JUL2023_CORE_SM_6PGResult3 = $dataFromJuly->CSHRV_Img_Page03 . ".jpg";
                    $data->BSH_JUL2023_CORE_SM_6PGResult4 = $dataFromJuly->CSHRV_Img_Page04 . ".jpg";
                    $data->BSH_JUL2023_CORE_SM_6PGResult5 = $dataFromJuly->CSHRV_Img_Page05 . ".jpg";
                    $data->BSH_JUL2023_CORE_SM_6PGResult6 = $dataFromJuly->CSHRV_Img_Page06 . ".jpg";

                }

                if ($dataFromJuly->CSHRV_Mailer_Type === "BSH_JUL2023_SLOT_PULL_SM") {
                    $data->BSH_JUL2023_SLOT_PULL_SM = 1;
                    $data->BSH_JUL2023_SLOT_PULL_SMLabel = $dataFromJuly->CSHRV_Label;
                    $data->flgSM = 1;
                    $data->BSH_JUL2023_SLOT_PULL_SMResult1 = $dataFromJuly->CSHRV_Img_Page01 . ".jpg";
                    $data->BSH_JUL2023_SLOT_PULL_SMResult2 = $dataFromJuly->CSHRV_Img_Page02 . ".jpg";
                    $data->BSH_JUL2023_SLOT_PULL_SMResult3 = $dataFromJuly->CSHRV_Img_Page03 . ".jpg";
                    $data->BSH_JUL2023_SLOT_PULL_SMResult4 = $dataFromJuly->CSHRV_Img_Page04 . ".jpg";

                }
            }
        }



        return $data;
    }

    //get data for User Account
    public function index()
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 4)
            return Voyager::view('voyager::index');
        else {
            //get user data and get data
            $data = $this->getDataByAccountId(Auth::user()->CSHRV_Player_ID);
            return view('player-dashboard')->with('data', $data);
        }
    }

    //get data for SuperUser Account
    public function getViewPlayerDashBoardByAccountId($accountId)
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 4)
        {
          //get user data and function get data
          $data = $this->getDataByAccountId($accountId);
          return view('player-dashboard')->with('data', $data);
        } else {
          return redirect()->route('voyager.login');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('voyager.login');
    }

    public function upload(Request $request)
    {
        $fullFilename = null;
        $resizeWidth = 1800;
        $resizeHeight = null;
        $slug = $request->input('type_slug');
        $file = $request->file('image');

        $path = $slug . '/' . date('F') . date('Y') . '/';

        $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension());
        $filename_counter = 1;

        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
        while (Storage::disk(config('voyager.storage.disk'))->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
            $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . (string)($filename_counter++);
        }

        $fullPath = $path . $filename . '.' . $file->getClientOriginalExtension();

        $ext = $file->guessClientExtension();

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            $image = Image::make($file)
                ->resize($resizeWidth, $resizeHeight, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            if ($ext !== 'gif') {
                $image->orientate();
            }
            $image->encode($file->getClientOriginalExtension(), 75);

            // move uploaded file from temp to uploads directory
            if (Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string)$image, 'public')) {
                $status = __('voyager::media.success_uploading');
                $fullFilename = $fullPath;
            } else {
                $status = __('voyager::media.error_uploading');
            }
        } else {
            $status = __('voyager::media.uploading_wrong_type');
        }

        // echo out script that TinyMCE can handle and update the image in the editor
        return "<script> parent.helpers.setImageValue('" . Voyager::image($fullFilename) . "'); </script>";
    }
}
