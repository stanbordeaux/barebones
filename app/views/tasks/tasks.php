<?php
extract($data);
include $head;
use Carbon\Carbon;

?>
<div class="container">
<h1><?=$pagetitle;?>
<?=$now = Carbon::now(new DateTimeZone('Australia/Melbourne'));?></h1>
<h3 class="red">Here are all your tasks</h3>
<table class="table table-striped table-hover" >
	<tr align="left">
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
		<th>Due</th>
		<th>Actions</th>
	</tr>
	<tbody>
		<tr>
			<?php foreach($tasks as $task):?>
			<td><?=$task->id;?></td>
			<td><?=$task->task_name;?></td>
			<td><?=$task->task_desc;?></td>
			<td><?=date('d/m/Y', strtotime($task->duedate));?></td>
			<td><a href="showOne/<?=$task->id;?>">edit</a></td>

		</tr>
			<?php endforeach;?>
	</tbody>
</table>
<?php include $footer;?>
</div>
</body>
</html>