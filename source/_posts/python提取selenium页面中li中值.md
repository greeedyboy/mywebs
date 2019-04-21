---
title: python提取selenium页面中li中值
urlname: python-li-index
tags:
  - python
  - selenium
  - list
categories:
  - daybreak
date: 2019-04-17 01:52:44
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 获取临时邮箱的邮件后缀。

<!-- more -->
### 搞事情代码

```
from selenium import webdriver
import random
url="https://bccto.me/"
driver= webdriver.Chrome()


driver.get(url)

#获取<ul>内的html
elem = driver.find_element_by_id('domainlist')
# print(elem.get_attribute('innerHTML'))
# print(elem.get_attribute('textContent'))
txts=str(elem.get_attribute('textContent'))
# 将数据转变成list，并删除list中的空值
com_list = [i for i in txts.split('\n') if i !='']
# 生成序列[1,2,3]
n_list=range(1,len(com_list)+1)

# 将两个序列list合成字典dict
n_com=dict(zip(n_list,com_list))


#如果规定了后缀，则查找对应的n，用于path
#python 返回字典中值value所对应的键值key
try:
    key_n=list(n_com.keys())[list(n_com.values()).index(com_str)]
except:
    # 如果没有规定后缀则随机生成
    # 随机一个字典中的key，第二个参数为限制个数
    key_n_r=int(random.sample(n_com.keys(), 1)[0])
    key_n=key_n_r

#python查找某个字符串出现的次数
# num=str(elem.get_attribute('innerHTML')).count('<li>')

print(key_n)

```