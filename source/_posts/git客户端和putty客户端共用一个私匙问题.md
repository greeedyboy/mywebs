---
title: git客户端和putty客户端共用一个私匙问题
urlname: git-putty-pub-rsa
tags:
  - git
  - github
  - putty
  - id_rsa
  - id_rsa.pub
categories:
  - git
date: 2018-04-09 12:02:56
---

> 问题：在进行github公匙管理的时候，希望完成共用一个钥匙的问题。因为gitbase自己可以产生，我使用的putty客户端也可以产生，本文就是将两者合为一个而进行使用。共同使用putty产生的钥匙。

> 注：id_rsa是ssh的私钥，id_rsa.pub是对应的公钥，以上两个是OpenSSH用的格式，ppk文件中同时包含了公钥和私钥，多见于putty客户端。id_rsa和ppk文件是可以互相转的，可以打开看看，都是纯文本，差别不大

<!-- more -->

### putty产生公匙
- 保证下载最新的putty客户端<https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html>
- 安装相应的版本下载，然后安装，如果安装有其他git客户端，主要保持原有的putty目录一致。
- 打开`puttygen.exe`
- 点击`generate`，保持鼠标晃动
- 可见产生相关密匙，可以将这个密匙复制，然后粘贴到各个网站托管项目设置的ssh地方，不在赘述。
- 然后保存`save privatekey`,生成*.ppk文件(保存后可以重新导入，并在客户端应用)
- 点击菜单栏`conversions`,`Conversions`,`Export OpenSSH key`，放到C:/user/用户名/.ssh文件夹下，备用。

### 将公匙导入gitbase
- 打开gitbase
- 以下代码，将公匙传递给git bash,并利用git bash生成器私匙
```
eval `ssh-agent -s`
ssh-agent
ssh-add
ssh-keygen -f ~/.ssh/id_rsa -y > ~/.ssh/id_rsa.pub

```
- 然后运行`ssh git@github.com`
- 出现`You've successfully authenticated, but GitHub does not provide shell access.
`表示成功完美。

### 历程参考，对原作者致敬
- <https://blog.csdn.net/AuthorK/article/details/77894801>
- <https://stackoverflow.com/questions/42863913/key-load-public-invalid-format>
- <https://www.cnblogs.com/sunnypei/articles/5811283.html>
- <https://www.zhihu.com/question/22427215/answer/21318165>