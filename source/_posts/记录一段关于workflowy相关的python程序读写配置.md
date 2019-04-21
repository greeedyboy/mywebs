---
title: 记录一段关于workflowy相关的python程序读写配置
urlname: python-workflowy-set-index
tags:
  - workflowy
  - python
categories:
  - python
date: 2019-04-16 16:37:23
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 迷上了workflowy,那种欲罢不能休的感觉。用python做点小事，不足挂怀。

<!-- more -->

### 程序用于配置程序读写
- 如果你不知道什么是workflowy，这样高尚的笔记本，你值得拥有
- [https://workflowy.com/](https://workflowy.com/invite/51739f7d.lnx)
```
import json
import os
settingfile='filesetting.json'
#直接读取，不存在文件则创建
def set_r_settings(settingfile=settingfile):
    if not os.path.exists(settingfile):
        settings={'bademail':['3202.com',],
                  'invite':{
                    'https://workflowy.com/invite/51739f7d.lnx':{
                        'user@mail.com':{'password':'','data':'2019-4-16','actok':False}
                    }
                  },
                  'acturl':{'user@mail.com':'http://act.com'
                            }
        }
        set_w_setting(settings=settings,settingfile=settingfile)
    else:
        with open(settingfile, 'r', encoding='utf-8') as b_oj:
            settings = json.load(b_oj)

    return settings
#写入设置
def set_w_setting(settings,settingfile=settingfile):
    with open(settingfile, 'w', encoding='utf-8') as f_obj:
        json.dump(settings, f_obj, ensure_ascii=False, indent=4, separators=(',', ':'))
#读取设置
def set_rx_setting(settingfile=settingfile):
    with open(settingfile,'r',encoding='utf-8') as b_oj:
        setts=json.load(b_oj)
    return setts
#坏值检测
def bad_email_ck(email,settingfile=settingfile):
    #检测有无配置文件，进行写入
    bademail=[]
    setts=set_r_settings(settingfile=settingfile)
    bademail.extend(setts['bademail'])

    if email.split('@')[1] in bademail:
        state = True
    else:
        state = False
    return state
#坏email写入
def bad_email_w(email,settingfile=settingfile):
    # 检测有无配置文件，进行写入
    setts=set_r_settings(settingfile=settingfile)
    email_com = email.split("@")[1]
    setts['bademail'].append(email_com)
    set_w_setting(settings=setts, settingfile=settingfile)
    return True

print(bad_email_ck('jjs@edx.com',settingfile=settingfile))
```

### 感恩的心
- <https://workflowy.com/invite/51739f7d.lnx>
