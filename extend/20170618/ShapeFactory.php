<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * Class ShapeFactory
 */
abstract class ShapeFactory
{

    /**
     * Static method that creates objects:
     * @param $type
     * @param array $sizes
     * @return Rectangle|Triangle
     */
    static function Create($type, array $sizes)
    {

        switch ($type) {
            case 'rectangle':
                return new Rectangle($sizes[0], $sizes[1]);
                break;
            case 'triangle':
                return new Triangle($sizes[0], $sizes[1], $sizes[2]);
                break;
        }

    }

}