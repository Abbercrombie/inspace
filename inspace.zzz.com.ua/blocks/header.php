
<header>


		
			<div class="header"> 
			<div id="logo"><a href="/" title="������� �� �������"><span style="font-size:1.5em;">A</span>bout space</a></div>

			
			<a href="/about.php" title="���������� � ���" class="button button-3d button-primary button-rounded"><b>� ���</b></a>
			<a href="/feedback.php" title="��������� ��������� �������������" class="button button-3d button-primary button-rounded"><b>�������� �����</b></a>
			

		
		<?php 
		if (isset($_SESSION['logged_user'])) :
		?>

				<div id="notLogined" style="display:inline-block;"></div>
			<div style="float:right">
				<a href="user.php"title="� ������� ������������" class="button button-3d button-primary button-rounded"><b>������� ������������</b></a>
				<a href="logout.php"title="�����" class="button button-3d button-primary button-rounded"><b>�����</b></a>
			</div>
			<?php
			else :
			
			?>
			<div style="float:right;">
			
			<div id="notLogined" style="display:inline-block;">
			<a href="signup.php"title="������������������ �� �����" class="button button-3d button-primary button-rounded"><b>�����������</b></a>
			<a href="login.php" title="����� � ������� ������������" class="button button-3d button-primary button-rounded" ><b>�����</b> </a>
			</div>
			
			
			
			</div>
	

			<?php endif; ?>
			
			
			
			</div>
			
			
		
	


</header>








