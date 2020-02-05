<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class ApiController extends Controller
{
    public function filterInvoice($user, $from, $to)
    {
        $result = $user->invoices
            ->whereBetween('data_emissao', [$from, $to])
            ->groupBy(function ($year) {
                return Carbon::parse($year->data_emissao)->format('Y');
            })->map(function ($invoice) {
                return $invoice->groupBy(function ($month) {
                    return Carbon::parse($month->data_emissao)->format('m');
                });
            });

        return $result;
    }
}
