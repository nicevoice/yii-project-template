<?php
class E_PageMeta extends CWidget
{
    public function run()
    {
        $controller = strtolower(Input::controller()->id);
        if ($controller != 'a') {
            return ;
        }

        $id = Input::get('id');
        $data = Article::model()->findByPk($id);

        $this->render('meta', compact('data'));
    }
}