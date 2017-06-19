<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="mrtg 流量展示">
<meta name="description" content="展示mrtg流量图，需要mrtg生成rrd性能图">
<title>Mrtg 流量监控系统</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="css/nagios.css" rel="stylesheet" type="text/css">

<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/moment.js"></script>
<script type="text/javascript" src="js/daterangepicker.js"></script>
<script src="js/nagios.js" type="text/javascript"></script>
<script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>

</head>
<body>
        <div class="page">
            <div class="head js-bg-ele">
                <em class="bg-mask"></em>
                <div class="content">
                    <img src="img/FTMS.png" alt="" class="zslogo">
                     <div class="navList">
                        <a href="#"  class="link cur"><span>Mrtg for Nagios系统</span></a>
                    </div>
                </div>
            </div>
            <div class="body js-bg-ele">
                <div class="bg">
                    <div class="bg">			
                    </div>	
					<div class="content">
					</br>
						<div class="containe">
							<input name="doplayers1" type="button" id="doplayers1" class="btn btn-block btn-lg btn-success" value="DLR 信息:">					
							<input name="drlcode" id="drlcode" type="text" class="form-control" value="输入查询经销店代码" style="padding-top: 4px;">
							<input name="doplayers" type="button" id="doplayers" class="btn btn-block btn-lg btn-success" value="查看流量">
							<input name="drlcodeId" id="drlcodeId" type="hidden">
						    </br>
							<table align="center"  >
							<tr><td></br></td></tr>
							<tr>
							<td colspan="2"> 
								<font color="#FFFFFF">显示时间范围--默认最近4小时</font>
							</td>
							</tr>
							<tr>
								<td>
								<div > <font color="#FFFFFF">预定义:</font></div>
							</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default" value="-1y">一年内</button>
									<button type="button" class="btn btn-default" value="-1m">一月内</button>
									<button type="button" class="btn btn-default" value="-1w">一周内</button>
									<button type="button" class="btn btn-default" value="-1d">一天内</button>
									<button type="button" class="btn btn-default" value="-8h">8小时内</button>
									<button type="button" class="btn btn-default" value="-4h">4小时内</button>
									<button type="button" class="btn btn-default" value="-1h">1小时内</button>
								</div>
							</td></tr><tr><td></br></td></tr><tr><td>
							<div > <font color="#FFFFFF">自定义:</font></div>
							</td>
							<td>
							 <div  class="input-prepend input-group" >
							   <span class="add-on input-group-addon">
							   <i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
							   <input  type="text" style="width: 310px" name="reservation" id="reservationtime" class="form-control" value="<?php echo date("Y-m-d H:i:s", strtotime("-4 hour")); ?> - <?php echo date("Y-m-d H:i:s");?>"  class="span4"/>
								<input name="starttime" id="starttime" type="hidden">
								<input name="endtime" id="endtime" type="hidden">
							</div>
							</td>
							</tr>
						</table>
						</div>
						<div id="errormsg"></div>
						<p align="center"><font color="#FFFFFF">Copyright © 2016-2017 Nagios MRTG流量展示 ® 版权所有</font></p>
					</div>
				
				</div>
			</div>
		</div>
</body>

</HTML>