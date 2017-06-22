<?php

class OgbackController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}



public function isOwner($user, $rule)
{
        $model = $this->loadModel($_GET['id']);
        return $user->id == Yii::app()->user->id;
}


	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index', 'view'),
				'users'=>array('sabor','piotr','admin'),
			),

			array('allow',
				'actions'=>array('indexown'),
				'users'=>array('@'),			
			),
			array('allow',
				'actions'=>array('updateown'),
				'users'=>array('@'),
				'expression' => array($this, 'isOwner'),
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 

public function actionCreate()
	{
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
		$this->redirect(array('view','id'=>$model->id));


		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ogback']))
		{
			//echo "<pre>";
			//print_r($_POST['Ogback']);
			//echo "</pre>";
			 // Zapisujemy w zmiennej stary atrybut image
			$old_zdjecie1 = $model->zdjecie1;
			$old_zdjecie2 = $model->zdjecie2;
			$old_zdjecie3 = $model->zdjecie3;
			$old_zdjecie4 = $model->zdjecie4;
			$old_zdjecie5 = $model->zdjecie5;
			$old_zdjecie6 = $model->zdjecie6;
			
			// Zapisujemy w zmiennej stary atrybut pliku
			$old_file = $model->file;  
			// Pobieramy atrybuty z formularza
			$model->attributes=$_POST['Ogback']; 
			
			//Zapisujemy do zmiennej pobrane dane z formularzy(jeśli pola były użyte)
			
			//Zapisujemy do zmiennej pobrane dane
			$zdjecie1 = CUploadedFile::getInstance($model,'zdjecie1');
			$zdjecie2 = CUploadedFile::getInstance($model,'zdjecie2');
			$zdjecie3 = CUploadedFile::getInstance($model,'zdjecie3');
			$zdjecie4 = CUploadedFile::getInstance($model,'zdjecie4');
			$zdjecie5 = CUploadedFile::getInstance($model,'zdjecie5');
			$zdjecie6 = CUploadedFile::getInstance($model,'zdjecie6');
			
			//Sprawdzamy, czy pole image było wypełnione, jeśli nie to zostanie użyta zmienna $old_image
			$file = CUploadedFile::getInstance($model,'file');

		if (is_object($zdjecie1) && get_class($zdjecie1)==='CUploadedFile') {
			$model->zdjecie1 = $zdjecie1;
		} else {
			$model->zdjecie1 = $old_zdjecie1;
		}
		
		if (is_object($zdjecie2) && get_class($zdjecie2)==='CUploadedFile') {
			$model->zdjecie2 = $zdjecie2;
		} else {
			$model->zdjecie2 = $old_zdjecie2;
		}
		
		if (is_object($zdjecie3) && get_class($zdjecie3)==='CUploadedFile') {
			$model->zdjecie3 = $zdjecie3;
		} else {
			$model->zdjecie3 = $old_zdjecie3;
		}
		
		if (is_object($zdjecie4) && get_class($zdjecie4)==='CUploadedFile') {
			$model->zdjecie4 = $zdjecie4;
		} else {
			$model->zdjecie4 = $old_zdjecie4;
		}
		
		if (is_object($zdjecie5) && get_class($zdjecie5)==='CUploadedFile') {
			$model->zdjecie5 = $zdjecie5;
		} else {
			$model->zdjecie5 = $old_zdjecie5;
		}
		
		if (is_object($zdjecie6) && get_class($zdjecie6)==='CUploadedFile') {
			$model->zdjecie6 = $zdjecie6;
		} else {
			$model->zdjecie6 = $old_zdjecie6;
		}



		//Sprawdzamy, czy pole file było wypełnione, jeśli nie to zostanie użyta zmienna $old_file
		if (is_object($file) && get_class($file)==='CUploadedFile') {
			$model->file = $file;
		} else {
			$model->file = $old_file;
		}	

			//Zapis plików
			if($model->save()){


				if (is_object($zdjecie1) && get_class($zdjecie1)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie1->saveAs($images_path . '/' . $model->zdjecie1);
				}

				if (is_object($zdjecie2) && get_class($zdjecie2)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie2->saveAs($images_path . '/' . $model->zdjecie2);
				}

				if (is_object($zdjecie3) && get_class($zdjecie3)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie3->saveAs($images_path . '/' . $model->zdjecie3);
				}

				if (is_object($zdjecie4) && get_class($zdjecie4)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie4->saveAs($images_path . '/' . $model->zdjecie4);
				}

				if (is_object($zdjecie5) && get_class($zdjecie5)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie5->saveAs($images_path . '/' . $model->zdjecie5);
				}

				if (is_object($zdjecie6) && get_class($zdjecie6)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie6->saveAs($images_path . '/' . $model->zdjecie6);
				}




				if (is_object($file) && get_class($file)==='CUploadedFile') {
					$files_path = realpath(Yii::app()->basePath . '/../upload/files/');
					$model->file->saveAs($files_path.$model->file);
				}
				$this->redirect(array('view','id'=>$model->id));
				}

		}
		$this->render('update',array(
			'model'=>$model,
		));

	}
		


	public function actionUpdateOwn($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ogback']))
		{
			//echo "<pre>";
			//print_r($_POST['Ogback']);
			//echo "</pre>";
			 // Zapisujemy w zmiennej stary atrybut image
			$old_zdjecie1 = $model->zdjecie1;
			$old_zdjecie2 = $model->zdjecie2;
			$old_zdjecie3 = $model->zdjecie3;
			$old_zdjecie4 = $model->zdjecie4;
			$old_zdjecie5 = $model->zdjecie5;
			$old_zdjecie6 = $model->zdjecie6;
			
			// Zapisujemy w zmiennej stary atrybut pliku
			$old_file = $model->file;  
			// Pobieramy atrybuty z formularza
			$model->attributes=$_POST['Ogback']; 
			
			//Zapisujemy do zmiennej pobrane dane z formularzy(jeśli pola były użyte)
			
			//Zapisujemy do zmiennej pobrane dane
			$zdjecie1 = CUploadedFile::getInstance($model,'zdjecie1');
			$zdjecie2 = CUploadedFile::getInstance($model,'zdjecie2');
			$zdjecie3 = CUploadedFile::getInstance($model,'zdjecie3');
			$zdjecie4 = CUploadedFile::getInstance($model,'zdjecie4');
			$zdjecie5 = CUploadedFile::getInstance($model,'zdjecie5');
			$zdjecie6 = CUploadedFile::getInstance($model,'zdjecie6');
			
			//Sprawdzamy, czy pole image było wypełnione, jeśli nie to zostanie użyta zmienna $old_image
			$file = CUploadedFile::getInstance($model,'file');

		if (is_object($zdjecie1) && get_class($zdjecie1)==='CUploadedFile') {
			$model->zdjecie1 = $zdjecie1;
		} else {
			$model->zdjecie1 = $old_zdjecie1;
		}
		
		if (is_object($zdjecie2) && get_class($zdjecie2)==='CUploadedFile') {
			$model->zdjecie2 = $zdjecie2;
		} else {
			$model->zdjecie2 = $old_zdjecie2;
		}
		
		if (is_object($zdjecie3) && get_class($zdjecie3)==='CUploadedFile') {
			$model->zdjecie3 = $zdjecie3;
		} else {
			$model->zdjecie3 = $old_zdjecie3;
		}
		
		if (is_object($zdjecie4) && get_class($zdjecie4)==='CUploadedFile') {
			$model->zdjecie4 = $zdjecie4;
		} else {
			$model->zdjecie4 = $old_zdjecie4;
		}
		
		if (is_object($zdjecie5) && get_class($zdjecie5)==='CUploadedFile') {
			$model->zdjecie5 = $zdjecie5;
		} else {
			$model->zdjecie5 = $old_zdjecie5;
		}
		
		if (is_object($zdjecie6) && get_class($zdjecie6)==='CUploadedFile') {
			$model->zdjecie6 = $zdjecie6;
		} else {
			$model->zdjecie6 = $old_zdjecie6;
		}



		//Sprawdzamy, czy pole file było wypełnione, jeśli nie to zostanie użyta zmienna $old_file
		if (is_object($file) && get_class($file)==='CUploadedFile') {
			$model->file = $file;
		} else {
			$model->file = $old_file;
		}	

			//Zapis plików
			if($model->save()){


				if (is_object($zdjecie1) && get_class($zdjecie1)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie1->saveAs($images_path . '/' . $model->zdjecie1);
				}

				if (is_object($zdjecie2) && get_class($zdjecie2)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie2->saveAs($images_path . '/' . $model->zdjecie2);
				}

				if (is_object($zdjecie3) && get_class($zdjecie3)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie3->saveAs($images_path . '/' . $model->zdjecie3);
				}

				if (is_object($zdjecie4) && get_class($zdjecie4)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie4->saveAs($images_path . '/' . $model->zdjecie4);
				}

				if (is_object($zdjecie5) && get_class($zdjecie5)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie5->saveAs($images_path . '/' . $model->zdjecie5);
				}

				if (is_object($zdjecie6) && get_class($zdjecie6)==='CUploadedFile') {
					$images_path = realpath(Yii::app()->basePath . '/../upload/images/');
					$model->zdjecie6->saveAs($images_path . '/' . $model->zdjecie6);
				}




				if (is_object($file) && get_class($file)==='CUploadedFile') {
					$files_path = realpath(Yii::app()->basePath . '/../upload/files/');
					$model->file->saveAs($files_path.$model->file);
				}
				$this->redirect(array('indexown','id'=>$model->id));
				}

		}
		$this->render('update_own',array(
			'model'=>$model,
		));

	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ogback');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}




	/**
	 * Lists all models.
	 */
	public function actionIndexOwn($criteria = null)
	{
		
		
		
		
$sql='SELECT * FROM ogloszenia WHERE id_users = '.Yii::app()->user->id.'';
$dataProvider=new CSqlDataProvider($sql);
// $dataProvider->getData() will return a list of arrays.
$ogloszeniaOwn = $dataProvider->getData();
		
// return $dataProvider;
 		
		//$dataProvider=new CActiveDataProvider('Ogback');
		$this->render('index_own',array(
			'dataProvider'=>$dataProvider,
			'ogloszeniaOwn'=>$ogloszeniaOwn,
		));
	}



	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ogback('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ogback']))
			$model->attributes=$_GET['Ogback'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ogback the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ogback::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ogback $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ogback-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
