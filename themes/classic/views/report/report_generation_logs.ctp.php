<?php echo showSectionHead($spTextPanel['Report Generation Logs']); ?>
<form id='search_form'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="search">
	<tr>
		<th><?php echo $spText['common']['Period']?>:</th>
		<td>
			<input type="text" style="width: 80px;margin-right:0px;" value="<?php echo $fromTime?>" name="from_time"/> 
			<img align="bottom" onclick="displayDatePicker('from_time', false, 'ymd', '-');" src="<?php echo SP_IMGPATH?>/cal.gif"/> 
			<input type="text" style="width: 80px;margin-right:0px;" value="<?php echo $toTime?>" name="to_time"/> 
			<img align="bottom" onclick="displayDatePicker('to_time', false, 'ymd', '-');" src="<?php echo SP_IMGPATH?>/cal.gif"/>
		</td>
		<th><?php echo $spText['common']['User']?>: </th>
		<td>
			<select name="user_id">
				<option value="">-- <?php echo $spText['common']['Select']?> --</option>
				<?php foreach($userList as $userInfo){?>
					<?php if($userInfo['id'] == $userId){?>
						<option value="<?php echo $userInfo['id']?>" selected><?php echo $userInfo['username']?></option>
					<?php }else{?>
						<option value="<?php echo $userInfo['id']?>"><?php echo $userInfo['username']?></option>
					<?php }?>
				<?php }?>
			</select>
		</td>
		<td colspan="2">
			<a href="javascript:void(0);" onclick="scriptDoLoadPost('reports.php', 'search_form', 'content', '&sec=report_gen_logs')" class="actionbut">
				<?php echo $spText['button']['Show Records']?>
			</a>
		</td>
	</tr>
</table>
</form>

<br><br>
<div id='subcontent'>
<table id="cust_tab">
	<thead>
		<tr class="listHead">
			<th><?php echo $spText['common']['Id']?></th>
			<th><?php echo $spText['common']['User']?></th>
			<?php foreach ($logDateList as $logDate) {?>
				<th><?php echo $logDate?></th>
			<?php }?>
		</tr>
	</thead>	
	<tbody>
		<?php foreach ($logUserList as $i => $userInfo) {?>
			<tr>
				<td><?php echo $i + 1?></td>
				<td><?php echo $userInfo['username']?></td>
				<?php foreach ($logDateList as $logDate) {?>
					<td>
						<?php 
						echo !empty($logList[$logDate][$userInfo['id']]) ? "<font class='success'>{$spText['common']['Yes']}</font>" : "<font class='error'>{$spText['common']['No']}</font>";
						?>
					</td>
				<?php }?>
			</tr>
		<?php }?>
	</tbody>
</table>
</div>