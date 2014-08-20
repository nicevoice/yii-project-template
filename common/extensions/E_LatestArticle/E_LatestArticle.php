<?php
/**
 * @author: Rogee<rogeeyang@gmail.com>
 */

class E_LatestArticle extends CWidget {
    public function run()
    {
        $items = Article::getLatestArticles(10);
        $this->render('latest_article', ['items'=>$items]);
    }
}