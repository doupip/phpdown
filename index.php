<html>
	<head> 
		<meta http-equiv="content-type" content="text/html;charset=utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	 	<title>二维码下载---手机APP产品</title>
		<style type="text/css">
			body {font: normal 70% Helvetica, Arial, sans-serif;font-weight:bold}
			.readme {font: normal 70% Helvetica, Arial, sans-serif;color:gray;}
		</style>
	</head>
	<body> 
		<br />
		<div align="center">
		<h3>手机客户端下载<span align="center" class="readme"><br /><br />[这里是一些说明文字]<br />
			[说明示例,后面做弹层]<br /></span>
		</h3><br />
		
		<?php
			$file=dir(".");
			//exec("dir -t .");
			//echo $file->path.$e;
            $exclude = array(
                'index.php','.','..','res','del','.index.php.swp','res.tar.gz','.idea','.git'
            );

			while(false !== ($e= $file->read())){
				if (!in_array($e, $exclude)){
					//files which need shows 
					$arr[]=$e;
				}
			}
			
			rsort($arr);	

			$newest=$arr[0];
			foreach($arr as $filename){
					echo "<td width=50%><a href=$filename target=_blank >$filename</a>&nbsp;&nbsp;";
					//echo  date('Y-m-d H:i:s',filemtime($filename))."</td><br /><br />";	
					echo "</td><br /><br />";	
			}
			$file->close();

			//生成二维码
			include('./res/phpqrcode/phpqrcode.php');
		 	// 二维码数据,只显示排在数组第一个值.
			 $data = 'http://'.$_SERVER['HTTP_HOST'].'/'.$newest;
		 	// 纠错级别：L、M、Q、H
			 $errorCorrectionLevel = 'L';
			 // 点的大小：1到10
			 $matrixPointSize = 4;
			 // 生成的文件名
			 $path = "res/";
			 if (!file_exists($path)){
				mkdir($path);
			 }
			 $filename2 = $path.$errorCorrectionLevel.'.'.$matrixPointSize.'.png';
			 QRcode::png($data, $filename2, $errorCorrectionLevel, $matrixPointSize, 2);
			 echo "<a href='./$newest'><img src='$filename2' /></a>";
			 echo "</div>";
		?>
		<div align="center">扫描/点击二维码直接下载最新版本<br />(<?php echo $newest;?>)</div>
		<br />
		<!-- <div align="center"><a href="market_pb" target="_blank" style="color:red">查看一个公开目录</a><br /></div> -->

	</body>
</html>
