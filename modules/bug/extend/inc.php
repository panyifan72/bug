<?php
/**
 * Created by PhpStorm.
 * User: ytron123
 * Date: 17/9/7
 * Time: 下午4:22
 */
namespace app\modules\bug\extend;
class inc{
    /**
     * 切割
     * @param $path
     * @param $explodeWord  切合符号
     * @return array|bool
     */
    public function pathEx($path,$explodeWord='/'){
        if(!$path){
            return false;
        }
        $explodePath   =   explode($explodeWord,$path);
        $reArr  =   [];
        for($i=0;$i<count($explodePath);$i++){
            if($explodePath[$i]){
               $reArr[] =   $explodePath[$i];
            }
        }
        return $reArr;
    }
    /**
     * 随机获取字符串
     * @param int $length
     * @return string
     */
    function make_str( $length = 8 ){
// 密码字符集，可任意添加你需要的字符
        $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
            'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
            'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!',
            '@','#', '$', '%', '^', '&', '*', '(', ')', '-', '_',
            '[', ']', '{', '}', '<', '>', '~', '`', '+', '=', ',',
            '.', ';', ':', '/', '?', '|');
        $countChars =   count($chars)-1;
        $returnStr  =   '';
        for($i=0;$i<$length;$i++){
            $returnStr.=$chars[rand(0,$countChars)];
        }
        return $returnStr;
    }
}