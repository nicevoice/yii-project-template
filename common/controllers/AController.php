<?php

class AController extends BaseController
{
	public function actionIndex($id)
	{
        $article = Article::model()->findByPk($id);
        if (!$article) {
            throw new CHttpException(Response::RESPONSE_CODE_404);
        }

        if (!empty($article->clean_content)) {
            $article->content = $article->clean_content;
        }
        $article->source  = empty($article->source) ? false : json_decode($article->source);
        $this->prepend_title([$article->title, $article->user->nickname]);
        $this->set_description($article->description);
        $this->prepend_keywords($article->keywords);

        $this->render('/home/view', compact('article'));
	}
}