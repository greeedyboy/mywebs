---
title: next模板升级到V7.0.0.1
urlname: update-next-index
tags:
  - next
categories:
  - daybreak
date: 2019-04-09 15:11:55
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 将hexo模板next升级到最新版本7.0.0.1，升级步骤如下。

<!-- more -->
### 升级理由
- 其实最近也没有关注主题在哪方面有改进，只是觉得有新版本了，尝试一下而已，仅此而已
- 怕以后有大的改进，想加入新功能，版本跨度太大的话，步伐太大，容易扯淡，所以跟风更新

### 升级next主题到7.0.1
- https://github.com/theme-next/hexo-theme-next
- gitbase到blog的模板目录`themes/next`
- 命令`git pull`
    - 麻烦来了
    - 出现问题
    - ![git pull出现了错误](https://wx4.sinaimg.cn/large/3f2c99ebly1g1weue9f18j20sw0soq7l.jpg) 
    - ![错误具体详情](https://wx3.sinaimg.cn/large/3f2c99ebly1g1weul1duuj20sw0ghju1.jpg)
    - ![开始处理](https://wx4.sinaimg.cn/large/3f2c99ebly1g1weunt8szj20re0jbmzl.jpg)
    - ![处理方法是点保存](https://wx4.sinaimg.cn/large/3f2c99ebly1g1weuqf99yj20m30hvju0.jpg)
    - 处理之后就可以了，具体原因没有细看，反正是顺利升级了
- 运用sublime对比`blog\themes\next\_config.yml`和`blog\source\_data\next.yml`文件进行设置改动
    - 打开两个文件，在其中一个文件上点击`compare with file` 

### 说明
- 这次升级，对于`blog\source\_data\next.yml`的改动还是挺多了，设置方面也多了很多，但是没有时间研究，具体功能等用到再说吧，就是没有中文版的说明，看英文费劲

