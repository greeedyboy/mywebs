---
title: 利用可以在iframe中嵌入网页进行重定向
urlname: iframe-redirect-webpage
tags:
  - iframe
  - 重定向
categories:
  - daybreak
date: 2018-05-13 19:32:27
---
>无论怎样，我遇到了，某个模板只允许嵌入ifram框架，但是我又不怎么喜欢这样的模板，想进行重定向，方法让我找到了，可能方法不止一种，虽然我这种方法不是最完备的，但是，我确实是可以实现的。为遇到此种情况的朋友提供一点提示吧。

<!-- more -->

### 大致原理
- 在许可的范围内创建iframe标签
- ifram引入网页文件dm_drt.php?dm=x
- 在dm_drt.php中引入相关的函数，数组，运算等函数文件。
- 在dm_drt.php中构建重定向代码，可以根据dm进行运算并重定向。

### iframe标签创建
- 代码构建标准格式，例码如下
```
<iframe src ="http://u26.cn/dm_drt.php?dm=xz2sc.cc" frameborder="0" marginheight="0" marginwidth="0" frameborder="0" scrolling="auto" id="ifm" name="ifm"  width="100%"> 
</iframe> 
```

### 重定向文件创建
- 重定向文件dm_drt.php代码
```
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Yes You Do</title>
</head>
<body>
<?php 
     require("./dm_dmlist.php"); 
    $redi=0;
    $dm = isset($_GET['dm'])? htmlspecialchars($_GET['dm']) : '';
    
        
        //echo($dm.'jx<br>');
        //echo($myDm[$dm].'<br>');
    
    if (array_key_exists($dm,$myDm)){
        //echo ('yes'.'<br>');
        //echo($dm.'<br>');
        //echo($myDm[$dm].'<br>');
        $tURL=$myDm[$dm];
    }else{
        //echo('sorry');
        $tURL=$myDm["Sorry"];
        //echo($tURL);
    }   
    
?>
    <!--重定向-->
    
    
<div><a href="<?php echo($tURL) ?>" target="_top"></a></div>
<?php if ($redi==1) 
{
        ?>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
<script>
jQuery(function($) {
  $("a")[0].click();
});
</script>

<?php }?>
<?php require("./dm_foot.php"); ?>

</body>
</html>
```

