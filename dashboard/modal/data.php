


    <!-- Other input fields for patient summary -->



    <table align="center" style="background:#FFFFFF; margin-left:25px; margin-right:10px;" id="medicine-options">
        <?php
        if (!empty($drug_form)) {
            for ($i = 0; $i < count($drug_form); $i++) {
                echo "<tr>
                        <td>Drug Form:</td>
                        <td><input type='text' name='drug_form[]' value='" . htmlspecialchars($drug_form[$i]) . "'></td>
                        <td>Drug Name:</td>
                        <td><input type='text' name='drug_name[]' value='" . htmlspecialchars($drug_name[$i]) . "'></td>
                        <td>Frequency:</td>
                        <td><input type='text' name='frequency[]' value='" . htmlspecialchars($frequency[$i]) . "'></td>
                        <td>How to Take:</td>
                        <td><input type='text' name='how_to_take[]' value='" . htmlspecialchars($how_to_take[$i]) . "'></td>
                        <td>No. of Days:</td>
                        <td><input type='text' name='no_of_days[]' value='" . htmlspecialchars($no_of_days[$i]) . "'></td>
                    </tr>";
            }
        } else {
            echo "<tr>
                    <td>Drug Form:</td>
                    <td><input type='text' name='drug_form[]'></td>
                    <td>Drug Name:</td>
                    <td><input type='text' name='drug_name[]'></td>
                    <td>Frequency:</td>
                    <td><input type='text' name='frequency[]'></td>
                    <td>How to Take:</td>
                    <td><input type='text' name='how_to_take[]'></td>
                    <td>No. of Days:</td>
                    <td><input type='text' name='no_of_days[]'></td>
                </tr>";
        }
        ?>
    </table>
    <div align="center">
        <button type="button" class="styled-button-2" onclick="addMedicine()">Add Medicine</button>
        <button type="button" class="styled-button-2" onclick="removeMedicine()">Remove Medicine</button>
    </div>

    <!-- Other input fields for patient summary -->
    <div align="center">
        <input type="submit" class="styled-button-2" value="Save Treatment">
    </div>
</form>
</body>
</html>
