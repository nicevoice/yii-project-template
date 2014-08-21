<?php

/**
 * @author: Rogee<rogeeyang@gmail.com>
 */
class E_PageTitle extends CWidget
{
    public $page_title;
    public function init()
    {
        $contorller = strtolower(Input::controller()->id);
        $id = Input::get('id');

        switch($contorller) {
            case 'a':
                $this->page_title = '';
                break;
            case 'mp':
                $mp = PublicUser::model()->findByPk($id);
                if (!$mp) {
                    throw new CHttpException(Response::RESPONSE_CODE_404);
                }
                $this->page_title = sprintf('<h1>%s</h1> 发布的聚合微信头条！', EHtml::link($mp->nickname, Url::get('mp/index', array('id'=>$id)), array('class'=>'name-title')));
                break;
            case 'cat':
                $cat = Category::model()->findByPk($id);
                if (!$cat) {
                    throw new CHttpException(Response::RESPONSE_CODE_404);
                }
                $this->page_title = sprintf('<h1>%s</h1> 分类下的聚合微信头条！', EHtml::link($cat->name, Url::get('cat/index', array('id'=>$id)), array('class'=>'name-title')));
                break;
            default:
                $this->page_title = sprintf('<h1>%s</h1> 聚合全网微信头条！', EHtml::link('酷饭网', 'http://qoofan.com', array('class'=>'name-title')));
        }
    }
    public function run()
    {
        $page_title = $this->page_title;

        $this->render('page_title', compact('page_title'));
    }
} 