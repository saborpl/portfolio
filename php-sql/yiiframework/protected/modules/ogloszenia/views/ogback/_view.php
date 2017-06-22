<?php
/* @var $this OgbackController */
/* @var $data Ogback */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('kategoria')); ?>:</b>
	<?php echo CHtml::encode($data->kategoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stan')); ?>:</b>
	<?php echo CHtml::encode($data->stan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('opis')); ?>:</b>
	<?php echo CHtml::encode($data->opis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cena')); ?>:</b>
	<?php echo CHtml::encode($data->cena); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('publikacja')); ?>:</b>
	<?php echo CHtml::encode($data->publikacja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('czas_publikacji')); ?>:</b>
	<?php echo CHtml::encode($data->czas_publikacji); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zdjecie1')); ?>:</b>
	<?php echo CHtml::encode($data->zdjecie1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zdjecie2')); ?>:</b>
	<?php echo CHtml::encode($data->zdjecie2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zdjecie3')); ?>:</b>
	<?php echo CHtml::encode($data->zdjecie3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zdjecie4')); ?>:</b>
	<?php echo CHtml::encode($data->zdjecie4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zdjecie5')); ?>:</b>
	<?php echo CHtml::encode($data->zdjecie5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zdjecie6')); ?>:</b>
	<?php echo CHtml::encode($data->zdjecie6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_users')); ?>:</b>
	<?php echo CHtml::encode($data->id_users); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_platnosc')); ?>:</b>
	<?php echo CHtml::encode($data->id_platnosc); ?>
	<br />

	*/ ?>

</div>