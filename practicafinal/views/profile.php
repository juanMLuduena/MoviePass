<div class="content">
    <div class="scrollable">
        <table style="text-align:center;">
            <thead>
                <tr>
                    <th style="width: 30%;">Username</th>
                    <th style="width: 35%;">Email</th>
                    <th style="width: 30%;">Dni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                ?>
                <tr>
                    <td><?php echo  $user->getUsername(); ?></td>
                    <td><?php echo  $user->getEmail(); ?></td>
                    <td><?php echo  $user->getDni(); ?></td>
                    <td>
                        <a href="<?php echo FRONT_ROOT ?>User/showUsers">Volver</a>
                    </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<h3> <a href="<?php echo FRONT_ROOT ?>Home/Index">HOME</a>