<?php
/**
 * Member Levels (member-levels)
 * @var $this LevelController
 * @var $model MemberLevels
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 8 March 2017, 22:24 WIB
 * @link https://github.com/ommu/mod-member
 *
 */

	$this->breadcrumbs=array(
		'Member Levels'=>array('manage'),
		$model->level_id=>array('view','id'=>$model->level_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>