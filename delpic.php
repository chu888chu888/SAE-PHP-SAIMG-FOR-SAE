<?php
if(isset($_POST['id']))
{
  include_once 'conn.php';
  $saefile = new SaeStorage();//storage��ʼ��
  $sql="delete from `filelist` where `diskname` = " . $_POST['id'];
  
  if($saefile->fileExists($storagedomain,$_POST['id']))
  {
	if($saefile->delete($storagedomain,$_POST['id']))
	{
		if(!mysql_query($sql))
		{
			echo json_encode(array("status"=>"no","msg"=>"ɾ��ʧ��"));
		}
		else
		{
			echo json_encode(array("status"=>"yes","msg"=>"ɾ���ɹ�"));
		}
	}
	else
	{
		echo json_encode(array("status"=>"no","msg"=>"�ļ�������"));
	}
  } 
}
?>
