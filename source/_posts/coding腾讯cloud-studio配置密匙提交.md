---
title: coding腾讯cloud studio配置密匙提交
urlname: coding-cloud-studio-index
tags:
  - ssh-keygen
  - open ~/.ssh
  - cloud studio
  - id_rsa
  - git
categories:
  - 软件列表
date: 2018-11-27 09:23:09
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 问题及解决：腾讯良心开启了cloud studio，还是有一些利用价值的，中间想用它修改源代码，并推送到其他的git代码管理中心，要解决的是一个生成ssh密匙或rsa.pu密匙的问题。中间遇到一些问题，总算最后有一个好的结果，现在总结过程如下。
> 
<!-- more -->

### 问题说明

- ssh-keygen无法产生密匙，出错zsh: parse error near `\n'
- open ~/.ssh命令出错Not a Port
### 解决问题关键点
- ssh-keygen命令格式一定要正确，尤其是邮箱部分一定不能含有"<"和">"。搞不懂为什么在说明文档里面有这些字符，让我们这些小白好痛苦。
- open ~/.ssh命令不知道为什么不管用，反正我用其他命令实现了编辑器打开id_rsa.pub文件,在命令行中显示了密匙。具体命令下面说明。

### 操作过程

#### 开启Cloud Studio
- 打开腾讯Cloud Studio的网址<https://studio.dev.tencent.com/dashboard/workspace>
- 进入工作空间

#### 产生id_rsa密匙和id_rsa.pub公匙
- 在底部命令行输入命令`ssh-keygen -t rsa -C xxxx@163.com`

- 显示
```
Generating public/private rsa key pair.
Enter file in which to save the key (/home/coding/.ssh/id_rsa):
```
- 直接回车
- 系统提示
```
/home/coding/.ssh/id_rsa already exists.
Overwrite (y/n)?
```
- 输入：`y`
`Enter passphrase (empty for no passphrase):`
- 输入：回车
- 显示`Enter same passphrase again:`
- 输入：回车
- 显示：
```
Your identification has been saved in /home/coding/.ssh/id_rsa.
Your public key has been saved in /home/coding/.ssh/id_rsa.pub.
The key fingerprint is:
SHA256:n3k8AfHrdevWgljmpvvwOXuuWKbbksWXqtFo0 xxx@163.com
The key's randomart image is:
+---[RSA 2048]----+
|          .      |
|           o     |
|          . .    |
|           . .   |
|        S   oo. .|
|         . *d+...|
|          *Ob+..+|
|         .=*s=*=o|
|          +X@@o*o|
+----[SHA256]-----+
```
- 至此大功告成，生成密匙

#### 显示id_rsa.pub公匙
- 其实就一句话
```
cat ~/.ssh/id_rsa.pub
```
- 得到就可以复制了，然后以备后用
```
ssh-rsa AAAAB3NzaGnikGl57yebtXXgLGlyk7uXxuRaXRHuZYm6+PkD+dIpreQCvZgAQNPTBDmSq0dm0J0vlzwd0nBrE41PlAyVPMZv3k12tBtDitrAAEAwYWH11fJH/9g92JLSmF59XJ4SpWKJ9g21HvrXO2eOmrXCcgghHbBgQbZiJj8hoUGXGwimhrZrxA0mTAmUQln9S0jQ+Yn+TStciX xxx@163.com
```

#### 配置网站
- 此时你就可以打开各个代码托管的网站了，然后，找到所谓的ssh公匙管理，然后把刚才得到的代码复制一下，填入到相应位置就可以了
- 腾讯coding为例
- 打开网址：<https://dev.tencent.com/user/account/setting/keys>
- 点击右侧<新增公匙>：
- 公匙名称：感谢wqian
- 公匙内容：刚才得到的ssh-rsa开始的字符串 
- 选中：永久有效
- 添加-输入密码-保存结束
- 完成以上操作

### 内部代码提交
- 编辑完代码
- 按菜单中`版本`->`提交`->`推送`
- 完成代码推送

### 其他托管提交方式
- 使用git命令进行
- 获取git地址
- 目标代码托管配置公匙
- git push操作等等
- 开始爽爽吧

### 参考
- 不屑于吐槽<https://coding.net/help/doc/account/ssh-key.html>
- 关于公匙<https://wqian.net/blog/2018/0409-git-putty-pub-rsa.html>
- 消失的曾经<https://wqian.net/blog/2018/0417-coding-webide-hexo-next.html>

