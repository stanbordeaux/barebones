<?php
use app\library\Funky;
if (isset($data))
{
    extract($data);
    include $head;



  Funky::varDump($data);
}
?>
<div class="container">
    <div class="row">
       <h3 class="well well-sm text-center"><?=strtoupper($form_action);?> Task Here!</h3>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form class="horizontal-form" method="post" action="<?=BASE_URL;?>/task/store">

                <label for="task_name" class="control-label top-buffer">Enter task name</label>
                <input type="text" id="task_name" class="form-control" name="task_name" placeholder="Task name" value="<?=$task_name; ?>" />
               
                <div class="row">
                    <div class="col-sm-6">
                        <label for="duedate" class="top-buffer control-label">Enter due date</label>
                        <input type="date" class="form-control" id="duedate" name="duedate" placeholder="Add due date" value="<?=$duedate;?>"/>
                       
                    </div>
                    <div class="col-sm-6">
                        <label for="task_type" class="top-buffer control-label">Type</label>
                        <select class="form-control" id="task_type" name="task_type">
                            <option value="personal">Personal</option>
                            <option value="work">Work</option>
                            <option value="shopping">Shopping</option>
                        </select>
                    </div>
                </div>
                <label for="task_desc" class="control-label top-buffer">Task details</label>
                <textarea name="task_desc" id="task_desc" class="form-control" rows="6" placeholder="Add task description" value=""><?=$task_desc; ?></textarea>
                <input class="btn btn-success top-buffer" type="submit" name="<?=$form_action;?>task" value="<?=ucfirst($form_action);?> task">
                <a href="." class="btn btn-danger top-buffer pull-right">Cancel</a>
                <input type="hidden" name="task_id" value="<?=$task_id;?>">
                 <input type="hidden" name="user_id" value="<?=$userId;?>">


            </form>
        </div>
    </div>

</div>