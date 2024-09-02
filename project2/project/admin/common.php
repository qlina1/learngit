$conn = mysqli_connect('127.0.0.1', 'root' ,'root' , 'makeorder');
if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}
