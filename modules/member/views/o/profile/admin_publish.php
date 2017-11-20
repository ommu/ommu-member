<?php
/**
 * Member Profiles (member-profile)
 * @var $this ProfileController
 * @var $model MemberProfile
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 2 March 2017, 09:52 WIB
 * @link https://github.com/ommu/mod-member
 * @contact (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Member Profiles'=>array('manage'),
		'Publish',
	);
?>

<?php $form=$this->beginWidget('application.libraries.core.components.system.OActiveForm', array(
	'id'=>'member-profile-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<div class="dialog-content">
		<?php echo $model->publish == 1 ? Yii::t('phrase', 'Are you sure you want to unpublish this item?') : Yii::t('phrase', 'Are you sure you want to publish this item?')?>
	</div>
	<div class="dialog-submit">
		<?php echo CHtml::submitButton($title, array('onclick' => 'setEnableSave()')); ?>
		<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
	</div>
	
<?php $this->endWidget(); ?>
