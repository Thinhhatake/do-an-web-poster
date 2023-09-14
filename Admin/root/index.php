<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 320px;
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 450px;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>

<body>
<?php require '../connect.php';
$max_date = 7; //tong so ngay muon hien thi;
$sql = "SELECT DATE_FORMAT(create_as,'%e-%m') as 'ngay', 
SUM(total_price) as 'Doanh_Thu' FROM `orders` 
WHERE Date(create_as) >= curdate() - INTERVAL $max_date DAY
GROUP BY DATE_FORMAT(create_as,'%e-%m')
";
$result = mysqli_query($connect, $sql );
$arr = [];
$max_date = 7; //tong so ngay muon hien thi;
$today =  date('d'); //lay ra ngay hom nay;
if ($today < $max_date) {
    $get_day_last_month = $max_date - $today; // so ngay bat dau cua thang truoc 
    $last_month = date('m', strtotime("-1 month")); // lay ra thang truoc
    $last_month_date = date('Y-m-d', strtotime(" -1 month")); 
    $max_day_last_month = (new DateTime($last_month_date)) -> format('t'); //so ngay cua thang truoc
    $start_day_last_month = $max_day_last_month - $get_day_last_month;
    for ($i = $start_day_last_month; $i  <= $max_day_last_month; $i++) {
        $key =  $i . '-' . $last_month;
        $arr[$key] = 0;
    } 
    $start_date_this_month = 1; 
} else {
    $start_date_this_month = $today - $max_date;
}
$this_month = date('m'); // lay ra thang nay



for ($i = $start_date_this_month ; $i <= $today ; $i++) {
    $key =  $i . '-' . $this_month;
    $arr[$key] = 0;
}
foreach ($result as $each) {
   $arr[$each['ngay']] = (int) $each['Doanh_Thu']; 
}
$arrX = array_keys($arr);
$arrY = array_values($arr);

 ?>

<figure class="highcharts-figure">
  <div id="container"></div>
</figure>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
   // Data retrieved from https://fas.org/issues/nuclear-weapons/status-world-nuclear-forces/
Highcharts.chart('container', {
  chart: {
    type: 'area'
  },
  accessibility: {
    description: 'Image description: An area chart compares the nuclear stockpiles of the USA and the USSR/Russia between 1945 and 2017. The number of nuclear weapons is plotted on the Y-axis and the years on the X-axis. The chart is interactive, and the year-on-year stockpile levels can be traced for each country. The US has a stockpile of 6 nuclear weapons at the dawn of the nuclear age in 1945. This number has gradually increased to 369 by 1950 when the USSR enters the arms race with 6 weapons. At this point, the US starts to rapidly build its stockpile culminating in 32,040 warheads by 1966 compared to the USSR’s 7,089. From this peak in 1966, the US stockpile gradually decreases as the USSR’s stockpile expands. By 1978 the USSR has closed the nuclear gap at 25,393. The USSR stockpile continues to grow until it reaches a peak of 45,000 in 1986 compared to the US arsenal of 24,401. From 1986, the nuclear stockpiles of both countries start to fall. By 2000, the numbers have fallen to 10,577 and 21,000 for the US and Russia, respectively. The decreases continue until 2017 at which point the US holds 4,018 weapons compared to Russia’s 4,500.'
  },
  title: {
    text: 'Monthly Revenue Statistics'
  },
  
  xAxis: {
    allowDecimals: false,
    labels: {
      formatter: function () {
        return <?php echo json_encode($arrX); ?>// clean, unformatted number for year
      }
    },
    accessibility: {
      rangeDescription:'Range: 1940 to 2017.'
    }
  },
  yAxis: {
    title: {
      text: 'Sales Revenue'
    },
    labels: {
      formatter: function () {
        return this.value / 10000 + 'k';
      }
    }
  },
  tooltip: {
    pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
  },
  plotOptions: {
    area: {
      pointStart: 1940,
      marker: {
        enabled: false,
        symbol: 'circle',
        radius: 2,
        states: {
          hover: {
            enabled: true
          }
        }
      }
    }
  },
  series: [{
    name: 'Poster',
    data: [
        <?php echo json_encode($arrY); ?>
    ]
    }]
});
</script>
</body>
</html>
