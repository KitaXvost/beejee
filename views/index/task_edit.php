<form name="frmAdd" method="post" action="" id="frmAdd" onSubmit="return validate();">
	<div id="mail-status"></div>
	<div>
		<label style="padding-top: 20px;">Name</label> <span id="name-info" class="info"></span>
		<br />
		<input type="text" name="name" id="name" class="demoInputBox" value="<?php echo $task['name']; ?>">
		<input style="height:0px; width:0px; border:0px;" type="text" name="id" id="id" value="<?php echo $task['id']; ?>"> </div>
	<div>
		<label>Email</label> <span id="email-info" class="info"></span>
		<br />
		<input type="text" name="email" id="email" class="demoInputBox" value="<?php echo $task['email']; ?>"> </div>
	<div>
		<label>Task</label> <span id="task-info" class="info"></span>
		<br />
		<input type="text" name="task" id="task" class="demoInputBox" value="<?php echo $task['task']; ?>"> </div>
	<div>
		<label>Task completed</label>
		<input type="checkbox" name="status" id="status" <?php if ($_SESSION[ 'login']!=='admin' ) {echo 'disabled';} ?> value="1"
		<?php if ($task['status']>0) {echo 'checked';} ?> > </div>
	<div>
		<input type="submit" name="add" id="btnSubmit" value="Save" /> </div>
	</div>
	</body>

	</html>
