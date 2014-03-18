<?php
class ErrorAction extends CAction
{
    public function run()
    {
        $suffix = YII_DEBUG ? "_debug" : "_product";
        if($error = Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->controller->render('//public/error'.$suffix, $error);
        }
    }
}