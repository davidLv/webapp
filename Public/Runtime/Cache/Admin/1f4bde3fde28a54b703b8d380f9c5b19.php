<?php if (!defined('THINK_PATH')) exit();?><table id="storage-index-datagrid" class="easyui-datagrid" title="<?php echo ($currentpos); ?>" data-options="fit:true,border:false,fitColumns:true,rownumbers:true,singleSelect:true,striped:true,url:'<?php echo U('Storage/index', array('grid'=>'datagrid'));?>',onDblClickRow:StorageIndexModule.click,toolbar:'#storage-index-datagrid-toolbar',onLoadSuccess:StorageIndexModule.tooltip">
	<thead>
	<tr>
		<th data-options="field:'name',width:200,formatter:StorageIndexModule.name">名称</th>
		<th data-options="field:'size',width:100">文件大小</th>
		<th data-options="field:'mtime',width:100">修改时间</th>
		<th data-options="field:'path',width:100,formatter:StorageIndexModule.operate">管理操作</th>
	</tr>
	</thead>
</table>

<div id="storage-index-datagrid-toolbar" style="padding:1px;height:auto">
	<form style="padding:0 5px">
		路径：<input type="text" name="path" value="/" style="width:200px;padding:2px" readonly />
		<a href="javascript:;" onclick="StorageIndexModule.refresh()" class="easyui-linkbutton" iconCls="icons-folder-folder_explore" plain="true">浏览</a>
		<a href="javascript:;" onclick="StorageIndexModule.back(this)" class="easyui-linkbutton" iconCls="icons-folder-folder_go" plain="true">上级</a>
	</form>
</div>

<script type="text/javascript">
var StorageIndexModule = {
	dialog :  '#globel-dialog-div',
	datagrid: '#storage-index-datagrid',

	//name格式化
	name: function(val, arr){
		var icon = 'icons-folder-folder';
		if(arr.type != 'dir'){
			icon = 'icons-page-page_white';
			var ext = /[^\.]+$/.exec(val);
			icon += ' icons-ext-' + ext[0].toLowerCase();
		}
		return '<span class="tree-icon tree-file ' + icon + '" url="/app/Public/upload/' + arr.url + '"></span>' +  val;
	},

	//操作格式化
	operate: function(val, arr){
		var button = [];
		if(arr['type'] == 'dir'){
			button.push('查看');
			button.push('删除');
		}else{
			button.push('<a href="javascript:;" onclick="window.open(\'/app/Public/upload/'+ arr.url + '\')">查看</a>');
			button.push('<a href="javascript:;" onclick="StorageIndexModule.delete(\'' + encodeURIComponent(arr.path) + '\')">删除</a>');
		}
		return button.join(' | ');
	},

	//刷新
	refresh: function(){
		$(this.datagrid).datagrid('reload');
	},

	//文件提示
	tooltip: function(){
		var that = StorageIndexModule;
		$(that.datagrid).datagrid('getPanel').find('div.datagrid-body td[field="name"] div.datagrid-cell').each(function(){
			var url = $(this).find('span:first').attr('url');
			var ext = /[^\.]+$/.exec(url);
			ext = ext[0].toLowerCase();
			var content = null;

			switch(ext){
				case 'jpg':
				case 'jpeg':
				case 'png':
				case 'bmp':
				case 'gif':
					content = '<img src="'+ url +'" height="160" />';
					break;
			}
			if(content) $(this).tooltip({trackMouse: true,content: content});
		});
	},

	//双击事件
	click: function(rowIndex, rowData){
		var that = StorageIndexModule;

		switch(rowData.type){
			case 'dir':
				var path = '/' + rowData.path;
				that.open(path);
				break;
		}
	},

	//打开目录
	open: function(path){
		var that = this;
		path = path.replace(/[\\\/]+/g, '/') || '/';

		var queryParams = $(that.datagrid).datagrid('options').queryParams;
		queryParams['path'] = path;
		$(that.datagrid).datagrid('reload');

		$('#storage-index-datagrid-toolbar').find('input[name="path"]').val(path);
	},

	//返回上级目录
	back: function(that){
		var path = $('#storage-index-datagrid-toolbar').find('input[name="path"]').val();
		path = path.replace(/[\\\/][^\\\/]+[\\\/]?$/, '');
		this.open(path);
	},

	//删除
	delete: function(filename) {
		if (typeof(filename) !== 'string') {
			$.app.method.tip('提示信息', '未选择文件', 'error');
			return false;
		}

		var that = this;
		$.messager.confirm('提示信息', '确定要删除吗？', function (result) {
			if (!result) return false;

			$.messager.progress({text: '处理中，请稍候...'});
			$.post('<?php echo U('Storage/delete?dosubmit=1');?>', {filename: filename}, function (res) {
				$.messager.progress('close');
				if (!res.status) {
					$.app.method.tip('提示信息', res.info, 'error');
				} else {
					$.app.method.tip('提示信息', res.info, 'info');
					that.refresh();
				}
			}, 'json'
			)
			;
		});
	}
};
</script>