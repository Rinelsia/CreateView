<?php 

const DIR = __DIR__;

require_once DIR.'\createView\CreateView.php';

// функция разбора адреса, простенькая для проверки

function parseUrl (){
	$url = ($_SERVER["REQUEST_URI"] === "/")? "str1": ($_SERVER["REQUEST_URI"]);
	return $url;
}


// получаем адрес из адресной строки
$url = ltrim(parseUrl(),'/');

var_dump($url);
// 
$txt = 'Это переменная текста. Сюда будет добавляться текст $img_1 в места где ставятся картьинка и видео $video_1';
// 
$img = "<img href='/img/1.jpg'> Pltcm lj,fdkztncz rfhnbyrf";
$video = 'здесь находится само видео!!!';

//массив, форма передачи данных обработчику создания html
$a = array(
		'index' => '/view/site.php',
		'str' => [
			'$str'=>'/view/str1.php'
		],
		'text'=> [
				'$text' => $txt,
				'$img_1'=> $img,
				'$video_1' => $video
		]
	);
$b = array(
		'index'=>'/view/site.php',
		'str'=> [
			'$str'=>'/view/str2.php',
		],
		'text'=>[
			'$text'=>'ля ля ля, все это бляя'
		]
	);

$a_arr = array(
		'str1'=>$a,
		'str2'=>$b
	);
// var_dump($a_arr[$url]);

$view = new CreateView;
$view->$arr_view = $a_arr[$url];


// запуск создания html файла
$result = $view->func_2();

// var_dump($result);
echo "<p style='color:red'>Это отображение эхо</p> $result";
 ?>