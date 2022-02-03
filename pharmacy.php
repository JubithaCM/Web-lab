<?php
$conn= mysqli_connect('localhost', 'root', '', 'pharmacy');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}
if(isset($_POST['add1'])) {
    $t=$_POST['quantity']*$_POST['unit'];
    $sql="insert into medicine(medcode,medname,quantity,unitprice,totalamount) values ('$_POST[id]','$_POST[iname]','$_POST[quantity]','$_POST[unit]','$t')";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    

}
?>
<html>
<head>
    <title>Pharmacy Billing </title>
    <style type="text/css">
      th {
        text-align: right;
    }
    span {
        color:  yellow;
    }
    input[type="text"],input[type="number"],textarea {
        width: 220px;
        height: 25px;
        border-radius: 5px;
    }
    
    input[type="submit"],input[type="reset"] {
        width: 100px;
        height: 35px;
        border-radius: 5px;
    }
    .row {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 20px;
    }
    .col-md-5 {
        grid-column: span 5;
    }
    .col-md-7 {
        grid-column: span 7;
    }

</style>
<script type="text/javascript">
    function validate() {        
        if(!document.form1.iname.value.match(/^[a-zA-Z][A-Za-z\s]*[a-zA-Z]$/)) {
            alert("Name should contain alphabets only!");
            document.form1.iname.focus();
            return false;
        } 
        
    }
</script>
</head>
<body >
    <div class="row">
        <div class="col-md-5" style="display: block;border-right: solid;border-width: 1px;">
            <form method="post" name="form1" action="" onsubmit="return(validate())">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">BILL</h1></th>
                    </tr>
                    <tr>
                        <th>Medicine code</th>
                        <td><input type="number" name="id" required></td>
                    </tr>
                    <tr>
                        <th>Medicine Name</th>
                        <td><input type="text" name="iname" required></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><input type="number" name="quantity" required></td>
                    </tr>
                    <tr>
                        <th>Unit price</th>
                        <td><input type="number" name="unit" required></td>
                    </tr>


                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="add1" style="background-color: green;">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-7" style="display: block;overflow-x: auto;">
            <table border='1' cellpadding="5px" cellspacing="5px"  align="center">
                <tr>
                    <th colspan="10"><h1 align="center">Bill Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from medicine";
                        $res= mysqli_query($conn, $sql);
                        ?> 
                                        
                    </th>
                </tr>
                <tr>
                    
                    <th>Medicine code</th>
                    <th> Medicine name</th>
                    <th>quantity</th>
                    <th>Unit price</th>
                    <th>Total</th>

                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $row['medcode']?></td>
                        <td><?php echo $row['medname']?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td><?php echo $row['unitprice']?></td>
                        <td><?php echo $row['totalamount']?></td>

                        
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    
</body>
</html>