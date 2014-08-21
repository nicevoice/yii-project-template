<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class E_MpInfo extends CWidget
{
    public $mp_info = null;

    public function init()
    {
        $controller = strtolower(Input::controller()->id);

        $id = null;
        if ($controller == 'a') {
            $id = Article::model()->findByPk(Input::get('id'))->user_id;
        }
        if ($controller == 'mp') {
            $id = Input::get('id');
        }

        if ($id != null) {
            $this->mp_info = PublicUser::model()->findByPk($id);

            if (empty($this->mp_info->signature)) {
                $this->mp_info->signature = '此人极度低调，未填写个人介绍！';
            }

            if (empty($this->mp_info->username) || $this->mp_info->username == '#') {
                $this->mp_info->username = $this->mp_info->fakename;
            }
        }
    }


    public function run()
    {
        if (is_null($this->mp_info)) {
            return;
        }
        $data = $this->mp_info;
        $this->render('mp_info', compact('data'));
    }

}