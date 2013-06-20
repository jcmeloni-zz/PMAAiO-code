<?php
include("ch20_include.php");
doDB();

if ((!$_POST) || ($_GET['master_id'] != "")) {
    //haven't seen the form, so show it
    $display_block = "
    <form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\">";

    if (isset($_GET['master_id'])) {
        //create safe version of ID
        $safe_id = mysqli_real_escape_string($mysqli, $_GET['master_id']);

        //get first, last names for display/tests validity
        $get_names_sql = "SELECT concat_ws(' ', f_name, l_name) AS display_name
                          FROM master_name WHERE id = '".$safe_id."'";
        $get_names_res = mysqli_query($mysqli, $get_names_sql)
                         or die(mysqli_error($mysqli));

        if (mysqli_num_rows($get_names_res) == 1) {
            while ($name_info = mysqli_fetch_array($get_names_res)) {
                $display_name = stripslashes($name_info['display_name']);
            }
        }
    }

    if (isset($display_name)) {
        $display_block .= "<p>Adding information for
        <strong>$display_name</strong>:</p>";
    } else {
        $display_block .= <<<END_OF_TEXT
        <fieldset>
        <legend>First/Last Names:</legend><br/>
        <input type="text" name="f_name" size="30"
             maxlength="75" required="required" />
        <input type="text" name="l_name" size="30"
             maxlength="75" required="required" />
        </fieldset>
END_OF_TEXT;
    }
    $display_block .= <<<END_OF_TEXT
    <p><label for="address">Street Address:</label><br/>
 	<input type="text" id="address" name="address" size="30" /></p>

	<fieldset>
	<legend>City/State/Zip:</legend><br/>
	<input type="text" name="city" size="30" maxlength="50" />
	<input type="text" name="state" size="5" maxlength="2" />
	<input type="text" name="zipcode" size="10" maxlength="10" />
	</fieldset>

	<fieldset>
	<legend>Address Type:</legend><br/>
	<input type="radio" id="add_type_h" name="add_type" value="home" checked />
	    <label for="add_type_h">home</label>
	<input type="radio" id="add_type_w" name="add_type" value="work" />
	    <label for="add_type_w">work</label>
	<input type="radio" id="add_type_o" name="add_type" value="other" />
	    <label for="add_type_o">other</label>
	</fieldset>

	<fieldset>
	<legend>Telephone Number:</legend><br/>
	<input type="text" name="tel_number" size="30" maxlength="25" />
	<input type="radio" id="tel_type_h" name="tel_type" value="home" checked />
	    <label for="tel_type_h">home</label>
	<input type="radio" id="tel_type_w" name="tel_type" value="work" />
	    <label for="tel_type_w">work</label>
	<input type="radio" id="tel_type_o" name="tel_type" value="other" />
	    <label for="tel_type_o">other</label>
	</fieldset>

	<fieldset>
	<legend>Fax Number:</legend><br/>
	<input type="text" name="fax_number" size="30" maxlength="25" />
	<input type="radio" id="fax_type_h" name="fax_type" value="home" checked />
	    <label for="fax_type_h">home</label>
	<input type="radio" id="fax_type_w" name="fax_type" value="work" />
	    <label for="fax_type_w">work</label>
	<input type="radio" id="fax_type_o" name="fax_type" value="other" />
	    <label for="fax_type_o">other</label>
	</fieldset>

	<fieldset>
	<legend>Email Address:</legend><br/>
	<input type="email" name="email" size="30" maxlength="150" />
	<input type="radio" id="email_type_h" name="email_type" value="home" checked />
	    <label for="email_type_h">home</label>
	<input type="radio" id="email_type_w" name="email_type" value="work" />
	    <label for="email_type_w">work</label>
	<input type="radio" id="email_type_o" name="email_type" value="other" />
	    <label for="email_type_o">other</label>
	</fieldset>

	<p><label for="note">Personal Note:</label><br/>
	<textarea id="note" name="note" cols="35" rows="3"></textarea></p>
END_OF_TEXT;

    if ($_GET) {
        $display_block .= "<input type=\"hidden\" name=\"master_id\"
           value=\"".$_GET['master_id']."\">";
    }

	$display_block .= <<<END_OF_TEXT
	<button type="submit" name="submit" value="send">Add Entry</button>
	</form>
END_OF_TEXT;

} else if ($_POST) {
	//time to add to tables, so check for required fields
	if ((($_POST['f_name'] == "") || ($_POST['l_name'] == "")) &&
	(!isset($_POST['master_id']))) {
		header("Location: addentry.php");
		exit;
	}

	//connect to database
	doDB();

	//create clean versions of input strings
	$safe_f_name = mysqli_real_escape_string($mysqli, $_POST['f_name']);
	$safe_l_name = mysqli_real_escape_string($mysqli, $_POST['l_name']);
	$safe_address = mysqli_real_escape_string($mysqli, $_POST['address']);
	$safe_city = mysqli_real_escape_string($mysqli, $_POST['city']);
	$safe_state = mysqli_real_escape_string($mysqli, $_POST['state']);
	$safe_zipcode = mysqli_real_escape_string($mysqli, $_POST['zipcode']);
	$safe_tel_number = mysqli_real_escape_string($mysqli, $_POST['tel_number']);
	$safe_fax_number = mysqli_real_escape_string($mysqli, $_POST['fax_number']);
	$safe_email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$safe_note = mysqli_real_escape_string($mysqli, $_POST['note']);


    if (!$_POST['master_id']) {
        //add to master_name table
        $add_master_sql = "INSERT INTO master_name (date_added, date_modified,
                           f_name, l_name) VALUES (now(), now(),
                           '".$safe_f_name."', '".$safe_l_name."')";
        $add_master_res = mysqli_query($mysqli, $add_master_sql)
                          or die(mysqli_error($mysqli));

        //get master_id for use with other tables
        $master_id = mysqli_insert_id($mysqli);
    } else {
        $master_id = mysqli_real_escape_string($mysqli, $_POST['master_id']);
    }

	if (($_POST['address']) || ($_POST['city']) || ($_POST['state']) || ($_POST['zipcode'])) {
		//something relevant, so add to address table
		$add_address_sql = "INSERT INTO address (master_id, date_added, date_modified,
		                    address, city, state, zipcode, type)  VALUES ('".$master_id."',
		                    now(), now(), '".$safe_address."', '".$safe_city."',
		                    '".$safe_state."' , '".$safe_zipcode."' , '".$_POST['add_type']."')";
		$add_address_res = mysqli_query($mysqli, $add_address_sql) or die(mysqli_error($mysqli));
	}

	if ($_POST['tel_number']) {
		//something relevant, so add to telephone table
		$add_tel_sql = "INSERT INTO telephone (master_id, date_added, date_modified,
		                tel_number, type)  VALUES ('".$master_id."', now(), now(),
		                '".$safe_tel_number."', '".$_POST['tel_type']."')";
		$add_tel_res = mysqli_query($mysqli, $add_tel_sql) or die(mysqli_error($mysqli));
	}

	if ($_POST['fax_number']) {
		//something relevant, so add to fax table
		$add_fax_sql = "INSERT INTO fax (master_id, date_added, date_modified,
		                fax_number, type)  VALUES ('".$master_id."', now(), now(),
		                '".$safe_fax_number."', '".$_POST['fax_type']."')";
		$add_fax_res = mysqli_query($mysqli, $add_fax_sql) or die(mysqli_error($mysqli));
	}

	if ($_POST['email']) {
		//something relevant, so add to email table
		$add_email_sql = "INSERT INTO email (master_id, date_added, date_modified,
		                  email, type)  VALUES ('".$master_id."', now(), now(),
		                  '".$safe_email."', '".$_POST['email_type']."')";
		$add_email_res = mysqli_query($mysqli, $add_email_sql) or die(mysqli_error($mysqli));
	}

	if ($_POST['note']) {
		//something relevant, so add to notes table
        $add_notes_sql = "UPDATE personal_notes set note = '".$safe_note."',
                          date_modified = now() WHERE master_id = '".$master_id."'";
		$add_notes_res = mysqli_query($mysqli, $add_notes_sql) or die(mysqli_error($mysqli));
	}
	mysqli_close($mysqli);
	$display_block = "<p>Your entry has been added.  Would you like to <a href=\"addentry.php\">add another</a>?</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add an Entry</title>
</head>
<body>
<h1>Add an Entry</h1>
<?php echo $display_block; ?>
</body>
</html>