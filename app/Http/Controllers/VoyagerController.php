<?php

namespace App\Http\Controllers\Voyager;

use App\Data;
use App\Flipbook;
use App\JuneCoreSM;
use App\JulyCorePC;
use App\AugustCore;
use App\SeptemberCore;
use App\JanuaryCore;
use App\OctoberCore;
use App\NovemberCore;
use App\FebruaryCore;
use App\User;
use App\WeekenderFlipbook;
use App\MayCoreSM;
use App\MayCorePC;
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

class VoyagerController extends \TCG\Voyager\Http\Controllers\VoyagerController
{
    public function makeImageForSeptemberCorePC($accountId, $imageTextData, $fileName)
    {
        $img = Image::make('https://s3.us-east-2.amazonaws.com/shreveport.pcwebserv.com/september_2021/hi_res/'.$fileName.'.jpg');
        $img->text($imageTextData, 180, 270, function ($font) {
            $font->file(public_path('PostCardImage/SeptemberCorePC/fonts/steelfish rg.ttf'));
            $font->size(120);
            $font->color('#000');
            $font->align('left');
            $font->angle(0);
        });
        if (!File::exists('PostCardImage/SeptemberCorePC/ImageByAccountId/' . $accountId . '.jpg'))
        {
            $img->save(public_path('PostCardImage/SeptemberCorePC/ImageByAccountId/' . $accountId . '.jpg'));
        }
    }

