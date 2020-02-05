<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PieController extends ApiController
{
    public function __invoke(Request $request)
    {
        $report = [];
        $month_rl = 0;
        foreach ($request->consultans as $key => $identify) {
            $user =  User::find($identify);

            $filters = $this->filterInvoice($user, $request->dateOne, $request->dateTwo);
            $data_consultans = [];
            $amount = 0;
            foreach ($filters as $ky => $year) {
                $year_rl = 0;
                foreach ($year as $km => $month) {
                    $month_rl = 0;
                    foreach ($month as $kd => $day) {
                        $pr = ($day->total_imp_inc > 0) ? $day->total_imp_inc / 100 : 0;
                        $rl = $day->valor - $day->valor * $pr;
                        $month_rl += $day->valor;
                    }
                    $year_rl += $month_rl;
                }
                $amount += $year_rl;
            }
            
            $data_consultans = Arr::add($data_consultans, $user->no_usuario, $amount);
            array_push($report, $data_consultans);
            
        }

        return $report;
    }
}
