<div style="text-align: right; margin: 20px 0px 10px;">
	<a id="btnAddAction" href="/mvc/index/task_add"> <i class="fa fa fa-plus"></i> Add Task </a>
</div>
<div id="toys-grid">
	<table class="table table-hover table-bordered">
		<thead class="thead-light">
			<tr>
				<th scope="col"><a href="/mvc/index/index/name">Name <i class="fa fa-2x fa-sort-desc"></a></i>
				</th>
				<th scope="col"><a href="/mvc/index/index/email">Email <i class="fa fa-2x fa-sort-desc"></a></i>
				</th>
				<th scope="col"><a href="/mvc/index/index/task">Task <i class="fa fa-2x fa-sort-desc"></a></i>
				</th>
				<th scope="col"><a href="/mvc/index/index/status">Status <i class="fa fa-2x fa-sort-desc"></a></i>
				</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
               $x=0;
               foreach ($tasks as $task) {
                    ?>
				<tr>
					<td>
						<a href="/mvc/index/task_show/<?php echo $task['id']; ?>">
							<?php echo $task['name']; ?>
						</a>
					</td>
					<td>
						<?php echo $task['email']; ?>
					</td>
					<td>
						<?php echo $task['task']; ?>
					</td>
					<td>
						<?php if ($task['status']>0) {echo "completed";} ?>
					</td>
					<td>
						<a class="btnEditAction" href="/mvc/index/task_edit/<?php echo $task['id']; ?>"> <i class="fa fa-2x fa-pencil"></i> </a>
						<a class="btnDeleteAction" href="/mvc/index/task_delete/<?php echo $task['id']; ?>"> <i class="fa fa-2x fa-trash"></i> </a>
					</td>
				</tr>
				<?php
                }

              ?>
					<tbody>
	</table>
	<ul class='pagination'>
		<?php
$page = $_GET['page'];
if (empty($page)) {$page=1;}
  if ($page!=1){
	echo "<li class='page-item ".$active."'><a class='page-link' href=?page=1>First Page</a></li>";
  }
 for ($y=$page-2; $y<=$str_pag && $y<=$page+2 ; $y++){
	 if ($y>0){
	    if ($y==$page) {$active='active';} else {$active='';}
        echo "<li class='page-item ".$active."'><a class='page-link' href=?page=".$y.">".$y."</a></li>";
  }
}
    if ($page!=$str_pag){
	  echo "<li class='page-item ".$active."'><a class='page-link' href=?page=".$str_pag.">Last Page</a></li>";
    }
?>
	</ul>
</div>
