<?php

if (!empty($_GET)) : ?>
  <?php
  $starting_amount = isset($_GET['starting_amount']) ? $_GET['starting_amount'] : '';
  $additional_contribution = isset($_GET['additional_contribution']) ? $_GET['additional_contribution'] : '';
  $frequency = isset($_GET['frequency']) ? $_GET['frequency'] : '';
  $return_rate = isset($_GET['return_rate']) ? $_GET['return_rate'] : '';
  $years = isset($_GET['years']) ? $_GET['years'] : '';
  $total_interest_dataset = [];
  $total_contributions_dataset = [];
  $starting_amount_dataset = [];
  $years_label = [];
  $results_table = [];
  $year_count = date("Y");
  $yearly_rate = ($return_rate / 100) / $frequency;
  $multiplier = 1 + $yearly_rate;
  $multiplier = pow($multiplier, $frequency);
  $balance = $starting_amount;
  $total_contribution = 0;
  $total_interest = 0;

  for ($i = 0; $i < $years; $i++) {
    $obj = [];
    $annual_contribution = $additional_contribution * $frequency;
    $annual_interest = 0;
    $interest = $balance * $multiplier;
    $interest = $interest - $balance;
    $contribution_multiplier = $multiplier - 1;
    $contribution_multiplier = $contribution_multiplier / $yearly_rate;
    $contribution_interest = $additional_contribution * $contribution_multiplier;
    $contribution_interest = $contribution_interest - $annual_contribution;
    $annual_interest += ($interest + $contribution_interest);
    $annual_interest = round($annual_interest, 0);
    $total_interest += $annual_interest;
    $total_contribution += $annual_contribution;
    $balance += $annual_contribution + $annual_interest;
    $obj['year'] = $year_count;
    $obj['starting_amount'] = $starting_amount;
    $obj['annual_contribution'] = $annual_contribution;
    $obj['annual_interest'] = $annual_interest;
    $obj['total_contribution'] = $total_contribution;
    $obj['total_interest'] = $total_interest;
    $obj['balance'] = $balance;
    $years_label[] = $year_count;
    $starting_amount_dataset[] = $starting_amount;
    $total_contributions_dataset[] = $total_contribution;
    $total_interest_dataset[] = str_replace(',', '', $total_interest);
    $results_table[] = $obj;
    $year_count++;
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    wp_enqueue_style("investmentu-compound-interest-calculator-get-results-style", get_stylesheet_directory_uri() . "/dist/styles/compound-interest-calculator-get-results.css");
    ?>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-sm text-center">
          <h2 class="h1">This investment will be worth: $<?php echo number_format($balance, 0); ?></h2>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <h3>Investment Growth Over Time</h3>
          <canvas id="bar-chart"></canvas>
        </div>

        <div class="col-sm-6">
          <h3>Investment Balance at Year <?php echo $year_count - 1; ?></h3>
          <canvas id="pie-chart"></canvas>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-12">
          <table class="table table-sm">
            <thead class="thead-light">
              <tr>
                <th scope="col">Year</th>
                <th scope="col">Starting Amount</th>
                <th scope="col">Annual Contribution</th>
                <th scope="col">Total Contribution</th>
                <th scope="col">Interest Earned</th>
                <th scope="col">Total Interest Earned</th>
                <th scope="col">End Balance</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($results_table as $result) : ?>
                <tr>
                  <td><?php echo $result['year']; ?></td>
                  <td><?php echo '$' . number_format($result['starting_amount'], 0); ?></td>
                  <td><?php echo '$' . number_format($result['annual_contribution'], 0); ?></td>
                  <td><?php echo '$' . number_format($result['total_contribution'], 0); ?></td>
                  <td><?php echo '$' . number_format($result['annual_interest'], 0); ?></td>
                  <td><?php echo '$' . number_format($result['total_interest'], 0); ?></td>
                  <td><?php echo '$' . number_format($result['balance'], 0); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php
    wp_enqueue_script('chart.js', 'https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js', null, true)
    ?>

    <script>
      (function() {
        // Stacked Bar Chart
        var ctxBar = document.getElementById('bar-chart');
        var barChart = new Chart(ctxBar, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($years_label); ?>,
            datasets: [{
                label: 'Starting Amount',
                data: <?php echo json_encode($starting_amount_dataset); ?>,
                backgroundColor: '#2d4d76' // dark blue
              },
              {
                label: 'Total Contributions',
                data: <?php echo json_encode($total_contributions_dataset); ?>,
                backgroundColor: '#7098cc' // light blue
              },
              {
                label: 'Total Interest Earned',
                data: <?php echo json_encode($total_interest_dataset); ?>,
                backgroundColor: '#c1c9d4' // light gray
              }
            ]
          },
          options: {
            scales: {
              xAxes: [{
                stacked: true
              }],
              yAxes: [{
                stacked: true
              }]
            },
            tooltips: {
              mode: 'index',
              intersect: false,
              callbacks: {
                label: function(tooltipItems, data) {
                  return data.datasets[tooltipItems.datasetIndex].label + ": $" + tooltipItems.yLabel.toLocaleString();
                }
              }
            }
          }
        });
        // Pie Chart
        var ctxPie = document.getElementById('pie-chart');
        var pieChart = new Chart(ctxPie, {
          type: 'pie',
          data: {
            labels: [
              'Starting Amount: $<?php echo number_format($starting_amount, 0); ?>',
              'Total Contribuitions: $<?php echo number_format($total_contribution, 0); ?>',
              'Total Interest Earned: $<?php echo number_format($total_interest, 0); ?>'
            ],
            datasets: [{
              data: [
                <?php echo $starting_amount; ?>,
                <?php echo $total_contribution; ?>,
                <?php echo $total_interest; ?>,
              ],
              backgroundColor: ['#2d4d76', '#7098cc', '#c1c9d4']
            }]
          },
          options: {
            tooltips: {
              callbacks: {
                label: function(tooltipItems, data) {
                  return data.labels[tooltipItems.index];
                }
              }
            }
          }
        });
      })();
    </script>
  </body>

  </html>
<?php endif; ?>
