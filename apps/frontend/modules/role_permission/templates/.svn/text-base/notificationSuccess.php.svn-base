<?php
use_helper('Form', 'Object', 'jQuery');
$sf_response->addJavascript('/sfFormExtraPlugin/js/double_list.js');
$sf_response->addJavascript('/js/jquery-ui.min.js');
?>
<script type="text/javascript">
function delRole(id)
{	
	if(confirm("Are you sure?"))
	{
	  $.ajax({		
		url: '<?php echo url_for('role_notification/delrole')?>',				
		data: "rnid="+id,
		beforeSend: function (html)		
		{},
		success: function (html) {			
		    $('#rolid'+id).slideUp();
		}
	  });
	}  
}
function saverole(divname,mistype,formObj)
{
	var lastid=document.getElementById(divname+'lastid').innerHTML;
	var appendId=parseInt(lastid);	
	
	if(confirm("Are you sure?"))
	{
	  $.ajax({		
		url: '<?php echo url_for('role_notification/addrole')?>',				
		data: "isemail="+formObj.isEmail.checked+"&isinstrument="+formObj.isInstrumental.checked+"&roleid="+formObj.role.value+"&mistype="+mistype+"&divname="+(divname+(appendId+1)),
		beforeSend: function (html)		
		{
			document.getElementById(divname+"edit").innerHTML="<b>Wait........</b>";
			document.getElementById(divname+"edit").style.display="block";		
		},
		success: function (html) 
		{			
		    if(html==1)
			{
				document.getElementById(divname+"error").innerHTML="<b>Role Already Added</b>";				
				$('#'+divname+"error").slideDown();
				document.getElementById(divname+"edit").style.display="none";
			}
			else
			{			
			 document.getElementById(divname+appendId).innerHTML=html;			
			 document.getElementById(divname+'lastid').innerHTML=appendId+1;
			 
			 document.getElementById(divname+"edit").innerHTML="<b>Successfully Saved</b>";			 
			}
		}
	  });
	}  			
	return false;
}

function editrole(rid,divname)
{
	var isemail="false";
	var isinstrument="false";
	
	if(document.getElementById('single'+rid).checked)
	{
		isemail="true";
	}
	if(document.getElementById('instrument'+rid).checked)
	{
		isinstrument="true";
	}
	
  $.ajax({		
	url: '<?php echo url_for('role_notification/editrole')?>',				
	data: "isemail="+isemail+"&isinstrument="+isinstrument+"&roleid="+rid,
	beforeSend: function (html)		
	{
		document.getElementById(divname+"edit").innerHTML="Wait........";
		document.getElementById(divname+"edit").style.display="block";		
	},
	success: function (html) 
	{		
		if(html==1)
		{		
			document.getElementById(divname+"edit").innerHTML="Successfully Edited";				
			$('#'+divname+"edit").slideDown();				
		}
		else
		{
			document.getElementById(divname+"edit").innerHTML="<b>No modify</b>";				
			$('#'+divname+"edit").slideDown();
		}
	}
  });
	
}
</script>

<?php include_partial('role_permission/tab', array('tab' => 'notification'))?>

<?php
/*
1. Mission Add
2. Mission Modify
3. Mission Leg Modify
4. Mission Leg Add
5. Person Add
6. Person Modify
7. Logins (Staff/Anonymous/Member)
8. Mass Email Scheduled 
*/		
$mtid=array(
'missionadd'=>array('id'=>1,'name'=>'Mission Add'),
'missionmodify'=>array('id'=>2,'name'=>'Mission Modify'),
'missionlegmodify'=>array('id'=>3,'name'=>'Mission Leg Modify'),
'missionlegadd'=>array('id'=>4,'name'=>'Mission Leg Add'),
'personadd'=>array('id'=>5,'name'=>'Person Add'),
'personmodify'=>array('id'=>6,'name'=>'Mission Add'),
'logins'=>array('id'=>7,'name'=>'Logins (Staff/Anonymous/Member)'),
'massemailscheduled'=>array('id'=>8,'name'=>'Mass Email Scheduled')
);
/*
echo "<pre>";
	print_r($mtid);
echo "</pre>";
*/
?>

