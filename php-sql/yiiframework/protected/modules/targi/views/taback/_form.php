<?php
/* @var $this TabackController */
/* @var $model Taback */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'taback-form',
	'enableAjaxValidation'=>false,
)); 
	$dataNow = date('Y:m:d h:i:s');

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tytul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'autor'); ?>
	</div>


	<div class="row">
		<?php echo $form->hiddenField($model,'zmieniono',array('type'=>"hidden",'value'=>$dataNow)); ?>
		<?php echo $form->error($model,'zmieniono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'od'); ?>

		<?
		  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			  'model' => $model,
			  'attribute' => 'od',
			  'language' => 'pl',
			  // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
			  'htmlOptions' => array(
				  'size' => '10',
				  'maxlength' => '10',
			  ),
			  'options' => array(
				  'showOn' => 'both',             // also opens with a button
				  'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
				  'showOtherMonths' => true,      // show dates in other months
				  'selectOtherMonths' => true,    // can seelect dates in other months
				  'changeYear' => true,           // can change year
				  'changeMonth' => true,          // can change month
				  'yearRange' => '2013:2099',     // range of year
				  'minDate' => '2013-09-01',      // minimum date
				  'maxDate' => '2099-12-31',      // maximum date
				  'showButtonPanel' => true,      // show button panel
			  ),
			  
		  ));		
		?>

		<?php echo $form->error($model,'od'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'do'); ?>
		<?
		  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			  'model' => $model,
			  'attribute' => 'do',
			  'language' => 'pl',
			  // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js',
			  'htmlOptions' => array(
				  'size' => '10',
				  'maxlength' => '10',
			  ),
			  'options' => array(
				  'showOn' => 'both',             // also opens with a button
				  'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
				  'showOtherMonths' => true,      // show dates in other months
				  'selectOtherMonths' => true,    // can seelect dates in other months
				  'changeYear' => true,           // can change year
				  'changeMonth' => true,          // can change month
				  'yearRange' => '2013:2099',     // range of year
				  'minDate' => '2013-09-01',      // minimum date
				  'maxDate' => '2099-12-31',      // maximum date
				  'showButtonPanel' => true,      // show button panel
			  ),
			  
		  ));		
		?>
		<?php echo $form->error($model,'do'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'tresc'); ?>
		<?php echo $form->textArea($model,'tresc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tresc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metaTitle'); ?>
		<?php echo $form->textField($model,'metaTitle',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'metaTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metaKeywords'); ?>
		<?php echo $form->textField($model,'metaKeywords',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'metaKeywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metaDescription'); ?>
		<?php echo $form->textField($model,'metaDescription',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'metaDescription'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->