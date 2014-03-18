<?php
/**
 * 公用帮助类文件
 * User: rogee
 * Date: 13-6-4
 * Time: 上午9:57
 */

class Helper
{
	/**
	 * 检测链接是否含有http 头 没有就加上
	 * @version 2013-6-19
	 * @author wwpeng
	 * @param string $url
	 * @return string
	 */
	public static function completeUrl($url)
	{
		if (empty($url))
		{
			return '';
		}
		$strlen = strlen($url);
		if ($strlen > 8)
		{
			$strlen = 8;
		}
		if (substr_count($url, 'http://', 0, $strlen) == 0 && substr_count($url, 'https://', 0, $strlen) == 0)
		{
			$url = 'http://'.$url;		
		}
		return $url;
	}
	
	/**
	 * 检测get参数中是否含有returnurl参数 有的话 在生成的链接中 也加上
	 * @version 2013-6-19
	 * @author wwpeng
	 * @param Int,array $route
	 * @param array $params
	 * @return Ambigous <mixed, string>
	 */
	public static function getUrlCheckReturnUrl($route,$params = array())
	{
		$returnUrl = H::param('returnurl');
		if (!empty($returnUrl))
		{
			$params['returnurl'] = $returnUrl;
		}
		return H::url($route,$params);
	}
	/**
	 * 所有的returnurl参数在传递之前 统一调用 该方法进行编码
	 * @version 2013-8-16
	 * @author wwpeng
	 * @param unknown_type $url
	 * @param unknown_type $params
	 * @return string
	 */
	public static function returnUrlEnCode($url,$params = array())
	{
		if (empty($url))
		{
			return '';
			
		}else{
			
			if ($params !== false)
			{
				$url = H::url($url,$params);
			}
			if (stripos($url, 'http') !== 0)
			{
				$url = H::paramsConfig('front_url').$url;
			}
			return self::urlSafeBase64_encode($url);
		}
	}
	/**
	 * 所有的returnurl参数使用跳转之前 统一调用 该方法进行解码
	 * @version 2013-8-16
	 * @author wwpeng
	 * @param unknown_type $url
	 * @return string
	 */
	public static function returnUrlDeCode($url)
	{
		if (empty($url))
		{
			return '';
				
		}else{
				
			return self::urlSafeBase64_decode($url);
		}
	}
	/**
	 * str_split 函数的可分割中文版本，将字符串根据指定长度分割为数组
	 * @version 2013-8-27
	 * @author wwpeng
	 * @param unknown_type $str
	 * @param unknown_type $split_len
	 * @return boolean|multitype:unknown |unknown
	 */
	public static function mb_str_split($str, $split_len = 1)
	{
		if (!preg_match('/^[0-9]+$/', $split_len) || $split_len < 1)
		{
			return false;
		}	
		$len = mb_strlen($str, 'UTF-8');
		if ($len <= $split_len)
		{
			return array($str);
		}	
		preg_match_all('/.{'.$split_len.'}|[^\x00]{1,'.$split_len.'}$/us', $str, $ar);
		
		return $ar[0];
	}
	/**
	 * 判断字符串是否是json数据
	 * @version 2013-9-5
	 * @author wwpeng
	 * @param unknown_type $data
	 * @return boolean
	 */
	public static function isJson($data)
	{
		if (!is_string($data))
		{
			return false;
		}
		json_decode($data);
		return json_last_error() == JSON_ERROR_NONE;
	}
	/**
	 * 将字符串变成 url安全的base64编码
	 * @version 2013-9-24
	 * @author wwpeng
	 * @param unknown_type $string
	 * @return mixed
	 */
	public static function urlSafeBase64_encode($string) 
	{
       $data = base64_encode($string);
       $data = str_replace(array('+','/','='),array('-','_',''),$data);
       return $data;
    } 
    /**
     * url安全的base64编码 解码为正常字符串
     * @version 2013-9-24
     * @author wwpeng
     * @param unknown_type $string
     * @return mixed
     */
    public static function urlSafeBase64_decode($string)
    {
       $data = str_replace(array('-','_'),array('+','/'),$string);
       $mod4 = strlen($data) % 4;
       if ($mod4)
       {
           $data .= substr('====', $mod4);
       }
       return base64_decode($data);
    }
    /**
     * 获得唯一字符串
     * @version 2013-10-21
     * @author wwpeng
     * @return string
     */
    public static function getUniqueChar($pre = '')
    {
    	return $pre.md5(uniqid(mt_rand(), true));
    }
    /**
     * 全角与半角相互转换
     * @param string $str
     * @param int $args2  1 全->半 0 半-> 全
     * @return mixed|boolean
     */
    public static function SBC_DBC($str, $args2 = 1) 
    {
	    $DBC = Array(
	        '０' , '１' , '２' , '３' , '４' ,
	        '５' , '６' , '７' , '８' , '９' ,
	        'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' ,
	        'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' ,
	        'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' ,
	        'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' ,
	        'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' ,
	        'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' ,
	        'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' ,
	        'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' ,
	        'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' ,
	        'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' ,
	        'ｙ' , 'ｚ' , '－' , '　' , '：' ,
	        '．' , '，' , '／' , '％' , '＃' ,
	        '！' , '＠' , '＆' , '（' , '）' ,
	        '＜' , '＞' , '＂' , '＇' , '？' ,
	        '［' , '］' , '｛' , '｝' , '＼' ,
	        '｜' , '＋' , '＝' , '＿' , '＾' ,
	        '￥' , '￣' , '｀'
	    );
	
	    $SBC = Array( // 半角
	        '0', '1', '2', '3', '4',
	        '5', '6', '7', '8', '9',
	        'A', 'B', 'C', 'D', 'E',
	        'F', 'G', 'H', 'I', 'J',
	        'K', 'L', 'M', 'N', 'O',
	        'P', 'Q', 'R', 'S', 'T',
	        'U', 'V', 'W', 'X', 'Y',
	        'Z', 'a', 'b', 'c', 'd',
	        'e', 'f', 'g', 'h', 'i',
	        'j', 'k', 'l', 'm', 'n',
	        'o', 'p', 'q', 'r', 's',
	        't', 'u', 'v', 'w', 'x',
	        'y', 'z', '-', ' ', ':',
	        '.', ',', '/', '%', '#',
	        '!', '@', '&', '(', ')',
	        '<', '>', '"', '\'','?',
	        '[', ']', '{', '}', '\\',
	        '|', '+', '=', '_', '^',
	        '$', '~', '`'
	    );
	
	    if ($args2 == 0) {
	    	
	        return str_replace($SBC, $DBC, $str);  // 半角到全角
	        
	    } else {
	    	
	        return str_replace($DBC, $SBC, $str);  // 全角到半角
	    }
	}
}