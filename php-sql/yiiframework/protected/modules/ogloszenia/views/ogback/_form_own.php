<?php
/* @var $this OgbackController */
/* @var $model Ogback */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'cities-form',
'enableAjaxValidation'=>false,
'htmlOptions' => array(
'enctype' => 'multipart/form-data',
),
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
		<?php echo $form->labelEx($model,'kategoria'); ?>
				<?php echo $form->dropDownList($model,'kategoria',array(
			'maszyny' => 'maszyny',
			'czesci' => 'czesci',
		));?>

		<?php echo $form->error($model,'kategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stan'); ?>
				<?php echo $form->dropDownList($model,'stan',array(
			'nowy' => 'nowy',
			'używany' => 'używany',
		));?>

		<?php echo $form->error($model,'stan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'opis'); ?>
		<?php echo $form->textArea($model,'opis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'opis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cena'); ?>
		<?php echo $form->textField($model,'cena',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cena'); ?>
	</div>


<? 
	for ($i = 1; $i <= 6; $i++) {
		$zdjecie = "zdjecie".$i;
		if($model->isNewRecord!='1'){
?>

<div class="row">
     <?php echo CHtml::image(Yii::app()->request->baseUrl.'/upload/images/'.$model->$zdjecie,$zdjecie,array("width"=>100)); ?>
</div>

<? } ?>

<div class="row">
        <?php echo $form->labelEx($model,$zdjecie); ?>
        <?php echo $form->fileField($model, $zdjecie); ?>
        <?php echo $form->error($model,$zdjecie); ?>
</div>
<hr />
<? } ?>


	<div class="row">
		<?php echo $form->hiddenField($model,'id_users', array('value'=>Yii::app()->user->id)); ?>
		<?php echo $form->error($model,'id_users'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'id_platnosc', array('value'=>'0')); ?>
		<?php echo $form->error($model,'id_platnosc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->