    //Function Get data by Account Id
    public function getDataByAccountId($accountId)
    {
        //define data return
        $data = new \stdClass();
        $data->first_name = '';
        $data->last_name = '';
        $data->Account = $accountId;
        $data->Tier = '';
        $data->MTD_Points = 0;
        $data->Points = 0;
        $data->Comp_Dollars = 0;
        $data->Points_Next_Tier = 0;
        $data->Poker_Rating = 0;
        $data->updated_at = now();

        //Flag to check if have SM or PC data
        $data->flgSM = 0;
        $data->flgPC = 0;

        //Get data from Datas table
        $datas = Data::where('Player_ID', $accountId)->first();
        if ($datas) {
            $data->first_name = $datas->FName;
            $data->last_name = $datas->LName;
            $data->Tier = $datas->Tier;
            $data->MTD_Points = $datas->MTD_Points;
            if($datas->Points !== '')
            $data->Points = $datas->Points;
            $data->Comp_Dollars = $datas->Comp_Dollars;
            $data->Points_Next_Tier = $datas->Points_Next_Tier;
            $data->Poker_Rating = $datas->Poker_Rating;
        }
               $data->JanuaryPC = 0;
               $data->JanuaryPCLabel = '';
               $data->JanuaryCruisePC = 0;
               $data->JanuaryCruisePCLabel = '';
               $data->JanuarySM = 0;
               $data->JanuarySMLabel = '';
               $data->JanuaryPlayPC = 0;
               $data->JanuaryPlayPCLabel = '';

               $dataFromJanuary2021 = JanuaryCore::where('Account', $accountId)->get();
               if ($dataFromJanuary2021)
                {
                   foreach ($dataFromJanuary2021 as $singleDataFromJanuary2021)
                   {
                    if ($singleDataFromJanuary2021->Mailer_Type === "Play_PC")
                    {
                        $data->JanuaryPlayPC = 1;
                        $data->JanuaryPlayPCLabel = $singleDataFromJanuary2021->Label;
                        $data->flgPC =1;
                        $data->JanuaryPlayPCResult1 = $singleDataFromJanuary2021->Img_Page01 . ".jpg";
                        $data->JanuaryPlayPCResult2 = $singleDataFromJanuary2021->Img_Page02 . ".jpg";

                    }
                    if ($singleDataFromJanuary2021->Mailer_Type === "CRUISE_PC")
                    {
                        $data->JanuaryCruisePC = 1;
                        $data->JanuaryCruisePCLabel = $singleDataFromJanuary2021->Label;
                        $data->flgPC =1;
                        $data->JanuaryCruisePCResult1 = $singleDataFromJanuary2021->Img_Page01 . ".jpg";
                        $data->JanuaryCruisePCResult2 = $singleDataFromJanuary2021->Img_Page02 . ".jpg";

                    }
                       if ($singleDataFromJanuary2021->Mailer_Type === "Core_PC")
                       {
                           $data->JanuaryPC = 1;
                           $data->JanuaryPCLabel = $singleDataFromJanuary2021->Label;
                           $data->flgPC =1;
                           $data->JanuaryCorePCResult1 = $singleDataFromJanuary2021->Img_Page01 . ".jpg";
                           $data->JanuaryCorePCResult2 = $singleDataFromJanuary2021->Img_Page02 . ".jpg";

                       }
                       if ($singleDataFromJanuary2021->Mailer_Type === "Core_SM")
                       {
                            $data->JanuarySM = 0 ;
                            $data->JanuarySMLabel = $singleDataFromJanuary2021->Label;
                           $data->flgSM =1;
                           $data->JanuaryCoreSMResult1 = $singleDataFromJanuary2021->Img_Page01 . ".jpg";
                           $data->JanuaryCoreSMResult2 = $singleDataFromJanuary2021->Img_Page02 . ".jpg";
                           $data->JanuaryCoreSMResult3 = $singleDataFromJanuary2021->Img_Page03 . ".jpg";
                           $data->JanuaryCoreSMResult4 = $singleDataFromJanuary2021->Img_Page04 . ".jpg";
                           $data->JanuaryCoreSMResult5 = $singleDataFromJanuary2021->Img_Page05 . ".jpg";
                           $data->JanuaryCoreSMResult6 = $singleDataFromJanuary2021->Img_Page06 . ".jpg";

                       }

                   }
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


       $dataFromNovember2021 = NovemberCore::where('Account', $accountId)->get();
       if ($dataFromNovember2021)
        {
           foreach ($dataFromNovember2021 as $singleDataFromNovember2021) {
               //CoreSM
               if ($singleDataFromNovember2021->Mailer_Type === "Core SM") {
                   $data->NovemberCoreSM = 0;
                   $data->NovemberCoreSMLabel = $singleDataFromNovember2021->Label;
                   $data->flgSM =1;

                   $data->NovemberCoreSMResult1 = $singleDataFromNovember2021->Img_Page01 . ".jpg";
                   $data->NovemberCoreSMResult2 = $singleDataFromNovember2021->Img_Page02 . ".jpg";
                   $data->NovemberCoreSMResult3 = $singleDataFromNovember2021->Img_Page03 . ".jpg";
                   $data->NovemberCoreSMResult4 = $singleDataFromNovember2021->Img_Page04 . ".jpg";
                   $data->NovemberCoreSMResult5 = $singleDataFromNovember2021->Img_Page05 . ".jpg";
                   $data->NovemberCoreSMResult6 = $singleDataFromNovember2021->Img_Page06 . ".jpg";
                   $data->NovemberCoreSMResult7 = $singleDataFromNovember2021->Img_Page07 . ".jpg";
                   $data->NovemberCoreSMResult8 = $singleDataFromNovember2021->Img_Page08 . ".jpg";
               }

           }
       }

       $data->FebruaryCorePC = 0;
       $data->FebruaryCorePCLabel = '';
       $data->FebruaryCoreSM = 0;
       $data->FebruaryCoreSMLabel = '';


       $dataFromFebruary2021 = FebruaryCore::where('Account', $accountId)->get();
       if ($dataFromFebruary2021)
        {
           foreach ($dataFromFebruary2021 as $singleDataFromFebruary2021) {
               //CorePC
               if ($singleDataFromFebruary2021->Mailer_Type === "CORE_PC") {
                   $data->FebruaryCorePC = 1;
                   $data->FebruaryCorePCLabel = $singleDataFromFebruary2021->Label;
                   $data->flgPC =1;
                   $data->FebruaryCorePCResult1 = $singleDataFromFebruary2021->Img_Page01 . ".jpg";
                   $data->FebruaryCorePCResult2 = $singleDataFromFebruary2021->Img_Page02 . ".jpg";

               }
               if ($singleDataFromFebruary2021->Mailer_Type === "CORE_SM") {
                $data->FebruaryCoreSM = 1;
                $data->FebruaryCoreSMLabel = $singleDataFromFebruary2021->Label;
                $data->flgSM =1;
                $data->FebruaryCoreSMResult1 = $singleDataFromFebruary2021->Img_Page01 . ".jpg";
                $data->FebruaryCoreSMResult2 = $singleDataFromFebruary2021->Img_Page02 . ".jpg";
                $data->FebruaryCoreSMResult3 = $singleDataFromFebruary2021->Img_Page03 . ".jpg";
                $data->FebruaryCoreSMResult4 = $singleDataFromFebruary2021->Img_Page04 . ".jpg";
                $data->FebruaryCoreSMResult5 = $singleDataFromFebruary2021->Img_Page05 . ".jpg";
                $data->FebruaryCoreSMResult6 = $singleDataFromFebruary2021->Img_Page06 . ".jpg";

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
            $data = $this->getDataByAccountId(Auth::user()->Player_ID);
            return view('player-dashboard')->with('data', $data);
        }
    }

    //get data for SuperUser Account
    public function getViewPlayerDashBoardByAccountId($accountId)
    {
        //get user data and get data
        $data = $this->getDataByAccountId($accountId);

        return view('player-dashboard')->with('data', $data);
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
