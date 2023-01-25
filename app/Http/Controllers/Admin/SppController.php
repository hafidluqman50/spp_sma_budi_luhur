<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\TelegramEvents;
use App\Helper\Excel;
use App\Models\TahunAjaran;
use App\Models\KolomSpp;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\KelasSiswa;
use App\Models\Kantin;
use App\Models\PemasukanKantin;
// use Longman\TelegramBot\Telegram;
// use Longman\TelegramBot\Exception\TelegramException;
use Telegram\Bot\Api;
use Telegram;
use Auth;

class SppController extends Controller
{
    public $telegram_api;

    public function __construct()
    {
        $this->telegram_api = new Api(env('TELEGRAM_BOT_API_KEY'));
    }

    public function index()
    {
        $title = 'SPP | Admin';

        return view('Admin.spp.main',compact('title'));
    }

    public function tambah()
    {
        $title        = 'Tambah SPP | Admin';
        $kelas        = Kelas::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();
        $kolom_spp    = KolomSpp::where('status_delete',0)->get();
        $kantin       = Kantin::where('status_delete',0)->get();

        return view('Admin.spp.spp-tambah',compact('title','tahun_ajaran','kolom_spp','kelas','kantin'));
    }

    public function save(Request $request)
    {
        // $tanggal_spp = date('Y-m-d');
        // $siswa       = $request->siswa;
        // $kolom_spp   = $request->kolom_spp;
        // $bayar_spp   = $request->nominal_bayar;

        // $data_spp = [
        //     'id_spp'           => $id_spp,
        //     'id_kelas_siswa'   => $siswa,
        //     'total_pembayaran' => 0,
        // ];

        // Spp::firstOrCreate($data_spp);

        // $sum_total_bayar = 0;

        // foreach ($kolom_spp as $key => $value) {
        //     $id_spp_detail = (string)Str::uuid();
        //     $data_spp_detail[] = [
        //         'id_spp_detail' => $id_spp_detail,
        //         'id_spp'        => $id_spp,
        //         'tanggal_bayar' => $tanggal_spp,
        //         'id_kolom_spp'  => $kolom_spp[$key],
        //         'bayar_spp'     => $bayar_spp[$key]
        //     ];
        //     $sum_total_bayar = $sum_total_bayar+$bayar_spp[$key];
        // }

        // SppDetail::insert($data_spp_detail);
        // Spp::where('id_spp',$id_spp)->update(['total_pembayaran' => $sum_total_bayar]);
        // $bulan_tahun = $request->bulan_tahun;
        $tahun_ajaran = $request->tahun_ajaran;
        $kelas        = $request->kelas;
        $siswa        = $request->siswa;
        $bulan        = $request->bulan_spp;
        $tahun        = $request->tahun_spp;
        $bulan_tahun  = $bulan.', '.$tahun;
        $kantin       = $request->kantin;

        $kolom_spp        = $request->kolom_spp;
        $nominal_spp      = $request->nominal_spp;
        $total_pembayaran = array_sum($nominal_spp);

        // CHECK SISWA //
        if (Spp::where('id_kelas_siswa',$siswa)->count() > 0) {
            $id_spp = Spp::where('id_kelas_siswa',$siswa)->firstOrFail()->id_spp;
            // $total_harus_bayar_spp = Spp::where('id_spp',$id_spp)->firstOrFail()->total_harus_bayar;
            // $data_spp = [
            //     'total_harus_bayar' => $total_pembayaran + $total_harus_bayar_spp
            // ];
            // Spp::where('id_spp',$id_spp)->update($data_spp);
        }
        else {
            $id_spp = (string)Str::uuid();
            $data_spp = [
                'id_spp'            => $id_spp,
                'id_kelas_siswa'    => $siswa,
                // 'total_harus_bayar' => $total_pembayaran,
                'id_users'          => Auth::user()->id_users
            ];
            Spp::create($data_spp);   
        }
        // END CHECK SISWA //

        $id_spp_bulan_tahun = (string)Str::uuid();
        $data_spp_bulan_tahun = [
            'id_spp_bulan_tahun' => $id_spp_bulan_tahun,
            'id_spp'             => $id_spp,
            'bulan_tahun'        => $bulan_tahun,
            'bulan'              => describe_month($bulan),
            'tahun'              => $tahun,
            'id_kantin'          => $kantin
        ];

        SppBulanTahun::create($data_spp_bulan_tahun);

        $data_pemasukan_kantin = [
            'id_spp_bulan_tahun'  => $id_spp_bulan_tahun,
            'id_kantin'           => $kantin,
            'nominal_harus_bayar' => 0,
            'nominal_pemasukan'   => 0
        ];

        foreach ($kolom_spp as $index => $element) {
            $id_spp_detail = (string)Str::uuid();
            $data_spp_detail = [
                'id_spp_detail'      => $id_spp_detail,
                'id_spp_bulan_tahun' => $id_spp_bulan_tahun,
                'id_kolom_spp'       => $kolom_spp[$index],
                'nominal_spp'        => $nominal_spp[$index],
                'bayar_spp'          => 0,
                'sisa_bayar'         => $nominal_spp[$index],
                'status_bayar'       => 0
            ];

            SppDetail::create($data_spp_detail);
            $get_kolom_spp = KolomSpp::where('id_kolom_spp',$kolom_spp[$index])->firstOrFail();
            if ($get_kolom_spp->slug_kolom_spp == 'uang-makan') {
                $data_pemasukan_kantin['nominal_harus_bayar'] = $nominal_spp[$index];

                PemasukanKantin::create($data_pemasukan_kantin);
            }
        }

        return redirect('/admin/spp')->with('message','Berhasil Input Data SPP');
    }

