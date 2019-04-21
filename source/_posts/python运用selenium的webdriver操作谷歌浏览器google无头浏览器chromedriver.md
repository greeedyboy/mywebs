---
title: python运用selenium的webdriver操作谷歌浏览器google无头浏览器chromedriver
urlname: python-selenium-google-index
tags:
  - python
  - selenium
  - webdriver
  - google
  - chromedriver
categories:
  - python
date: 2019-04-12 16:57:09
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 终于忍不住，开始用python对网站下手了。自动化操作网页，直接从selenium入手，配套自己一直喜欢的chrome，安装其chromedriver，开启自坑之旅。

<!-- more -->

### selenium介绍
- 首先我自己也没有太懂，我的理解是Web应用程序测试的工具，利用其所谓的测试功能，去干一些偷奸耍滑的勾当。
- 具体高深的和全面的解释，请移步<https://www.baidu.com/s?wd=selenium>

### 使用准备
- `python3`环境，本人使用`anconada`
- 开发环境，pycharm编辑器

### 下载`chrome`驱动`chromedriver`
- 注意：版本要与你的chrome版本相互支持
- 首先查看`chrome`版本
- 根据系统下载`chromedriver`<http://chromedriver.storage.googleapis.com/index.html>
- 将驱动放置到`chrome.exe`的目录`C:\Program Files (x86)\Google\Chrome\Application`
- 设置系统变量`path`为`chromedriver`放置的目录
- 我的电脑–>属性–>系统设置–>高级–>环境变量–>系统变量–>Path
    - 如果不想设置系统变量，需要在编程时，带上路径，我认为不是很方便，建议设置系统变量。
![系统变量设置步骤](https://wx3.sinaimg.cn/large/3f2c99ebgy1g2062l8nclj210o0oxn0t.jpg)
### 安装`selenium`插件
- 采用`pip3`方式安装命令
```
pip install selenium
```
- `anconada`安装方式命令
- [插件地址](https://anaconda.org/conda-forge/selenium)
```
conda install -c conda-forge selenium
```

### 运行代码，打开百度测试
```
from selenium import webdriver
driver= webdriver.Chrome()
# 如果在环境变量里面没有设置path,可以使用如下方式
# driver= webdriver.Chrome("C:\Program Files (x86)\Google\Chrome\Application\chromedriver.exe")
driver.get("https://www.baidu.cn")
```
![运行界面](https://wx3.sinaimg.cn/large/3f2c99ebgy1g2062on9wnj20wf0ifjse.jpg)

### 饮水思源
- <http://www.cnblogs.com/zhaof/p/6953241.html>
- <https://blog.csdn.net/weixin_36279318/article/details/79475388>
- <https://cuijiahua.com/blog/2017/11/spider_2_geetest.html>
- <https://blog.csdn.net/weixin_36279318/article/details/79586022>
