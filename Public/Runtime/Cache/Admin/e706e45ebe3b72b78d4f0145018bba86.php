<?php if (!defined('THINK_PATH')) exit();?><div class="easyui-layout" data-options="fit:true,border:false">
	<div data-options="region:'north',border:true" style="height:29px;padding:1px;border-top:none;border-left:none">
		<a href="javascript:;" onclick="contentPageModule.save()" class="easyui-linkbutton" data-options="iconCls: 'icons-page-page_save',plain:true">保存</a>
		<a href="javascript:;" onclick="contentPageModule.refresh()" class="easyui-linkbutton" data-options="iconCls: 'icons-page-page_refresh',plain:true">刷新</a>
	</div>
	
	<div data-options="region:'center',border:false">
		<div class="easyui-tabs" data-options="fit:true,border:false">
			<div title="内容设置" data-options="cache:true">
				<iframe id="content-page-editor" src="<?php echo U('Content/editor_iframe', array('catid'=>$catid, 'callback'=>'contentPageModule.editor'));?>" frameborder="0" width="100%" height="100%" style="margin:0 0 -5px"></iframe>
			</div>
		</div>
	</div>
	
	<div data-options="region:'east',split:true" title="属性" style="width:280px">
		<table id="content-page-propertygrid" class="easyui-propertygrid" data-options="border:false,fit:true,showHeader:true,columns:[[{field:'name',title:'属性名称',width:100},{field:'value',title:'属性值',width:200}]],showGroup:true,scrollbarSize:0,url:'<?php echo U('Content/page', array('catid'=>$catid, 'grid'=>'propertygrid'));?>'"></table>
	</div>
	
</div>

<script type="text/javascript">
var contentPageModule = {
	propertygrid: '#content-page-propertygrid',
	editorIframe: 'content-page-editor',
		
	//编辑器初始化
	editor: function(){
		<?php if(is_string($info['content'])): ?>document.getElementById(this.editorIframe).contentWindow.setSource(<?php echo str_replace(array("\r\n", "\n"), "'+\"\\n\"+'", var_export($info['content'], true));?>);<?php endif; ?>
	},
	
	//保存
	save: function(){
		var that = this;
		var data = {};
		var rows = $(this.propertygrid).propertygrid('getRows');
		for(var i=0; i<rows.length; i++){
			$(that.propertygrid).propertygrid('endEdit', i);

			//验证字段
			if(rows[i]['required'] && !rows[i]['value']){
				$(that.propertygrid).propertygrid('selectRow', i).propertygrid('beginEdit', i);
				var ed = $(that.propertygrid).propertygrid('getEditor', {index:i,field:'value'});
				$(ed.target).focus();
				$.app.method.tip('提示信息', rows[i]['name'].replace('*', '') + '不能为空', 'error');
				return false;
			}
			data[rows[i]['key']] = rows[i]['value'];
		}
		//内容处理
		data['content'] = document.getElementById(that.editorIframe).contentWindow.getSource();
		if(!data['content']){
			document.getElementById(that.editorIframe).contentWindow.focus();
			$.app.method.tip('提示信息', '内容不能为空', 'error');
			return false;
		}
		
		$.post('<?php echo U('Content/page', array('catid'=>$catid, 'dosubmit'=>1));?>', {info: data}, function(res){
			if(!res.status){
				$.app.method.tip('提示信息', res.info, 'error');
			}else{
				$.app.method.tip('提示信息', res.info, 'info');
				that.refresh();
			}
		}, 'json');
	},
	
	//刷新
	refresh: function(){
		contentCategoryModule.open('0', <?php echo ((isset($catid) && ($catid !== ""))?($catid):0); ?>);
	}
};
</script>