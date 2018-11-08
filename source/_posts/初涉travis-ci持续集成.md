---
title: 初涉travis ci持续集成
urlname: travis-ci-index
tags:
  - diary
categories:
  - daybreak
date: 2018-07-10 19:29:12
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 持续集成，对于外行来说，我还不能完全理解其概念，但是从目前我所应用的一个实例来看，的确对于效率的提升方面，很值得赞赏。本文通过简单教程，记录一下自己利用网络的集成服务实现静态博客的生成。具体来说是通过往软件托管服务器上上传文本文件，然后引发设置的集成服务，自动通过集成服务器实现自动编译，自动将转化后的静态博客内容，上传到指定的服务器。

<!-- more -->

### 持续集成概念
大师Martin Fowler对持续集成是这样定义的:持续集成是一种软件开发实践，即团队开发成员经常集成他们的工作，通常每个成员每天至少集成一次，也就意味着每天可能会发生多次集成。每次集成都通过自动化的构建（包括编译，发布，自动化测试)来验证，从而尽快地发现集成错误。许多团队发现这个过程可以大大减少集成的问题，让团队能够更快的开发内聚的软件。

- 以上转自百度百科。[持续集成](https://baike.baidu.com/item/%E6%8C%81%E7%BB%AD%E9%9B%86%E6%88%90/6250744)

### 实现内容
用下面图例进行表示。

![](https://wx2.sinaimg.cn/large/3f2c99ebgy1ft7g1fgn9cj20nl069abm.jpg)

### 涉及到的网站
- 代码托管服务(https://github.com)
- 网络集成环境(https://travis-ci.org/)

### 准备工作
- 去代码托管网站注册账号
- 创建项目
- 在本地创建hexo静态博客环境
- 去网络集成环境注册账号，需要关联github账号
- 要集成哪个项目就滑动相关滑块就可以了

![](https://wx3.sinaimg.cn/large/3f2c99ebgy1ft7g1gpu6ij20u506bgll.jpg)

### 集成环境配置
- 在相关选定的项目后面打开配置`setting`
- 找到`Environment Variables`
- 配置一个变量`GH_TOKEN`操作github的密匙，其来源于github

### github操作
- github密匙来源路径：`github`-`Settings`-`Developer settings`-`Personal access tokens`
- 在项目下创建文件`.travis.yml`用于集成环境的配置
- 以下是我的代码。备注以下yourname是指你在github上的用户名。
```
language: node_js  #设置语言

node_js: stable  #设置相应的版本x

cache:
    apt: true
    directories:
        - node_modules # 缓存不经常更改的内容

before_install:
    - export TZ='Asia/Shanghai' # 更改时区

install:
  - npm install  #安装hexo及插件

script:
  - hexo clean  #清除
  - hexo g  #生成

after_script:
#- git clone https://${GH_REF} .deploy_git  # GH_REF是最下面配置的仓库地址
  - git clone https://${CO_REF} .deploy_git  # GH_REF是最下面配置的仓库地址
  - cd .deploy_git
  - git checkout master
  - cd ../
  - mv .deploy_git/.git/ ./public/   # 这一步之前的操作是为了保留master分支的提交记录，不然每次git init的话只有1条commit
  - cd ./public
  - git config user.name "yourname"  #修改name
  - git config user.email "yourname@163.com"  #修改email
  - git add .
  - git commit -m "Travis CI Auto Builder at `date +"%Y-%m-%d %H:%M"`"  # 提交记录包含时间 跟上面更改时区配合
  - git push --force --quiet "https://yourname:${CO_TOKEN}@${CO_REF}" master:master  #GH_TOKEN是在Travis中配置token的名称

branches:
  only:
    - master  #只监测source分支，source是我的分支的名称，可根据自己情况设置
env:
 global:
   - GH_REF: github.com/yourname/citest.git  #设置GH_REF，注意更改yourname
   - CO_REF: git.coding.net/yourname/yestit.git  #设置GH_REF，注意更改yourname

# configure notifications (email, IRC, campfire etc)
# please update this section to your needs!
# https://docs.travis-ci.com/user/notifications/
notifications:
  email:
    - yourname@163.com
  on_success: change
  on_failure: always
```

### 应用结束，可以git一下自己的项目试试，可以进行自动部署了