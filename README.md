# ThinkPHP5 数据级权限
使用规则引擎,进行数据级权限的筛选

## 创建表
```
CREATE TABLE `auth_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '规则',
  `title` varchar(255) NOT NULL COMMENT '名称',
  `sql` varchar(255) DEFAULT NULL COMMENT 'sql语句',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='数据级权限规则引擎表';
```

## 技巧
1. 规则`name`字段可以是`模块/控制器/方法`
2. 查出的`sql`值，直接传入`where`方法
3. 查出的`sql`值里有变量值，可以解析后再使用