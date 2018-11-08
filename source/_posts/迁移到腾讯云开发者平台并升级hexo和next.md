---
title: 迁移到腾讯云开发者平台并升级hexo和next
urlname: blog-update-index
tags:
  - 腾讯云开发平台
  - coding
  - next
  - hexo
categories:
  - 博客设置
date: 2018-11-08 22:47:11
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 将博客next程序升级，将coding迁移到腾讯，将hexo升级到6.5.

<!-- more -->

### 升级hexo3.8
- 打开cmd到blog目录
- 输入命名`npm i hexo-cli -g`
- 版本升级hexo 3.8

### 安装hexo-baidu-url插件
- 项目网址

### 设置项目网址部分
- 修改_config.yml中关于百度提交熊掌号的部分
```
# 百度熊掌号
baidu_url_submit:
  count: 100 ## 提交最新的一个链接
  host: https://wqian.net ## 在百度站长平台中注册的域名
  token: token ## 请注意这是您的秘钥， 所以请不要把博客源代码发布在公众仓库里!
  path: baidu_urls.txt ## 文本文档的地址， 新链接会保存在此文本文档里
  xz_appid: id ## 你的熊掌号 appid
  xz_token: token ## 你的熊掌号 token
  xz_count: 10 ## 从所有的提交的数据当中选取最新的10条,该数量跟你的熊掌号而定
# Deployment
## Docs: https://hexo.io/docs/deployment.html
deploy:
- type: git    #部署类型
  #repo: git@github.com:greedyboy/greedyboy.github.io.git
  repo: https://git.dev.tencent.com/greedyboy/WQian.Net.git
  #repo: git@git.coding.net:greedyboy/WQian.Net.git
  branch: master

- type: baidu_url_submitter # 百度
- type: baidu_xz_url_submitter # 百度熊掌号
```

### 将项目从coding迁移到腾讯云开发者平台
- 介绍https://feedback.coding.net/topics/7257
- 将相关的推送网址更改为git.dev.tencent.com
- 中间比较顺利，按照指引，用微信各种扫码，迁移完成

### 升级next主题道6.5
- https://github.com/theme-next/hexo-theme-next
- gitbase到blog的模板目录`themes/next`
- 命令`git pull`
- 运用sublime对比`blog\themes\next\_config.yml`和`blog\source\_data\next.yml`文件进行设置改动


