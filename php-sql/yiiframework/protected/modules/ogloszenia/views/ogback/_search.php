<?php
/* @var $this OgbackController */
/* @var $model Ogback */
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
		<?php echo $form->label($model,'kategoria'); ?>
		<?php echo $form->textField($model,'kategoria',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'opis'); ?>
		<?php echo $form->textArea($model,'opis',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cena'); ?>
		<?php echo $form->textField($model,'cena',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publikacja'); ?>
		<?php echo $form->textField($model,'publikacja'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'czas_publikacji'); ?>
		<?php echo $form->textField($model,'czas_publikacji'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zdjecie1'); ?>
		<?php echo $form->textField($model,'zdjecie1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zdjecie2'); ?>
		<?php echo $form->textField($model,'zdjecie2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zdjecie3'); ?>
		<?php echo $form->textField($model,'zdjecie3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zdjecie4'); ?>
		<?php echo $form->textField($model,'zdjecie4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zdjecie5'); ?>
		<?php echo $form->textField($model,'zdjecie5'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zdjecie6'); ?>
		<?php echo $form->textField($model,'zdjecie6'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_users'); ?>
		<?php echo $form->textField($model,'id_users'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_platnosc'); ?>
		<?php echo $form->textField($model,'id_platnosc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->