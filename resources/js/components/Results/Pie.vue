<template>
  <div>
    <Pie :chart-data="chart" />
  </div>
</template>

<script>
import Pie from "../chart/Pie";
import { mapGetters } from "vuex";
import numeral from "numeral";
export default {
  components: {
    Pie
  },
  data() {
    return {
      chart: {}
    };
  },
  computed: {
    ...mapGetters(["getConsultansReport"]),
    dataPoints: state => {
      return state.chart;
    }
  },
  watch: {
    getConsultansReport: function(val) {
      let labels = [];
      let data = [];
      let sum = 0;
      let chart = "";
      let color = ''
      let backgroundColor = [];
      val.forEach(e => {
        labels.push(Object.keys(e));
        sum += parseFloat(Object.values(e));
      });

      val.forEach(e => {
        color = this.dynamicColors();
        backgroundColor.push(color);
        data.push(parseFloat(Object.values(e)) / sum);
      });

      this.chart = {
        labels,
        datasets: [
          {
            backgroundColor,
            data
          }
        ]
      };
    }
  },
  methods: {
    dynamicColors() {
      var r = Math.floor(Math.random() * 255);
      var g = Math.floor(Math.random() * 255);
      var b = Math.floor(Math.random() * 255);
      return "rgb(" + r + "," + g + "," + b + ")";
    }
  }
};
</script>