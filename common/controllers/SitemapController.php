<?php

class SitemapController extends BaseController
{
    private $cnt = 10000;
    private $index_file = 'sitemap.xml';
	public function actionIndex()
	{
        $last_page = Sitemap::model()->find(['select'=>'max(page) as page'])->page;
        if (intval($last_page) ==0 ) {
            $last_page = Sitemap::incr(0)->page;
        }

        $this->generateCatSitemap();
        $this->generateMpSitemap();
        $this->generateItemSitemap($last_page);
        $this->generateIndexSitemap();
        echo "done";
    }

    private function generateItemSitemap($page){
        $criteria = new CDbCriteria();
        $criteria->offset = ($page-1) * $this->cnt;
        $criteria->limit = $this->cnt;

        $items = Article::model()->findAll($criteria);
        $content = $this->renderPartial('item', compact('items'), true);
        file_put_contents("./sitemap/$page.xml", $content);

        //按序列生成
        if (count($items) == $this->cnt) {
            $new_page = Sitemap::incr($page)->page;
            $this->generateItemSitemap($new_page);
        }
    }

    private function generateCatSitemap()
    {
        $items = Category::model()->findAll();
        $content = $this->renderPartial('cat', compact('items'), true);
        file_put_contents("./sitemap/cat.xml", $content);
    }

    private function generateMpSitemap()
    {
        $items = PublicUser::model()->findAll();
        $content = $this->renderPartial('mp', compact('items'), true);
        file_put_contents("./sitemap/mp.xml", $content);
    }

    private function generateIndexSitemap()
    {
        $items = Sitemap::model()->findAll();
        $content = $this->renderPartial('index', compact('items'), true);
        file_put_contents('./sitemap.xml', $content);
    }
}
