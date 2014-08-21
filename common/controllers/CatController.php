<?php

class CatController extends BaseController
{
	public function actionIndex($id)
	{
        $cat_user = PublicUser::getCatUserIdList($id);
        $criteria = new CDbCriteria();
        $criteria->addInCondition('user_id', $cat_user);
        $criteria->order = 'id desc';

        $dataProvider=new CActiveDataProvider('Article', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>20,
                'route' => 'cat/index',
                'pageVar' => 'page',
            ),
        ));

        $data = compact('dataProvider');
		$this->render('/home/index', $data);
	}
}
