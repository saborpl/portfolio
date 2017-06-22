<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		include "inc/data_settings.php";
		// rozmiar miniatury w ogloszeniu
		$this->render('index', array(
			'dzien'=>$dzien,
			'miesiac'=>$miesiac,
			'miesiacpl'=>$miesiac_PL,
			
	));
}
	public function actionDetails()
	{
		include "inc/data_settings.php";
		// rozmiar miniatury w ogloszeniu
		$this->render('details', array(
			'dzien'=>$dzien,
			'miesiac'=>$miesiac,
			'miesiacpl'=>$miesiac_PL,
			
	));
}
}