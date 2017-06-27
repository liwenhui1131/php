<?php
/**
 * 标识对象模式
 *这个模式主要功能就是创建sql语句中的wehre条件字符串的
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * Class Field
 */
class Field
{
    protected $name = null;
    protected $operator = null;
    protected $comps = array();
    protected $incomplete = false;

    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * 添加where 条件
     * @param $operator
     * @param $value
     */
    function addTest($operator, $value)
    {
        $this->comps[] = array('name' => $this->name, 'operator' => $operator, 'value' => $value);
    }

    /**
     * 获取存放条件的数组
     * @return array
     */
    function getComps()
    {
        return $this->comps;
    }

    /**
     * 检查条件数组是否有值
     * @return boolean
     */
    function isIncomplete()
    {
        return empty($this->comps);
    }
}

/**
 * Class IdentityObject
 */
class IdentityObject
{
    protected $currentfield = null;
    protected $fields = array();
    private $and = null;
    private $enforce = array();

    function __construct($field = null, array $enforce = null)
    {
        if (!is_null($enforce)) {
            $this->enforce = $enforce;
        }
        if (!is_null($field)) {
            $this->field($field);
        }
    }

    /**
     * 获取限定的合法字段
     * @return array
     */
    function getObjectFields()
    {
        return $this->enforce;
    }

    /**
     * 主要功能为设置当前需要操作的对象
     * @param $fieldname
     * @return $this
     * @throws Exception
     */
    function field($fieldname)
    {
        if (!$this->isVoid() && $this->currentfield->isIncomplete()) {
            throw new \Exception("Incomplete field");
        }
        $this->enforceField($fieldname);

        if (isset($this->fields[$fieldname])) {
            $this->currentfield = $this->fields[$fieldname];
        } else {
            $this->currentfield = new Field($fieldname);
            $this->fields[$fieldname] = $this->currentfield;
        }
        return $this;                    //采用连贯语法
    }

    /**
     * 字段集合是否为空
     * @return bool
     */
    function isVoid()
    {
        return empty($this->fields);
    }

    /**
     * 检查字段是否合法
     * @param $fieldname
     * @throws Exception
     */
    function enforceField($fieldname)
    {
        if (!in_array($fieldname, $this->enforce) && !empty($this->enforce)) {
            $forcelist = implode(',', $this->enforce);
            throw new \Exception("{$fieldname} not a legal field {$forcelist}");
        }
    }

    /**
     * 向字段对象添加where条件
     * @param $value
     * @return IdentityObject
     */
    function eq($value)
    {
        return $this->operator("=", $value);
    }

    function lt($value)
    {
        return $this->operator("<", $value);
    }

    function gt($value)
    {
        return $this->operator(">", $value);
    }

    /**
     * 向字段对象添加where条件
     * @param $symbol
     * @param $value
     * @return $this
     * @throws Exception
     */
    private function operator($symbol, $value)
    {
        if ($this->isVoid) {
            throw new \Exception("no object field defined");
        }
        $this->currentfield->addTest($symbol, $value);
        return $this;                                     //采用连贯语法
    }

    /**
     * 获取此类中所有字段对象集合的where条件数组
     * @return array
     */
    function getComps()
    {
        $ret = array();
        foreach ($this->fields as $key => $field) {
            $ret = array_merge($ret, $field->getComps());
        }
        return $ret;
    }
}

/**
 * 客户端代码
 */
$idobj = new IdentityObject ();
$idobj->field("name")->eq("The Good Show")->field("start")->gt(time())->lt(time() + (24 * 60 * 60));
$test = $idobj->getComps();
var_dump($test);

/*
array{
    array('name'=>'name','operator'=>'=','value'=>'The Good Show'),
    array('name'=>'start','operator'=>'>','value'=>'123456'),   //123456表示time()函数输出的时间戳
    array('name'=>'start','operator'=>'<','value'=>'123456')
}

*/