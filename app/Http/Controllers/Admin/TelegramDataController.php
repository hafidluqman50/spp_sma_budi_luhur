<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TelegramData;

class TelegramDataController extends Controller
{
    public function index()
    {
        $title = 'Data Telegram';

        return view('Admin.telegram-data.main',compact('title'));
    }

    public function delete($id)
    {
        TelegramData::where('id_telegram_data',$id)->delete();

        return redirect('/admin/data-telegram')->with('message','Berhasil Hapus Data');
    }

    public function panduanNotifikasi()
    {
        $title = 'Panduan Notifikasi';

        return view('Admin.telegram-data.panduan-notifikasi',compact('title'));
    }
}
