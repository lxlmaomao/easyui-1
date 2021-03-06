<?php if (!defined('THINK_PATH')) exit();?>﻿<script type="text/javascript">
	$(function() {
		$('#jiqi_jiqigl_datagrid').datagrid({
			url : '__APP__/Jiqi/view',
			fit : true,
			//fitColumns : true,//有了这个属性就不能用冻结列
			border : false,
			pagination : true,
			idField : 'id',
			pageSize :10,
			pageList : [10,15,20,30,40,50],
			sortName : 'num',
			sortOrder : 'asc',
			checkOnSelect : false,
			selectOnCheck : false,
			nowrap : true,
			singleSelect:true,
			frozenColumns : [ [ {
				field : 'id',
				title : '编号',
				width : 150,
				checkbox : true
			}, {
				field : 'num',
				title : '编号',
				width :150,
				sortable : true,
				formatter : function(value, row, index) {
					return '<span title="'+value+'">'+value+'</span>';
				}
			}, {
				field : 'fixtime',
				title : '维修时间',
				width : 80,
				sortable : true,
				formatter : function(value, row, index) {
					return '<span title="'+value+'">'+value+'</span>';
				}
			} ] ],
			columns : [ [ {
				field : 'jiqitype_id',
				title : '机器型号编号',
				width : 100,
				hidden : false,
				formatter : function(value, row, index) {
					return '<span title="'+value+'">'+value+'</span>';
				}
			},{
				field : 'damage_id',
				title : '损坏原因编号',
				width : 100,
				sortable : true
			}, {
				field : 'project_id',
				title : '项目编号',
				width : 100,
				sortable : true,
				//hidden : true
			},{
				field : 'testman',
				title : '测试员',
				sortable : true,
				width : 150
			},  {
				field : 'fixman',
				title : '维修人',
				sortable : true,
				width : 150,
				formatter : function(value, row, index) {
					return '<span title="'+value+'">'+value+'</span>';
				}
			},  {
				field : 'returntime',
				title : '归还时间',
				sortable : true,
				hidden : false,
				width : 150
			},{
				field : 'state',
				title : '状态',
				sortable : true,
				width : 150,
			},{
				field : 'beizhu',
				title : '备注',
				//sortable : true,
				hidden : false,
				width : 100,
				formatter: function(value,row,index){
							//console.info(value);
							return '<span title="'+value+'">'+value+'</span>';
						}	
			} ] ],
			toolbar : [ {
				text : '增加',
				iconCls : 'icon-add',
				handler : function() {
					admin_yhgl_appendFun();
				}
			}, '-', {
				text : '批量删除',
				iconCls : 'icon-remove',
				handler : function() {
					admin_yhgl_removeFun();
				}
			}, '-', {
				text : '编辑',
				iconCls : 'icon-edit',
				handler : function() {
					admin_yhgl_editFun();
				}
			}, '-', {
				text : '修改密码',
				iconCls : 'icon-edit',
				handler : function() {
					admin_yhgl_modifyPwdFun();
				}
			}, '-']
		});

	});

	function admin_yhgl_searchFun() {
		$('#admin_yhgl_datagrid').datagrid('load', serializeObject($('#admin_yhgl_searchForm')));
	}
	function admin_yhgl_cleanFun() {
		$('#admin_yhgl_searchForm input').val('');
		$('#admin_yhgl_datagrid').datagrid('load', {});
	}
	function admin_yhgl_editFun() {
		var rows= $('#admin_yhgl_datagrid').datagrid('getChecked');
		//console.info(rows);
		if (rows.length > 1) {
			$.messager.show({
				title: '提示',
				msg: '不能同时编辑多条记录，请选择一条！'
			});
		}else if (rows.length == 0) {
				$.messager.show({
					title: '提示',
					msg: '请勾选要编辑的记录！'
				});
		}else {
			//$('#admin_yhgl_datagrid').datagrid('uncheckAll').datagrid('unselectAll').datagrid('clearSelections');
		$('<div/>').dialog({
			href : '__TMPL__/User/edit.html',
			width : 520,
			height :300,
			modal : true,
			title : '编辑用户',
			buttons : [ {
				text : '保存修改',
				iconCls : 'icon-edit',
				handler : function() {
					var d = $(this).closest('.window-body');
					$('#admin_yhglEdit_editForm').form('submit', {
						url : '__APP__/User/edit',
						success : function(result) {
							try {
								var r = $.parseJSON(result);
								if (r.status==1) {
									$('#admin_yhgl_datagrid').datagrid('load');
									d.dialog('destroy');
									$.messager.show({
									title : '提示',
									msg :r.info,
									});
								}else{
									$.messager.show({
									title : '提示',
									msg :r.info,
									});
								}
							} catch (e) {
								$.messager.alert('提示', result);
							}
						}
					});
				}
			} ],
			onClose : function() {
				$(this).dialog('destroy');
			},
			onLoad : function() {
				var rows= $('#admin_yhgl_datagrid').datagrid('getChecked');
				var index = $('#admin_yhgl_datagrid').datagrid('getRowIndex',rows[0].id);
				//console.info(rows);
				//var rows = $('#admin_yhgl_datagrid').datagrid('getRows');
				var o =rows[0];
				o.roles= stringToList((o.roles)[0].id)[0];
				//console.info(o.roles);
				$('#admin_yhglEdit_editForm').form('load',o);
			}
		});
	}
	}
	function admin_yhgl_appendFun() {
		$('#admin_yhgl_datagrid').datagrid('uncheckAll').datagrid('unselectAll').datagrid('clearSelections');
		$('<div/>').dialog({
			href : '__TMPL__/User/add.html',
			width : 520,
			height : 300,
			modal : true,
			title : '添加用户',
			buttons : [ {
				text : '增加',
				iconCls : 'icon-add',
				handler : function() {
					var d = $(this).closest('.window-body');
					$('#admin_yhglAdd_addForm').form('submit', {
						url : '__APP__/User/add',
						success : function(result) {
							try {
								var r = $.parseJSON(result);
								if (r.status==1) {
									$('#admin_yhgl_datagrid').datagrid('load');
									d.dialog('destroy');
									$.messager.show({
									title : '提示',
									msg :r.info,
									});
								}else if (r.status==0) {
									$.messager.show({
									title : '提示',
									msg :r.info,
									});
								}else if (r.status==3) {
									$.messager.show({
									title : '提示',
									msg :r.info,
									});
								}
							} catch (e) {
								$.messager.alert('提示', result);
							}
						}
					});
				}
			} ],
			onClose : function() {
				$(this).dialog('destroy');
			}
		});
	}
	function admin_yhgl_removeFun() {
		var rows = $('#admin_yhgl_datagrid').datagrid('getChecked');
		var ids = [];
		if (rows.length > 0) {
			$.messager.confirm('确认', '您是否要删除当前选中的项目？', function(r) {
				if (r) {
					var currentUserId = '${sessionInfo.userId}';/*当前登录用户的ID*/
					var flag = false;
					for ( var i = 0; i < rows.length; i++) {
						if (currentUserId != rows[i].id) {
							ids.push(rows[i].id);
						} else {
							flag = true;
						}
					}
					$.ajax({
						url : '__APP__/User/delete',
						data : {
							ids : ids.join(',')
						},
						dataType : 'json',
						success : function(result) {
							if (result.status) {
								$('#admin_yhgl_datagrid').datagrid('load');
								$('#admin_yhgl_datagrid').datagrid('uncheckAll').datagrid('unselectAll').datagrid('clearSelections');
								$.messager.show({
									title : '提示',
									msg : result.info
								});
							}
							if (flag) {
								$.messager.show({
									title : '提示',
									msg : '不可以删除自己！'
								});
							}
						}
					});
				}
			});
		} else {
			$.messager.show({
				title : '提示',
				msg : '请勾选要删除的记录！'
			});
		}
	}
	function admin_yhgl_deleteFun(id) {
		$('#admin_yhgl_datagrid').datagrid('uncheckAll').datagrid('unselectAll').datagrid('clearSelections');
		$('#admin_yhgl_datagrid').datagrid('checkRow', $('#admin_yhgl_datagrid').datagrid('getRowIndex', id));
		admin_yhgl_removeFun();
	}
	function admin_yhgl_modifyPwdFun(){
		var rows = $('#admin_yhgl_datagrid').datagrid('getChecked');
		//console.info(rows);
		if (rows.length > 1) {
			$.messager.show({
				title: '提示',
				msg: '不能同时编辑多条记录，请选择一条！'
			});
		}
		else 
			if (rows.length == 0) {
				$.messager.show({
					title: '提示',
					msg: '请勾选要编辑的记录！'
				});
			}
			else {
				$('<div/>').dialog({
					href: '__TMPL__/User/editPwd.html',
					width: 300,
					height: 200,
					modal: true,
					title: '更新用户密码',
					buttons: [{
						text: '保存',
						iconCls: 'icon-save',
						handler: function(){
							var d = $(this).closest('.window-body');
							$('#admin_yhglEditPwd_editForm').form('submit', {
								url: '__APP__/User/editPwd',
								success: function(result){
									try {
										var r = $.parseJSON(result);
										if (r.status == 1) {
											$('#admin_yhgl_datagrid').datagrid('load');
											d.dialog('destroy');
											$.messager.show({
												title: '提示',
												msg: r.info,
											});
										}
										else 
											if (r.status == 0) {
												$.messager.show({
													title: '提示',
													msg: r.info,
												});
											}
											else 
												if (r.status == 3) {
													$.messager.show({
														title: '提示',
														msg: r.data,
													});
												}
									} 
									catch (e) {
										$.messager.alert('提示', result);
									}
								}
							});
						}
					}],
					onClose: function(){
						$(this).dialog('destroy');
					},
					onLoad: function(){
						var rows = $('#admin_yhgl_datagrid').datagrid('getChecked');
						var index = $('#admin_yhgl_datagrid').datagrid('getRowIndex', rows[0].id);
						//console.info(index);
						var rows = $('#admin_yhgl_datagrid').datagrid('getRows');
						var o = rows[index];
						//o.roleIds = stringToList(rows[index].roleIds);
						$('#admin_yhglEditPwd_editForm').form('load', o);
					}
				});
			}
	}
	function admin_yhgl_modifyRoleFun() {
		var rows = $('#admin_yhgl_datagrid').datagrid('getChecked');
		var ids = [];
		if (rows.length > 0) {
			for ( var i = 0; i < rows.length; i++) {
				ids.push(rows[i].id);
			}
			$('<div/>').dialog({
				href : '__TMPL__/User/editRole.html',
				width : 300,
				height : 200,
				modal : true,
				title : '批量编辑用户角色',
				buttons : [ {
					text : '编辑',
					iconCls : 'icon-edit',
					handler : function() {
						var d = $(this).closest('.window-body');
						$('#admin_yhglEditRole_editForm').form('submit', {
							url : '${pageContext.request.contextPath}/userController/modifyRole.action',
							success : function(result) {
								try {
									var r = $.parseJSON(result);
									if (r.success) {
										$('#admin_yhgl_datagrid').datagrid('load');
										$('#admin_yhgl_datagrid').datagrid('uncheckAll').datagrid('unselectAll').datagrid('clearSelections');
										d.dialog('destroy');
									}
									$.messager.show({
										title : '提示',
										msg : r.msg
									});
								} catch (e) {
									$.messager.alert('提示', result);
								}
							}
						});
					}
				} ],
				onClose : function() {
					$(this).dialog('destroy');
				},
				onLoad : function() {
					$('#admin_yhglEditRole_editForm').form('load', {
						ids : ids
					});
				}
			});
		} else {
			$.messager.show({
				title : '提示',
				msg : '请勾选要编辑的记录！'
			});
		}
	}
