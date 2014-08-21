<?php
/**
 * @author: Rogee<rogeeyang@gmail.com>
 */

class E_Menu extends CWidget {
    private $data;

    public function init()
    {

        $items = Category::model()->findAll();

        $nav = array();
        foreach($items as $item) {
            $nav[] = array('label'=>$item->name, 'url'=>array('cat/index', 'id'=>$item->id));
        }
        $this->data = $nav;
    }

    public function run()
    {
        array_unshift($this->data, array('label'=>'首页', 'url'=>array('index/index')));
        $data = array('data'=>$this->data);
        $this->render('category', $data);
    }
}