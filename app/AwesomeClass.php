<?php
/**
 * Created by PhpStorm.
 * User: Junely
 * Date: 2018/9/26
 * Time: 10:15
 */

namespace App;

/**
 * 依赖注入是一种编程技术，每个依赖项都供给它需要的对象，而不是在对象外获得所需的信息或功能。
举个例子，假设应用中的类方法需要从数据库中读取。为此，你需要一个数据库连接。常用的技术就是创建一个全局可见的新连接。
 * Class AwesomeClass
 * @package App
 */
class AwesomeClass
{
    private $dbConnection;

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function doSomething()
    {

    }
}