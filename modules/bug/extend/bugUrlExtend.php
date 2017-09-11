<?php
/**
 * Created by PhpStorm.
 * User: ytron123
 * Date: 17/9/7
 * Time: 下午4:22
 */
namespace app\modules\bug\extend;
use app\modules\bug\unit\re;

class bugUrlExtend extends inc{
    public static $inc;
    public static function inc(){
        if(!self::$inc instanceof self){
            self::$inc  =   new self;
        }
        return self::$inc;
    }
    private function __construct(){}
    private function __clone(){}
    /**
     * 校验url
     * @param $postUrl
     * @param $controller
     * @return array
     */
    public function checkUrl($postUrl,$controller){
        if(!$postUrl){
            return re::reArr(1001);
        }
        $parseUrl   =   parse_url($postUrl);
        $httpBaseUrl=   $parseUrl['scheme'].'://'.$parseUrl['host'];
        $explodeArr =   $this->pathEx($parseUrl['path']);
        if(!$explodeArr){
            return re::reArr(1002,$postUrl);
        }
        $returnUrlArr   =   [];
        for($i=0;$i<count($explodeArr);$i++){
            $httpBaseUrl    .=  '/'.$explodeArr[$i];
            if($controller == $explodeArr[$i]){
                if(isset($explodeArr[$i+1])){
                    $refArr =   $this->reF($explodeArr[$i].'/'.$explodeArr[$i+1]);
                    foreach($refArr AS $key=>$val){
                        $refArr[$key]   =   $httpBaseUrl.'/'.$val;
                    }
                }
            }
        }
        return $refArr;
    }

    /**
     * 连接处理
     * @param $urlController
     * @return array
     */
    public function reF($urlController){
        $xss            =   "<script>alert('xss攻击检测')</script> ";//xss攻击
        $sqlInjection   =   "WHERE 1=1";//sql注入
        $csrf           =   'csrf';//csrf攻击
        $randStr        =   $this->make_str(10);
        $urlController  .=   '/';
        $returnArr      =   [
            'xxs'       =>  $urlController.$xss,
            'sql'       =>  $urlController.$sqlInjection,
            'csrc'      =>  $urlController.$csrf,
            'randStr'   =>  $urlController.$randStr,
        ];
        return $returnArr;
    }


}