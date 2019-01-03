<?php

//require_once 'init.php';

//$input = isset($_GET['name']) ? $_GET['name'] : 'world';

//$input = $request->get('name', 'world');
//$response->setContent(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));

?>

Hello <?php echo htmlspecialchars(isset($name) ? $name : 'World', ENT_QUOTES, 'UTF-8') ?>




