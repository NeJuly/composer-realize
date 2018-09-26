<?php
/**
 * Created by PhpStorm.
 * User: Junely
 * Date: 2018/9/26
 * Time: 10:07
 */
declare(strict_types = 1);
namespace App;

/**
 * 自动加载
 * Class HelloWorld
 * @package App
 */
class HelloWorld
{
    private $foo;
    public function __construct(string $foo)
    {
        $this->foo = $foo;
    }
    public function __invoke(): void
    {
        echo 'Hello '.$this->foo.'___autoload';
        exit;
    }
    public function helloTest()
    {
        echo 'this is hello_world controller test';
    }
}