            <div class="table-responsive" align="center">
                <h1>Orders</h1>

                <table class="table table-striped" style="text-align: center;">
                    <th>Ip</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Single Unit Price</th>
                    <th>Total Price</th>
                    <th>Delete</th>
              <?php
                                $ip = getIp();
                                $total = 0;
                                $sel_price = "select * from cart where ip_add = '$ip'";
                                $run_price = mysqli_query($con,$sel_price);
                                while($cart_row = mysqli_fetch_array($run_price)){
                                    $pro_id = $cart_row['p_id'];
                                    $pro_qty = $cart_row['qty'];
                                    $pro_price = "select * from products where pro_id = '$pro_id'";
                                    $run_pro_price = mysqli_query($con, $pro_price);
                                    while ($pro_row = mysqli_fetch_array($run_pro_price)){
                                        $pro_title = $pro_row['pro_title'];
                                        $pro_image = $pro_row['pro_image'];
                                        $pro_price = $pro_row['pro_price'];
                                        $pro_price_all_items = $pro_price * $pro_qty;
                                        $total += $pro_price_all_items;
                                        ?>
                                        <tr align="center">
                                            <td><?php echo getIp();?></td>
                                            <td><?php echo $pro_title; ?> <br>
                                                <img src="product_images/<?php echo $pro_image; ?>"
                                                     width="60" height="60">
                                            </td>
                                            <td><label><?php echo $pro_qty;?></label>
                                                <input name="product_id[]" type="hidden" value="<?php echo $pro_id;?>">
                                            </td>
                                            <td><?php echo "Rs " . $pro_price . "/-"; ?></td>
                                            <td><?php echo "Rs " . $pro_price_all_items . "/-"; ?></td>
                                            <td><a href='deleteorder.php?delete=<?php echo $pro_id ?>'><input class="btn btn-default" type="button" value="Delete" style="background-color: red"></a></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                            <tr align="right">
                                <td colspan="4"><b>Sub Total:</b></td>
                                <td><?php echo "Rs ".$total."/-"; ?></td>
                            </tr>
                            </table>
                            </div>