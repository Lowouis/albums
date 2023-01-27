<?php

function view($vue, $tbData=array()){
		if(!empty($tbData)) {
			extract($tbData);
		}
		include("views/".$vue.".php");
}
	
function redirect($ctrl, $action, $param=[]){
	header("Location: ".router\url($ctrl, $action, $param));
}

?>