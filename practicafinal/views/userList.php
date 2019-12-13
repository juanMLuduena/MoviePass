
<html> 


<div >
    <div class="content"> 
      <div class="scrollable">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 15%;">Username</th>
              <th style="width: 30%;">Email</th>
              <th style="width: 30%;">Dni</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          foreach($userList as $values)
          {
            ?>
            <tr>
            <form action="<?php echo FRONT_ROOT ?>User/userProfile" method="POST">
                <td><?php echo  $values->getUsername(); ?></td>
                <td><?php echo  $values->getEmail(); ?></td>
                <td><?php echo  $values->getDni(); ?></td>               
               <input type="hidden" value=" <?php echo  $values->getId(); ?>" name="id" readonly>
                <td>
                  <button type="submit" class="btn"> Ver perfil </button>
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
</div>

<h3>    <a href="<?php echo FRONT_ROOT?>Home/Index">HOME</a>
</h3>