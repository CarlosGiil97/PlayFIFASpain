<?php

define('BASE_URL','http://fifacompetitivo.000webhostapp.com/');

function site_url ( $path = '')
{
	if( is_array( $path ))
	{
		return BASE_URL.'/'.(implode('/', $path));
	}else if( is_string ( $path ) )
	{
		return BASE_URL.'/'.ltrim($path,'/');
	}
	return BASE_URL;
}

?>