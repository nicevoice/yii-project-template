<?php

class IndexController extends BaseController
{
    public function actionIndex()
    {
        $criteria         = new CDbCriteria();
        $criteria->select = 'id, user_id, img, title, description, create_date';
        $criteria->order  = 'id desc';
        $criteria->with   = array('user');

        $dataProvider = new CActiveDataProvider('Article', array(
            'criteria'   => $criteria,
            'pagination' => array(
                'pageSize' => 20,
                'route'    => 'index/index',
                'pageVar'  => 'page',
            ),
        ));
        $data         = compact('dataProvider');
        $this->render('/home/index', $data);
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('//_public/error', $error);
        }
    }
}