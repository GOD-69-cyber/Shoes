<?php
session_start(); // Начинаем сессию
session_unset(); // Очищаем все данные сессии
session_destroy(); // Уничтожаем сессию

// Перенаправляем на главную страницу
header("Location: index.php");
exit(); // Завершаем выполнение скрипта
?>