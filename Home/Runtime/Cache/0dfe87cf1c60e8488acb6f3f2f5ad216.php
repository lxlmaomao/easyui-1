<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>Easyui1.3.1</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />  
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta http-equiv="keywords" content="">
<meta http-equiv="description" content="easyui示例项目">
<link id="easyuiTheme" rel="stylesheet" type="text/css" href="__PUBLIC__/js/jquery-easyui-1.3.1/themes/<?php echo (($_COOKIE["easyuiThemeName"])?($_COOKIE["easyuiThemeName"]):"sunny"); ?>/easyui.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/jquery-easyui-1.3.1/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/style/syCss.css">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-easyui-1.3.1/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery-easyui-1.3.1/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery-easyui-1.3.1/locale/easyui-lang-zh_CN.js" charset="utf-8"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery-easyui-1.3.1/jquery.cookie.js" charset="utf-8"></script>
	<script type="text/javascript" src="__PUBLIC__/js/syUtil.js" charset="utf-8"></script>
	<script type="text/javascript">
		var APP='__APP__';
		var TMPL='__TMPL__';
		var PUBLIC='__PUBLIC__';
		var ROOT='__ROOT__';
		var TMPL='__TMPL__';
	function loginUser(){
		$('#loginForm').form('submit',{   
		    url:'__APP__/Public/checkLogin', 
		    success:function(data){   
		       var obj=$.parseJSON(data);
			   if(obj.status){
			   		$('#loginDialog').dialog('close');
					window.location=APP+'/Index';
			   }
			   $.messager.show({
			   		title:'提示',
					msg:obj.info,
					showType:'slide',
			   });
		    }   
		});
	}
	</script>
</head>
<body style="background:url('__TMPL__/Public/login.jpg');">
<div id="loginDialog" style="overflow: hidden;" class="easyui-dialog" data-options="animate:true,title:'用户登录',modal:false,closable:false,draggable:true,width:220,
			buttons:[{
				text:'登录',
				iconCls:'icon-edit',
				handler:function(){
				loginUser();
			}
			},{
				text:'注册',
				iconCls:'icon-help',
				handler:function(){
				$('#regForm input').val('');
				$('#regDialog').dialog('open');
				}
			}]">
			<div align="center">
				<form method="post" id="loginForm">
					<table class="tableForm">
						<tr>
							<th>用户</th>
							<td><input type="text" name="account" class="easyui-validatebox" data-options="required:true" value=""/>
							</td>
						</tr>
						<tr>
							<th>密码</th>
							<td><input type="password" name="password" class="easyui-validatebox" data-options="required:true" value=""/></td>
						</tr>
					</table>
				</form>
			</div>
	</div>
	<inclde file="Public:reg"/>
</body>
</html>