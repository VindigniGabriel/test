<script>
import { Bar } from "./BaseCharts";
import { reactiveProp } from "./mixins";
import numeral from "numeral";

export default {
  extends: Bar,
  mixins: [reactiveProp],
  data: () => ({
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              callback: value => numeral(value).format()
            },
          }
        ]
      },
      tooltips: {
        callbacks: {
          label(tooltipItem, data) {
            const label = data.datasets[tooltipItem.datasetIndex].label;
            const value = numeral(tooltipItem.yLabel).format();

            return `${label}: ${value}`;
          }
        }
      }
    }
  }),
  mounted() {
    this.renderChart(this.chartData, this.options);
  }
};
</script>