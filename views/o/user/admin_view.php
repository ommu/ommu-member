<?php
/**
 * Member Users (member-user)
 * @var $this UserController
 * @var $model MemberUser
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (www.ommu.co)
 * @created date 7 March 2017, 23:00 WIB
 * @link https://github.com/ommu/mod-member
 *
 */

	$this->breadcrumbs=array(
		'Member Users'=>array('manage'),
		$model->id,
	);
?>

<div class="dialog-content">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'id',
			'value'=>$model->id,
		),
		array(
			'name'=>'publish',
			'value'=>$model->publish == '1' ? CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/publish.png') : CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/unpublish.png'),
			'type'=>'raw',
		),
		array(
			'name'=>'member_id',
			'value'=>$model->member_id != 0 ? $model->member_id : '-',
		),
		array(
			'name'=>'level_id',
			'value'=>$model->level_id != 0 ? Phrase::trans($model->level->level_name) : '-',
		),
		array(
			'name'=>'user_id',
			'value'=>$model->user_id != 0 ? $model->user->displayname : '-',
		),
		array(
			'name'=>'creation_date',
			'value'=>!in_array($model->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')) ? Utility::dateFormat($model->creation_date, true) : '-',
		),
		array(
			'name'=>'creation_id',
			'value'=>$model->creation_id != 0 ? $model->creation->displayname : '-',
		),
		array(
			'name'=>'modified_date',
			'value'=>!in_array($model->modified_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')) ? Utility::dateFormat($model->modified_date, true) : '-',
		),
		array(
			'name'=>'modified_id',
			'value'=>$model->modified_id != 0 ? $model->modified->displayname : '-',
		),
		array(
			'name'=>'updated_date',
			'value'=>!in_array($model->updated_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')) ? Utility::dateFormat($model->updated_date, true) : '-',
		),
	),
)); ?>
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
