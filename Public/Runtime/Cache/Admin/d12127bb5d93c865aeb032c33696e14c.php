<?php if (!defined('THINK_PATH')) exit();?>
<table id="system_menulist_treegrid" class="easyui-treegrid" data-options='<?php $dataOptions = array_merge(array ( 'border' => false, 'fit' => true, 'fitColumns' => true, 'rownumbers' => true, 'singleSelect' => true, 'animate' => true, ), $treegrid["options"]);if(isset($dataOptions['toolbar']) && substr($dataOptions['toolbar'],0,1) != '#'): unset($dataOptions['toolbar']); endif; echo trim(json_encode($dataOptions), '{}[]').((isset($treegrid["options"]['toolbar']) && substr($treegrid["options"]['toolbar'],0,1) != '#')?',"toolbar":'.$treegrid["options"]['toolbar']:null); ?>' style=""><thead><tr><?php if(is_array($treegrid["fields"])):foreach ($treegrid["fields"] as $key=>$arr):if(isset($arr['formatter'])):unset($arr['formatter']);endif;echo "<th data-options='".trim(json_encode($arr), '{}[]').(isset($treegrid["fields"][$key]['formatter'])?",\"formatter\":".$treegrid["fields"][$key]['formatter']:null)."'>".$key."</th>";endforeach;endif; ?></tr></thead></table>

