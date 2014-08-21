<?php

class MpController extends BaseController
{
	public function actionIndex($id)
	{
        $criteria = new CDbCriteria();
        $criteria->compare('user_id', $id);
        $criteria->order = 'id desc';

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