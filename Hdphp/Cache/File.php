<?php namespace Hdphp\Cache;

use Exception;

/**
 * 文件缓存处理
 * Class File
 *
 * @package Hdphp\Cache
 * @author  向军 <2300071698@qq.com>
 */
class File implements InterfaceCache
{

    //缓存目录
    private $dir = 'Storage/cache';

    //队列长度
    private $length = 0;

    public function __construct()
    {
        $this->connect();
    }

    //连接
    public function connect()
    {
        if ( ! is_dir($this->dir) && ! mkdir($this->dir, 0755, true))
        {
            throw new Exception("缓存目录创建失败");
        }
    }

    //设置缓存目录
    public function dir($dir)
    {
        if (is_dir($dir) || mkdir($dir, 0755, true))
        {
            $this->dir = $dir;

            return $this;
        }
    }

    //缓存文件
    private function getFile($name)
    {
        return $this->dir . '/' . md5($name) . ".php";
    }

    //设置
    public function set($name, $data, $expire = 3600)
    {
        $file = $this->getFile($name);

        //缓存时间
        $expire = sprintf("%010d", $expire);

        $data = "<?php\n//" . $expire . serialize($data) . "\n?>";

        return file_put_contents($file, $data);
    }

    //获取
    public function get($name)
    {
        $file = $this->getFile($name);

        //缓存文件不存在
        if ( ! is_file($file))
        {
            return null;
        }

        $content = file_get_contents($file);

        $expire = intval(substr($content, 8, 10));

        //修改时间
        $mtime = filemtime($file);

        //缓存失效处理
        if ($expire > 0 && $mtime + $expire < time())
        {
            return @unlink($file);
        }

        return unserialize(substr($content, 18, -3));
    }

    //删除
    public function del($name)
    {
        $file = $this->getFile($name);

        return is_file($file) && unlink($file);
    }

    //刷新缓存池
    public function flush()
    {
        return Dir::del($this->dir);
    }
}