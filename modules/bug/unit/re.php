<?php
/**
 * Created by PhpStorm.
 * User: ytron123
 * Date: 17/9/7
 * Time: 下午4:22
 */
namespace app\modules\bug\unit;
class re{
    public static
        $arr    =   [
        '1001'  =>  '链接不存在',
        '1002'  =>  '无分析参数',
    ];
    /**
     * 返回信息
     * @param string $code     返回码
     * @param string $msg      返回信息
     * @param string $data     返回信息
     * @return array
     */
    public static function reArr($code='',$data='',$msg=''){
        if(!$msg){
            $msg    =   self::$arr[$code];
        }
        return ['code'=>$code,'msg'=>$msg,'data'=>$data];
    }

    /**
     * 返回json信息
     * @param string $code
     * @param string $msg
     * @param string $data
     * @return string
     */
    public static function reJson($code='',$data='',$msg=''){
        if(!$msg){
            $msg    =   self::$arr[$code];
        }
        echo json_encode(['code'=>$code,'msg'=>$msg,'data'=>$data]);
        exit;
    }
}