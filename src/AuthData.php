<?php
namespace nbczwphp\authdata;

/**
 * Class AuthData
 * @package nbczwphp\authdata
 */
class AuthData
{
    /**
     * @var object 对象实例
     */
    protected static $instance;

    //默认配置
    protected $_config = array(
        'auth_data'         => '__AUTH_DATA__',         // 数据规则引擎表
    );

    public function __construct($config)
    {
        $this->_config = array_merge($this->_config, $config);
    }
    /**
     * 初始化
     * @access public
     * @param array $options 参数
     * @return AuthData
     */
    public static function instance($options = [])
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($options);
        }
        return self::$instance;
    }

    public function getAuthData($name)
    {
        return \think\Db::table($this->_config['auth_data'])->where("name", $name)->where("status",1)->find();
    }

    public function insertAuthData($data)
    {
        return \think\Db::table($this->_config['auth_data'])->insert($data);
    }

    public function updateAuthData($name, $data)
    {
        return \think\Db::table($this->_config['auth_data'])->where("name", $name)->update($data);
    }
}
