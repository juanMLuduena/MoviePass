<?php 
 include('header.php');
 include('nav-bar.php');
?>
<!-- ################################################################################################ -->
<div class="wrapper row2 bgded" style="background-image:url('../images/demo/backgrounds/1.png');">
  <div class="overlay">
    <div id="breadcrumb" class="clear"> 
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Add</a></li>
        <li><a href="#">List - Remove</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 15%;">Code</th>
              <th style="width: 30%;">Brand</th>
              <th style="width: 30%;">Model</th>
              <th style="width: 15%;">Price</th>
              <th style="width: 10%;">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          foreach( $cr->getAll() as $values)
          {
            ?>
            <tr>
            <form action="<?php echo FRONT_ROOT ?>Cellphone/remove" method="POST">
                <td><?php echo  $values->getCode(); ?></td>
                <td><?php echo  $values->getBrand(); ?></td>
                <td><?php echo  $values->getModel(); ?></td>
                <td><?php echo  $values->getPrice(); ?></td>
               
               <td><input type="text" value=" <?php echo  $values->getId(); ?>" name="id"></td> 
                <td>
                  <button type="submit" class="btn"> Remove </button>
                </td>
                
                </form>
              </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
  include('footer.php');
?>