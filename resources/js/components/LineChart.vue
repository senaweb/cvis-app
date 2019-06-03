<template>
  <div class="chart">
    <canvas id="myChart" width="170" height="65"></canvas>
    <select name="chartType" id="chartType" @change="updateChartType">
      <option value="yearlyChart">Year</option>
      <option value="monthlyChart">Month</option>
      <option value="weeklyChart">Weekly</option>
      <option value="todayChart">Today</option>
    </select>
  </div>
</template>

<script>
import Chartjs from "../mixins/Chartjs";

export default {
  name: "line-chart",

  mixins: [Chartjs],

  mounted() {
    // Default chart defined with type: 'line'
    this.myChart();
    Chart.defaults.global.tooltips.enabled = false;
  }
};
</script>
