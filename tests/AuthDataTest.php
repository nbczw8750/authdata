<?php
namespace nbczwphp\authdata\tests;

use nbczwphp\authdata\AuthData;
use PHPUnit_Framework_TestCase;

class AuthDataTests extends PHPUnit_Framework_TestCase
{
    public function testSend(){
        $data = [];
        $data['user_id'] = 11;
        $data['name'] = "王";
        $sql = AuthData::instance()->sqlParse("uid={user_id} and name like '{name}'",$data);
        file_put_contents("test.log", "sql: ". $sql."\n", FILE_APPEND);

    }
}
