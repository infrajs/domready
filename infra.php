<?php
namespace infrajs\domready;
use infrajs\event\Event;
use infrajs\view\View;
use infrajs\load\Load;
use infrajs\once\Once;
use infrajs\controller\Layer;

Event::handler('Layer.onshow', function ($layer) {
	if (!Layer::pop($layer, 'domready')) return;
	if (Once::omit(__FILE__)) return;
	View::head('<script>'.Load::loadTEXT('-domready/ready.min.js').'</script>');
});
