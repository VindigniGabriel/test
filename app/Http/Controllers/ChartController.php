<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ChartController extends ApiController
{
    public function __invoke(Request $request)
    {
        $report = [];
        $countConsultans = 0;
        $salarySum = 0;
        $salaryAvg = 0;
        foreach ($request->consultans as $key => $identify) {
            $countConsultans++;
            $user =  User::find($identify);
            if ($user->salary !== null) {
                $salarySum += $user->salary->brut_salario;
                $salaryAvg = $salarySum / $countConsultans;
            }

            $filters = $this->filterInvoice($user, $request->dateOne, $request->dateTwo);
            $data_consultans = [];
            foreach ($filters as $ky => $year) {
                foreach ($year->sortKeys() as $km => $month) {
                    $month_rl = 0;
                    foreach ($month as $kd => $day) {
                        $pr = ($day->total_imp_inc > 0) ? $day->total_imp_inc / 100 : 0;
                        $rl = $day->valor - $day->valor * $pr;
                        $month_rl += $rl;
                    }
                    

                    //array_push($data_consultans, ["${km}/${ky}" => $month_rl]);

                    $data_consultans = Arr::add($data_consultans, "${km}/${ky}", $month_rl);
                }
            }

            $report_prev = Arr::add(['label' => $user->no_usuario], 'data', $data_consultans);

            array_push($report, $report_prev);
        }

        array_push($report, ['avg' => $salaryAvg]);


        return $report;
    }
}
