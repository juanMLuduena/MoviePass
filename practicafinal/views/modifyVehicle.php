<form action="<?php echo FRONT_ROOT ?>Vehicle/modifyVehicle" method="post">
    <label for="brand">
        <h5>Brand</h5>
    </label>
    <input type="text" name="brand"  value="<?php echo $vehicle->getBrand(); ?>" required>

    <label for="model">
        <h5>Model</h5>
    </label>
    <input type="text" name="model"  value="<?php echo $vehicle->getModel(); ?>" required>

    <label for="plate">
        <h5>Plate</h5>
    </label>
    <input type="text" name="plate"  value="<?php echo $vehicle->getPlate(); ?>" required>

    <label for="year">
        <h5>Year</h5>
    </label>
    <input type="number" name="year"  value="<?php echo $vehicle->getYear(); ?>" required>


    <label for="email">
        <h5>Email</h5>
    </label>
    <input name="email" type="email" value="<?php echo $vehicle->getEmail(); ?>" readonly>

    <input type="hidden" name="id" value="<?php echo $vehicle->getId(); ?>" required>


    <button name="submit" type="submit" >Modificar</button>
</form>
<h3> <a href="<?php echo FRONT_ROOT ?>Home/Index">HOME</a>