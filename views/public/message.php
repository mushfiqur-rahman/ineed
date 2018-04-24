<div class="container row">
	
	<div class="col-md-2" style="background-color: silver;">
		<ul>
		<?php
			$cmd = new comodity();
			$cmd->userId = $_SESSION['id'];
			$cmds = $cmd->Select();
			foreach($cmds as $cm)
			{
				print '<li><a href="?controller=public&view=message&comodity='.$cm["id"].'">'.$cm["name"].'</a></li>';
			}
		?>
		</ul>
	</div>
	<div class="col-md-10" style="background-color: gray;">
	
		<?php
		if(isset($_GET['comodity']))
		{
			$msg = new messages();
			$msg->userId = $_SESSION['id'];
			$msg->comodityId = $_GET['comodity'];
			$msgs = $msg->Select();

			foreach($msgs as $mg)
			{
				print '<p style="margin: 5px; background-color: white;"><b>'.$mg["user"].'</b> on '.$mg["dateTime"].' : '.$mg["message"].' </p>';
			}
		}
		?>
		
	</div>
	<div class="col-md-12">
	
		<?php
		
		
		if(isset($_POST['submit']))
		{
			$msg->comodityId = $_GET['comodity'];
			$msg->userId = $_SESSION['id'];
			$msg->message = $_POST['comments'];
			
			if($msg->Insert())
			{
				$msg = new messages();
			}
			else{
				print $html->errorBlock($msg->error);
			}
		}
		
		if(isset($_GET['comodity']))
		{
			print '<form method="post" action="">
			<div class="form-group">
			<textarea class="form-control" name="comments">'.$msg->message.'</textarea>
			</div>
			<input type="submit" name="submit" class="btn btn-primary mb-2" value="Send"/>
		</form>';
		}
		
		?>
	
		
		
		
	</div>
</div>