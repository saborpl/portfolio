<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}


	public function actionDetails()
	{		
		include "inc/data_settings.php";
		// rozmiar miniatury w ogloszeniu
		$this->render('details');
		
	
	}



}