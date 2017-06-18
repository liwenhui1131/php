<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 * */

/**
 * Interface iSort
 */
interface iSort
{
    function sort(array $list);
}

/**
 * The MultiAlphaSort sorts a multidimensional array alphabetically.
 * Class MultiAlphaSort
 */
class MultiAlphaSort implements iSort
{

    private $_order;
    private $_index;

    /**
     * MultiAlphaSort constructor.
     * @param Number $index
     * @param string $order
     */
    function __construct($index, $order = 'ascending')
    {
        $this->_index = $index;
        $this->_order = $order;
    }

    /**
     * Function does the actual sorting:
     * @param array $list
     * @return array
     */
    function sort(array $list)
    {

        if ($this->_order == 'ascending') {
            uasort($list, array($this, 'ascSort'));
        } else {
            uasort($list, array($this, 'descSort'));
        }

        return $list;

    }

    /**
     * Functions that compares two values:
     * @param $x
     * @param $y
     * @return int
     */
    function ascSort($x, $y)
    {
        return strcasecmp($x[$this->_index], $y[$this->_index]);
    }

    function descSort($x, $y)
    {
        return strcasecmp($y[$this->_index], $x[$this->_index]);
    }

}

/**
 * The MultiNumberSort sorts a multidimensional array numerically.
 * Class MultiNumberSort
 */
class MultiNumberSort implements iSort
{

    private $_order;
    private $_index;

    /**
     * MultiNumberSort constructor.
     * @param $index
     * @param string $order
     */
    function __construct($index, $order = 'ascending')
    {
        $this->_index = $index;
        $this->_order = $order;
    }

    /**
     * Function does the actual sorting:
     * @param array $list
     * @return array
     */
    function sort(array $list)
    {

        // Change the algorithm to match the sort preference:
        if ($this->_order == 'ascending') {
            uasort($list, array($this, 'ascSort'));
        } else {
            uasort($list, array($this, 'descSort'));
        }

        return $list;

    }

    /**
     * Functions that compares two values:
     * @param $x
     * @param $y
     * @return bool
     */
    function ascSort($x, $y)
    {
        return ($x[$this->_index] > $y[$this->_index]);
    }

    function descSort($x, $y)
    {
        return ($x[$this->_index] < $y[$this->_index]);
    }

}