<script type="text/javascript">
var systemMenuModule = {
	dialog:    '#globel-dialog-div',
	treegrid: '#system_menulist_treegrid',
	
	//工具栏
	toolbar: [
		{ text: '添加菜单', iconCls: 'icons-table-table_add', handler: function(){systemMenuModule.add();} },
		{ text: '刷新', iconCls: 'icons-table-table_refresh', handler: function(){systemMenuModule.refresh();} },
		{ text: '排序', iconCls: 'icons-table-table_sort', handler: function(){systemMenuModule.order();} },
		{ text: '导出', iconCls: 'icons-table-table_go', handler: function(){systemMenuModule.export();} },
		{ text: '导入', iconCls: 'icons-table-table_edit', handler: function(){systemMenuModule.import();} }
	],
	
	//排序格式化
	sort: function(val, arr){
		return '<input class="sort-input" type="text" name="order['+arr['id']+']" value="'+ val +'" size="2" style="text-align:center">';
	},
	
	//操作格式化
	operate: function(id){
		var btn = [];
		btn.push('<a href="javascript:;" onclick="systemMenuModule.add('+id+')">添加子菜单</a>');
		btn.push('<a href="javascript:;" onclick="systemMenuModule.edit('+id+')">修改</a>');
		btn.push('<a href="javascript:;" onclick="systemMenuModule.delete('+id+')">删除</a>');
		return btn.join(' | ');
	},
	
	//刷新
	refresh: function(){
		$(this.treegrid).treegrid('reload');
	},
	
	//添加
	add: function(parentid){
		if(typeof(parentid) !== 'number') parentid = 0;
		var href = '<?php echo U('System/menuAdd');?>';
		href += href.indexOf('?') != -1 ? '&parentid='+parentid : '?parentid='+parentid;
		
		var that = this;
		$(that.dialog).dialog({
			title: '添加菜单',
			iconCls: 'icons-application-application_add',
			width: 390,
			height: 290,
			cache: false,
			href: href,
			modal: true,
			collapsible: false,
			minimizable: false,
			resizable: false,
			maximizable: false,
			buttons:[{
				text:'确定',
				iconCls:'icons-other-tick',
				handler: function(){
					$(that.dialog).find('form').eq(0).form('submit', {
						onSubmit: function(){
							var isValid = $(this).form('validate');
							if (!isValid) return false;
							
							$.messager.progress({text:'处理中，请稍候...'});
							$.post('<?php echo U('System/menuAdd?dosubmit=1');?>', $(this).serialize(), function(res){
								$.messager.progress('close');
								if(!res.status){
									$.app.method.tip('提示信息', res.info, 'error');
								}else{
									$.app.method.tip('提示信息', res.info, 'info');
									$(that.dialog).dialog('close');
									that.refresh();
								}
							}, 'json');
							
							return false;
						}
					});
				}
			},{
				text:'取消',
				iconCls:'icons-arrow-cross',
				handler: function(){
					$(that.dialog).dialog('close');
				}
			}]
		});
	},
	
	//编辑
	edit: function(id){
		if(typeof(id) !== 'number'){
			$.app.method.tip('提示信息', '未选择菜单', 'error');
			return false;
		}
		var href = '<?php echo U('System/menuEdit');?>';
		href += href.indexOf('?') != -1 ? '&id='+id : '?id='+id;
		
		var that = this;
		$(that.dialog).dialog({
			title: '编辑菜单',
			iconCls: 'icons-application-application_edit',
			width: 390,
			height: 290,
			cache: false,
			href: href,
			modal: true,
			collapsible: false,
			minimizable: false,
			resizable: false,
			maximizable: false,
			buttons:[{
				text:'确定',
				iconCls:'icons-other-tick',
				handler: function(){
					$(that.dialog).find('form').eq(0).form('submit', {
						onSubmit: function(){
							var isValid = $(this).form('validate');
							if (!isValid) return false;
							
							$.messager.progress({text:'处理中，请稍候...'});
							var action = '<?php echo U('System/menuEdit?dosubmit=1');?>';
							action += action.indexOf('?') != -1 ? '&id='+id : '?id='+id;
							$.post(action, $(this).serialize(), function(res){
								$.messager.progress('close');
								if(!res.status){
									$.app.method.tip('提示信息', res.info, 'error');
								}else{
									$.app.method.tip('提示信息', res.info, 'info');
									$(that.dialog).dialog('close');
									that.refresh();
								}
							}, 'json');
							
							return false;
						}
					});
				}
			},{
				text:'取消',
				iconCls:'icons-arrow-cross',
				handler: function(){
					$(that.dialog).dialog('close');
				}
			}]
		});
	},
	
	//删除
	delete: function(id){
		if(typeof(id) !== 'number'){
			$.app.method.tip('提示信息', '未选择菜单', 'error');
			return false;
		}
		var that = this;
		$.messager.confirm('提示信息', '确定要删除吗？', function(result){
			if(!result) return false;
			
			$.messager.progress({text:'处理中，请稍候...'});
			$.post('<?php echo U('System/menuDelete');?>', {id: id}, function(res){
				$.messager.progress('close');
				
				if(!res.status){
					$.app.method.tip('提示信息', res.info, 'error');
				}else{
					$.app.method.tip('提示信息', res.info, 'info');
					that.refresh();
				}
			}, 'json');
		});
	},
	
	//排序
	order: function(){
		var that = this;
		$.messager.progress({text:'处理中，请稍候...'});
		$.post('<?php echo U('System/menuOrder');?>', $(that.treegrid).parent('div').find('input[type="text"].sort-input').serialize(), function(res){
			$.messager.progress('close');
			
			if(!res.status){
				$.app.method.tip('提示信息', res.info, 'error');
			}else{
				$.app.method.tip('提示信息', res.info, 'info');
				that.refresh();
			}
		}, 'json');
	},
	
	//导出
	export: function(){
		$.messager.progress({text:'处理中，请稍候...'});
		$.post('<?php echo U('System/menuExport');?>', function(res){
			$.messager.progress('close');
			
			if(!res.status){
				$.app.method.tip('提示信息', res.info, 'error');
			}else{
				$.app.method.tip('提示信息', res.info, 'info');
				window.location.href = res.url;
			}
		}, 'json');
	},
	
	//导入
	import: function(){
		var that = this;
		$.messager.confirm('提示信息', '该操作将清空所有数据，确定要继续吗？', function(result){
			if(!result) return false;

			$.app.method.upload(
				'<?php echo U('Upload/import', array('from'=>urlencode('菜单管理')));?>',
				function(json){    //上传成功回调函数

					$.messager.progress({text:'处理中，请稍候...'});
					$.post('<?php echo U('System/menuImport');?>', {filename: json.filename}, function(res){
						$.messager.progress('close');

						if(!res.status){
							$.app.method.tip('提示信息', res.info, 'error');
						}else{
							$.app.method.tip('提示信息', res.info, 'info');
							that.refresh();
						}
					}, 'json');
				},
				function(filename){  //上传验证函数
					if(!filename.match(/\.data$/)){
						$.app.method.tip('提示信息', '上传文件后缀不允许', 'error');
						return false;
					}
					return true;
				}
			);
		});
	}
};
</script>