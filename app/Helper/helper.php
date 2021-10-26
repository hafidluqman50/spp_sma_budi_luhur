<?php
function format_rupiah($money) {
	$hasil_rupiah = 'Rp. ' . number_format($money,2,',','.');
	return $hasil_rupiah;
}

function money_receipt($money) {
	$hasil_rupiah = number_format($money,0,'','.');
	return $hasil_rupiah;
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

function bulan_tahun($date) {
	$explode = explode('-',$date);
	return month($explode[1]).', '.$explode[0];
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
	return $hasil;
}