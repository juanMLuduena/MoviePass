<div class="content">
    <div class="scrollable">
        <table style="text-align:center;">
            <thead>
                <tr>
                    <th style="width: 15%;">Brand</th>
                    <th style="width: 20%;">Model</th>
                    <th style="width: 20%;">Plate</th>
                    <th style="width: 15%;">Year</th>
                    <th style="width: 15%;">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vehicleList as $values) {
                    ?>
                    <tr>
                        <form action="<?php echo FRONT_ROOT ?>Vehicle/deleteVehicle" method="POST">
                            <td><?php echo  $values->getBrand(); ?></td>
                            <td><?php echo  $values->getModel(); ?></td>
                            <td><?php echo  $values->getPlate(); ?></td>
                            <td><?php echo  $values->getYear(); ?></td>
                            <td><?php echo  $values->getEmail(); ?></td>


                            <td><input type="hidden" value=" <?php echo  $values->getId(); ?>" name="id"></td>
                            <td>
                                <button type="submit" class="btn"> Remove </button>
                            </td>

                        </form>
                        <form action="<?php echo FRONT_ROOT ?>Vehicle/modifyForm" method="POST">
                            <td><input type="hidden" value=" <?php echo  $values->getId(); ?>" name="id"></td>
                            <td>
                                <button type="submit" class="btn"> Modificar </button>
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<h3> <a href="<?php echo FRONT_ROOT ?>Home/Index">HOME</a>