</script>
<div class="easyui-layout" data-options="fit : true,border : false">
	<div data-options="region:'north',title:'查询条件',border:false,collapsed:true," style="height: 165px;overflow: hidden;" align="center">
		<form id="jiqi_jiqigl_searchForm">
			<table class="tableForm">
				<tr>
					<th style="width: 170px;">检索帐户名称(可模糊查询)</th>
					<td><input name="name" style="width: 315px;" /></td>
				</tr>
				<tr>
					<th>创建时间</th>
					<td><input name="createdatetimeStart" class="easyui-datebox"  data-options="current:new Date()" editable="false"/>至<input name="createdatetimeEnd" class="easyui-datebox" editable="false"/></td>
				</tr>
				<tr>
					<th>最后修改时间</th>
					<td><input name="modifydatetimeStart" class="easyui-datebox" editable="false"/>至<input name="modifydatetimeEnd" class="easyui-datebox" editable="false"/></td>
				</tr>
			</table>
			<a href="javascript:void(0);" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:true" onclick="admin_yhgl_searchFun();">过滤条件</a> <a href="javascript:void(0);" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',plain:true" onclick="admin_yhgl_cleanFun();">清空条件</a>
		</form>
	</div>
	<div data-options="region:'center',border:false">
		<table id="jiqi_jiqigl_datagrid"></table>
	</div>
</div>