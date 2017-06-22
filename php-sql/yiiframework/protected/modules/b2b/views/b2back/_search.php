<?php
/* @var $this B2backController */
/* @var $model b2back */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dodano'); ?>
		<?php echo $form->textField($model,'dodano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edytowano'); ?>
		<?php echo $form->textField($model,'edytowano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tytul'); ?>
		<?php echo $form->textField($model,'tytul',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'miejsce'); ?>
		<?php echo $form->textField($model,'miejsce',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'obowiazki'); ?>
		<?php echo $form->textArea($model,'obowiazki',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wymagania'); ?>
		<?php echo $form->textArea($model,'wymagania',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oferujemy'); ?>
		<?php echo $form->textArea($model,'oferujemy',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'opis'); ?>
		<?php echo $form->textArea($model,'opis',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publikacja'); ?>
		<?php echo $form->textField($model,'publikacja'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'glowna'); ?>
		<?php echo $form->textField($model,'glowna'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'czas_publikacji'); ?>
		<?php echo $form->textField($model,'czas_publikacji'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->