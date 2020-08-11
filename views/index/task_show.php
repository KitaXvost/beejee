<div id="mail-status">
	<div>
		<label style="padding-top: 20px;">Name</label> <span id="name-info" class="info"></span>
		<br />
		<input type="text" name="name" id="name" class="demoInputBox" value="<?php echo $task['name']; ?>" disabled> </div>
	<div>
		<label>Email</label> <span id="roll-number-info" class="info"></span>
		<br />
		<input type="text" name="roll_number" id="roll_number" class="demoInputBox" value="<?php echo $task['email']; ?>" disabled> </div>
	<div>
		<label>Task</label> <span id="dob-info" class="info"></span>
		<br />
		<input type="text" name="dob" id="dob" class="demoInputBox" value="<?php echo $task['task']; ?>" disabled> </div>
	<div>
		<label>Task completed</label>
		<input type="checkbox" name="status" id="status" value="1" <?php if ($task[ 'status']>0) {echo 'checked';} ?> disabled> </div>
</div>
</body>

</html>
