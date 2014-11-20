<?php

extract($data);

foreach($tasks as $t)
{
	echo $t->task_name.'<br>';
}