<?php
/* @var $this B2backController */
/* @var $model b2back */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'b2back-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->hiddenField($model,'edytowano', array('value'=>date('Y-m-d H:i:s'))); ?>
		<?php echo $form->error($model,'edytowano'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'tytul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'miejsce'); ?>
		<?php echo $form->textField($model,'miejsce',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'miejsce'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obowiazki'); ?>
		<?php echo $form->textArea($model,'obowiazki',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'obowiazki'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wymagania'); ?>
		<?php echo $form->textArea($model,'wymagania',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'wymagania'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oferujemy'); ?>
		<?php echo $form->textArea($model,'oferujemy',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'oferujemy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'opis'); ?>
		<?php echo $form->textArea($model,'opis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'opis'); ?>
	</div>

		<?php echo $form->hiddenField($model,'czas_publikacji', array('value'=>'0')); ?>
		<?php echo $form->error($model,'czas_publikacji'); ?>

		<?php echo $form->hiddenField($model,'glowna', array('value'=>'0')); ?>
		<?php echo $form->error($model,'glowna'); ?>

		<?php echo $form->hiddenField($model,'publikacja', array('value'=>'0')); ?>
		<?php echo $form->error($model,'publikacja'); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Dodaj' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->