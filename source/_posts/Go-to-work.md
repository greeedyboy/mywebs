---
title: 站点更新小结V18.04.10
urlname: go-to-work
tags:
  - diary
  - hexo
  - next-theme
categories:
  - daybreak
date: 2018-04-08 13:00:21
---
Good Good Study,Day Day UP!


## Reflection
- 首先要有内容，才需要建立博客，不然有点本末倒置的味道
- 由此耽误了很多的工作，暂时告一段落
- 1/40程序员，真的不着调
- 把自己的主业搞起来，才ok
- 有时间的话尝试是可以的，但是不能如此的分心啊
<!-- more -->

## Done
- 记录hexo+next博客配置
- 至此暂时告别一个段落
hexo+next配置内容设置如下

### `网站配置_config.yml`设置内容

```
title: WQian'S Blog
subtitle: Working For Daybreak
...
author: WQian
language: zh-CN
timezone: Asia/Shanghai
...
# URL
## If your site is put in a subdirectory, set url as 'http://yoursite.com/child' and root as '/child/'
url: https://tgot.net
root: /
permalink: blog/:year:month:day-:urlname.html
permalink_defaults:
urlname: index
...
theme: next-reloaded
...
# Deployment
## Docs: https://hexo.io/docs/deployment.html
deploy:
  type: git
  repo: git@github.com:greedyboy/greedyboy.github.io.git
  branch: master
```

### `主题配置_config.yml`设置内容

```
footer:
  # Specify the date when the site was setup.
  # If not defined, current year will be used.
  since: 2018
....
    # If not defined, will be used `author` from Hexo main config.
  copyright:
  # -------------------------------------------------------------
  powered:
    # Hexo link (Powered by Hexo).
    enable: true
    # Version info of Hexo after Hexo link (vX.X.X).
    version: false

  theme:
    # Theme & scheme info link (Theme - NexT.scheme).
    enable: true
    # Version info of NexT after scheme info (vX.X.X).
    version: false
....
  menu:
  home: / || home
  about: /about/ || user
  tags: /tags/ || tags
  categories: /categories/ || th
  archives: /archives/ || archive
  #schedule: /schedule/ || calendar
  #sitemap: /sitemap.xml || sitemap
  #commonweal: /404/ || heartbeat
  ....
  scheme: Pisces
  ...
  social:
  GitHub: https://github.com/yourname || github
  E-Mail: mailto:admin@tgot.net || envelope
  ....
  # Reward
reward_comment: Thanks for your work.
wechatpay: /images/wechatpay.jpg
alipay: /images/alipay.jpg
#bitcoin: /images/bitcoin.png
...
post_copyright:
  enable: true 
  license: <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" rel="external nofollow" target="_blank">CC BY-NC-SA 4.0</a>
.........
!!!!!重点
!开启方式hexo主题next目录下
$ git clone https://github.com/theme-next/theme-next-reading-progress source/lib/reading_progress
然后开启
reading_progress:
  enable: true
  color: "#37c6c0"
  height: 2px
  .........
  # CNZZ count
cnzz_siteid: 1273359837
.......
$ git clone https://github.com/theme-next/theme-next-needmoreshare2 source/lib/needsharebutton
needmoreshare2:
  enable: true
  postbottom:
    enable: true 
    options:
      iconStyle: box
      boxForm: horizontal
      position: bottomCenter
      networks: Weibo,Wechat,Douban,QQZone,Twitter,Facebook
  float:
    enable: false
    options:
      iconStyle: box
      boxForm: horizontal
      position: middleRight
      networks: Weibo,Wechat,Douban,QQZone,Twitter,Facebook
```
 2018-4-9 

```
# Post wordcount display settings
# Dependencies: https://github.com/theme-next/hexo-symbols-count-time
symbols_count_time:
  separated_meta: true
  item_text_post: true
  item_text_total: false
  awl: 25
  wpm: 200
  
## Plugins: http://hexo.io/plugins/
#RSS订阅
plugin:
- hexo-generator-feed
#Feed Atom
feed:
type: atom
path: atom.xml
limit: 20


# Table Of Contents in the Sidebar
toc:
  enable: true

  # Automatically add list number to toc.
  number: true

  
    # Scroll percent label in b2t button.
  scrollpercent: true

  # Post wordcount display settings
# Dependencies: https://github.com/theme-next/hexo-symbols-count-time
symbols_count_time:
  separated_meta: true
  item_text_post: true
  item_text_total: false
  awl: 25
  wpm: 200

# CNZZ count
cnzz_siteid: 1273359837

# Local search
# Dependencies: https://github.com/theme-next/hexo-generator-searchdb
local_search:
  enable: true
  # if auto, trigger search by changing input
  # if manual, trigger search by pressing enter key or search button
  trigger: auto
  # show top n results per article, show all results by setting to -1
  top_n_per_article: 1
  # unescape html strings to the readable one
  unescape: false
```

