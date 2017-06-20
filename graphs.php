<?php
class TrafficAction
{  
    // 创建图像
	//-4h  四小时流量图
	//-1d  一天内流量图
	//-1w  一周内流量图
	//-1m  一个月内流量图
	//-1y  一年内流量图
	
    public function create_traffic_graph ($output, $start,$endtime,$title,$filename)
    {
		
        $options = array(
                "--slope-mode",
                "--start=$start",
                "--end=$endtime",
                "--title=$title",
                "--vertical-label=Nagios-网络流量 - Kb/秒",
                "--rigid",
                "--base=1000",
                "--height=120",
                "--width=480",
                "--alt-autoscale-max",
                "--lower=0",
                "--font=TITLE:10:/usr/share/fonts/chinese/TrueType/msyh.ttf",
                "--font=AXIS:8:",
                "--font=LEGEND:8:",
                "--font=UNIT:8:",
                "DEF:a=" . $filename . ":ds0:AVERAGE",
                "DEF:b=" . $filename . ":ds0:MAX",
             
                "DEF:c=" . $filename . ":ds1:AVERAGE",
                "DEF:d=" . $filename . ":ds1:MAX",
				
                "CDEF:cdefa=a,8,*",
                "CDEF:cdefe=b,8,*",
                "CDEF:cdeff=c,8,*",
                "CDEF:cdefg=c,8,*",
                "CDEF:cdefba=c,8,*",
                "CDEF:cdefbb=d,8,*",
       
                "AREA:cdefa#00FF00:In",
              
                "GPRINT:cdefa:AVERAGE:平均值\:%8.2lf %s",
                "GPRINT:cdefe:MAX:最大值\:%8.2lf %s ",
               
               
                "LINE2:cdeff#FF0000:Out",
                "GPRINT:cdefg:AVERAGE:平均值\:%8.2lf %s",
                "GPRINT:cdefbb:MAX:最大值\:%8.2lf %s",
                
        );
       
        $ret = rrd_graph($output, $options, count($options));
        if (! $ret)
        {
            echo "<b>Graph error: </b>" . rrd_error() . "\n";
        }
    } 
}
?>


