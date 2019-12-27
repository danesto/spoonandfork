<?php include "../../../config/connection.php";
include "functions.php";

$rezervacije = get_reservations();

$excel = new COM("Excel.Application");


$excel->Visible = 1;


$excel->DisplayAlerts = 1;


$workbook = $excel->Workbooks->Open("http://m.xyz/models/admin/rezervacije/rezervacije.xlsx") or die('Ne moze se otvoriti fajl');


$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;

$br = 1;
foreach($rezervacije as $rezervacija){
    
    $polje = $sheet->Range("A{$br}");
    $polje->activate;
    $polje->value = $rezervacija->id_rezervacija;

    
    $polje = $sheet->Range("B{$br}");
    $polje->activate;
    $polje->value = $rezervacija->naziv_restorana;

    
    $polje = $sheet->Range("C{$br}");
    $polje->activate;
    $polje->value = $rezervacija->broj_ljudi;

    $polje = $sheet->Range("D{$br}");
    $polje->activate;
    $polje->value = $rezervacija->datum;

    $polje = $sheet->Range("E{$br}");
    $polje->activate;
    $polje->value = $rezervacija->vreme;

    $polje = $sheet->Range("F{$br}");
    $polje->activate;
    $polje->value = $rezervacija->ime;

    $polje = $sheet->Range("G{$br}");
    $polje->activate;
    $polje->value = $rezervacija->prezime;

    $polje = $sheet->Range("H{$br}");
    $polje->activate;
    $polje->value = $rezervacija->broj_telefona;

    $br++;
}


$polje = $sheet->Range("I{$br}");
$polje->activate;
$polje->value = count($rezervacije);


$workbook->_SaveAs("http://m.xyz/models/admin/rezervacije/rezervacije.xlsx", -4143);
$workbook->Save();

$workbook->Saved=true;
$workbook->Close;

$excel->Workbooks->Close();
$excel->Quit();

unset($sheet);
unset($workbook);
unset($excel);