    public function delete($id)
    {
        $spp_row = Spp::getRowById($id);

        // $text_history = Auth::user()->name.' telah menghapus data SPP <b>'.$spp_row->nama_siswa.' '.$spp_row->kelas.' '.$spp_row->tahun_ajaran.'</b>';

        // $history = ['text' => $text_history,'status_terbaca' => 0];
        // HistoryProsesSpp::create($history);
        
        Spp::where('id_spp',$id)->delete();

        return redirect('/admin/spp')->with('message','Berhasil Delete Data SPP');
    }

    public function formImport()
    {
        $title = 'Form Import | Admin';

        return view('Admin.spp.spp-import',compact('title'));
    }

    public function contohImport()
    {
        Excel::contohExportSpp();
    }

    public function import(Request $request)
    {
        $file_import = $request->file_import;

        Excel::importSpp($file_import);

        return redirect('/admin/spp')->with('message','Berhasil Import SPP');
    }

    public function kalkulasiUlang()
    {
        $spp = Spp::all();

        foreach ($spp as $key => $value) {
            $sum_ulang = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                ->where('id_spp',$value->id_spp)
                                ->sum('sisa_bayar');

            Spp::where('id_spp',$value->id_spp)->update(['total_harus_bayar' => $sum_ulang]);
        }

        return redirect('/admin/spp')->with('message','Berhasil Update Total Harus Bayar');
    }

    public function bulanTahunNumeric()
    {
        $spp_bulan_tahun = SppBulanTahun::all();

        foreach ($spp_bulan_tahun as $key => $value) {
            $explode = explode(', ',$value->bulan_tahun);
            dd($explode);
        }
    }

    public function testingBotTelegram()
    {
        $bot_api_key  = env('TELEGRAM_BOT_API_KEY');
        $bot_username = env('TELEGRAM_BOT_USERNAME');
        $hook_url     = 'http://project_work.web';

        try {
            // Create Telegram API object
            $telegram = new Telegram($bot_api_key, $bot_username);

            // Set webhook
            $result = $telegram->setWebhook($hook_url);
            if ($result->isOk()) {
                echo $result->getDescription();
            }
        } catch (TelegramException $e) {
            // log telegram errors
            echo $e->getMessage();
        }
    }

    // public function testChatId()
    // {
    //     $token  = env('TELEGRAM_BOT_TOKEN');
    //     $ch     = curl_init();
    //     $apiURL = "https://api.telegram.org/bot$token/getUpdates";
    //     curl_setopt($ch, CURLOPT_URL, $apiURL); 
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    //     $update = json_decode(curl_exec($ch), TRUE);
    //     dd($update);
    //     dd(array_map("unserialize", array_unique(array_map("serialize", $update['result']))));
    //     $chatID  = $update["message"]["chat"]["id"];
    //     $message = $update["message"]["text"];
    // }

    public function setWebhook()
    {
        $response = Telegram::setWebhook(['url' => env('TELEGRAM_WEBHOOK_URL')]);
        dd($response);
    }

    public function commandHandleWebHook()
    {
        // $update   = Telegram::commandsHandler(true);
        // $chat_id  = $update->getChat()->getId();
        // $username = $update->getChat()->getFirstName();

        // if ($update->getMessage()->getText() == '/start') {
        //     Telegram::sendMessage([
        //         'chat_id' => $chat_id,
        //         'text'    => 'Test Event Laravel'
        //     ]);
        // }
        event(new TelegramEvents);
    }
}
