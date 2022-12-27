<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryProsesSpp;

class HistorySppController extends Controller
{
    public function index()
    {
        $title = 'History SPP | Kepsek';
        HistoryProsesSpp::query()->update(['status_terbaca' => 1]);

        return view('Kepsek.history-spp.main',compact('title'));
    }

    public function detail($id)
    {
        $title   = 'Detail History SPP | Kepsek';
        $history = HistoryProsesSpp::where('id_history_proses_spp',$id)->firstOrFail();
        HistoryProsesSpp::where('id_history_proses_spp',$id)->update(['status_terbaca'=>1]);

        return view('Kepsek.history-spp.detail',compact('title','id','history'));
    }
}