### 相关文件-重定向路径运算
- 重定向运算代码dm_dmlist.php
```
<?php
$myDm["host"]="http://u26.cn/";
$myDm["Sorry"]=$myDm["host"]."dm_ds.php?dm=Sorry";
$myDm["cumt.net.cn"]=$myDm["host"]."dm_ds.php?dm=cumt.net.cn";
$myDm["sxkw.cn"]=$myDm["host"]."dm_ds.php?dm=sxkw.cn";
$myDm["utibet.com.cn"]=$myDm["host"]."dm_ds.php?dm=utibet.com.cn";
$myDm["tijmu.com.cn"]=$myDm["host"]."dm_ds.php?dm=tijmu.com.cn";
$myDm["sicau.com.cn"]=$myDm["host"]."dm_ds.php?dm=sicau.com.cn";
$myDm["hrbeu.com.cn"]=$myDm["host"]."dm_ds.php?dm=hrbeu.com.cn";
$myDm["tjutcm.com.cn"]=$myDm["host"]."dm_ds.php?dm=tjutcm.com.cn";
$myDm["shutcm.com.cn"]=$myDm["host"]."dm_ds.php?dm=shutcm.com.cn";
$myDm["ljzo.cn"]=$myDm["host"]."dm_ds.php?dm=ljzo.cn";
$myDm["fwme.cn"]=$myDm["host"]."dm_ds.php?dm=fwme.cn";
$myDm["songduoduo.cn"]=$myDm["host"]."dm_ds.php?dm=songduoduo.cn";
$myDm["nuandd.com"]=$myDm["host"]."dm_ds.php?dm=nuandd.com";
$myDm["piandd.com"]=$myDm["host"]."dm_ds.php?dm=piandd.com";
$myDm["tuandd.cn"]=$myDm["host"]."dm_ds.php?dm=tuandd.cn";
$myDm["nanduoduo.cn"]=$myDm["host"]."dm_ds.php?dm=nanduoduo.cn";
$myDm["shuanduoduo.cn"]=$myDm["host"]."dm_ds.php?dm=shuanduoduo.cn";
$myDm["cuduoduo.cn"]=$myDm["host"]."dm_ds.php?dm=cuduoduo.cn";
$myDm["gunduoduo.cn"]=$myDm["host"]."dm_ds.php?dm=gunduoduo.cn";
$myDm["nvduoduo.cn"]=$myDm["host"]."dm_ds.php?dm=nvduoduo.cn";
$myDm["hljyr.cn"]=$myDm["host"]."dm_ds.php?dm=hljyr.cn";
$myDm["hljdh.cn"]=$myDm["host"]."dm_ds.php?dm=hljdh.cn";
$myDm["hljyk.cn"]=$myDm["host"]."dm_ds.php?dm=hljyk.cn";
$myDm["oo4.com.cn"]=$myDm["host"]."dm_ds.php?dm=oo4.com.cn";
$myDm["gg0.com.cn"]=$myDm["host"]."dm_ds.php?dm=gg0.com.cn";
$myDm["0tt.com.cn"]=$myDm["host"]."dm_ds.php?dm=0tt.com.cn";
$myDm["0uu.com.cn"]=$myDm["host"]."dm_ds.php?dm=0uu.com.cn";
$myDm["0ii.com.cn"]=$myDm["host"]."dm_ds.php?dm=0ii.com.cn";
$myDm["g84.cn"]=$myDm["host"]."dm_ds.php?dm=g84.cn";
$myDm["b47.cn"]=$myDm["host"]."dm_ds.php?dm=b47.cn";
$myDm["h46.cn"]=$myDm["host"]."dm_ds.php?dm=h46.cn";
$myDm["b74.cn"]=$myDm["host"]."dm_ds.php?dm=b74.cn";
$myDm["fxche.com"]=$myDm["host"]."dm_ds.php?dm=fxche.com";
$myDm["gking.net"]=$myDm["host"]."dm_ds.php?dm=gking.net";
$myDm["0m2.cn"]=$myDm["host"]."dm_ds.php?dm=0m2.cn";
//$myDm["u26.site"]=$myDm["host"]."dm_ds.php?dm=u26.site";
//$myDm["u26.top"]=$myDm["host"]."dm_ds.php?dm=u26.top";
//$myDm["jarey.wang"]=$myDm["host"]."dm_ds.php?dm=jarey.wang";
//$myDm["jarbo.wang"]=$myDm["host"]."dm_ds.php?dm=jarbo.wang";
$myDm["gzhtcm.cc"]=$myDm["host"]."dm_ds.php?dm=gzhtcm.cc";
$myDm["shutcm.cc"]=$myDm["host"]."dm_ds.php?dm=shutcm.cc";
$myDm["njutcm.cc"]=$myDm["host"]."dm_ds.php?dm=njutcm.cc";
$myDm["njupt.cc"]=$myDm["host"]."dm_ds.php?dm=njupt.cc";
$myDm["shcmusic.cc"]=$myDm["host"]."dm_ds.php?dm=shcmusic.cc";
$myDm["cdutcm.cc"]=$myDm["host"]."dm_ds.php?dm=cdutcm.cc";
$myDm["tjutcm.cc"]=$myDm["host"]."dm_ds.php?dm=tjutcm.cc";
$myDm["cppsu.cc"]=$myDm["host"]."dm_ds.php?dm=cppsu.cc";
$myDm["gucas.cc"]=$myDm["host"]."dm_ds.php?dm=gucas.cc";
$myDm["nwsuaf.xyz"]=$myDm["host"]."dm_ds.php?dm=nwsuaf.xyz";
$myDm["nankai.info"]=$myDm["host"]."dm_ds.php?dm=nankai.info";
$myDm["nudt.info"]=$myDm["host"]."dm_ds.php?dm=nudt.info";
$myDm["nwsuaf.info"]=$myDm["host"]."dm_ds.php?dm=nwsuaf.info";
$myDm["6tt.org"]=$myDm["host"]."dm_ds.php?dm=6tt.org";
$myDm["istic.cc"]=$myDm["host"]."dm_ds.php?dm=istic.cc";
$myDm["tijmu.cc"]=$myDm["host"]."dm_ds.php?dm=tijmu.cc";
$myDm["shufe.cc"]=$myDm["host"]."dm_ds.php?dm=shufe.cc";
$myDm["shsmu.cc"]=$myDm["host"]."dm_ds.php?dm=shsmu.cc";
$myDm["utibet.cc"]=$myDm["host"]."dm_ds.php?dm=utibet.cc";
$myDm["njust.cc"]=$myDm["host"]."dm_ds.php?dm=njust.cc";
$myDm["cdstm.cc"]=$myDm["host"]."dm_ds.php?dm=cdstm.cc";
$myDm["cugb.cc"]=$myDm["host"]."dm_ds.php?dm=cugb.cc";
$myDm["swjtu.cc"]=$myDm["host"]."dm_ds.php?dm=swjtu.cc";
$myDm["nwsuaf.cc"]=$myDm["host"]."dm_ds.php?dm=nwsuaf.cc";
$myDm["ab2sc.xyz"]=$myDm["host"]."dm_ds.php?dm=ab2sc.xyz";
$myDm["gh2sc.com"]=$myDm["host"]."dm_ds.php?dm=gh2sc.com";
$myDm["ab2sc.com"]=$myDm["host"]."dm_ds.php?dm=ab2sc.com";
$myDm["gh2sc.xyz"]=$myDm["host"]."dm_ds.php?dm=gh2sc.xyz";
$myDm["da2sc.com"]=$myDm["host"]."dm_ds.php?dm=da2sc.com";
$myDm["da2sc.xyz"]=$myDm["host"]."dm_ds.php?dm=da2sc.xyz";
$myDm["tj2sc.cc"]=$myDm["host"]."dm_ds.php?dm=tj2sc.cc";
$myDm["sh2sc.cc"]=$myDm["host"]."dm_ds.php?dm=sh2sc.cc";
$myDm["xa2sc.cc"]=$myDm["host"]."dm_ds.php?dm=xa2sc.cc";
$myDm["xz2sc.cc"]=$myDm["host"]."dm_ds.php?dm=xz2sc.cc";
$myDm["tgot.net"]=$myDm["host"]."dm_ds.php?dm=tgot.net";
$myDm["wqian.net"]=$myDm["host"]."dm_ds.php?dm=wqian.net";
$myDm["emtv.cc"]=$myDm["host"]."dm_ds.php?dm=emtv.cc";
$myDm["jmtv.cc"]=$myDm["host"]."dm_ds.php?dm=jmtv.cc";
$myDm["7kk.org"]=$myDm["host"]."dm_ds.php?dm=7kk.org";
$myDm["hking.cc"]=$myDm["host"]."dm_ds.php?dm=hking.cc";
$myDm["bking.cc"]=$myDm["host"]."dm_ds.php?dm=bking.cc";
$myDm["pking.cc"]=$myDm["host"]."dm_ds.php?dm=pking.cc";
$myDm["l06.cc"]=$myDm["host"]."dm_ds.php?dm=l06.cc";
$myDm["l07.cc"]=$myDm["host"]."dm_ds.php?dm=l07.cc";
$myDm["l05.cc"]=$myDm["host"]."dm_ds.php?dm=l05.cc";
//$myDm["u26.cn"]=$myDm["host"]."dm_ds.php?dm=u26.cn";
$myDm["l05.cc"]=$myDm["host"]."dm_ds.php?dm=l05.cc";
$myDm["l05.cc"]=$myDm["host"]."dm_ds.php?dm=l05.cc";
$myDm["b4.gs"]=$myDm["host"]."dm_ds.php?dm=b4.gs";
$myDm["u8.gs"]=$myDm["host"]."dm_ds.php?dm=u8.gs";
$myDm["u26.win"]=$myDm["host"]."dm_ds.php?dm=u26.win";

?>
```

