<?php 
// Start the session if not already started
session_start();

// Include configuration
include_once('config.php');

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destroy the session
session_destroy();

// Output JavaScript to clear localStorage and redirect
echo "
<!DOCTYPE html>
<html>
<head>
    <title>Logging Out...</title>
</head>
<body>
    <script>
        // Clear all localStorage data
        localStorage.clear();
        
        // Double check specific cart data is removed
        localStorage.removeItem('cartItems');
        
        // Redirect to login page
        window.location.href = 'login.php';
    </script>
</body>
</html>
";

// Fallback redirect if JavaScript is disabled
header("Location: login.php");
exit();
?>