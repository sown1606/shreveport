<?php

namespace App\Http\Controllers\Voyager;

use App\Data;
use App\Host;
use App\User;
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
        $img = Image::make('/W2G.png');

        $img->text($accountId, 720, 375, function ($font)
        {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(68);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->FName . ' ' . $winLoss->LName, 720, 470, function ($font)
        {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->Address_01, 720, 565, function ($font)
        {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->City . ' ' . $winLoss->State . ' ' . $winLoss->Postal_Code, 720, 660, function ($font)
        {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->FName . ',', 420, 1195, function ($font)
        {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text($winLoss->Year . '*', 2400, 1510, function ($font)
        {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });
        $img->text('$ ' . $winLoss->Win_Loss, 920, 1810, function ($font)
        {
            $font->file(public_path('WinLoss/font.ttf'));
            $font->size(70);
            $font->color('#000000');
            $font->align('left');
            $font->valign('top');
            $font->angle(0);
        });

        if (!File::exists('WinLoss/ImageByAccountId/' . $accountId)) {
            File::makeDirectory('WinLoss/ImageByAccountId/' . $accountId, $mode = 0777, true, true);
            $img->save(public_path('WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->Year . '.jpg'));
        } else {
//            if (!File::exists('WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->BDD_ID . '.jpg'))
            {
                $img->save(public_path('WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->Year . '.jpg'));
            }
        }
    }

    public function makeOffer($accountId, $imageTextData, $fileName)
    {
        // Ví dụ link S3 => 'https://digitaldogdirect.s3.us-east-1.amazonaws.com/...'
        // Tuỳ bạn gán prefix hay full path
        $imageUrl = 'https://digitaldogdirect.s3.us-east-1.amazonaws.com/' . $fileName . '.jpg';

        // Tạo instance Intervention Image
        $img = Image::make($imageUrl);

        // Chèn text
        $img->text($imageTextData, 180, 270, function ($font)
        {
            $font->file(public_path('fonts/steelfish rg.ttf')); // tuỳ font
            $font->size(120);
            $font->color('#000');
            $font->align('left');
            $font->angle(0);
        });

        // Tạo folder local (nếu cần) => “public/Offer/ImageByAccountId/xxx”
        $path = public_path('Offer/ImageByAccountId/' . $accountId);
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        // Lưu file
        $img->save($path . '/' . $fileName . '.jpg');
    }

    public function makePC($imageTextData, $fileName)
    {
        $imageUrl = 'https://digitaldogdirect.s3.us-east-1.amazonaws.com/' . $fileName . '.jpg';
        $img = Image::make($imageUrl);

        // Toạ độ text, font… tuỳ bạn
        $img->text($imageTextData, 580, 760, function ($font)
        {
            $font->file(public_path('fonts/fontb.ttf'));
            $font->size(70);
            $font->color('#000');
            $font->align('center');
            $font->angle(0);
        });

        $dirWeekender = public_path('Weekender/Images');
        if (!File::exists($dirWeekender)) {
            File::makeDirectory($dirWeekender, 0777, true, true);
        }
        $img->save($dirWeekender . '/' . $fileName . '.jpg');
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
        $data->flgWL = 0;

        //Define Host
        $data->hostHost_Name = '';
        $data->hostMarketing_Name = 'Casino Host';
        $data->hostTitle = 'Casino Host';
        $data->hostPhone = '609-882-3444';
        $data->hostCell_Phone = '';
        $data->hostEmail = '';
        $data->hostHost_ID = '';
        $data->hostImage_Name = '/DigitalDogDirect_Logo_NoDogPNG.avif';

        //Get data from Datas table
        $datas = Data::where('Player_ID', $accountId)->first();
        if ($datas) {
            $data->first_name = $datas->FName;
            $data->last_name = $datas->LName;
            $data->Tier = $datas->Tier;
            $data->MTD_Points = $datas->MTD_Points;
            if ($datas->Points !== '') {
                $data->Points = $datas->Points;
            }
            $data->Comp_Dollars = $datas->Comp_Dollars;
            $data->Points_Next_Tier = $datas->Points_Next_Tier;
            $data->Poker_Rating = $datas->Poker_Rating;
            $data->Host_Name = $datas->Host_Name;

            //Get Host
            $host = Host::where('Host_Name', $data->Host_Name)->first();
            if ($host) {
                $data->hostHost_Name = $host->Host_Name;
                $data->hostMarketing_Name = $host->Marketing_Name;
                $data->hostTitle = $host->Title;
                $data->hostPhone = $host->Phone;
                $data->hostCell_Phone = $host->Cell_Phone;
                $data->hostEmail = $host->Email;
                $data->hostHost_ID = $host->Host_ID;
                $data->hostImage_Name = 'https://digitaldogdirect.s3.us-east-1.amazonaws.com/'.$host->Image_Name;
            }
        }

        //Get data from WinLoss table
        $data->winLoss = WinLoss::where('Player_ID', $accountId)->get();
        //check if have data
        if (count($data->winLoss) > 0) {
            $data->flgWL = 1;
        }
        //Make Images For WinLoss
        foreach ($data->winLoss as $winLoss) {
            $this->makeImageWinLoss($accountId, $winLoss);
            $winLoss->imgLink = '/WinLoss/ImageByAccountId/' . $accountId . '/' . $winLoss->Year . '.jpg';
        }

        // ----------- BẮT ĐẦU CODE MỚI CHO MULTIPLE OFFERS -----------
        $data->offers = []; // Initialize an array to hold all offers

        $offers = \App\Offers::where('Player_ID', $accountId)
            ->whereIn('Job_Type', ['PC', 'SM'])
            ->whereRaw("STR_TO_DATE(Expire, '%m/%d/%Y') >= CURDATE()") // Dùng STR_TO_DATE và CURDATE()
            ->get();

        if ($offers->isNotEmpty()) {
            foreach ($offers as $offer) {
                $offerData = [
                    'offer' => $offer,
                    'label' => $offer->Label,
                    'job_type' => $offer->Job_Type,
                    'results' => [],
                ];

                $results = [ // Create array of image page names
                    $offer->Page01,  $offer->Page02,  $offer->Page03,  $offer->Page04,  $offer->Page05,
                    $offer->Page06,  $offer->Page07,  $offer->Page08,  $offer->Page09,  $offer->Page10,
                    $offer->Page11,  $offer->Page12,  $offer->Page13,  $offer->Page14,  $offer->Page15,
                    $offer->Page16,  $offer->Page17,  $offer->Page18,  $offer->Page19,  $offer->Page20,
                ];

                // Filter out nulls and add ".jpg" extension
                $offerData['results'] = array_filter(array_map(function ($page) {
                    return $page ? $page . ".jpg" : null;
                }, $results));

                $data->offers[] = $offerData; // Add offer data to the offers array
            }
        }
        // ----------- KẾT THÚC CODE MỚI CHO MULTIPLE OFFERS -----------

        return $data;
    }

    //get data for User Account
    public function index()
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 4) {
            return Voyager::view('voyager::index');
        } else {
            //get user data and get data
            $data = $this->getDataByAccountId(Auth::user()->Player_ID);
            return view('player-dashboard')->with('data', $data);
        }
    }

    //get data for SuperUser Account
    public function getViewPlayerDashBoardByAccountId($accountId)
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 4) {
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
        while (Storage::disk(config('voyager.storage.disk'))->exists(
            $path . $filename . '.' . $file->getClientOriginalExtension()
        )) {
            $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) .
                (string)($filename_counter++);
        }

        $fullPath = $path . $filename . '.' . $file->getClientOriginalExtension();

        $ext = $file->guessClientExtension();

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            $image = Image::make($file)->resize($resizeWidth, $resizeHeight, function (Constraint $constraint)
                {
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
