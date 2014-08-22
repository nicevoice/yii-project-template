<?php

class CatController extends BaseController
{
	public function actionIndex($id)
	{
        $cat = Category::model()->findByPk($id);
        $this->prepend_title($cat->name . '-');

        $cat_user = PublicUser::getCatUserIdList($id);
        $criteria = new CDbCriteria();
        $criteria->addInCondition('user_id', $cat_user);
        $criteria->order = 't.id desc';
        $criteria->addCondition('t.id>0');
        $criteria->with   = array('user');

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
