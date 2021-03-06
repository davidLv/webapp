<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="author" content="David">
<title><?php echo C('SYSTEM_NAME');?></title>
<link rel='shortcut icon' href='/app/Public/static/favicon.ico' />
<script type="text/javascript">var STATIC_URL = '/app/Public/static',UPLOAD_ROOT = '/app/Public/upload/';</script>
<script type="text/javascript" src="/app/Public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/app/Public/static/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/app/Public/static/js/jquery.json.min.js"></script>
<script type="text/javascript" src="/app/Public/static/js/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/app/Public/static/js/easyui/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="/app/Public/static/js/easyui/plugins/jquery.portal.js"></script>
<link rel="stylesheet" href="/app/Public/static/js/croppic/croppic.css"/>
<script type="text/javascript" src="/app/Public/static/js/croppic/croppic.min.js"></script>
<script type="text/javascript" src="/app/Public/static/js/jquery.app.js"></script>
<link rel="stylesheet" type="text/css" href="/app/Public/static/css/icons.css" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/js/easyui/themes/default/easyui.css" title="default" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/js/easyui/themes/gray/easyui.css" title="gray" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/js/easyui/themes/bootstrap/easyui.css" title="bootstrap" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/js/easyui/themes/metro/easyui.css" title="metro" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/css/admin/default.css" title="default" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/css/admin/gray.css" title="gray" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/css/admin/bootstrap.css" title="bootstrap" />
<link rel="stylesheet" type="text/css" href="/app/Public/static/css/admin/metro.css" title="metro" />
<script type="text/javascript">
var theme = $.cookie('theme') || 'default'; //全局变量
$(document).ready(function(){
	$('link[rel*=style][title]').each(function(i){
		this.disabled = true;
		if (this.getAttribute('title') == theme) this.disabled = false;
	});
});
</script>
<style type="text/css">
form{width:280px;height:120px;margin:30px auto 0;}
form div label{float:left;display:block;width:65px;font-size:16px;padding-top:6px;}
form div.input{margin:8px auto;}
form div.input input{height:21px;padding:2px 3px;width:200px}
form div.input img{cursor:pointer}
.loginTitle{
font-size: 28px;
text-align: center;
color: #BAB2B2;
letter-spacing: 10px;
font-weight: bold;
/*text-shadow: 0px 0px 4px rgb(255, 255, 255), 0px 0px 20px #999, 0px 0px 40px rgb(255, 255, 255);*/
text-shadow: 2px 2px 2px #0D0D0D, 0px 0px 5px #aaa;
}
#verificationCode{width:68px}
</style>
</head>
<body>
<div id="loginForm" class="easyui-dialog" title="用户登录" style="width:380px;height:280px;" data-options="closable:false,iconCls:'icons-lock-lock',buttons:[{text:'登录',iconCls:'icons-user-user_go',handler:login}]">
	<div class="loginTitle" style="text-align: center; height: 55px; line-height: 55px;  ">业务管理系统</div>
	<form id='form' method="post" style="margin-top: 20px;">
		<div class="input">
			<label for="username">用户名:</label>  
			<input class="easyui-validatebox" type="text" name="username" value="" data-options="required:true,validType:{length:[2,20]},tipPosition:'bottom'"  />
		</div>
		<div class="input">
			<label for="password">密&nbsp;&nbsp;码:</label>  
			<input class="easyui-validatebox" type="password" name="password" value="" data-options="required:true,validType:{length:[6,20]},tipPosition:'bottom'" />
		</div>
		<div class="input">
			<label for="verificationCode">验证码:</label>
			<input class="easyui-validatebox" type="text" name="verificationCode" id="verificationCode" size="4" data-options="required:true,validType:{length:[4,4]},tipPosition:'bottom'" />
			<span style="margin-left:10px"><img id="code_img" align="top" onclick="changeCode()" src="<?php echo U('Index/code?code_len=4&font_size=14&width=100&height=28&code='.time());?>" title="点击切换验证码"></span>
		</div>
		<!--<?php if(isset($geetest)): ?><br  />
			<?php echo $geetest->get_widget("float"); ?>
		<?php else: ?>
			<div class="input">
				<label for="code">验证码:</label>  
				<input class="easyui-validatebox" type="text" name="code" id="code" size="4" data-options="required:true,validType:{length:[4,4]},tipPosition:'bottom'" />
				<span style="margin-left:10px"><img id="code_img" align="top" onclick="changeCode()" src="<?php echo U('Index/code?code_len=4&font_size=14&width=100&height=28&code='.time());?>" title="点击切换验证码"></span> 
			</div><?php endif; ?>-->
	</form> 
</div>

<script type="text/javascript">
$(function(){
	$('input:text:first').focus();
	$('#verificationCode').val('');
	$('form').keyup(function(event){
		if(event.keyCode ==13) login();
	});
});
$(document).ready(function() {
	$("#loginForm").show();
});
function changeCode(){
	var that = document.getElementById('code_img');
	that.src = that.src + '&' + Math.random();
}
function login(){
	var isValid = $('form').form('validate');
	if (!isValid) return false;
	
	$.messager.progress({text:'登录中，请稍候...'});
	$.post('<?php echo U('Index/login?dosubmit=1');?>', $("form").serialize(), function(data){
		debugger;
		$.messager.progress('close');
		if(!data.status){
			$.app.method.tip('提示信息', data.info, 'error');
			<?php if(!isset($geetest)): ?>changeCode();<?php endif; ?>
		}else{
			window.location.href = data.url;
		}
	},'json');
	return false;
}
</script>
</body>
</html>