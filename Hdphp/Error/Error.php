<?php namespace Hdphp\Error;

//关闭系统错误
error_reporting(0);

//错误处理
class Error{
	
	private $app;

    public function __construct($app)
    {
       $this->app = $app;
    }

   public function bootstrap()
   {
        set_error_handler(array($this,                      'error'), E_ALL);
        set_exception_handler(array($this,                  'exception'));
        register_shutdown_function(array($this,             'fatalError'));
    }

	//自定义异常理
    public function exception($e)
    {
        Log::write($e->getMessage(), 'EXCEPTION');
        DEBUG && require HDPHP_PATH.'/Error/View/exception.php';
    }

    //错误处理
    public function error($errno, $error, $file, $line)
    {
        switch ($errno) 
        {
            case E_ERROR:
            case E_PARSE:
            case E_CORE_ERROR:
            case E_CORE_WARNING:
            case E_COMPILE_ERROR:
            case E_COMPILE_WARNING:
            case E_USER_ERROR:
            $msg = $error. $file . " ($line).";
            Log::write($msg, 'ERROR');
            DEBUG && require HDPHP_PATH.'/Error/View/notice.php';
            break;
            default:
            $msg = $error. $file . " ($line).";
            Log::write($msg, 'NOTICE');
            DEBUG && require HDPHP_PATH.'/Error/View/notice.php';
            break;
        }
    }

    //致命错误处理
    public function fatalError()
    {
        if(function_exists('error_get_last'))
        { 
            if ( $e = error_get_last()) 
            {
$html =<<<html
                    <div style="border: 1px solid #990000;padding-left: 20px;margin: 10px;font-family: Monaco,Menlo,Consolas,monospace;">
                        <h3 style="font-size: 18px;margin: 20px 0;">{$e['message']}</h3>
                        <p style="font-size: 14px;margin: 15px 0;">
                            Severity: Fatal
                        </p>
                        <p>
                            File:{$e['file']}
                        </p>
                        <p>
                            Line: {$e['line']}
                        </p>
                    </div>
html;
                    echo $html;
                }
            }
    }

    /**
     * 获取错误标识
     * @param [type] $type [description]
     */
    public function errorType($type)
    {
        switch ($type) {
            case E_ERROR: // 1 //
            return 'E_ERROR';
            case E_WARNING: // 2 //
            return 'E_WARNING';
            case E_PARSE: // 4 //
            return 'E_PARSE';
            case E_NOTICE: // 8 //
            return 'E_NOTICE';
            case E_CORE_ERROR: // 16 //
            return 'E_CORE_ERROR';
            case E_CORE_WARNING: // 32 //
            return 'E_CORE_WARNING';
            case E_CORE_ERROR: // 64 //
            return 'E_COMPILE_ERROR';
            case E_CORE_WARNING: // 128 //
            return 'E_COMPILE_WARNING';
            case E_USER_ERROR: // 256 //
            return 'E_USER_ERROR';
            case E_USER_WARNING: // 512 //
            return 'E_USER_WARNING';
            case E_USER_NOTICE: // 1024 //
            return 'E_USER_NOTICE';
            case E_STRICT: // 2048 //
            return 'E_STRICT';
            case E_RECOVERABLE_ERROR: // 4096 //
            return 'E_RECOVERABLE_ERROR';
            case E_DEPRECATED: // 8192 //
            return 'E_DEPRECATED';
            case E_USER_DEPRECATED: // 16384 //
            return 'E_USER_DEPRECATED';
        }
        return $type;
    }

    /**
     * trace 信息
     * @param  string  $value  变量
     * @param  string  $label  标签
     * @param  string  $level  日志级别(或者页面Trace的选项卡)
     * @param  boolean $record 是否记录日志
     * @return void|array
     */
    public function trace($value='[hdphp]',$label='',$level='DEBUG',$record=false)
    {
        static $trace =  array();
        
        if('[hdphp]' === $value)
        {
            // 获取trace信息
            return $trace;
        }
        else
        {
            $info   =   ($label?$label.':':'').print_r($value,true);
            $level  =   strtoupper($level);
            
            if(IS_AJAX || $record)
            {
                Log::record($info,$level,$record);
            }
            else
            {
                if(!isset($trace[$level]))
                {
                    $trace[$level] =   array();
                }
                $trace[$level][]   =   $info;
            }
        }
    }
}