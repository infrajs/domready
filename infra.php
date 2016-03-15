<?php
namespace infrajs\domready;
use infrajs\event\Event;
use infrajs\view\View;
use infrajs\load\Load;
use infrajs\controller\Layer;
$domready = false;
Event::handler('layer.onshow', function ($layer) use (&$domready){
	if ($domready) return;
	if (!Layer::pop($layer, 'domready')) return;
	$domready = true;
	View::head('<script>'.Load::loadTEXT('-domready/ready.min.js').'</script>');
});