<h3>Edit Auditing / Notifications</h3>
<?php
//mission add
?>
<table>
  <tbody>    
    <tr>
      <td width="130"><b>Action</b></td>
      <td width="200">
		<b>&nbsp;Who Receives</b>
      </td>
	  <td>
		<b>&nbsp;&nbsp;Notification</b>
      </td>
    </tr>    
  </tbody> 	
</table>
<?php
foreach($mtid as $key=>$value)
{
?>
<table>
  <tbody>         	
	<tr>
      <td width="130" valign="top"><?php echo $value['name'];?></td>
      <td valign="top" colspan="2">
		<span style="display:none;" id="<?php echo $key;?>edit"></span>	
			<table>
				<tbody>
				<?php
				$lastid=0;
				foreach($notification_list as $nod)
				{
					if($nod->getMid()==$value['id'])
					{													
				?>	
					<tr id="rolid<?php echo $nod->getId();?>">
						  <td width="200">
							<?php
								echo $nod->getRole()->getTitle();
							?>
							<span onclick="delRole('<?php echo $nod->getId();?>')" style="cursor:pointer;color:red;"><b>X</b></span>
								&nbsp;&nbsp;&nbsp;
							 <span>
						  </td>
						  <td>
							<?php
							 $email=false;
							 $instnel=false;
								if($nod->getNotification()=="3")
								{
									$email=true;
									$instnel=true;
								}
								else if($nod->getNotification()=="2")
								{
									$email=false;
									$instnel=true;
								}
								else if($nod->getNotification()=="1")
								{
									$email=true;
									$instnel=false;
								}
								
							 ?>
								<?php echo checkbox_tag('single'.$nod->getId(), 1, $email) ?> Email
								<?php echo checkbox_tag('instrument'.$nod->getId(), 1, $instnel) ?> Instrument Panel						
							 </span>
							 <a href="#" class="link-edit" onclick="editrole('<?php echo $nod->getId();?>','<?php echo $key; ?>'); return false;" />Edit</a>
						  </td>
					</tr>
				<?php				
					}
					$lastid=$nod->getId();				
				}		 			
				?>	
				</tbody>    				
			</table>
			<div class="not">								
				<div id="<?php echo $key; ?><?php echo $lastid;?>">			
				</div>
				<span style="display:none;" id="<?php echo $key; ?>lastid"><?php echo $lastid;?></span>
				<span style="cursor:pointer;" onclick="document.getElementById('roleform<?php echo $key; ?>').style.display='block'">&nbsp;<?php echo image_tag('/images/role_button_2.png')?></span>					
				<div class="roleform" id="roleform<?php echo $key; ?>" style="display:none;">					
					<form method="post" name="" onsubmit="return saverole('<?php echo $key; ?>','<?php echo $value['id']; ?>',this);" />
					<table>
						<tr>
						<td width="200">
						<?php
							echo select_tag('role', objects_for_select($role_list, 'getId', 'getTitle'));							
						?>
						</td>
						<td>
							<?php						
								echo checkbox_tag('isEmail', 1)." Email";
								echo checkbox_tag('isInstrumental',1)." Instrument Panel";
							?>
						</td>
						</tr>
						<br />
					</table>	
						<input value="Save Role" type="submit" />					
						<span style="cursor:pointer;" onclick="document.getElementById('roleform<?php echo $key; ?>').style.display='none'">Cancel</span>					
					</form>	
					<span style="display:none;" id="<?php echo $key; ?>error"></span>		
				</div>		
			</div>
      </td>	  
    </tr>    
  </tbody>
</table>
<br />	
<?php
}
?>