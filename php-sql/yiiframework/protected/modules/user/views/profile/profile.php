<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);

$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    //array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profil'), 'url'=>array('/user/profile')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Twoje ogłoszenia'), 'url'=>array('/ogloszenia/ogback/indexown')),
    array('label'=>UserModule::t('Dodaj ogłoszenie'), 'url'=>array('/ogloszenia/default/create')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);



?><h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

<!--  flash messages -->

<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect1',
   '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-notice").animate({opacity: 1.0}, 6000).fadeOut("slow");',
   CClientScript::POS_READY
);

?>
<? if ($_POST['Ogback']) { ?>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<? } ?>
<?php
   // foreach(Yii::app()->user->getFlashes() as $key => $message) {
     //   echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    //}
?>

<!-- // flash messages -->



<?

$id = Yii::app()->user->id;
$user = Yii::app()->db->createCommand()
    ->select('*')
    ->from('users')
    ->join('profiles', 'users.id=profiles.user_id')
    ->where('id=:id', array(':id'=>$id))
    ->queryRow();

	//print_r($user);

?>
<? if ($user['rodzaj'] == "1" && $user['nip'] == NULL) { ?>
<div class="flash-notice">Twój profil firmowy nie jest uzupełniony. Aby korzystać w pełni z naszego portalu uzupełnij swój profil.</div>
<? } if ($user['rodzaj'] == "0" && !$user['email']) { ?>
<div class="flash-notice">Twój profil prywatny nie jest uzupełniony. Aby korzystać w pełni z naszego portalu uzupełnij swój profil.</div>
<? } ?>
<table class="dataGrid">
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
	    <td><?php echo CHtml::encode($model->username); ?></td>
	</tr>
	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
	<tr>
		<th class="label"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
    	<td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
	</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
	?>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
    	<td><?php echo CHtml::encode($model->email); ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
    	<td><?php echo $model->create_at; ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
    	<td><?php echo $model->lastvisit_at; ?></td>
	</tr>
	<tr>
		<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
    	<td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
	</tr>
</table>
