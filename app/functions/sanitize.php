<?php

function sanitize($str)
{
	return htmlentities($str, ENT_QUOTES, 'UTF-8');
}