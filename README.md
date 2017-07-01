# MrtgTrffDashboard

 本软件依赖Mrtg和NagisoQL，读取RRD数据文件出图
 使用NagisoQL 主要是为了输入框数据联动
 关于Mrtg部署请参考我的博客
 记一次Nagios大规模的过程(600网络节点)，Nagios + Mrtg + NDO +展示 +NagiosQL
http://www.qnjslm.com/ITHelp/144.html 

效果
![](http://www.qnjslm.com/wp-content/uploads/2017/06/061917_0831_Nagios12.png)


下面是使用的方法了
编辑Ajax.php  31行左右位置，
$jpgfile 为临时产生的图片文件存储位置，注意写权限
$filename 为mrtg生成的RRD文件位置,参考博客的设定，根据自己的需求进行修改
$code  为主机名
$result->address   主机的IP地址
```php
$jpgfile="./graphs/".$code."_".$result->address."_".$x.$starttime.".png";
$filename="/usr/local/mrtg-2/rrd/".$code."/".$result->address."_".$x.".rrd";
```

include/conn.php 该文件是连接NagiosQL数据库的，填写数据库相关信息

```php
$db = new ezSQL_mysql('root', '123.com', 'db_nagiosql_v32', 'localhost');
```

对于临时存放图片的文件建议建立一个任务计划定时清理

```bash
[nagios@Nagios ~]$ crontab -l
0 0 * * *  /bin/find /var/www/mrtg/graphs -mtime +1 -type f  -exec /bin/rm -rf {} \;

```