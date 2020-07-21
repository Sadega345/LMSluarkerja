var speedCanvas = $("#m_area_chart");

var dataFirst = {
  label: "Car A - Speed (mph)",
  data: [0, 59, 75, 20, 20, 55, 40],
  lineTension: 0,
  fill: false,
  borderColor: 'orange',
  backgroundColor: 'transparent',
  pointBorderColor: 'orange',
  pointBackgroundColor: 'rgba(255,150,0,0.5)',
  pointRadius: 5,
  pointHoverRadius: 10,
  pointHitRadius: 30,
  pointBorderWidth: 2,
  pointStyle: 'rectRounded'
  // Set More Options
};
   
var dataSecond = {
  label: "Car B - Speed (mph)",
  data: [20, 15, 60, 60, 65, 30, 70],
  borderColor: 'orange',
  lineTension: 0,
  fill: false,
  backgroundColor: 'transparent',
  pointBorderColor: 'orange',
  pointBackgroundColor: 'rgba(255,150,0,0.5)',
  pointRadius: 5,
  pointHoverRadius: 10,
  pointHitRadius: 30,
  pointBorderWidth: 2,
  pointStyle: 'rectRounded'
  // Set More Options
};
   
var speedData = {
  labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
  datasets: [dataFirst, dataSecond]
};


var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(speedCanvas, {
    type: 'line',
    data: speedData,
    options: chartOptions
});
