<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
				
	$criteria=new CDbCriteria();
    $count=Ogback::model()->count($criteria);
    $pages=new CPagination($count);

    // results per page
    $pages->pageSize=10;
    $pages->applyLimit($criteria);
	//$criteria->select= '*';
	$criteria->condition= 'publikacja = 1';
    $models=Ogback::model()->findAll($criteria);

	include "inc/data_settings.php";


    $this->render('index', array(
		'models' => $models,
		'pages' => $pages,
		'dzien'=>$dzien,
		'miesiac'=>$miesiac,
		'miesiacpl'=>$miesiac_PL,
    ));		
		
		
		
		
		//$this->render('index');
	}


	public function actionSearch()
	{
				
	$criteria=new CDbCriteria();
    $count=Ogback::model()->count($criteria);
    $pages=new CPagination($count);

    // results per page
    $pages->pageSize=10;
    $pages->applyLimit($criteria);
	//$criteria->select= '*';
	$criteria->condition= 'publikacja = 1';
    $models=Ogback::model()->findAll($criteria);

	include "inc/data_settings.php";


    $this->render('search_result', array(
		'models' => $models,
		'pages' => $pages,
		'dzien'=>$dzien,
		'miesiac'=>$miesiac,
		'miesiacpl'=>$miesiac_PL,
    ));		
		
		
		
		
		//$this->render('index');
	}



	public function actionDetails()
	{		
		include "inc/data_settings.php";
		// rozmiar miniatury w ogloszeniu
		$width = "170";
		$height = "90"; 
		$this->render('details', array(
			'width'=>$width,
			'height'=>$height,
			'dzien'=>$dzien,
			'miesiac'=>$miesiac,
			'miesiacpl'=>$miesiac_PL,
			
	));
		
	
	}


public function actionCreate()
	{
		
		Yii::app()->user->setFlash('success', "Ogłoszenie dodane poprawnie. Dodane ogłoszenie przekazano do moderatora.");
		Yii::app()->user->setFlash('error', "Data failed!");
		Yii::app()->user->setFlash('notice', "Data ignored.");
		
		$model=new Ogback;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ogback']))
		{
			
			// generujemy losowa liczbe do nazwy pliku
			$rnd = rand(0,9999);  // generate random number between 0-9999
			
			//Pobieramy atrybuty z formularza
			$model->attributes=$_POST['Ogback'];
			
			$ilezdjec = "6";
			
			for ($i = 1; $i <= $ilezdjec; $i++) {
			  $zdjecie = "zdjecie".$i;

			  //Przypisujemy nazwę wysłanego pliku do atrybutu image modelu Post
			  $model->$zdjecie=CUploadedFile::getInstance($model,$zdjecie);
			  //echo $model->$zdjecie=CUploadedFile::getInstance($model,$zdjecie) ."<br>";
			  //echo $model->$zdjecie. "<br>";
			  //exit;
			}
			
			//Przypisujemy nazwę wysłanego pliku do atrybutu file modelu Post 
			//$model->file=CUploadedFile::getInstance($model,'file'); 

			if($model->save())
			{
				if ($model->$zdjecie) {
					//określamy ścieżkę zapisu zdjęcia
					$images_path = realpath(Yii::app()->basePath . '/../upload/images');
					
					//określamy ścieżkę zapisu pliku 
					//$files_path = realpath(Yii::app()->basePath . '/../upload/files');
									
					//zapis image 
					//$model->image->saveAs($images_path . '/' . $model->image);						
					for ($i = 1; $i <= $ilezdjec; $i++) {
						$zdjecie = "zdjecie".$i;
						$model->$zdjecie->saveAs($images_path . '/' . $model->$zdjecie);
						//echo "aaa:" .$model->$zdjecie;
					}
					//zapis pliku
					//$model->file->saveAs($files_path . '/' . $model->file); 
				}
			}
		
		
		// redirect to success page 
		$this->redirect(array('/ogloszenia/ogback/indexown','id'=>$model->id));


		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

}