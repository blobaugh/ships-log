
<?php get_header(); ?>

<div id="ships-log-entry"> 

    <table>


        <!-- START SHIP LOG ENTRY HEADER -->
        <tr>
            <td>&nbsp;</td>
            <td class="ships-log-td-pad" id="ships-log-entry-head">
                <h2 id="ships-log-title"><?php echo get_the_title(); ?></h2>

                <span class="ships-log-meta">
                    Log date: <?php echo date('Y-m-d', strtotime($post->post_date)); ?> for ship 
                    <a href="<?php echo get_permalink($ship->ID); ?>"><?php echo $meta['ShipName']; ?></a>
                </span>
            </td>
        </tr>

        <!-- END SHIP LOG ENTRY HEADER -->



        <tr>
            <td width="35%" valign="top">
                <!-- START LEFT PANEL - SHIP DETAILS -->
                <table id="ship-info" width="100%">

                    <!-- TRIP PURPOSE -->
                    <tr valign="top">
                        <th scope="row"><label for="LogTripPurpose">Trip Purpose</label></th>
                        <td><?php echo $meta['TripPurpose'][0]; ?></td>
                    </tr>

                    <!-- ENTRY DATE -->
                    <tr valign="top">
                        <th scope="row"><label for="LogEntryDate">Entry Date</label></th>
                        <td>
                            <?php echo ($meta['EntryDate'][0]); ?>
                        </td>
                    </tr>


                    <!-- DEPARTURE TIME -->
                    <tr valign="top">
                        <th scope="row"><label for="LogDepartureTime">Departure Time</label></th>
                        <td>
                            <?php echo ($meta['DepartureTime'][0]); ?>
                        </td>
                    </tr>


                    <!-- ESTIMATED ARRIVAL TIME -->
                    <tr valign="top">
                        <th scope="row"><label for="LogEstimatedArrival">Estimated Arrival Time</label></th>
                        <td>
                            <?php echo ($meta['EstimatedArrivalTime'][0]); ?>
                        </td>
                    </tr>


                    <!-- ACTUAL ARRIVAL TIME -->
                    <tr valign="top">
                        <th scope="row"><label for="LogActualArrival">Actual Arrival Time</label></th>
                        <td>
                            <?php echo ($meta['ActualArrivalTime'][0]); ?>
                        </td>
                    </tr>


                    <!-- DISTANCE TRAVELED -->
                    <tr valign="top">
                        <th scope="row"><label for="LogDistanceTraveled">Distance Traveled</label></th>
                        <td>
                            <?php echo ($meta['DistanceTraveled'][0]); ?>
                        </td>
                    </tr>


                    <!-- ROUTE -->
                    <tr valign="top">
                        <th scope="row"><label for="LogRoute">Route</label></th>
                        <td>
                            <?php echo ($meta['Route'][0]); ?>
                        </td>
                    </tr>


                    <!-- SKIPPER -->
                    <tr valign="top">
                        <th scope="row"><label for="LogSkipper">Skipper</label></th>
                        <td>
                            <?php echo ($meta['Skipper'][0]); ?>
                        </td>
                    </tr>


                    <!-- CREW -->
                    <tr valign="top">
                        <th scope="row"><label for="LogCrew">Crew</label></th>
                        <td>
                            <?php echo ($meta['Crew'][0]); ?>
                        </td>
                    </tr>


                    <!-- GUESTS -->
                    <tr valign="top">
                        <th scope="row"><label for="LogGuests">Guests</label></th>
                        <td>
                            <?php echo ($meta['Guests'][0]); ?>
                        </td>
                    </tr>


                    <!-- WEATHER FORECAST -->
                    <tr valign="top">
                        <th scope="row"><label for="LogWeatherForecast">Weather Forecast</label></th>
                        <td>
                            <?php echo ($meta['WeatherForecast'][0]); ?>
                        </td>
                    </tr>


                    <!-- WEATHER OBSERVED -->
                    <tr valign="top">
                        <th scope="row"><label for="LogWeatherObserved">Weather Observed</label></th>
                        <td>
                            <?php echo ($meta['WeatherObserved'][0]); ?>
                        </td>
                    </tr>


                    <!-- FOOD CONSUMED -->
                    <tr valign="top">
                        <th scope="row"><label for="LogFoodConsumed">Food Consumed</label></th>
                        <td>
                            <?php echo ($meta['FoodConsumed'][0]); ?>
                        </td>
                    </tr>


                    <!-- PEOPLE MET -->
                    <tr valign="top">
                        <th scope="row"><label for="LogPeopleMet">People Met</label></th>
                        <td>
                            <?php echo ($meta['PeopleMet'][0]); ?>
                        </td>
                    </tr>


                    <!-- AVERAGE MOTOR RPMS -->
                    <tr valign="top">
                        <th scope="row"><label for="LogAverageMotorRpms">Average Motor RPMs</label></th>
                        <td>
                            <?php echo ($meta['AverageMotorRpms'][0]); ?>
                        </td>
                    </tr>


                    <!-- FUEL INTAKE -->
                    <tr valign="top">
                        <th scope="row"><label for="LogFuelIntake">Fuel Intake</label></th>
                        <td>
                            <?php echo ($meta['FuelIntake'][0]); ?>
                        </td>
                    </tr>


                    <!-- FUEL Used -->
                    <tr valign="top">
                        <th scope="row"><label for="LogFuelUsed">Fuel Used</label></th>
                        <td>
                            <?php echo ($meta['FuelUsed'][0]); ?>
                        </td>
                    </tr>


                    <!-- WATER INTAKE -->
                    <tr valign="top">
                        <th scope="row"><label for="LogWaterIntake">Water Intake</label></th>
                        <td>
                            <?php echo ($meta['WaterIntake'][0]); ?>
                        </td>
                    </tr>


                    <!-- WATER USED -->
                    <tr valign="top">
                        <th scope="row"><label for="LogWaterUsed">Water Used</label></th>
                        <td>
                            <?php echo ($meta['WaterUsed'][0]); ?>
                        </td>
                    </tr>




                </table>

                <!-- END LEFT PANEL - SHIP DETAILS -->
            </td>


            <!-- START RIGHT PANEL - LOG ENTRY -->
            <td class="ships-log-td-pad" valign="top">
                <?php
                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail();
                }
                echo apply_filters('the_content', $post->post_content);
                ?>
            </td>
            <!-- END RIGHT PANEL - LOG ENTRY -->
        </tr>

    </table>
</div>

<?php get_footer(); ?>