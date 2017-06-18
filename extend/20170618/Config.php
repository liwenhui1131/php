<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 * */

/**
 * Class Config
 */
class Config
{

    static private $_instance = NULL;
    private $_settings = array();

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * Method for returning the instance:
     */
    static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    /**
     * Method for defining a setting settings:
     */
    function set($index, $value)
    {
        $this->_settings[$index] = $value;
    }

    /**
     * Method for retrieving a setting:
     */
    function get($index)
    {
        return $this->_settings[$index];
    }

}