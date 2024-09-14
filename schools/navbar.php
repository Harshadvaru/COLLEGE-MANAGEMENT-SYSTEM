<div class="navbar">

			<ul class="list">
				<b style="color:white;float:left;line-height:50px;margin-left:15px;font-family:Noto Sans;">
				College Management System</b>
			<?php
				if(isset($_SESSION["aid"]))
				{
					echo'
						<li><a href="admin-home.php" style="font-family:NOTO Sans;">Admin Home</a></li>
                        <li><a href="change_pass.php" style="font-family:NOTO Sans;">Settings</a></li>
                        <li><a href="logout.php" style="font-family:NOTO Sans;">Logout</a></li>';
				}
				elseif(isset($_SESSION["tid"]))
				{
					echo'
						<li><a href="teacher_home.php" style="font-family:NOTO Sans;">Teacher Home</a></li>
                        <li><a href="teacher_change_pass.php" style="font-family:NOTO Sans;">Settings</a></li>
                        <li><a href="logout.php" style="font-family:NOTO Sans;">Logout</a></li>';
				}
				else{
					echo'
					<li><a href="index.php" style="font-family:NOTO Sans;">Admin</a></li>
                    <li><a href="teacher_login.php" style="font-family:NOTO Sans;">Teacher</a></li>
                    <li><a href="contact.php" style="font-family:NOTO Sans;">Contact Us</a></li>';
				}
			?>
				
			</ul>
		</div>
		