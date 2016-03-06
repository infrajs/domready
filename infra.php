<?php
namespace infrajs\domready;
use infrajs\event\Event;
use infrajs\view\View;
use infrajs\load\Load;
$domready = false;
Event::handler('layer.onshow', function ($layer) use (&$domready){
	if (empty($layer['domready'])) return;
	if ($domready) return;
	$domready = true;

	View::head('<script>'.Load::loadTEXT('-domready/ready.min.js').'</script>');
});
