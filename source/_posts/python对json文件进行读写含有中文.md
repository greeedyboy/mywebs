---
title: python对json文件和txt文件进行读写含有中文
urlname: python-json-index
tags:
  - python
  - json
  - txt
categories:
  - python
date: 2018-12-16 16:03:27
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 解决问题：python对含有中文的时候，进行读写是产生乱码，或其他问题。

<!-- more -->

python对json进行读写，主要使用dump,dumps,load,loads。


### 对json文件进行写dump和文件度load

```
    #写
    msx={'a':'hello你好吗'}
    with open('test.json','w',encoding='utf-8') as b_oj:
        json.dump(msx,b_oj,ensure_ascii=False)
    #读
    with open('test.json','r',encoding='utf-8') as b_oj:
        bx=json.load(b_oj)
    print(str(bx))
```

- 关键是读取文件的时候加上`encoding='utf-8'`

### 字符串转换为字典loads,或把特定的对象序列化处理为字符串dumps

### 对txt文件进行写
```
    file = r'workflowy_email.txt'
    with open(file, 'a+') as f:
       f.write(e_mail + "   "+ act_url + '\n')  # 加\n换行显示
```
### 代码片段，将`a=b,c=d,e=f`转换成词典`{'a':'b','c':'d','e':'f'}`的形式
```
def eqstr2json(equstr):
    '''
    解析"a=b,c=d形式的字符串到词典，用于参数引入和设置
    :param equstr: a=b,c=d
    :return: {'a': 'b','c':'d'} 
    '''
    '''"'''
    orders=equstr.split(',')
    orderjsons=''
    for order in orders:
        print(order)
        print(order.count('=')==1)
        if order and '=' in order and not str(order).startswith("=") and order.count('=')==1 :
            orderjsons=orderjsons+'"'+ order.replace('=','":"')+'",'

    orderjsons='{'+orderjsons[:-1]+'}'

    # print(orderjsons)
    orderjson=json.loads(orderjsons)
    # print(orderjson)


    return orderjsons
```