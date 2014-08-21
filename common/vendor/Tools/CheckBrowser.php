<?php
/**
 * @author: Rogee<rogeeyang@gmail.com>
 */

class CheckBrowser extends Browser
{
    const WEIXIN_BROWSER = 'micromessenger';
    public function isMobile()
    {
        return $this->_checkIsMobileBrowser();
    }

    private function _checkIsMobileBrowser()
    {
        if ($this->checkBrowserAndroid()) {
            return true;
        }

        if ($this->checkBrowseriPad()) {
            return true;
        }
        if ($this->checkBrowseriPod()) {
            return true;
        }
        if ($this->checkBrowseriPhone()) {
            return true;
        }
        if ($this->checkBrowserBlackBerry()) {
            return true;
        }
        if ($this->checkBrowserNokia()) {
            return true;
        }

        if ($this->checkBrowseriPad()) {
            return true;
        }

        return false;
    }

    /**
     * 检测是否是微信浏览器
     * @return bool
     */
    public function isWeiXinBrowser()
    {
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
        $agent = strtolower($agent);
        if ( strpos($agent, self::WEIXIN_BROWSER) === false) {
            return false;
        }

        return true;
    }
}