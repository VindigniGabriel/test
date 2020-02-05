<script>
import { HorizontalBar } from './BaseCharts'
import { reactiveProp } from './mixins'

export default {
  extends: HorizontalBar,
  mixins: [reactiveProp],
  data: () => ({
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  }),
  mounted () {
    this.renderChart(this.chartData, this.options)
  }
}
</script>