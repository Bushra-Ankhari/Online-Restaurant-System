<?php
session_start();
$con=mysqli_connect("localhost","root","","food_order");
if(mysqli_connect_error())
{
    echo "<script>
    alert('cannot connect to database');
    window.location.href='mycart.php';
    </script>";
    exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
       $query1= "INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Email`, `Address`, `Pay_Mode`) VALUES  ('$_POST[full_name]','$_POST[phone_no]','$_POST[email]','$_POST[address]','$_POST[pay_mode]')";

        if(mysqli_query($con,$query1))
        {
            echo "done";
            $Order_Id=mysqli_insert_id($con);
            $query2="INSERT INTO `user_orders`(`Order_Id`, `Item_Name`, `Price`, `Quantity`, `status`) VALUES (?,?,?,?,?)";
         
            $stmt=mysqli_prepare($con,$query2);
            if($stmt){
                mysqli_stmt_bind_param($stmt,"isiis",$Order_Id,$Item_Name,$Price,$Quantity,$status);
                foreach($_SESSION['cart'] as $key => $values)
                {
                   
                    $Item_Name=$values['Item_Name'];
                    $Price=$values['Price'];
                    $Quantity=$values['Quantity'];
                    // $order_date=date("Y-m-d h:i:sa");
                    $status="Ordered";
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                alert('Order Placed');
                window.location.href='foods.php';
                </script>";

            }
            else{
                echo "<script>
                alert('SQL query prepared ERROR to database');
                window.location.href='mycart.php';
                </script>";
            }
        }
        else{
            echo "<script>
    alert('SQL ERROR to database');
    window.location.href='mycart.php';
    </script>";
        }
    }
}
?>