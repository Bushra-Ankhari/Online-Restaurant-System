<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Address</th>
      <th scope="col">Pay_Mode</th>
      <th scope="col">Orders</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $query="SELECT * FROM `order_manager`";
      $user_result=mysqli_query($con,$query);
      while($user_fetch=mysqli_fetch_assoc($user_result))
      {
        echo"
        <tr>
        <th>$user_fetch[Order_Id]</th>
        <td>$user_fetch[Full_Name]</td>
        <td>$uer_fetch[Phone_No]</td>
        <td>$user_fetch[Address]</td>
        <td>$user_fetch[Pay_Mode]</td>
        <td>
        <table class='table text-center'>
         <thead>
           <tr>
           <th scope='col'>Item_Name</th>
           <th scope='col'>Price</th>
           <th scope='col'>Quantity</th>
           </tr>
         </thead>
         <tbody>
         ";
         $order_query="SELECT * FROM `user_orders` WHERE 'Order_Id'=$user_fetch[Order_Id]";
         $order_result=mysqli_query($con,$order_query);
         while($order_fetch=mysqli_fetch_assoc($order_result))
         {
             echo"
             <tr>
             <td>$order_fetch[Item_Name]</td>
             <td>$order_fetch[Price]</td>
             <td>$order_fetch[Quantity]</td>
             </tr>
             ";
         }
         echo"
         </tbody>
         </table>
        </td>
      </tr> 
        ";
      }
      ?>
    
  </tbody>
</table>
        </div>
    </div>
</div>