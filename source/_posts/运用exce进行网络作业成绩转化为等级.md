---
title: 运用exce进行网络作业成绩转化为等级
urlname: excel-index
tags:
  - excel
categories:
  - 软件列表
date: 2018-07-09 09:28:55
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 需要使用网络课程中作业成绩转化为等级制进行应用。编写excel中vbs脚本实现自动实现。只要设置某个路径就可以实现。

<!-- more -->

### 导出文件
- 网络课程课程主页
- 统计-班级作业
- 导出文件打开，删除前行，然后按照学号排序，重新插入两个空行
- 命名文件名为`"作业成绩.xls"`
- 放置到与转换文件同目录下

### 创建模块函数
- 创建`导出作业转成等级ABC.xls`
- 打开文件
- `开发工具`-`visual basic`-`插入`-`模块`-`双击模块1`-`输入函数`
```
'函数实现将行号转换为A,B,AA等的形式
Function ConvertToLetter(iCol As Integer) As String
   Dim iAlpha As Integer
   Dim iRemainder As Integer
   iAlpha = Int(iCol / 27)
   iRemainder = iCol - (iAlpha * 26)
   If iAlpha > 0 Then
      ConvertToLetter = Chr(iAlpha + 64)
   End If
   If iRemainder > 0 Then
      ConvertToLetter = ConvertToLetter & Chr(iRemainder + 64)
   End If
End Function
```

### 创建SET
- 创建sheet命名`SET`
- 输入等级设置规则

| A | B | C | D |
| - | - | - | - |
| 60 | D | 60 | 及 |
| 85 | C | 80 | 中 |
| 96 | B | 90 | 良 |
| 100 | A | 60 | 优 |

- *表格解释
- 规则`A`表示：
    - 等级划分为`DCBA`
    - 当分数小与60的时候为D,小与85的时候为C,小与96的时候为B,否则大于等于96的时候为A
- 规则`C`表示：
    - 等级划分为`优良中及`
    - 分数小与60的时候为及,小与80的时候为中,小与90的时候为良,否则大于等于90的时候为优

### 脚本等级转换
- 根据G20数字大小实现相应的等级转换，excel功能实现脚本为
```
=IF(SET!A1>G20,SET!B1,IF(SET!A2>G20,SET!B2,IF(SET!A3>G20,SET!B3,SET!B4)))
```

### 脚本使用表格内容为变量
- 想引用SET!A1中的内容，并且其中A为sheet1中C3的内容，可以如下替代
```
SET!A1
INDIRECT("SET!"& C$3 &"1")
```
- 进一步的，计算C3内字母的下一个字母

```
如果为A,则B为
CHAR(CODE(C$3)+1)

SET!B1
INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"1")
```

- 脚本等级转换的程序可以更改为如下
```
=IF(INDIRECT("SET!"& C$3 &"1")>G20,INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"1"),IF(INDIRECT("SET!"& C$3 &"2")>G20,INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"2"),IF(INDIRECT("SET!"& C$3 &"3")>G20,INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"3"),INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"4"))))
```

### 获取导出成绩
- 导出的成绩从第7列（G）开始，第8列为时间。间隔一列为一个成绩
- G,I,J,L,N为成绩列
- 希望可以向右侧自增，向下自增
- 在第C列中引用G列，在D列中引用I列代码
- 在C中显示7，在D中显示9
```
2*COLUMN(C5)+1)
2*COLUMN(D5)+1)
```
- 数字转换为字母
```
ConvertToLetter(2*COLUMN(C5)+1)
ROW(C3)
```

- 跨文件，以表格内容为变量，夸表格引用数据
- 文件地址在本表格B1中
- 成绩内容在相关`作业统计`的表格里面，从G开始间隔存在，放入到C3开始的表格中
```
=INDIRECT("'[" & $B$1 & "]作业统计" &"'!" & ConvertToLetter(2*COLUMN(C3)+1) & ROW(C3) & "")
```

- 跨文件，成绩转等级代码继续更改为
- 更换G20为上面数据可以
- Row(C3)只是为了实现在indirect内数字递增
```
=IF(INDIRECT("SET!"& C$3 &"1")>value(INDIRECT("'[" & $B$1 & "]作业统计" &"'!" & ConvertToLetter(2*COLUMN(C5)+1) & ROW(C3) & "")),INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"1"),IF(INDIRECT("SET!"& C$3 &"2")>value(INDIRECT("'[" & $B$1 & "]作业统计" &"'!" & ConvertToLetter(2*COLUMN(C5)+1) & ROW(C3) & "")),INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"2"),IF(INDIRECT("SET!"& C$3 &"3")>value(INDIRECT("'[" & $B$1 & "]作业统计" &"'!" & ConvertToLetter(2*COLUMN(C5)+1) & ROW(C3) & "")),INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"3"),INDIRECT("SET!"& CHAR(CODE(C$3)+1) &"4"))))
```
- 核心完成，将上面代码填入C3中，下下拉和右拉，成绩自增
- 在C2中填入等级转换设置A,C等，每个成绩都需要
- 学号夸文件引入
```
=INDIRECT("'[" & $B$1 & "]作业统计" &"'!A" & ROW(A3) & "")
```
- 姓名跨文件引入
```
=INDIRECT("'[" & $B$1 & "]作业统计" &"'!B" & ROW(A3) & "")
```
- 班级跨文件引入
```
=INDIRECT("'[" & $B$1 & "]作业统计" &"'!F" & ROW(A3) & "")
```


![](https://wx4.sinaimg.cn/large/3f2c99ebgy1ft3fcmqgruj20f60gwgm2.jpg)

![](https://wx2.sinaimg.cn/large/3f2c99ebgy1ft3fcm2i8lj20p80itq5b.jpg)