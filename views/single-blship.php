
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

                    <tr valign="top">
                        <th scope="row"><label for="ShipStatus">Status</label></th>
                        <td>
                            <?php echo $meta['Status'][0]; ?>
                                
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipPropulsion">Primary Propulsion</label></th>
                        <td>
                            <?php echo $meta['Propulsion'][0]; ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipMake">Make</label></th>
                        <td>
                            <?php echo ($meta['Make'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipModel">Model</label></th>
                        <td>
                            <?php echo ($meta['Model'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipDesigner">Designer</label></th>
                        <td>
                            <?php echo ($meta['Designer'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipBuilder">Builder</label></th>
                        <td>
                            <?php echo ($meta['Builder'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipBuildLocation">Build Location</label></th>
                        <td>
                            <?php echo ($meta['BuildLocation'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipYearBuilt">Year Built</label></th>
                        <td>
                            <?php echo ($meta['YearBuilt'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipYearPurchased">Year Purchased</label></th>
                        <td>
                            <?php echo ($meta['YearPurchased'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipSerialNumber">Serial Number</label></th>
                        <td>
                            <?php echo ($meta['SerialNumber'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipHullColor">Hull Color</label></th>
                        <td>
                            <?php echo ($meta['HullColor'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipLOA">LOA (Length)</label></th>
                        <td>
                            <?php echo ($meta['LOA'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipDraft">Draft</label></th>
                        <td>
                            <?php echo ($meta['Draft'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipVerticalClearance">Vertical Clearance</label></th>
                        <td>
                            <?php echo ($meta['VerticalClearance'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipDisplacement">Displacement (lbs)</label></th>
                        <td>
                            <?php echo ($meta['Displacement'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipWaterTank">Water Tank (gallons)</label></th>
                        <td>
                            <?php echo ($meta['WaterTank'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipFuelTank">Fuel Tank (gallons)</label></th>
                        <td>
                            <?php echo ($meta['FuelTank'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipFuelType">Fuel Type</label></th>
                        <td>
                            <?php echo $meta['FuelType'][0]; ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipEngine">Engine(s)</label></th>
                        <td>
                            <?php echo ($meta['Engine'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipAuxPower">Auxilary Power</label></th>
                        <td>
                            <?php echo ($meta['AuxPower'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipSailInventory">Sail Inventory</label></th>
                        <td>
                            <?php echo ($meta['SailInventory'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipOtherEquipment">Other Equipment</label></th>
                        <td>
                           <?php echo ($meta['OtherEquipment'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipRadioCallSign">Radio Call Sign</label></th>
                        <td>
                            <?php echo ($meta['RadioCallSign'][0]); ?>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="ShipInsurance">Insurance</label></th>
                        <td>
                            <?php echo ($meta['Insurance'][0]); ?>
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