<?php if (!defined('THINK_PATH')) exit();?><form>
	<table cellspacing="6" width="100%">
		<tr>
			<td width="90">上级菜单：</td>
			<td><input class="easyui-combotree" data-options="url:'<?php echo U('System/public_menuSelectTree');?>'" name="info[parentid]" value="<?php echo ((isset($_GET['parentid']) && ($_GET['parentid'] !== ""))?($_GET['parentid']):0); ?>" style="width:230px;height:24px" /></td>
		</tr>
		<tr>
			<td>菜单名称：</td>
			<td><input class="easyui-validatebox" data-options="required:true,validType:['length[2,20]','remote[\'<?php echo U('System/public_menuNameCheck');?>\',\'name\']']" name="info[name]" type="text" style="width:220px" /></td>
		</tr>
		<tr>
			<td>模块名：</td>
			<td><input class="easyui-validatebox" data-options="required:true,validType:['controller','length[0,20]']"  name="info[c]" type="text" style="width:220px" /></td>
		</tr>
		<tr>
			<td>方法名：</td>
			<td><input class="easyui-validatebox" data-options="required:true,validType:['action','length[0,20]']"  name="info[a]" type="text" style="width:220px" /></td>
		</tr>
		<tr>
			<td>附加参数：</td>
			<td><input class="easyui-validatebox" data-options="validType:['querystring','length[0,200]']"  name="info[data]" type="text" style="width:220px" /></td>
		</tr>
		<tr>
			<td>是否显示菜单：</td>
			<td>
				<label><input name="info[display]" value="1" type="radio" checked />是</label>
				<label><input name="info[display]" value="0" type="radio" />否</label>
			</td>
		</tr>
	</table>
</form>