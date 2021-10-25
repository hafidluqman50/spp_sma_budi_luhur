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