<?php
			session_start();
		if(isset($_SESSION['username']))
		{
			echo 'TRUE';
		}
		else
		{
		echo 'FALSE';
		}
		?>