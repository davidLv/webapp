<?php if (!defined('THINK_PATH')) exit();?><div class="easyui-layout" data-options="fit:true,border:false">
	<div data-options="region:'north',border:true" style="height:29px;padding:1px;border-top:none;border-left:none">
		<a href="javascript:;" onclick="contentArticleAddModule.save()" class="easyui-linkbutton" data-options="iconCls: 'icons-page-page_save',plain:true">保存</a>
		<a href="javascript:;" onclick="contentArticleAddModule.back()" class="easyui-linkbutton" data-options="iconCls: 'icons-page-page_go',plain:true">返回</a>
	</div>

	<div data-options="region:'center',border:false">
		<div class="easyui-tabs" data-options="fit:true,border:false">
			<div title="内容设置" data-options="cache:true">
				<iframe id="content-article-add-editor" src="<?php echo U('Content/editor_iframe', array('catid'=>$catid));?>" frameborder="0" width="100%" height="100%" style="margin:0 0 -5px"></iframe>
			</div>
		</div>
	</div>

	<div data-options="region:'east',split:true" title="属性" style="width:280px">
		<table id="content-article-add-propertygrid" class="easyui-propertygrid" data-options="border:false,fit:true,showHeader:true,columns:[[{field:'name',title:'属性名称',width:100},{field:'value',title:'属性值',width:200}]],showGroup:true,scrollbarSize:0,url:'<?php echo U('Content/add_article', array('catid'=>$catid, 'grid'=>'propertygrid'));?>',onClickRow:contentArticleAddModule.onClickRow"></table>
	</div>

</form>

<script type="text/javascript">
	var contentArticleAddModule = {
	propertygrid: '#content-article-add-propertygrid',
	editorIframe: 'content-article-add-editor',

	//记录当前选项的位置，失去焦点的时候可以用来定位
	onClickRow: function(index){
		contentArticleModule.data = {id: '#content-article-add-propertygrid', index: index, field: 'value'};
	},

	//保存
	save: function(){
		var that = this;
		var data = {};
		var rows = $(that.propertygrid).propertygrid('getRows');
		for(var i=0; i<rows.length; i++){
			$(that.propertygrid).propertygrid('endEdit', i);

			//验证字段
			if(rows[i]['required'] && !rows[i]['value']){
				$(that.propertygrid).propertygrid('selectRow', i).propertygrid('beginEdit', i);
				that.onClickRow(i);
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

		$.messager.progress({text:'处理中，请稍候...'});
		$.post("<?php echo U('Content/add_article', array('catid'=>$catid, 'dosubmit'=>1));?>", {info: data}, function(res){
			$.messager.progress('close');
			if(!res.status){
				$.app.method.tip('提示信息', res.info, 'error');
			}else{
				$.app.method.tip('提示信息', res.info, 'info');
				that.back();
			}
		}, 'json');
	},
	
	//返回栏目列表
	back: function(){
		contentCategoryModule.open(1, <?php echo ((isset($catid) && ($catid !== ""))?($catid):0); ?>);
	}
};
</script>