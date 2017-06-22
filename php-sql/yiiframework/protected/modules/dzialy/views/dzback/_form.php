<?php
/* @var $this DzialyController */
/* @var $model Dzialy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dzialy-form',
	'enableAjaxValidation'=>false,
));
	$dataNow = date('Y:m:d h:i:s');
 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->hiddenField($model,'zmieniono',array('type'=>"hidden",'value'=>$dataNow)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'autor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>40,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tytul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tytul_skrot'); ?>
		<?php echo $form->textField($model,'tytul_skrot',array('size'=>40,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tytul_skrot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tresc'); ?>
		<?php $this->widget('application.extensions.tinymce.ETinyMce',
        
        array(
        'model'=>$model,        
        'attribute'=>'tresc',
        'editorTemplate'=>'full',
        'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
        
        )); ?>
		<?php echo $form->error($model,'tresc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metaTitle'); ?>
		<?php echo $form->textArea($model,'metaTitle',array('size'=>60,'maxlength'=>128,'rows'=>5, 'cols'=>40 )); ?>
		<?php echo $form->error($model,'metaTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metaKeywords'); ?>
		<?php echo $form->textArea($model,'metaKeywords',array('size'=>60,'maxlength'=>128,'rows'=>5, 'cols'=>40 )); ?>
		<?php echo $form->error($model,'metaKeywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metaDescription'); ?>
		<?php echo $form->textArea($model,'metaDescription',array('size'=>60,'maxlength'=>256,'rows'=>5, 'cols'=>40 )); ?>
		<?php echo $form->error($model,'metaDescription'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->