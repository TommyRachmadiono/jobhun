<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use DB;

class UsersExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $data = DB::table('users as u')->select('u.name', 'u.role', 'b.*')
        ->join('biodatas as b', 'b.user_id', '=', 'u.id')->orderBy('u.id');
        
        return $data;
    }
}
