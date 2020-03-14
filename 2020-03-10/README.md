# PHP Interview Questions(19)

1. 常用的PHP 框架?

   `Yii 和 Laravel`

2. 怎么访问数据库？

   `ORM`

3. 怎么配置读写分离？

    https://www.yiiframework.com/doc/guide/2.0/zh-cn/db-dao#read-write-splitting

   ```php
   [
        'class' => 'yii\db\Connection',

        // 主库的配置
        'dsn' => 'dsn for master server',
        'username' => 'master',
        'password' => '',

        // 从库的通用配置
        'slaveConfig' => [
            'username' => 'slave',
            'password' => '',
            'attributes' => [
                // 使用一个更小的连接超时
                PDO::ATTR_TIMEOUT => 10,
            ],
        ],

        // 从库的配置列表
        'slaves' => [
            ['dsn' => 'dsn for slave server 1'],
            ['dsn' => 'dsn for slave server 2'],
            ['dsn' => 'dsn for slave server 3'],
            ['dsn' => 'dsn for slave server 4'],
        ],
    ]
   ```
   https://laravel.com/docs/7.x/database#read-and-write-connections
   ```php
   'mysql' => [
        'read' => [
            'host' => [
                '192.168.1.1',
                '196.168.1.2',
            ],
        ],
        'write' => [
            'host' => [
                '196.168.1.3',
            ],
        ],
        'sticky'    => true,
        'driver'    => 'mysql',
        'database'  => 'database',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '',
    ],
   ```
4. 如果同时读和写，比如先查询数量、然后更新，会建立几个mysql连接？

    ```
    开启事务：建立一个连接，所有的数据库操作都将使用主库连接。
    不开启事务：建立两个连接，主库执行写操作，从库执行读操作。
    ```

5. 分库分表怎么配置？比如 mod 10？

    ```php
    public static function getTableName(){
        return static::$originalName . '_'. (static::$targetKey % 10);
    }
    ```

6. mysql 索引 根据什么原则建索引 省份有必要建索引吗？
    ```

    ```

7. redis 常用数据结构 队列 队列消费失败怎么办？
    ```
    ```

8. 登陆认证 （session/token/jwt）？
    ```
    ```