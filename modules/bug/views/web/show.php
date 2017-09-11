<b>分析结果</b>
<hr/>
<?php
if($info){
    foreach($info AS $key=>$val){
        echo '类型'.$key.',连接地址:'.htmlentities($val).'<br />';
        echo '<iframe src="'.$val.'" style="width:100%; height: 500px;"></iframe>';
        echo '<hr />';
    }

}
