<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'ID',
            'FirstName',
            'LastName',
            'Email',
            'SignUpDate',
            'IsEmailVerified',
        ];
    }

    public function betweenDate(string $fromDate, string $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;

        return $this;
    }

    public function query()
    {
        return User::query()->where('role_id', 2)->where('test_account_flg', 0)->whereBetween('created_at', [$this->fromDate, $this->toDate])->select(
            'Player_ID as ID',
            'first_name as FirstName',
            'last_name as LastName',
            'email as Email',
            DB::raw("(DATE_FORMAT(created_at, '%m/%d/%Y')) as SignUp_Date"),
            'Email_Sent as IsEmailVerified'
        )
            ->orderBy('created_at')
            ;
    }
}
