<?php
function format_rupiah($money) {
	$hasil_rupiah = 'Rp. ' . number_format($money,2,',','.');
	return $hasil_rupiah;
}

function count_history_unread_navbar() {
	$get = App\Models\HistoryProsesSpp::where('status_terbaca',0)->count();

	return $get;
}

function keterangan_bulan_bayar($str) {
	// dd($str);
	$explode1      = explode(' - ',$str);
	if (str_contains($explode1[0], ', ')) {
		$explode_awal  = explode(', ',$explode1[0]);	
	}
	else if (str_contains($explode1[0], ' ')) {
		$explode_awal = explode(' ',$explode1[0]);
	}
	else {
		$explode1[0]  = $explode1[0].' '.substr($explode1[1],-4);
		$explode_awal = explode(' ',$explode1[0]);
	}

	if (str_contains($explode1[1],', ')) {
		$explode_akhir = explode(', ',$explode1[1]);
	}
	else if (str_contains($explode1[1], ' ')) {
		$explode_akhir = explode(' ',$explode1[1]);
	}
	else {
		$explode1[1]  = $explode1[1].' '.substr($explode1[0],-4);
		$explode_akhir = explode(' ',$explode1[1]);
	}

	if ($explode_awal[1] == $explode_akhir[1]) {
		if (describe_month($explode_awal[0]) < describe_month($explode_akhir[0])) {
			$result = $explode_awal[0].' - '.$explode_akhir[0].' '.$explode_awal[1];
		}
		else {
			$result = $explode_akhir[0].' - '.$explode_awal[0].' '.$explode_awal[1];
		}
	}
	else {
		if ($explode_akhir[1] < $explode_awal[1]) {
			$result = $explode_akhir[0].' '.$explode_akhir[1].' - '.$explode_awal[0].' '.$explode_awal[1];
		}
		else {
			$result = $explode_awal[0].' '.$explode_awal[1].' - '.$explode_akhir[0].' '.$explode_akhir[1];
		}
	}

	return $result;
}

function bulan_tahun_excel($str) {
	$pieces = explode(", ", $str);

	return strtolower(substr($pieces[0],0,3).' '.$pieces[1]);
}

function bulan_tahun_excel_numeric($bulan,$tahun) {
	$str    = month($bulan).', '.$tahun;
	$pieces = explode(", ", $str);

	return strtolower(substr($pieces[0],0,3).' '.$pieces[1]);
}

function get_history_navbar() {
	$get = App\Models\HistoryProsesSpp::orderBy('created_at','DESC')->limit(6)->get();

	return $get;
}

function zero_front_number($num) {
	$num_padded = sprintf("%02d", $num);
	return $num_padded;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function money_receipt($money) {
	$hasil_rupiah = number_format($money,0,'','.');
	return $hasil_rupiah;
}

function find_replace_strip($str1,$str2) {
	$affix = ' - ';
	$check = strpos($str1,$affix);

	if ($check !== false) {
		$awal_str  = strstr($str1,' - ',true);
		$akhir_str = strstr($str1,' - ');
		// dd($a);

		$replace    = str_replace($akhir_str,' - '.$str2,$akhir_str);
		$return_str = $awal_str.''.$replace;
	}
	else {
		$return_str = $str1.' - '.$str2;
	}
	// dd($return_str);
	return $return_str;
}

function import_date_excel($date) {
	$explode = explode('-',$date);
	return $explode[2].'-'.$explode[1].'-'.ltrim($explode[0],"'");
}

function unslug_str($str) {
	if (strpos($str,'-') !== false) {
		$get   = explode('-',$str);
		$words =  ucwords($get[0]).' '.ucwords($get[1]);
	}
	else {
		$words = ucwords($str);
	}

	return $words;
}

function human_date($date) {
	$explode = explode('-',$date);
	return $explode[2].' '.month($explode[1]).' '.$explode[0];
}

function month($get_month) {
	if (strlen($get_month) == 1) {
		$month = '0'.(string)$get_month;
	}
	else {
		$month = $get_month;
	}
	
	$array = [
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];
	return $array[$month];
}

function describe_month($month) {
	$array = [
		'Januari'   => 1,
		'Februari'  => 2,
		'Maret'     => 3,
		'April'     => 4,
		'Mei'       => 5,
		'Juni'      => 6,
		'Juli'      => 7,
		'Agustus'   => 8,
		'September' => 9,
		'Oktober'   => 10,
		'November'  => 11,
		'Desember'  => 12
	];
	return $array[$month];
}

function bulan_tahun($date) {
	$explode = explode('-',$date);
	return month($explode[1]).', '.$explode[0];
}

function tahun_laporan($bulan,$tahun_ajaran) {
	$explode            = explode('/',$tahun_ajaran);
	$get_describe_month = $bulan;
    $bulan_array = [0 => [7=>7,8=>8,9=>9,10=>10,11=>11,12=>12], 1 => [1=>1,2=>2,3=>3,4=>4,5=>5,6=>6]];
    if (isset($bulan_array[0][$get_describe_month])) {
    	$val = $explode[0];
    }
    else {
    	$val = $explode[1];
    }

    return $val;
}

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil.' Rupiah';
}

if (! function_exists('divnum')) {
    function divnum($numerator, $denominator)
    {
        return $denominator == 0 ? 0 : ($numerator / $denominator);
    }
}

function persentase_pendapatan($uang_sekarang,$uang_lalu) {
	if ($uang_sekarang == 0 && $uang_lalu == 0) {
		$percentChange = 0;
	}
	else {
		$percentChange = round((1 - divnum($uang_sekarang,$uang_lalu)) * 100);
	}

	return $percentChange;
}

function persentase_penerimaan($oldPrice,$newPrice) {
	$percentChange = (100 * $newPrice) / $oldPrice;

	return floor($percentChange);
}

function backwards_date($param,$date) {
    $new_date = date('Y-m-d', strtotime($param, strtotime($date)));

    return $new_date;
}

function date_excel($date) {
	$new_date = date('d/m/Y',strtotime($date));

	return $new_date;
}

function vertical_text($str) {
	$str = preg_split('/\r|\n/',$str);

    $maxlength = 0;

    $totalstr = count($str);

    for($i=0;$i<$totalstr;$i++){
        if($maxlength<strlen($str[$i])){
            $maxlength = strlen($str[$i]);
        }
    }

    $strings = array();

    for($i=0;$i<$maxlength;$i++){
        $strings[$i] = "";
        for($j=0;$j<$totalstr;$j++){
            $temp = strlen($str[$j])-($maxlength-$i);
            if($temp>=0){
                $strings[$i] .= substr($str[$j],$temp,1);
            }
            else{
                $strings[$i] .= " ";
            }
        }
    }

    echo '<pre>'.implode("\r",$strings).'</pre>';
}