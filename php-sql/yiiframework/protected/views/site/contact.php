<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$id = Yii::app()->user->id;
$user = Yii::app()->db->createCommand()
    ->select('*')
    ->from('users')
    ->join('profiles', 'users.id=profiles.user_id')
    ->where('id=:id', array(':id'=>$id))
    ->queryRow();

//echo "<pre>";
//print_r($user);
//print_r($_REQUEST);
//echo "</pre>";
//echo Yii::app()->user->id;

$this->pageMetaTitle = $dzialy['metaTitle'];
$this->pageMetaKeywords = $dzialy['metaKeywords'];
$this->pageMetaDescription = $dzialy['metaDescription'];

$this->pageTitle=Yii::app()->name . ' - '.$dzialy['tytul'];
$this->breadcrumbs=array(
	$dzialy['tytul'],
);
?>
<h2>Kontakt z nami</h2>
<hr />

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Jeżeli masz jakies pytania, wypełnij formularz i wyślij do nas zapytanie.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Imie'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Temat'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Wiadomość'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Kod weryfikujący'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Proszę wpisać znaki z obrazka powyżej w celu ochrony przed automatycznym wysyłaniem.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Wyślij'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>