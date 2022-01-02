 <?php
// установка соединения
$conn_id = ftp_connect($ftp_server); 

// вход с именем пользователя и паролем
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

// проверка соединения
if ((!$conn_id) || (!$login_result)) { 
        echo "Не удалось установить соединение с FTP сервером!";
        echo "Попытка подключения к серверу $ftp_server под именем $ftp_user_name!";
        exit; 
    } else {
        echo "Установлено соединение с FTP сервером $ftp_server под именем $ftp_user_name";
    }

// закачивание файла
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

// проверка результата
if (!$upload) { 
        echo "Не удалось закачать файл!";
    } else {
        echo "Файл $source_file закачен на $ftp_server под именем $destination_file";
    }

// закрытие соединения
ftp_close($conn_id); 
?> 
