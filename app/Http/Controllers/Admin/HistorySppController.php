<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryProsesSpp;

class HistorySppController extends Controller
{
    public function index()
    {
        $title = 'History SPP | Admin';

        return view('Admin.history-spp.main',compact('title'));
    }

    public function detail($id)
    {
        $title   = 'Detail History SPP | Admin';
        $history = HistoryProsesSpp::where('id_history_proses_spp',$id)->firstOrFail();
        HistoryProsesSpp::where('id_history_proses_spp',$id)->update(['status_terbaca'=>1]);

        return view('Admin.history-spp.detail',compact('title','id','history'));
    }
}
