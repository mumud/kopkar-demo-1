<?php 

/**
* 
* Create by: s4kur4
* Function: Helper HTML
* KopkarDemo Admin
* 
*/

class html
{
	
	public function html5()
	{
		$html5 = '<!DOCTYPE html>';

		return $html5;
	}

	public function linkCss($fileCss)
	{
		$css = "<link rel='stylesheet' type='text/css' id='theme' href='".$fileCss."' />\n";

		return $css;
	}

	public function linkJs($fileJs)
	{
		$js = "<script type='text/javascript' src='".$fileJs."'></script>\n";

		return $js;
	}
}

?>