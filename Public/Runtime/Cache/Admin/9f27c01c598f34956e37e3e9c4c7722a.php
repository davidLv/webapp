<?php if (!defined('THINK_PATH')) exit();?>
<table id="content_article_datagrid" class="easyui-datagrid" data-options='<?php $dataOptions = array_merge(array ( 'border' => false, 'fit' => true, 'fitColumns' => true, 'rownumbers' => true, 'singleSelect' => true, 'striped' => true, 'pagination' => true, 'pageList' => array ( 0 => 20, 1 => 30, 2 => 50, 3 => 80, 4 => 100, ), 'pageSize' => '20', ), $datagrid["options"]);if(isset($dataOptions['toolbar']) && substr($dataOptions['toolbar'],0,1) != '#'): unset($dataOptions['toolbar']); endif; echo trim(json_encode($dataOptions), '{}[]').((isset($datagrid["options"]['toolbar']) && substr($datagrid["options"]['toolbar'],0,1) != '#')?',"toolbar":'.$datagrid["options"]['toolbar']:null); ?>' style=""><thead><tr><?php if(is_array($datagrid["fields"])):foreach ($datagrid["fields"] as $key=>$arr):if(isset($arr['formatter'])):unset($arr['formatter']);endif;echo "<th data-options='".trim(json_encode($arr), '{}[]').(isset($datagrid["fields"][$key]['formatter'])?",\"formatter\":".$datagrid["fields"][$key]['formatter']:null)."'>".$key."</th>";endforeach;endif; ?></tr></thead></table>

<div id="content-article-datagrid-toolbar" style="padding:1px;height:auto">
	<form style="border-bottom:1px solid #ddd;margin-bottom:1px;padding:5px">
		添加时间: <input name="search[begin]" class="easyui-datebox" style="width:100px">
		至: <input name="search[end]" class="easyui-datebox" style="width:100px">
		标题:
		<input type="text" name="search[title]" style="width:100px;padding:2px"/>
		作者:
		<input type="text" name="search[author]" style="width:100px;padding:2px"/>
		
		<a href="javascript:;" onclick="contentArticleModule.search(this)" class="easyui-linkbutton" iconCls="icons-table-table">搜索</a>
	</form>
	<div>
		<a href="javascript:;" class="easyui-linkbutton" data-options="plain:true,iconCls:'icons-table-table_add'" onclick="contentArticleModule.add()">添加</a>
		<a href="javascript:;" class="easyui-linkbutton" data-options="plain:true,iconCls:'icons-table-table_delete'" onclick="contentArticleModule.delete()">删除</a>
		<a href="javascript:;" class="easyui-linkbutton" data-options="plain:true,iconCls:'icons-table-table_refresh'" onclick="contentArticleModule.refresh()">刷新</a>
	</div>
</div>

<script type="text/javascript">
var contentArticleModule = {
	dialog:   '#globel-dialog-div',
	datagrid: '#content_article_datagrid',
	data:     {}, //临时变量

	//状态格式化
	status: function(val){
		return parseInt(val) ? '已发布' : '<font color="red">未发布</font>';
	},
	
	//操作格式化
	operate: function(val, arr){
		var btn = [];
		btn.push('<a href="javascript:;" onclick="contentArticleModule.edit('+arr.id+')">编辑</a>');
		btn.push('<a href="javascript:;" onclick="contentArticleModule.delete('+arr.id+')">删除</a>');
		return btn.join(' | ');
	},
	
	//刷新
	refresh: function(){
		$(this.datagrid).datagrid('reload');
	},
	
	//搜索
	search: function(that){
		var queryParams = $(this.datagrid).datagrid('options').queryParams;
		$.each($(that).parent('form').serializeArray(), function() {
			queryParams[this['name']] = this['value'];
		});
		$(this.datagrid).datagrid({pageNumber: 1});
	},

	//缩略图上传
	thumb: function(options){
		width  = options.width  || 240;
		height = options.height || 180;
		subfix = options.subfix || '';

		var option = this.data; //获取对应的位置信息
		var upload = "<?php echo U('Upload/thumb');?>";
		var query  = 'width=' + width + '&height=' + height;
		upload += upload.indexOf('?') != -1 ? '&' + query : '?' + query;

		$.app.method.upload(upload, function(data){
			if(data.msg && (typeof(data.msg) == 'string' || typeof(data.msg.url) == 'string')){
				var url = (typeof(data.msg) == 'string') ? data.msg : data.msg.url;
				url = UPLOAD_ROOT + url;

				//直接赋值
//					$(option.id).datagrid('selectRow', option.index).propertygrid('beginEdit', option.index);
//					var ed = $(option.id).datagrid('getEditor', {index:option.index,field:option.field});
//					$(ed.target).prop('src', UPLOAD_ROOT + url);

				//裁剪图片
				var crop = "<?php echo U('Upload/crop');?>";
				crop += crop.indexOf('?') != -1 ? '&subfix=' + subfix : '?subfix=' + subfix;
				$.app.method.crop(crop, url, width, height, function(src){
					//赋值
					$(option.id).datagrid('selectRow', option.index).propertygrid('beginEdit', option.index);
					var ed = $(option.id).datagrid('getEditor', {index:option.index,field:option.field});
					$(ed.target).prop('src', src);
				});
			}else{
				var tip = data.err ? data.err : '上传失败';
				$.app.method.tip('提示信息', tip, 'error');
			}
		},
		function(filename){  //上传验证函数
			if(!filename.match(/\.jpg$|\.jpeg$|\.png$|\.gif$|\.bmp$/i)){
				$.app.method.tip('提示信息', '上传文件后缀不允许', 'error');
				return false;
			}
			return true;
		});
	},

	//添加
	add: function(){
		var url = '<?php echo U('Content/add_article?catid='.$catid);?>';
		contentBaseModule.openUrl(url, false);
	},
	
	//编辑
	edit: function(id){
		if(typeof(id) !== 'number'){
			$.app.method.tip('提示信息', '未选择数据', 'error');
			return false;
		}
		var url = '<?php echo U('Content/edit_article?catid='.$catid);?>';
		url += url.indexOf('?') != -1 ? '&id='+id : '?id='+id;
		contentBaseModule.openUrl(url, false);
	},
	
	//删除
	delete: function(id){
		var that = this;
		
		var ids = [];
		if(!id){
			var obj = $(that.datagrid).datagrid('getSelections');
			if(obj) for(var i = 0; i < obj.length; i++) ids.push(obj[i].id);
		}else{
			if(typeof(id) == 'number') ids.push(id);
		}
		if(ids.length == 0){
			$.app.method.tip('提示信息', '未选择数据', 'error');
			return false;
		}
		$.messager.confirm('提示信息', '确定要删除吗？', function(result){
			if(!result) return false;
			
			$.messager.progress({text:'处理中，请稍候...'});
			$.post('<?php echo U('Content/delete_article?catid='.$catid);?>', {ids: ids}, function(res){
				$.messager.progress('close');
				
				if(!res.status){
					$.app.method.tip('提示信息', res.info, 'error');
				}else{
					$.app.method.tip('提示信息', res.info, 'info');
					that.refresh();
				}
			}, 'json');
		});
	}
};
</script>