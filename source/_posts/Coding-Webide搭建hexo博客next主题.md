---
title: Coding Webide搭建hexo博客next主题
urlname: coding-webide-hexo-next
tags:
  - coding
  - webide
  - next
  - hexo
categories:
  - 软件列表
date: 2018-04-17 11:04:34
---
![感谢pixabay供图](https://cdn.pixabay.com/photo/2018/01/13/19/39/fashion-3080644_1280.jpg)

> 发现coding出品了一款[Coding WebIDE](https://ide.coding.net/index)的工具，据说：Coding WebIDE 是 Coding 自主研发的在线集成开发环境 (IDE)。用户可以通过 WebIDE 创建项目的工作空间, 进行在线开发, 调试等操作。作者针对此进行了尝试应用，并成功搭建了基于next主题的hexo博客。记录过程如下，以供有相同需要的朋友参考。**本文利用WebIDE解决了通过网络发布静态博客的问题**。其他功能还很多，可以自行尝试。

<!-- more -->

### 提示
- 本教程需要有一定的操作基础，最好在本地搭建过hexo和next的过程。
- 可以参考，本站中文章：[Hexo本地搭建过程使用NexT模板](../2018/0409-Hexo-NexT-github-config.html)

### 准备工作
- 申请coding账户，<https://coding.net/>
- 登录账户，创建一个项目，比如为blog，得到git地址
- 设置page，得到静态网站刘览地址http://xxxxxx
- 打开[Coding WebIDE](https://ide.coding.net/index)
- 新建工作空间

### 设置空间hexo环境
- 打开[Coding WebIDE](https://ide.coding.net/index)
- 进入工作空间
- 点击右侧运行环境
- 选择ide-tty-hexo，点击使用
- 稍等片刻可以使用

### 安装hexo及插件
- 过程和本地基本没有区别，可以详细参考本站相关文章。[Hexo本地搭建过程使用NexT模板](../2018/0409-Hexo-NexT-github-config.html)
- 在工作空间左侧点击终端
- 底部出现命令窗口
- 输入代码安装hexo到目录hexo并初始化。(注意目录为空的问题。如果更改目录请使用`cd 目录`)
```
npm install hexo
hexo init
```
- 安装插件
```
npm install hexo-deployer-git --save
npm install hexo-generator-searchdb --save
npm install hexo-generator-feed
```
- 设置根目录_config.yml配置git，以及相关网站及目录问题。不知道的可以搜索相关教程。
- 注意配置deploy,类型为git，地址为第一步中创建的ssh地址。

### 配置webide的密匙到相应源码托管平台
- 运行代码产生密匙，并打开密匙文件，用户名和邮箱自行修改
```
git config --global user.name "***"
git config --global user.email "**@163.com"
ssh-keygen -t rsa -C "**@163.com"

cat ~/.ssh/id_rsa.pub
```

### 安装next主题
- cd到博客目录`cd hexo`
- 运行代码安装主程序和扩展
```
git clone https://github.com/theme-next/hexo-theme-next themes/next
git clone https://github.com/theme-next/theme-next-pace source/lib/pace
```
- 将next目录下的`_config.yml`复制一份到`source\_data`目录下，并重新命名`next.yml`
- 根据自己需要修改`next.yml`进行主题配置

### 产生博客，生成博客
- 运行命令产生about,和tags页面，以及第一篇博客。
```
cd hexo
hexo new page "about"
hexo new page "tags"
hexo new "This is my first blog"
```
- 修改`source\_post`目录下刚创建的文件就是刚创建的博客。

### 运用WebIDE生成静态博客并上传到相应托管平台的pages服务
- 运行生成及上传代码
```
cd hexo
hexo clean
hexo g
hexo d
```
- 查看http://xxxxxx，应该就能看的你刚创建的博客了。

### 可能出现的问题
- 命令行出现问题，看看是不是应该运行在当前目录下
- 注意配置hexo配置和网站配置的正确性，是网站根目录还是根目录下文件夹
- 出现问题会有提示，注意根据提示进行解决。

## **如果文章对你有一丁点的触动，捐一分钱也是对作者的鼓励**