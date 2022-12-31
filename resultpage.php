<?php
include('config/constants.php');
include('navbar.php');
session_start();

$div = $_SESSION["div_year"];
/*echo $div;*/

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);

$select_db = mysqli_select_db($conn, DB_NAME);


$resultdb = "SELECT * FROM candidate_f WHERE div_year='$div'";
$query = mysqli_query($conn, $resultdb);

$sql= "SELECT full_name FROM candidate_f  WHERE div_year = '$div' ORDER BY votes DESC";
$result= mysqli_query($conn, $sql);

/*
$vote_result = array();
if (mysqli_num_rows($query) > 0) {
    $sn=1;
    while ($row = mysqli_fetch_assoc($query)) {
        $a= $row['full_name'];

        $b= $row['votes'];

        $sn++;
    }
}else{
    echo "No Data Found";
}


$a_en= array();
$b_en= array();
while ($row = mysqli_fetch_assoc($query)) {
    $a_en[] = $row['full_name'];
    $b_en[]= $row['votes'];
}
$data1= json_encode($a_en);
$data2= json_encode($b_en);
echo $data1;
echo $data2;
*/


$a = array();
$b = array();
while ($row = mysqli_fetch_assoc($query)) {
    $a[] = $row['full_name'];
    $b[] = $row['votes'];
}
/*
echo '<pre>';
print_r($json_array);
echo '</pre>';*/

$data = json_encode($a);
$data1 = json_encode($b);
/*
echo $data;
echo $data1; */

/*
while ($row = mysqli_fetch_array($query)) {

    $full_name[]  = $row['full_name'];
    $votes[] = $row['votes'];
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="path-to/src/pluscharts.js"></script> -->
</head>
<style>
    .chartBox{
        text-align: center;
        margin-left: 40px;
        margin-right: auto;
        width: 50%;
        height: 60px;
        padding-top: 50px;

    }

    *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
  
    background: white( 71, 147, 227, 1);
}
h2{
    text-align: right;
    margin-right: 11%;
    font-size: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #000000;
    padding: 20px 10px;
}

/* Table Styles */

.table{
    
    margin: 10px 400px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.win-table {
    border-radius: 5px;
    font-size: 20px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 25%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
    position: absolute; 
    left: 900px;
   
}

.win-table td, .win-table th {
    text-align: 65% ;
    padding: 8px;
}

.win-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 20px;
}

.win-table thead th {
    color: #ffffff;
    background: #324960;
}


.win-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.win-table tr:nth-child(even) {
    background: #F8F8F8;
}

</style>

<body>

    <div class="chartBox">
        <canvas id="myChart"></canvas>
    </div>

    <script src="path/to/chartjs/dist/chart.js"></script>
    <script>
        const labels = <?php echo $data; ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Votes',
                data: <?php echo $data1; ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgb(204, 0, 102)'

                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(204, 0, 102)'

                ],
                borderWidth: 1,
                maxBarThickness:50
            }]
        };

        const config = {
            type: 'bar',
            data,
            options: {
                indexAxis: 'y',
            }
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

<h2>WINNER DISPLAY</h2>
<div class="table">
    <table class="win-table">
        <thead>
        <tr>
            <th>Winners</th>   
        </tr>
        </thead>
        <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $sn = 1;
                                        while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
        <tbody>
        <tr>
            <td>CR - <?php echo $data['full_name'] ?> </td>   
        </tr>
        <tr>
            <td>DCR - </td>
        </tr>
        <tr>
            <td>DCR - </td>   
        </tr>
        <tr>
            <td>DCR - </td>    
        </tr>
        <?php
                                                $sn++;
                                            }
                                        } else { ?>
                                                <tr>
                                                    <td colspan="23">No data found</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
    </table>
</div>


</body>


</html>