<?php

abstract class Widget extends CWidget
{
    public $_widget_class_name;
    private $params = array();

    public $widget_id;
    private $_can_run_widget = true;
    abstract public function _init();
    abstract public function _run();
    abstract public function _preCall();


    /**
     * 封闭widget内调用widget操作
     * @param       $name
     * @param array $params
     * @param bool  $content
     */
    public function Ext($name, $params=array(), $content = false)
    {
        $this->controller->Ext($name, $params, $content);
    }


    /**
     * 初始化
     */
    final public  function init()
    {
        //todo: 这里加入权限验证
        if ( $this->_can_run_widget === true )
        {
            $this->params = H::Param("e");

            $this->_init();

            //参数的传递要屏闭 ajax_get 这个
            $ajax_get = $this->_param('ajax_get');
            if(!empty($ajax_get))
            {
                $function = 'get'.$ajax_get;
                $this->$function();
                exit;
            }

            if(!empty($this->params))
                $this->_preCall();
        }
    }

    final public function run()
    {
        if ( $this->_can_run_widget === true )
            $this->_run();
    }

    /**
     * 参数的获取
     * @param $name
     * @param null $callback 要对获取的参数使用的处理
     * @return mixed
     */
    public function _param($name=null, $callback=null)
    {
        if( is_null($name) )
            return $this->params;

        if( is_object($this->params) )
            $value = $this->params->$name;
        $value = isset($this->params[$name]) ? $this->params[$name] : '';

        if( !is_null($callback) )
            $value = call_user_func_array($callback, array($value));
        return $value;
    }
    /**
     * 加入对 renderJSON 的支持
     */
    public function renderJSON($status=true, $message='', $extra='')
    {
        $this->controller->renderJSON($status, $message, $extra);
    }

    public function renderJsonData($data)
    {
        $this->controller->renderJsonData($data);
    }



    /**
     * 表单Name
     * @param $name
     * @return string
     */
    public function _name($name, $ext=null)
    {
        if(is_null($ext))
            $ext = $this->_widget_class_name;
        $name = sprintf('%s[%s]', $ext, trim($name));
        return $name;
    }

    /**
     * 表单ID
     * @param $name
     * @return mixed|string
     */
    public function _id($name, $ext=null)
    {
        return CHtml::getIdByName($this->_name($name));
    }
}