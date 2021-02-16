<?php

require_once(dirname(__DIR__) . '/vendor/autoload.php');

use App\Error\ErrorService;

session_start(); ?>
<html lang="en">
<head>
    <title>Generate Promotional Codes Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row pt-5 pb-5 d-flex border">
        <div class="col-12 text-center ">
            <h2>Generate Promotional Codes Form</h2>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <form action="Scripts/CreateCodes.php" method="POST">
                <div class="row mb-1">
                    <div class="col-6">
                        Number of Codes:
                    </div>
                    <div class="col-6">
                        <label>
                            <input type="number" min="2" name="numberOfCodes">
                        </label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        Length Combination:
                    </div>
                    <div class="col-6">
                        <label>
                            <input type="number" min="4" max="62" name="lengthCombination">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" name="generateCodes" class="btn btn-primary">
                            Generate Codes
                        </button>
                    </div>
                </div>

            </form>
        </div>
        <div class="col">
            <?php
            if (!ErrorService::sessionHasErrorMessage()) {
                echo ErrorService::getSessionErrorMessage();
                session_destroy();
            }
            ?>
        </div>

    </div>
</div>


</body>
</html>