<?php
require_once("./../config/config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("./../index.php");
}
 if($_SESSION["rolecode"]!="DOC"){
    die("You dont have the permission to access this page");
 }



 include './../header.php';

 
?>

<link rel="stylesheet" href= "./../css/home.css">
<link rel="stylesheet" href= "./../css/style.css">

<div class="containers">
    <h1>Review And Comments</h1><br>
<div class="form-container">



    <form action="#">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="customer">Customer</label><br>
                        <textarea readonly>Mr. Perera</textarea>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label >Claim ID</label><br>
                        <textarea readonly>001</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="date">Admit Date</label><br>
                        <textarea readonly>23.04.2019</textarea>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label >ICU from Date</label><br>
                        <textarea readonly>28.04.2019</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label >Discharge Date</label><br>
                        <textarea readonly>24.04.2019</textarea>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label >ICU to Date</label><br>
                        <textarea readonly>26.04.2019</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label >Hospital</label><br>
                        <textarea readonly>Asiri</textarea>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label >condition</label><br>
                        <textarea ></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="row">
                        <div class="column">
                        <lable>DOC1</lable>
                        </div>
                        <div class="column">
                        <button type="button">viewFile</button>
                        </div>
                    </div>
                    <div class="row">
                        <lable>DOC2</lable>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label>Doctor's Comment</label><br>
                        <textarea ></textarea><br>
                    </div>
                </div>

                <button type="button">submit</button>

            </div>

           



    </form>
</div>
</div>