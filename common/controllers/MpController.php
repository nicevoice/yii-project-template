<?php

class MpController extends BaseController
{
	public function actionIndex($id)
	{
        $mp = PublicUser::model()->findByPk($id);
        $this->prepend_title($mp->nickname.'-');

        $criteria = new CDbCriteria();
        $criteria->compare('user_id', $id);
        $criteria->order = 't.id desc';
        $criteria->addCondition('t.id>0');
        $criteria->with   = array('user');


        $dataProvider=new CActiveDataProvider('Article', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>20,
                'route' => 'mp/index',
                'pageVar' => 'page',
            ),
        ));


        $data = compact('dataProvider');
        $this->render('/home/index', $data);
	}
}