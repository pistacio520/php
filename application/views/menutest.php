<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu practice</title>
	<style>
		*{
			padding:0;
			margin:0;
		}
		a{
			color:#333;
			text-decoration:none;
		}
		ul{
			list-style:none;
		}
		    .border-right-none{
    	border-right:none !important;
    }
		#box{
			width:100%;
			height:auto;
			border:1px solid #ccc;
		}
		#box ul{
			/*border:1px solid #ccc;*/
		}
		#box ul.topNav{
			width:100%;
			height:40px;
			margin:0 auto;
		}
		#box ul.topNav li{
			width:120px;
			height:100%;
			float:left;
			text-align:center;
			line-height:35px;
		/*	border-right:1px solid #ccc;*/
		    border-radius:5px;
			cursor:pointer;
			position:relative;

		}
		#box ul.topNav>li a {
			display:block;

			padding:3px 10px;
		}
    #box ul.topNav >li:hover{
    	background:green;
    }
        #box ul.topNav >li:hover>a{
    	color:#fff;
    }
    #box ul.topNav li:hover >ul.twoLevel{
    	display:block;
    }
    #box ul.topNav ul.twoLevel{
    	background-color:#50b628;
    	border-top:none;
    	position:absolute;
        margin-top:1px;
    	display:none;
    }
    #box ul.topNav ul.towLevel li{
    	border-bottom:1px solid #ccc;
    	position:relative;
    }

    #box ul.topNav ul.twoLevel li:hover >a {
    	background-color:green;
    	color:#fff;
    }
    #box ul.topNav ul.twoLevel li:hover>ul.nLevel{
    	display:block;
    }
    #box ul.topNav ul.twoLevel ul.nLevel{
    	position:absolute;
    	top:0;
    	left:100%;
    	/*margin-top:-1px;*/
    	display:none;
    }

	</style>
</head>
<body>
	<div id="box">
		<ul class="topNav">
			<li><a href="#">首页</a></li>
			<li><a href="#">产品</a>
				<ul class="twoLevel">
					<li><a href="#">产品1</a>
                        <ul class="nLevel">
                        	<li><a href="#">产品1-1</a>
								<ul class="nLevel">
									<li><a href="">产品1-1-1</a></li>
									<li><a href="">产品1-1-2</a></li>
									<li><a href="">产品1-1-3</a></li>
									<li><a href="">产品1-1-4</a></li>
									<li><a href="">产品1-1-5</a></li>
									<li><a href="">产品1-1-6</a></li>
									<li><a href="">产品1-1-7</a></li>
									<li><a href="">产品1-1-8</a></li>
								</ul>
                        	</li>
                        	<li><a href="#">产品1-2</a></li>
                        	<li><a href="#">产品1-3</a></li>
                        </ul>
				    </li>
					<li><a href="#">产品2</a></li>
					<li><a href="#">产品3</a></li>
					<li><a href="#">产品4</a></li>
					<li><a href="#">产品5</a></li>
				</ul>
			</li>
			<li><a href="#">案例</a></li>
			<li><a href="#">新闻</a></li>
			<li><a href="#">其他</a></li>
			<li><a href="#">关于</a></li>

		</ul>
	</div>
	<div class="container">
		<div class="row">
			这是一个无级限下拉菜单列表练习。
		</div>
	</div>

	<form method="post" action=" <?php echo site_url('test/do_upload'); ?>" enctype="multipart/form-data">
	<input type="file" name="userfile">
	 <?php echo $error ?>
	<input type="submit" value="upload">
</form>
</body>
</html>