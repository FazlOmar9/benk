<?php
$cookieName = 'account_number';

if (isset($_COOKIE[$cookieName])) {
    $cookieValue = $_COOKIE[$cookieName];
    setcookie($cookieName, $cookieValue, time() - 3600, '/');
}

echo "<script>window.alert('Logged out successfully!')</script>";
echo "<script>window.location.href='../main_proj'</script>";
exit();
?>