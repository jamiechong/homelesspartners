<div class='container'>
	<div class='row'>
		<div class="col-md-4 col-md-offset-4">
			<form action="<?php echo Yii::app()->createUrl('login/loginProcessor'); ?>" method="post">

				<div class="form-group">
	    			<label for="email">Email</label>
	    			<input type="text" class="form-control" id="email" name="email">
	  			</div>
				<div class="form-group">
					<label for="password">Password</label>
	    			<input type="password" class="form-control" id="password" name="password" maxlength="16">
	  			</div>
				<button type="submit" class="btn btn-default">Login</button>
			</form>
		</div>
	</div>
</div>