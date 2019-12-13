<h2>Agregar Vehiculo</h2>
<form action="<?php echo FRONT_ROOT ?>Vehicle/addVehicle" method="post">
    <table>
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Plate</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td style="max-width: 100px;">
                <input type="text" name="brand" size="20" required>
                </td>
                <td>
                    <input type="text" name="model" size="20" required>
                </td>
                <td>
                    <input type="text" name="plate" size="20" required>
                </td>
                <td>
                <input type="number" name="year" min="1950" max="2100" size="30" required>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        <input type="submit" class="btn" value="Agregar"/>
    </div>
</form>
<h3>    <a href="<?php echo FRONT_ROOT?>Home/Index">HOME</a>

