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
                                    <td><?php echo  $values->getBrand(); ?></td>
                                    <td><?php echo  $values->getModel(); ?></td>
                                    <td><?php echo  $values->getPlate(); ?></td>
                                    <td><?php echo  $values->getYear(); ?></td>
                                    <td><?php echo  $values->getEmail(); ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <h3>    <a href="<?php echo FRONT_ROOT?>Home/Index">HOME</a>
