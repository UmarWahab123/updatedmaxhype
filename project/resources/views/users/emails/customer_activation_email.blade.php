<?php 
	$html = str_replace('[[name]]', '<strong>'.$customer->first_name." ".$customer->last_name.'</strong>', $template->content);
	$html = str_replace('[[email]]', $customer->email, $html);
	$html = str_replace('[[Link]]', "<a href='".route('password.request')."'>Reset Password</a>", $html);
?>
{!! $html !!}