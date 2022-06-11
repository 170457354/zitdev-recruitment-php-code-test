<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use PHPUnit\Framework\TestCase;
use App\App\Demo;
use App\Util\HttpRequest;


class DemoTest extends TestCase {

    public function test_foo() {

    }

    public function test_get_user_info() {

		$ret_str = '
			{
			"error": 0,
			"data": {
			"id": 1,
			"username": "hello world"
			}
			}
			';


		$stub=$this->createMock(HttpRequest::class);
 		$stub->method('get')->will($this->returnValue($ret_str));             

		$demo = new Demo('log4php',$stub);
		$ret = $demo->get_user_info();


		$this->assertNotNull(!$ret,"data的值不能为空");
        $this->assertEquals(1, $ret['id']);
        $this->assertEquals('hello world', $ret['username']);
    }
}






