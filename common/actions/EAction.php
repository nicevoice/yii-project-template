<?php
class EAction extends CAction
{
    public function run($the_id)
    {
        $_get = isset($_GET['e']) ? $_GET['e'] : array();
        $_post = isset($_POST['e']) ? $_POST['e'] : array();
        $params = array_merge($_post, $_get);

        $name = trim($the_id);
        $this->controller->Ext($name, $params);
    }
}