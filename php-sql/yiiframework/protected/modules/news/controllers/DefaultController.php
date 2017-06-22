<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		include "inc/data_settings.php";
		$this->render('index', array(
		'dzien'=>$dzien,
		'miesiac'=>$miesiac,
		'miesiacpl'=>$miesiac_PL,
	));
	}

	public function actionDetails()
	{
		include "inc/data_settings.php";
		$this->render('details', array(
		'dzien'=>$dzien,
		'miesiac'=>$miesiac,
		'miesiacpl'=>$miesiac_PL,
	));
	}
}