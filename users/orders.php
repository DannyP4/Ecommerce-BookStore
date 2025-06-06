<?php require "../includes/header.php"; ?>  
<?php require "../config/config.php"; ?> 

<?php 
    if (!isset($_SESSION['username'])) {
          header("Location: ".APPURL."");
    }

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
    
        if($id !== (int)$_SESSION['user_id']) {
            header("location: ".APPURL."");
            exit;
        }
    }

    $select = $conn->query("SELECT * FROM orders WHERE user_id = '$_SESSION[user_id]'");
    $select->execute();

    $orders = $select->fetchAll(PDO::FETCH_OBJ);
?>

      <div class="row mt-5" style="margin-bottom: 220px">
        <div class="col">
            <?php if(count($orders) > 0) : ?>
            <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach($orders as $order) : ?>
                  <tr>
                    <th scope="row"><?php echo $order->id; ?></th>
                    <td><?php echo $order->username; ?></td>
                    <td><?php echo $order->email; ?></td> 
                    <td><?php echo $order->fname; ?></td> 
                    <td><?php echo $order->lname; ?></td> 
                    <td><?php echo 'completed'; ?></td> 
                  </tr>
                <?php endforeach; ?>  
                </tbody>
              </table> 
            </div>
          </div>
            <?php else: ?>
                <div class="alert alert-success text-white bg-success">
                No orders found.
                </div>
            <?php endif; ?>
        </div>
      </div>

<?php require "../includes/footer.php"; ?>  
