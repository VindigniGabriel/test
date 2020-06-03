<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ReportController extends ApiController
{
    public function __invoke(Request $request)
    {
        $report = [];
        $data = [];

        foreach ($request->consultans as $key => $identify) {
            $user =  User::with('invoices','salary')->find($identify);
            $filters = $this->filterInvoice($user, $request->dateOne, $request->dateTwo);
            $data_consultans = [];
            foreach ($filters as $ky => $year) {
                foreach ($year->sortKeys() as $km => $month) {
                    $month_rl = 0;
                    $month_cm = 0;
                    $month_lc = 0;
                    foreach ($month as $kd => $day) {
                        $pr = ($day->total_imp_inc > 0) ? $day->total_imp_inc / 100 : 0;
                        $pc = ($day->comissao_cn > 0) ? $day->comissao_cn / 100 : 0;
                        $sb = ($user->salary !== null) ? $user->salary->brut_salario : 0;
                        $rl = $day->valor - $day->valor * $pr;
                        $cm = ($day->valor - ($day->valor * $pr)) * $pc;
                        $month_rl += $rl;
                        $month_cm += $cm;
                    }
                    $month_lc = ($month_rl) - ($sb + $month_cm);
                    
                    $data = [
                        'Period' => "${km}/${ky}",
                        'Net_Revenue' => $month_rl,
                        'Fixed_Cost' => $sb,
                        'Commission' => $month_cm,
                        'Profit' => $month_lc
                    ];
                    array_push($data_consultans, $data);
                }
            }
            $report_prev = Arr::add(['name' => $user->no_usuario], 'data', $data_consultans);

            array_push($report, $report_prev);
        }
        return $report;
    }
}
