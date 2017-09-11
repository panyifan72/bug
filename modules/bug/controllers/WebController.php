<?php
/**
 * Created by PhpStorm.
 * User: ytron123
 * Date: 17/9/7
 * Time: 下午3:17
 */
namespace app\modules\bug\controllers;
use app\modules\bug\extend\bugUrlExtend;
use Yii;
/**
 * Default controller for the `bug` module
 */
class WebController extends BaseController
{
    public $enableCsrfValidation = false;
    public function actionIndex(){
        return $this->render('index');
    }
    public function actionShow(){
        $getUrl =   Yii::$app->request->post('url');//链接
        $controller =   trim(Yii::$app->request->post('controller'));//控制器地址
//        $getUrl =   'https://alpha.52jxl.com/Mobile/Ecard/checkCard/dec/46Aeoo00oZgTYkMG058ofXQ8ugO0O0OO0O0O.html';
//        $controller =   'checkCard';
        $obBug  =   bugUrlExtend::inc();
        $data['info']   =   $obBug->checkUrl($getUrl,$controller);
        $data['info']['info']   =   $getUrl;
        return $this->render('show',$data);
    }
}
