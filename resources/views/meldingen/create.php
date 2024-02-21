<?php require_once '../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once '../components/head.php'; ?>
</head>

<body>

    <?php require_once '../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">

            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type="text" name="attractie" id="attractie" class="form-input">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                    <select name="type" id="type">
                        <option value=""> - kies een type - </option>
                        <option value="achtbaan">Achtbaan</option>
                        <option value="draaiende">Draaiende attractie</option>
                        <option value="kinderattractie">kinderattractie</option>
                        <option value="restaurant">Restaurant, cafe, etc.</option>
                        <option value="parkshow">Parkshow</option>
                        <option value="waterattractie">Waterattractie</option>
                        <option value="overig">Overig</option>
                    </select>
                <!-- hier komt een dropdown -->
            </div>
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="prioriteit">Prio</label>
                <input type="checkbox" name="prioriteit" id="prioriteit">
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <div class="form-group">
                <label for="melder">Naam melder:</label>
                <input type="text" name="melder" id="melder" class="form-input">
            </div>
            <div class="form-group">
                <label for="overig">Overige info</label>
                <textarea name="overig"id="overig"class="form-input"rows="4"> </textarea>
            </div>
            

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>
