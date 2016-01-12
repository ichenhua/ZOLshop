<?php namespace Admin\Controller; 

//数据备份和还原
class BackupController extends Controller{

    public function index()
    {
        $data = Dir::tree('Backup');
        View::with('data',$data)->make();
    }

    //备份配置
    public function backup()
    {
        $config = array(
            'size' => 200,//分卷大小 单位KB
            'dir'  => 'Backup/' . date("Ymdhis"),//备份目录
            'time' => 0.1,//备份时间间隔
            'url'  => U('index'),//备份完成后的跳转地址
        );
        //设置备份配置
        if (Backup::backupInit($config))
        {
            //配置正确执行备份
            go('runBackup');
        }
        else
        {
            $this->error(Backup::getError(),'index');
        }
    }

    //运行备份
    public function runBackup()
    {
        Backup::backup();
    }


    //还原配置
    public function recovery()
    {
        $config = array(
            'dir'  => 'Backup/'.$_GET['dir'],//备份目录
            'url'  => U('index'),//还原完成后的跳转地址
            'time' => 0.1,//还原间隔时间
        );
        //设置还原配置
        if (Backup::recoveryInit($config))
        {
            //执行还原
            go('runRecovery');
        }
        else
        {
            $this->error(Backup::getError(), 'index');
        }
    }

    //执行还原
    public function runRecovery()
    {
        Backup::recovery();
    }


    //删除备份
    public function del()
    {
        $r = Dir::del('Backup/'.$_GET['dir']);
        if($r){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

}
