<script>
import { Pie } from "./BaseCharts";
import { reactiveProp } from "./mixins";
import numeral from "numeral";

export default {
  extends: Pie,
  mixins: [reactiveProp],
  data: () => ({
    options: {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        callbacks: {
          label(tooltipItem, data) {
            console.log()
            const label = data.labels[tooltipItem.index];
            const value = numeral(data.datasets[0].data[tooltipItem.index]).format('0.00%');

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