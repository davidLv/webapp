<?php if (!defined('THINK_PATH')) exit();?><form>
	<table cellspacing="6" width="100%">
		<tr>
			<td>模版编号：</td>
			<td><input class="easyui-validatebox" data-options="required:true,validType:['length[2,40]','remote[\'<?php echo U('System/public_emailCodeCheck');?>\',\'code\']']" type="text" name="info[code]" style="width:350px" /></td>
		</tr>
		<tr>
			<td>邮件主题：</td>
			<td><input class="easyui-validatebox" data-options="required:true,validType:{length:[2,255]}" type="text" name="info[subject]" style="width:350px" /></td>
		</tr>
		<tr>
			<td>邮件模版：</td>
			<td><textarea class="easyui-validatebox" data-options="required:true,validType:{length:[5,10000]}" name="info[content]" style="width:350px;height:210px;font-size:12px"></textarea></td>
		</tr>
	</table>
</form>