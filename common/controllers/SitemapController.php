<?php

class SitemapController extends BaseController
{
    private $cnt = 10000;
    private $index_file = 'sitemap.xml';
	public function actionIndex()
	{
        set_time_limit(0);
        $last_page = Sitemap::model()->find(['select'=>'max(page) as page'])->page;
        Sitemap::updateUpdateMaxTime();
        if (intval($last_page) ==0 ) {
            $last_page = Sitemap::incr(0)->page;
        }

        $this->generateCatSitemap();
        $this->generateMpSitemap();
        $this->generateItemSitemap($last_page);
        $this->generateIndexSitemap();
        $this->redirect('http://qoofan.com/sitemap.xml');
    }

    private function generateItemSitemap($page){
        $criteria = new CDbCriteria();
        $criteria->offset = ($page-1) * $this->cnt;
        $criteria->limit = $this->cnt;

        $items = Article::model()->findAll($criteria);
        $item_cnt = count($items);
        $content = $this->renderPartial('item', compact('items'), true);
        $items=null;
        file_put_contents("./_sitemap/$page.xml", $content);

        //按序列生成
        if ($item_cnt == $this->cnt) {
            $new_page = Sitemap::incr($page)->page;
            $this->generateItemSitemap($new_page);
        }
    }

    private function generateCatSitemap()
    {
        $items = Category::model()->findAll();
        $content = $this->renderPartial('cat', compact('items'), true);
        file_put_contents("./_sitemap/cat.xml", $content);
    }

    private function generateMpSitemap()
    {
        $items = PublicUser::model()->findAll();
        $content = $this->renderPartial('mp', compact('items'), true);
        file_put_contents("./_sitemap/mp.xml", $content);
    }

    private function generateIndexSitemap()
    {
        $items = Sitemap::model()->findAll();
        $content = $this->renderPartial('index', compact('items'), true);
        file_put_contents('./sitemap.xml', $content);
    }
}
