<?php
		$pdo = new PDO('mysql:host=localhost;dbname=bienes_alca', 'root', '');
		$pdo->query("INSERT INTO tab_ubica(NOMBRE_UBI) VALUES ('prueba')");
		