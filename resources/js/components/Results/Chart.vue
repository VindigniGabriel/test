<template>
  <div class="Chart">
    <horizontal-bar :chart-data="dataPoints" />
  </div>
</template>

<script>
import moment, { months } from "moment";
import HorizontalBar from "../chart/Bar";
import { mapGetters } from "vuex";

moment.locale("pt-br");

const numeral = require("numeral");

numeral.register('locale', 'pt-br', {
    delimiters: {
        thousands: '.',
        decimal: ','
    },
    abbreviations: {
        thousand: 'mil',
        million: 'milhões',
        billion: 'b',
        trillion: 't'
    },
    ordinal: function (number) {
        return 'º';
    },
    currency: {
        symbol: 'R$ '
    }
});

numeral.locale('pt-br');

numeral.defaultFormat('$0,0.00');

export default {
  components: {
    HorizontalBar
  },
  computed: {
    ...mapGetters(["getConsultansReport", "getFilters"]),
    dataPoints: state => {
      return state.chart;
    }
  },
  data() {
    return {
      chart: {},
      test: [],
      month: []
    };
  },
  watch: {
    getConsultansReport: function(val) {
      let startDate = moment(this.getFilters.dateOne);
      let endDate = moment(this.getFilters.dateTwo);
      let labels = [];
      let months = [];
      let avg = 0;
      let consultans = {};
      let amount = [];
      let backgroundColor = "";
      let startingMoment = startDate;
      this.test = [];

      let avg_chart = new Array(endDate.diff(startDate, "months") + 1);
      labels.push(startingMoment.format("MMMM"));
      months.push(startingMoment.format("MM/YYYY"));
      while (endDate.diff(startingMoment, "months") > 0) {
        startingMoment.add(1, "months");
        labels.push(startingMoment.format("MMMM"));
        months.push(startingMoment.format("MM/YYYY"));
      }

      val.forEach(e => {
        if (e.data) {
          consultans = {};
          consultans = Object.assign(consultans, { label: e.label });
          amount = [];
          if (Object.keys(e.data).length) {
            months.forEach(month => {
              if (Object.keys(e.data).includes(month)) {
                amount.push(e.data[month]);
              } else {
                amount.push(0);
              }
            });
          }
          consultans = Object.assign(consultans, { data: amount });
          backgroundColor = this.dynamicColors();
          consultans = Object.assign(consultans, {
            borderColor: "blue",
            backgroundColor
          });
          this.test.push(consultans);
        } else {
          avg = e.avg;
        }
      });

      avg_chart.fill(avg);
      let med = {
        label: "Média",
        borderColor: "red",
        backgroundColor: "rgba(0,0,0,0)",
        type: "line",
        data: avg_chart
      };

      this.test.push(med);

      this.chart = {
        labels,
        datasets: this.test
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