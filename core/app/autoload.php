<?php
// autoload.php
// esta funcion elimina el hecho de estar agregando los modelos manualmente


function my_autoload($modelname){
	if(Model::exists($modelname)){
		include Model::getFullPath($modelname);
	}

}

spl_autoload_register("my_autoload")



?>
