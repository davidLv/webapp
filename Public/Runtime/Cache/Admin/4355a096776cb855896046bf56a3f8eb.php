<?php if (!defined('THINK_PATH')) exit();?><form>
	<table cellspacing="6" width="100%">
		<tr>
			<td width="80">上级栏目：</td>
			<td><input class="easyui-combotree" data-options="url:'<?php echo U('Category/public_categorySelect');?>'" type="text" name="info[parentid]" value="<?php echo ((isset($_GET['parentid']) && ($_GET['parentid'] !== ""))?($_GET['parentid']):0); ?>" style="width:230px;height:24px" /></td>
		</tr>
		<tr>
			<td>栏目名称：</td>
			<td><input class="easyui-validatebox" data-options="required:true,validType:{length:[0,20]}" type="text" name="info[catname]" style="width:220px" /></td>
		</tr>
		<tr>
			<td>栏目类型：</td>
			<td>
				<select name="info[type]" class="easyui-combobox" data-options="editable:false,panelHeight:'auto'" style="height:24px">
					<?php if(is_array($typeList)): foreach($typeList as $key=>$type): ?><option value="<?php echo ($key); ?>"><?php echo ($type); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>列表模型：</td>
			<td>
				<select name="info[model]" class="easyui-combobox" data-options="editable:false,panelHeight:'auto'" style="height:24px">
					<?php if(is_array($modelList)): foreach($modelList as $key=>$value): ?><option value="<?php echo ($key); ?>"><?php echo ($value); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>栏目描述：</td>
			<td><textarea class="easyui-validatebox" data-options="validType:{length:[0,200]}" name="info[description]" style="width:220px;height:60px;font-size:12px"></textarea></td>
		</tr>
		<tr>
			<td>前台显示：</td>
			<td>
				<label><input name="info[ismenu]" value="1" type="radio" checked />是</label>
				<label><input name="info[ismenu]" value="0" type="radio" />否</label>
			</td>
		</tr>
		<tr>
			<td>是否启用：</td>
			<td>
				<label><input name="info[disabled]" value="0" type="radio" checked />是</label>
				<label><input name="info[disabled]" value="1" type="radio" />否</label>
			</td>
		</tr>
	</table>
</form>