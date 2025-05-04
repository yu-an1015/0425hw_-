<html>
<head>
<meta charset='utf-8'>

<?php
$uName = $_POST["uName"];
$uEmail= $_POST["uEmail"];
$uPhoto = $_POST["uPhoto"];


// echo $uName;
// echo $uEmail;
// echo $uPhoto;

if( $uName == NULL || $uEmail == NULL || $uPhoto == NULL){  //輸入資料有空值，註冊失敗
    echo "註冊失敗，三秒後回到註冊頁面";
    header("Refresh:3;url='register.php'");
}
else{      //將註冊資料加入資料庫
    $link = @mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'sunghoon',       // 使用者名稱 
        '911208',  // 密碼
        'register');  // 預設使用的資料庫名稱
    
    $sql = "INSERT INTO info (name, email, photo) VALUES ('$uName', '$uEmail', '$uPhoto')";
    
    
    mysqli_set_charset($link, 'utf8');
    
    if(mysqli_query($link, $sql)){
        echo "<form id='autoForm' action='sendRegMail.php' method='post'>";
        echo "<input type='hidden' name='uName' value=$uName>";
        echo "<input type='hidden' name='uEmail' value=$uEmail>";
        echo "<input type='hidden' name='uPhoto' value=$uPhoto>";
        echo "</form>";
        echo '<script>document.getElementById("autoForm").submit();</script>';
        // header("Location:sendRegMail.php");
            
    }
    else{
        echo "註冊失敗，三秒後回到註冊頁面";
        header("Refresh:3;url='register.php'");
    }
}
?>


</html>