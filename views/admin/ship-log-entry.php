<table class="form-table">

<!-- SHIPS MENU -->
 <tr valign="top">
        <th scope="row"><label for="ShipId">Ship</label></th>
        <td>
            <select id="ShipId" name="log[ShipId]">
                <?php
                foreach( $ships AS $s ) {
                    $selected = selected( $meta['ShipId'][0], $s->ID, false );
                    echo "\n<option value='$s->ID' $selected>$s->post_title</option>";
                }
                ?>
            </select>
        </td>
</tr>


<!-- TRIP PURPOSE -->
 <tr valign="top">
        <th scope="row"><label for="LogTripPurpose">Trip Purpose</label></th>
        <td>
            <select id="LogTripPurpose" name="log[TripPurpose]">
                <option value="Day Sail" <?php selected( "Day Sail", $meta['TripPurpose'][0] ); ?>>Day Sail</option>
                <option value="Trip" <?php selected( "Trip", $meta['TripPurpose'][0] ); ?>>Trip</option>
                <option value="Refuel" <?php selected( "Refuel", $meta['TripPurpose'][0] ); ?>>Refuel</option>
                <option value="Equipment Test" <?php selected( "Equipment Test", $meta['TripPurpose'][0] ); ?>>Equipment Test</option>
            </select>
        </td>
</tr>

<!-- ENTRY DATE -->
<!-- <tr valign="top">
        <th scope="row"><label for="LogEntryDate">Entry Date</label></th>
        <td>
            <input type="text" id="LogEntryDate" name="log[EntryDate]" value="<?php echo esc_attr( $meta['EntryDate'][0]); ?>"/>
        </td>
</tr>
-->

<!-- DEPARTURE TIME -->
 <tr valign="top">
        <th scope="row"><label for="LogDepartureTime">Departure Time</label></th>
        <td>
            <input type="text" id="LogDepartureTime" name="log[DepartureTime]" value="<?php echo esc_attr( $meta['DepartureTime'][0]); ?>"/>
        </td>
</tr>


<!-- ESTIMATED ARRIVAL TIME -->
 <tr valign="top">
        <th scope="row"><label for="LogEstimatedArrival">Estimated Arrival Time</label></th>
        <td>
            <input type="text" id="LogEstimatedArrival" name="log[EstimatedArrivalTime]" value="<?php echo esc_attr( $meta['EstimatedArrivalTime'][0]); ?>"/>
        </td>
</tr>


<!-- ACTUAL ARRIVAL TIME -->
 <tr valign="top">
        <th scope="row"><label for="LogActualArrival">Actual Arrival Time</label></th>
        <td>
            <input type="text" id="LogActualArrival" name="log[ActualArrivalTime]" value="<?php echo esc_attr( $meta['ActualArrivalTime'][0]); ?>"/>
        </td>
</tr>


<!-- DISTANCE TRAVELED -->
 <tr valign="top">
        <th scope="row"><label for="LogDistanceTraveled">Distance Traveled</label></th>
        <td>
            <input type="text" id="LogDistanceTraveled" name="log[DistanceTraveled]" value="<?php echo esc_attr( $meta['DistanceTraveled'][0]); ?>"/>
        </td>
</tr>


<!-- ROUTE -->
 <tr valign="top">
        <th scope="row"><label for="LogRoute">Route</label></th>
        <td>
            <input type="text" id="LogRoute" name="log[Route]" value="<?php echo esc_attr( $meta['Route'][0]); ?>"/>
        </td>
</tr>


<!-- SKIPPER -->
 <tr valign="top">
        <th scope="row"><label for="LogSkipper">Skipper</label></th>
        <td>
            <input type="text" id="LogSkipper" name="log[Skipper]" value="<?php echo esc_attr( $meta['Skipper'][0]); ?>"/>
        </td>
</tr>


<!-- CREW -->
 <tr valign="top">
        <th scope="row"><label for="LogCrew">Crew</label></th>
        <td>
            <input type="text" id="LogCrew" name="log[Crew]" value="<?php echo esc_attr( $meta['Crew'][0]); ?>"/>
        </td>
</tr>


<!-- GUESTS -->
 <tr valign="top">
        <th scope="row"><label for="LogGuests">Guests</label></th>
        <td>
            <input type="text" id="LogGuests" name="log[Guests]" value="<?php echo esc_attr( $meta['Guests'][0]); ?>"/>
        </td>
</tr>


<!-- WEATHER FORECAST -->
 <tr valign="top">
        <th scope="row"><label for="LogWeatherForecast">Weather Forecast</label></th>
        <td>
            <input type="text" id="LogWeatherForecast" name="log[WeatherForecast]" value="<?php echo esc_attr( $meta['WeatherForecast'][0]); ?>"/>
        </td>
</tr>


<!-- WEATHER OBSERVED -->
 <tr valign="top">
        <th scope="row"><label for="LogWeatherObserved">Weather Observed</label></th>
        <td>
            <input type="text" id="LogWeatherObserved" name="log[WeatherObserved]" value="<?php echo esc_attr( $meta['WeatherObserved'][0]); ?>"/>
        </td>
</tr>


<!-- FOOD CONSUMED -->
 <tr valign="top">
        <th scope="row"><label for="LogFoodConsumed">Food Consumed</label></th>
        <td>
            <input type="text" id="LogFoodConsumed" name="log[FoodConsumed]" value="<?php echo esc_attr( $meta['FoodConsumed'][0]); ?>"/>
        </td>
</tr>


<!-- PEOPLE MET -->
 <tr valign="top">
        <th scope="row"><label for="LogPeopleMet">People Met</label></th>
        <td>
            <input type="text" id="LogPeopleMet" name="log[PeopleMet]" value="<?php echo esc_attr( $meta['PeopleMet'][0]); ?>"/>
        </td>
</tr>


<!-- AVERAGE MOTOR RPMS -->
 <tr valign="top">
        <th scope="row"><label for="LogAverageMotorRpms">Average Motor RPMs</label></th>
        <td>
            <input type="text" id="LogAverageMotorRpms" name="log[AverageMotorRpms]" value="<?php echo esc_attr( $meta['AverageMotorRpms'][0]); ?>"/>
        </td>
</tr>


<!-- FUEL INTAKE -->
 <tr valign="top">
        <th scope="row"><label for="LogFuelIntake">Fuel Intake</label></th>
        <td>
            <input type="text" id="LogFuelIntake" name="log[FuelIntake]" value="<?php echo esc_attr( $meta['FuelIntake'][0]); ?>"/>
        </td>
</tr>


<!-- FUEL Used -->
 <tr valign="top">
        <th scope="row"><label for="LogFuelUsed">Fuel Used</label></th>
        <td>
            <input type="text" id="LogFuelUsed" name="log[FuelUsed]" value="<?php echo esc_attr( $meta['FuelUsed'][0]); ?>"/>
        </td>
</tr>


<!-- WATER INTAKE -->
 <tr valign="top">
        <th scope="row"><label for="LogWaterIntake">Water Intake</label></th>
        <td>
            <input type="text" id="LogWaterIntake" name="log[WaterIntake]" value="<?php echo esc_attr( $meta['WaterIntake'][0]); ?>"/>
        </td>
</tr>


<!-- WATER USED -->
 <tr valign="top">
        <th scope="row"><label for="LogWaterUsed">Water Used</label></th>
        <td>
            <input type="text" id="LogWaterUsed" name="log[WaterUsed]" value="<?php echo esc_attr( $meta['WaterUsed'][0]); ?>"/>
        </td>
</tr>




</table>
