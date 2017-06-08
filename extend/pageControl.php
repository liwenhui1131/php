<?php
namespace woo\controller;
/*
 * PageController类
 * */
abstract class PageController
{   //基类
    private $request;

    function __construct()
    {
        $request = \woo\base\RequestRegistry::getRequest();        //通过注册表类获取一个处理用户请求信息的类
        if (is_null($request)) {
            $request = new Request();
        }
        $this->request = $request;
    }

    abstract function process();

    function forward($resource)
    {        //跳转
        include($resource);
        exit(0);
    }

    function getRequest()
    {
        return $this->request;
    }
}


class AddVenueController extends PageController
{ //这个类的作用就是向数据库写入一个venue数据(数据表结构类似:id,name)
    function process()
    {
        try {
            $request = $this->getRequest();
            $name = $request->getProperty('venue_name');                //获取用户提交的venue的名称
            if (is_null($request->getProperty('submitted'))) {            //判断是否表单提交,否的话跳转到add_nenue.php
                $request->addFeedback("choose a name for the venue");
                $this->forward('add_nenue.php');
            } else if (is_null($name)) {                                    //判断表单提交是否有name
                $request->addFeedback("name is a required field");
                $this->forward('add_venue.php');                        //跳转add_venue.php
            }
            $venue = new \woo\domain\Venue(null, $name);                    //创建对象便可将它添加到数据库,具体内部的业务逻辑不必深究。
            $this->forward("ListVenues.php");                            //添加成功后跳转ListVenues.php,即一个列表数据的显示界面
        } catch (Exception $e) {
            $this->forward('error.php');                                //跳转到一个错误界面
        }
    }
}

$controller = new AddVenueController();                                    //执行这个类的process()方法
$controller->process();
?>

<?php
//视图文件 (文件名add_venue.php)
require_once("woo/base/RequestRegistry.php");
$request = \woo\base\RequestRegistry::getRequest();
?>
<html>
<head>
    <title>Add Venue</title>
</head>

<body>
<h1>Add Venue</h1>
<table>
    <tr>
        <td>
            <?php print $request->getFeedbackString('</td></tr><tr><td>') ?>
        </td>
    </tr>
</table>
<form action="AddVenue.php" method="get">
    <input type="hidden" name="submitted" value="yes"/>
    <input type="text" name="venue_name"/>
</form>
</body>
</html>
