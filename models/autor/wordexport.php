<?php 
include_once '../../config/connection.php';
include 'functions.php';

$authors=author_info();
$author=$authors[0];
var_dump($author);

$wordapp=new COM("Word.Application");
$wordapp->Visible=true;

$wordapp->Documents->Add();
$wordapp->Selection->TypeText("$author->imePrezime \n $author->Indeks \n $author->Opis");
$wordapp->Documents[1]->SaveAs("AboutAuthor.doc");
header("Location: http://spoonandfork.epizy.com/index.php?page=oautoru");