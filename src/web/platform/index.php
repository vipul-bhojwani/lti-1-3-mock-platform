<?php
require_once __DIR__ . '/../../db/example_database.php';
?>
<ul>
    <li>Fancy LMS</li>
    <li>Users</li>
    <li>Learn LTI</li>
        <li class="sub"><a href = 'launchTool.php'>C# 101</a></li>

    <li>Settings</li>
</ul>
<iframe id="frame" style="width:1200px; height:600px" >

</iframe>
<style>
ul {
    position:absolute;
    left:0;
    top:0;
    width:200px;
    bottom:0;
    background-color:darkslategray;
    color: white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 28px;
    font-weight: bold;
    margin:0;
    list-style-type: none;
}
li {
    padding-top: 26px;

}
li.sub {
    padding-left:26px;
    font-size: 24px;
}
iframe {
    position: absolute;
    margin-left: 250px;
}
</style>