<?php
/* @var $this NebackController */
/* @var $model Neback */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'neback-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->hiddenField($model,'zmieniono', array('value'=>date('Y-m-d H:i:s'))); ?>
		<?php echo $form->error($model,'zmieniono'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'autor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tytul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tresc'); ?>
		<?php echo $form->textArea($model,'tresc',array('rows'=>10, 'cols'=>50, 'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tresc'); ?>
	</div>

	<? /*<div class="row">
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
*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'publikacja'); ?>
				<?php echo $form->dropDownList($model,'publikacja',array(
			'0' => 'nie',
			'1' => 'tak',
		));?>
		<?php echo $form->error($model,'publikacja'); ?>
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