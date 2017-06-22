<?php

class DefaultController extends Controller
{
	
    public $pageMetaDescription;
    public $pageMetaTitle;
    public $pageMetaKeywords;	
	
	
	public function actionIndex()
	{
		
		if(isset($_GET['page'])) {
				$page=$_GET['page'];
				$this->render($page);
		} else {
				//throw new CHttpException(404,'invalid request');
				$this->render('index');
		}
		
	}

}