<table class="form-table">
    <tr valign="top">
        <th scope="row"><label for="ShipStatus">Status</label></th>
        <td>
            <select id="ShipStatus" name="ship[Status]">
                <option value="Current Owner" <?php selected( "Current Owner", $meta['Status'][0] ); ?>>Current Owner</option>
                <option value="Previous Owner" <?php selected( "Previous Owner", $meta['Status'][0] ); ?>>Previous Owner</option>
                <option value="For Sale" <?php selected( "For Sale", $meta['Status'][0] ); ?>>For Sale</option>
            </select>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipPropulsion">Primary Propulsion</label></th>
        <td>
            <select id="ShipPropulsion" name="ship[Propulsion]">
                <option value="Sail" <?php selected( "Sail", $meta['Propulsion'][0] ); ?>>Sail</option>
                <option value="Power" <?php selected( "Power", $meta['Propulsion'][0] ); ?>>Power</option>
            </select>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipMake">Make</label></th>
        <td>
            <input type="text" id="ShipMake" name="ship[Make]" value="<?php echo esc_attr( $meta['Make'][0]); ?>"/>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipModel">Model</label></th>
        <td>
            <input type="text" id="ShipModel" name="ship[Model]"  value="<?php echo esc_attr( $meta['Model'][0]); ?>"/>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipDesigner">Designer</label></th>
        <td>
            <input type="text" id="ShipDesigner" name="ship[Designer]"  value="<?php echo esc_attr( $meta['Designer'][0]); ?>"/>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipBuilder">Builder</label></th>
        <td>
            <input type="text" id="ShipBuilder" name="ship[Builder]"  value="<?php echo esc_attr( $meta['Builder'][0]); ?>"/>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipBuildLocation">Build Location</label></th>
        <td>
            <input type="text" id="ShipBuildLocation" name="ship[BuildLocation]" value="<?php echo esc_attr( $meta['BuildLocation'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipYearBuilt">Year Built</label></th>
        <td>
            <input type="text" id="ShipYearBuilt" name="ship[YearBuilt]" value="<?php echo esc_attr( $meta['YearBuilt'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipYearPurchased">Year Purchased</label></th>
        <td>
            <input type="text" id="ShipYearPurchased" name="ship[YearPurchased]" value="<?php echo esc_attr( $meta['YearPurchased'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipSerialNumber">Serial Number</label></th>
        <td>
            <input type="text" id="ShipSerialNumber" name="ship[SerialNumber]"  value="<?php echo esc_attr( $meta['SerialNumber'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipHullColor">Hull Color</label></th>
        <td>
            <input type="text" id="ShipHullColor" name="ship[HullColor]" value="<?php echo esc_attr( $meta['HullColor'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipLOA">LOA (Length)</label></th>
        <td>
            <input type="text" id="ShipLOA" name="ship[LOA]" value="<?php echo esc_attr( $meta['LOA'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipDraft">Draft</label></th>
        <td>
            <input type="text" id="ShipDraft" name="ship[Draft]" value="<?php echo esc_attr( $meta['Draft'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipVerticalClearance">Vertical Clearance</label></th>
        <td>
            <input type="text" id="ShipVerticalClearance" name="ship[VerticalClearance]" value="<?php echo esc_attr( $meta['VerticalClearance'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipDisplacement">Displacement (lbs)</label></th>
        <td>
            <input type="text" id="ShipDisplacement" name="ship[Displacement]" value="<?php echo esc_attr( $meta['Displacement'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipWaterTank">Water Tank (gallons)</label></th>
        <td>
            <input type="text" id="ShipWaterTank" name="ship[WaterTank]" value="<?php echo esc_attr( $meta['WaterTank'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipFuelTank">Fuel Tank (gallons)</label></th>
        <td>
            <input type="text" id="ShipFuelTank" name="ship[FuelTank]" value="<?php echo esc_attr( $meta['FuelTank'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipFuelType">Fuel Type</label></th>
        <td>
            <select id="ShipFuelType" name="ship[FuelType]">
                <option value="Gas" <?php selected( "Gas", $meta['FuelType'][0] ); ?>>Gas</option>
                <option value="Diesel" <?php selected( "Diesel", $meta['FuelType'][0] ); ?>>Diesel</option>
                <option value="Natural Gas" <?php selected( "Natural Gas", $meta['FuelType'][0] ); ?>>Natural Gas</option>
                <option value="Electric" <?php selected( "Electric", $meta['FuelType'][0] ); ?>>Electric</option>
                <option value="Other" <?php selected( "Other", $meta['FuelType'][0] ); ?>>Other</option>
            </select>
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipEngine">Engine(s)</label></th>
        <td>
            <input type="text" id="ShipEngine" name="ship[Engine]" value="<?php echo esc_attr( $meta['Engine'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipAuxPower">Auxilary Power</label></th>
        <td>
            <input type="text" id="ShipAuxPower" name="ship[AuxPower]" value="<?php echo esc_attr( $meta['AuxPower'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipSailInventory">Sail Inventory</label></th>
        <td>
            <input type="text" id="ShipSailInventory" name="ship[SailInventory]" value="<?php echo esc_attr( $meta['SailInventory'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipOtherEquipment">Other Equipment</label></th>
        <td>
            <input type="text" id="ShipOtherEquipment" name="ship[OtherEquipment]" value="<?php echo esc_attr( $meta['OtherEquipment'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipRadioCallSign">Radio Call Sign</label></th>
        <td>
            <input type="text" id="ShipRadioCallSign" name="ship[RadioCallSign]" value="<?php echo esc_attr( $meta['RadioCallSign'][0]); ?>" />
        </td>
    </tr>
    
    <tr valign="top">
        <th scope="row"><label for="ShipInsurance">Insurance</label></th>
        <td>
            <input type="text" id="ShipInsurance" name="ship[Insurance]" value="<?php echo esc_attr( $meta['Insurance'][0]); ?>" />
        </td>
    </tr>
</table>