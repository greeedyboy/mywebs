---
title: Hexo本地搭建过程使用NexT模板
urlname: Hexo-NexT-github-config
tags:
  - Hexo
  - NexT
  - 博客设置
categories:
  - Hexo
date: 2018-04-09 22:43:12
---
> Hexo本地搭建过程使用NexT模板,记录博客建立过程，及部分配置。完成本博客的初步设置，最近修改的主题显示，也包涵在这里。
<!-- more -->
## 1. 安装node.js

- [http://nodejs.cn](http://nodejs.cn)

## 2.安装git

- (说明：LTS为长期支持版，Current为当前最新版)
- [https://git-scm.com/](https://git-scm.com/)
- 查看版本：
- 命令：node -v

## 3.使用npm安装Hexo

- 打开cmd.exe
- cd到blog安装目录:E:\web\hexo
- cmd 命令 example:
```
E:\
cd web\hexo
```
- 使用npm安装hexo.要等待好久，决定网速
```
npm install -g hexo-cli
// -g是全局安装的意思。
```

## 4.初始化hexo

- 命令：hexo init
- 内部文件说明
    - node_modules：是依赖包
    - public：存放的是生成的页面
    - scaffolds：命令生成文章等的模板
    - source：用命令创建的各种文章
    - themes：主题
    - _config.yml：整个博客的配置
    - db.json：source解析所得到的
    - package.json：项目所需模块项目的配置信息
- 做好这些前置工作之后接下来的就是各种配配配置了。

## 5.注册github

- 创建账号在[https://www.github.com](https://www.github.com)
- 创建项目名称为{用户名}.github.io
- 部署pages
- 创建SSH
    - 在gitbash中输入：
    - ssh-keygen -t rsa -C "youremail@example.com"
    - 生成ssh。然后复制id_rsa.pub文件的内容放到github中
    - 在gitbash中验证是否添加成功：
    - ssh -T git@github.com
	
## 6.回到hexo设置

- 打开博客中_config.yml进行文件配置
- 冒号之后都是有一个半角空格的
```
deploy:
  type: git
  repo: https://github.com/username/username.github.io.git
  branch: master
```
- 在博客目录上gitbase命令
```
hexo clean
hexo generate
hexo server
```
- 打开浏览器查看blog：[http://localhost:4000](http://localhost:4000)
- hexo命令
```
hexo new "postName" #新建文章
hexo new page "pageName" #新建页面
hexo generate #生成静态页面至public目录
hexo server #开启预览访问端口（默认端口4000，'ctrl + c'关闭server）
hexo deploy #将.deploy目录部署到GitHub
hexo help  # 查看帮助
hexo version  #查看Hexo的版本
hexo deploy -g  #生成加部署
hexo server -g  #生成加预览
命令的简写
hexo n == hexo new
hexo g == hexo generate
hexo s == hexo server
hexo d == hexo deploy
```
## 7.部署到github

- 安装支持，在博客目录cmd命令
```
npm install hexo-deployer-git --save
```
- 清理缓存，生成，上传。博客目录中cmd.exe命令
```
hexo clean
hexo generate
hexo deploy
```
- 浏览器中输入username.github.io可以查看博客

## 8.绑定域名

- 注册域名
- 到github中page设置自己购买的域名
- cmd中ping username.github.io得到ip
- 在域名解析中设置cname记录到username.github.io
- 在a中设置@,ip为刚才ping得到的ip
- 在hexo博客目录source中创建CNAME文件,内容为域名

## 9.更改主题-next

- 下载安装next主题
- 在博客目录下gitbase命令
```
git clone https://github.com/iissnan/hexo-theme-next themes/next
```
- 打开 站点配置文件， 找到 theme 字段，并将其值更改为 next
- 配置文件就是根目录下的_config.yml文件 
- 修改hexo具体配置查看
- <http://theme-next.iissnan.com/getting-started.html](http://theme-next.iissnan.com/getting-started.html>
### 主题修改
- 强势推荐 <https://blog.csdn.net/qq_33699981/article/details/72716951>
#### 添加rss
- 安装插件。进入本地hexo目录，打开git bash。输入以下命令
- `npm install hexo-generator-feed`
- 在本地hexo根目录下的_config.yml文件中，添加以下配置。
```
    # Extensions
    ## Plugins: http://hexo.io/plugins/
    #RSS订阅
    plugin:
    - hexo-generator-feed
    #Feed Atom
    feed:
    type: atom
    path: atom.xml
    limit: 20
```
- 添加主题配置，在主题目录下的_config.yml目录下，添加如下配置。
- `rss: /atom.xml`
#### 文末添加文本结束
- 在路径 `\themes\next\layout\_macro` 中新建 `passage-end-tag.swig` 文件,并添加以下内容：
```
<div>
    {% if not is_index %}
        <div style="text-align:center;color: #ccc;font-size:14px;">-------------本文结束<i class="fa fa-paw"></i>感谢您的阅读-------------</div>
    {% endif %}
</div>
```
-  接着打开`\themes\next\layout\_macro\post.swig`文件，在`post-body` 之后， `post-footer` 之前添加
```
   {% if theme.passage_end_tag.enabled and not is_index %}
	 <div>
   {% include 'passage-end-tag.swig' %}
    </div>
   {% endif %}	
```
- 然后打开主题配置文件（_config.yml),在末尾添加：
```
# 文章末尾添加“本文结束”标记
passage_end_tag:
  enabled: true
```
#### 实现字数统计功能
- <https://github.com/theme-next/hexo-symbols-count-time>
#### 顶部加载条
- https://github.com/theme-next/theme-next-pace
#### 本地搜索
- <https://github.com/theme-next/hexo-generator-searchdb>

## 10.创作博客
- cmd博客根目录下
```
hexo new "postName"
 //hexo n 也可以 
 //你自己的博客名称，名为postName.md的文件会建在目
 //录/blog/source/_posts下。
```
- 说明new格式
    - $ hexo new [layout] <title>
| layout | 路径 | 说明 |
| :-: | :-: | :-: |
| post | source/_posts | 默认，可以直接发布 |
| page | source | 在source下新建一个文件夹 |
| draft |source/_drafts | 新建文件将保持到_drafts中 |
- tags两种模式
```
tags: [tag1, tag2, tag3]
或者
tags:
  - tag1
  - tag2
  - tag3
```
- markdown更多语法
- 之后进行文件编辑，使用markdown格式，然后进行发布
- 在根目录下cmd.exe
```
hexo g //生成静态页面
hexo d //发布
```
## 11.总结自己的疑惑
- 创建bolog的过程非常接近与code编码的过程，的确符合程序猿的习惯
- 博客如果多了怎么进行管理？
- 增加会了，上该如何进行？
- 没有可视化的工具，创建完文件名后需要找到相应的文件位置，打开编辑器进行编辑，感觉有点麻烦。



