<?php namespace Hdphp\Session;

class Memcache implements AbSession
{

    private $memcache;

    function __construct()
    {
    }

    public function make()
    {
        $options = Config('session.memcache');
        $this->memcache = new Memcache();
        $this->memcache->connect($options['host'], $options['port']);
        session_set_save_handler(
            array(&$this, "open"),
            array(&$this, "close"),
            array(&$this, "read"),
            array(&$this, "write"),
            array(&$this, "destroy"),
            array(&$this, "gc")
        );
    }

    public function open()
    {
        return true;
    }

    /**
     * 获得缓存数据
     * @param string $sid
     * @return boolean
     */
    public function read($sid)
    {
        return $this->memcache->get($sid);
    }

    /**
     * 写入SESSION
     * @param string $sid
     * @param string $data
     * @return mixed
     */
    public function write($sid, $data)
    {
        return $this->memcache->set($sid, $data);
    }

    /**
     * 删除SESSION
     * @param string $sid SESSION_id
     * @return boolean
     */
    public function destroy($sid)
    {
        return $this->memcache->delete($sid);
    }

    /**
     * 垃圾回收
     * @return boolean
     */
    public function gc()
    {
        return true;
    }

}