### 相关文件-显示页面例子
- 显示页面例子dm_ds.php?dm=x
```
<?php $dm = isset($_GET['dm'])? htmlspecialchars($_GET['dm']) : '';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo($dm.'域名正在出售|The domain is for sale.') ?></title>
</head>

<body>
<?php require("dm_dmlist.php");?>

  <?php 
    //echo ($dm=="Sorry" or array_key_exists($dm,$myDm)==false).'Yes';
    ?>
<?php if($dm=="Sorry" or array_key_exists($dm,$myDm)==false){ ?>
    
<h1 align="center">亲爱的</h1>
<h2 align="center">一切都太突然，这让我如何去爱！</h2>     
<?php   }else{  ?>
<h1 align="center"><?php echo($dm)?></h1>
<div style="width: 100%;display: inline"><div style="width: 49%; text-align: right; float: left"><h2>域名待字闺中</h2></div><div style="float: left;width: 2%; text-align: center;"><h2>|</h2></div><div style="width: 49%; text-align: left;float: right"><h2>The domain is waiting for you</h2></div></div>
<hr>
<div style="width: 100%;display: inline"><div style="width: 49%; text-align: right; float: left"><h3>你来</h3></div><div style="float: left;width: 2%; text-align: center;"><h3>|</h3></div><div style="width: 49%; text-align: left;float: right"><h3>You come</h3></div></div>
<div style="width: 100%;display: inline"><div style="width: 49%; text-align: right; float: left"><h3>即你懂我</h3></div><div style="float: left;width: 2%; text-align: center;"><h3>|</h3></div><div style="width: 49%; text-align: left;float: right"><h3>You must understand my heart</h3></div></div>
<div style="width: 100%;display: inline"><div style="width: 49%; text-align: right; float: left"><h3>请带走我</h3></div><div style="float: left;width: 2%; text-align: center;"><h3>|</h3></div><div style="width: 49%; text-align: left;float: right"><h3>Please take me away</h3></div></div>
<div style="width: 100%;display: inline"><div style="width: 49%; text-align: right; float: left"><h3>让我不再孤寂漂泊</h3></div><div style="float: left;width: 2%; text-align: center;"><h3>|</h3></div><div style="width: 49%; text-align: left;float: right"><h3>It will be my pleasure</h3></div></div>
<h4 align="center" >......</h4>

<h4 align="center" >Email:254828511@QQ.com</h4>
<?php   } ?>
<?php require("./dm_foot.php"); ?>
</body>
</html>
```

### 相关文件-通用底部页面
- 显示页面例子dm_foot.php
```
<p align="center"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_148541'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s23.cnzz.com/stat.php%3Fid%3D148541%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>   </p>
```

### 参考文献
- 各大搜索引擎