<?
//MY_Upload.php
class MY_Upload extends CI_Upload
{
	function multi_upload($configs,$files)
	{
		$errors = $successes = array();

		for($i=1, $j = count($files);$i<$j;$i++)
		{
			$this->initialize($configs);

			if( ! $this->do_upload($files[$i]))
			{
				
			}
			else
			{
				$successes[$files[$i]] = $this->data();
			}
		}

		return array($errors, $successes);
	}
}
?>