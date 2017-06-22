<?php
/* @var $this B2backController */
/* @var $data b2back */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dodano')); ?>:</b>
	<?php echo CHtml::encode($data->dodano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edytowano')); ?>:</b>
	<?php echo CHtml::encode($data->edytowano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tytul')); ?>:</b>
	<?php echo CHtml::encode($data->tytul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miejsce')); ?>:</b>
	<?php echo CHtml::encode($data->miejsce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obowiazki')); ?>:</b>
	<?php echo CHtml::encode($data->obowiazki); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wymagania')); ?>:</b>
	<?php echo CHtml::encode($data->wymagania); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('oferujemy')); ?>:</b>
	<?php echo CHtml::encode($data->oferujemy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('opis')); ?>:</b>
	<?php echo CHtml::encode($data->opis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publikacja')); ?>:</b>
	<?php echo CHtml::encode($data->publikacja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('glowna')); ?>:</b>
	<?php echo CHtml::encode($data->glowna); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('czas_publikacji')); ?>:</b>
	<?php echo CHtml::encode($data->czas_publikacji); ?>
	<br />

	*/ ?>

</div>