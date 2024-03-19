<?php require_once '../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once '../components/head.php'; ?>
</head>

<body>

    <?php require_once '../components/header.php'; ?>


    <?php 
            require_once '../../../config/conn.php';
            $query = "SELECT * FROM meldingen WHERE id = :id";
            $statement = $conn->prepare($query);
            $statement->execute([
                ':id' => $_GET['id'],
            ]);
            $melding = $statement->fetch(PDO::FETCH_ASSOC);

        ?>
        
    <div class="container">
        <h1>Update melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php?action=edit" method="POST">
            <input type="text" value="<?php echo $_GET['id']; ?>" name="id" style="display: none;"> </input>
            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input" value="<?php echo $melding['attractie']; ?>">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                    <select name="type" id="type">
                        <option value=""> - kies een type - </option>
                        <option value="achtbaan"<?php if($melding['type'] == "achtbaan") {echo "selected";} ?>>Achtbaan</option>
                        <option value="draaiende"<?php if($melding['type'] == "draaiende") {echo "selected";} ?>>Draaiende attractie</option>
                        <option value="kinderattractie" <?php if($melding['type'] == "kinderattractie") {echo "selected";} ?>>Kinderattractie</option>
                        <option value="restaurant" <?php if($melding['type'] == "restaurant") {echo "selected";} ?>>Restaurant, cafe, etc.</option>
                        <option value="parkshow" <?php if($melding['type'] == "parkshow") {echo "selected";} ?>>Parkshow</option>
                        <option value="waterattractie"<?php if($melding['type'] == "waterattractie") {echo "selected";} ?>>Waterattractie</option>
                        <option value="overig"<?php if($melding['type'] == "overig") {echo "selected";} ?>>Overig</option>
                    </select>
                <!-- hier komt een dropdown -->
            </div> <?php if($melding['type'] == "achtbaan") {echo "selected";} ?>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input" value="<?php echo $melding['capaciteit']; ?>">
            </div>
            <div class="form-group">
                <label for="prioriteit">Prio</label>
                <input type="checkbox" name="prioriteit" id="prioriteit" <?php if($melding['prioriteit']){echo "checked";} ?>>
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input" value="<?php echo $melding['melder']; ?>">
            </div>
            <div class="form-group">
                <label for="overig">Overige info</label>
                <textarea name="overig"id="overig"class="form-input"rows="4"><?php echo $melding['overige_info']; ?> </textarea>
            </div>
            

            <input type="submit" value="Update melding">
        </form>
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php?action=delete" method="POST">
            <input type="text" value="<?php echo $_GET['id']; ?>" name="id" style="display: none;">
            <input type="submit" value="Delete melding"> <!-- de button om de melding te verwijderen -->
        </form>
    </div>


</body>

</html>
