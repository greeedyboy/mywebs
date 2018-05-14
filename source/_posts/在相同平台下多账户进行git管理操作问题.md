---
title: 在相同平台下多账户进行git管理操作问题
urlname: git-private-key-user
tags:
  - git
  - putty
categories:
  - daybreak
date: 2018-04-17 09:43:09
---
>遇到问题：网上有多个平台提供源码托管服务，比如国外的[github](https://github.com),[gitlab](https://gitlab.com),以及国内的[gitee](https://gitee.com/),[coding](https://coding.net)等公司，如果每个平台注册一个账号，使git项目管理，只要把ssh产生的公匙分别配置到各个托管平台提供的设置ssh公匙上就可以了。但是有的时候可能出于比如躲避女友删除等很多原因，需要在一个平台上注册多个账户，那么怎么处理这种问题呢？下面我给出了自己的解决方法，可能不具有普适性，仅供参考。

<!-- more -->

### 术语解释
- 平台：指源码托管平台，比如网站[github](https://github.com),[gitlab](https://gitlab.com),[gitee](https://gitee.com/),[coding](https://coding.net)等
- 账户：某个平台下注册的账户，比如用户名为`user`,可以在`github`注册，也可以在`gitee`注册，也有可能不相同。
- 相同平台多账户：在单个平台下注册的多个账户，比如在`github`上注册了`user1`,`user2`,`user3`等账户
- 本文重点解决问题是：**在相同平台下多账户进行git管理操作问题**。

### 使用git或其他git客户端生成密匙
- 我使用的是[git extension](http://gitextensions.github.io/)客户端生成多个密匙。首先打开`git extension`
- 点击`tool`下面的，`putty`,`generate or import key`
- 弹出`对话框`，点击`generate`并在上部空白晃动鼠标，等待结束
- 点击下部`save private key`，选择保存路径及文件名，记得后缀为`.ppk`

### 将私匙配置到网站
- 将上步中，生成的字符串全选，复制到粘贴板
- 打开源码托管网站，用账号A登录，设置到相应ssh设置地方

### 设置多个账户
- 按照第一步中从新生成一个密匙，并保存到路径，同时命名文件名，依然要记得后缀为`.ppk`
- 用账号B登录源码托管网站，把第二次生成的密匙设置到ssh设置地方
- 这样就解决了问题。

### 应用环节
- 我运用`git extension`客户端进行`git`项目管理，进行`pull`或`push`操作。
- 多个平台用一个密匙没有问题，如果一个平台多个账户就要选择相应账户对应的密匙。

### 可能出现的问题
- 一定要记得存放路径，并且后缀为`.ppk`
- 客户端产生的密匙如果想导入到`git base`进行使用，可以查看本站文章。[git客户端和putty客户端共用一个私匙问题](../2018/0409-git-putty-pub-rsa.html)
- 如果生成密匙的时候没有将密匙设置到相应账户，可以打开`putty`然后加载密匙，之后再将相应密匙设置到平台账户。

## **如果文章对你有一丁点的触动，请捐一分钱鼓励作者继续创作吧**

