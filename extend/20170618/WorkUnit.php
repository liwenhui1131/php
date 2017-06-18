<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */

/**
 * Class WorkUnit
 */
abstract class WorkUnit
{

    protected $tasks = array();

    protected $name = NULL;

    /**
     * WorkUnit constructor.
     * @param $name
     */
    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Method that returns the name:
     * @return null
     */
    function getName()
    {
        return $this->name;
    }

    abstract function add(Employee $e);

    abstract function remove(Employee $e);

    abstract function assignTask($task);

    abstract function completeTask($task);

}


/**
 * Class Team
 */
class Team extends WorkUnit
{

    private $_employees = array();

    function add(Employee $e)
    {
        $this->_employees[] = $e;
        echo "<p>{$e->getName()} has been added to team {$this->getName()}.</p>";
    }

    function remove(Employee $e)
    {
        $index = array_search($e, $this->_employees);
        unset($this->_employees[$index]);
        echo "<p>{$e->getName()} has been removed from team {$this->getName()}.</p>";
    }

    function assignTask($task)
    {
        $this->tasks[] = $task;
        echo "<p>A new task has been assigned to team {$this->getName()}. It should be easy to do with {$this->getCount()} team member(s).</p>";
    }

    function completeTask($task)
    {
        $index = array_search($task, $this->tasks);
        unset($this->tasks[$index]);
        echo "<p>The '$task' task has been completed by team {$this->getName()}.</p>";
    }

    function getCount()
    {
        return count($this->_employees);
    }

}

/**
 * Class Employee
 */
class Employee extends WorkUnit
{

    function add(Employee $e)
    {
        return false;
    }

    function remove(Employee $e)
    {
        return false;
    }

    /**
     * Implement the abstract methods...
     * @param $task
     */
    function assignTask($task)
    {
        $this->tasks[] = $task;
        echo "<p>A new task has been assigned to {$this->getName()}. It will be done by {$this->getName()} alone.</p>";
    }

    function completeTask($task)
    {
        $index = array_search($task, $this->tasks);
        unset($this->tasks[$index]);
        echo "<p>The '$task' task has been completed by employee {$this->getName()}.</p>";
    }

}