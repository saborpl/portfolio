<?php
/* @var $this NebackController */
/* @var $data Neback */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dodano')); ?>:</b>
	<?php echo CHtml::encode($data->dodano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zmieniono')); ?>:</b>
	<?php echo CHtml::encode($data->zmieniono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autor')); ?>:</b>
	<?php echo CHtml::encode($data->autor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tytul')); ?>:</b>
	<?php echo CHtml::encode($data->tytul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tresc')); ?>:</b>
	<?php echo CHtml::encode($data->tresc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publikacja')); ?>:</b>
	<?php echo CHtml::encode($data->publikacja); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('metaTitle')); ?>:</b>
	<?php echo CHtml::encode($data->metaTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metaKeywords')); ?>:</b>
	<?php echo CHtml::encode($data->metaKeywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metaDescription')); ?>:</b>
	<?php echo CHtml::encode($data->metaDescription); ?>
	<br />

	*/ ?>

</div>