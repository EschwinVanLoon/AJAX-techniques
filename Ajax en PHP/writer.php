<?php	
	
	if (!empty($_REQUEST['content']) && !empty($_REQUEST['title']) && !empty($_REQUEST['file'])){
		$file = fopen($_REQUEST['file'], 'w+');
		$html = '<!DOCTYPE html><html><head><title>'.$_REQUEST['title'].'</title><meta charset="utf-8"></head><body>';
		$html .= $_REQUEST['content'];
		$html .= '</body></html>';
		fwrite($file, $html);
		echo '<h1>Preview van je bewerking bestand:</h1><hr>'.$_REQUEST['content'].'<hr>';
	} else {
		echo  '<h1>niet alle velden zijn correct ingevuld<h1>';
	}

?>