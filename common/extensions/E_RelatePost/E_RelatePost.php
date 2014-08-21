<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class E_RelatePost extends CWidget
{
    public $count = 10;
    public $user_id;

    private $_data;
    private $_user;

    public function init()
    {
        $this->_data = Article::getUserLatestArticle($this->user_id, $this->count);
        $this->_user = PublicUser::model()->findByPk($this->user_id);
    }

    public function run()
    {
        $items = $this->_data;
        $user  = $this->_user;
        $this->render('relate_post', compact('user', 'items'));
    }
}