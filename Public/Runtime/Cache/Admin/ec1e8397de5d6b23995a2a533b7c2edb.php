<?php if (!defined('THINK_PATH')) exit();?><form>
	<table cellspacing="6" width="100%">
		<tr>
			<td width="90">用户名：</td>
			<td><input class="easyui-validatebox" type="text" name="info[username]" data-options="required:true,validType:['length[2,20]','remote[\'<?php echo U('Admin/public_checkName');?>\',\'name\']']" style="width:200px" /></td>
		</tr>
		<tr>
			<td>密码：</td>
			<td><input id="admin_memberlist_add_dialog_form_password" class="easyui-validatebox" type="password" name="info[password]" data-options="required:true,validType:{length:[6,20]}" style="width:200px" /></td>
		</tr>
		<tr>
			<td>确认密码：</td>
			<td><input class="easyui-validatebox" type="password" data-options="required:true,validType:'equals[\'#admin_memberlist_add_dialog_form_password\']'" style="width:200px" /></td>
		</tr>
		<tr>
			<td>真实姓名：</td>
			<td><input class="easyui-validatebox" type="text" name="info[realname]" data-options="required:true,validType:{length:[2,20]}" style="width:200px" /></td>
		</tr>
		<tr>
			<td>E-mail：</td>
			<td><input class="easyui-validatebox" type="text" name="info[email]" data-options="required:true,validType:['email','length[3,40]','remote[\'<?php echo U('Admin/public_checkEmail');?>\',\'email\']']" style="width:200px" /></td>
		</tr>
		<tr>
			<td>所属角色：</td>
			<td>
				<select class="easyui-combobox" data-options="editable:false,panelHeight:'auto'" name="info[roleid]" style="height:24px">
				<?php if(is_array($rolelist)): foreach($rolelist as $roleid=>$rolename): ?><option value="<?php echo ($roleid); ?>"><?php echo ($rolename); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>
	</table>
</form>