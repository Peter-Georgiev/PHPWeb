<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/united/bootstrap.css">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>
        </div>
    </nav>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <fieldset>
                    <legend>Legend</legend>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">First name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="first_name" placeholder="First name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Last name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Phone number</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="phone_number" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="texArea" class="col-lg-2 control-label">Cities</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="city" id="city">
                                <?php foreach ($cities as $value) : ?>
                                    <option value="<?= $value["id"]; ?>"><?= $value["city"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="texArea" class="col-lg-2 control-label">Avatar</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default" name="cancel">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
