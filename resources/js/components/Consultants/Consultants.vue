<template>
  <div>
    <b-row class="text-center">
      <b-col cols="12" lg="8" class="mb-5">
        <b-row align-h="center">
          <b-col cols="12">
            <ConsultantsList />
          </b-col>
        </b-row>
      </b-col>
      <b-col cols="12" lg="4" align-self="start">
        <DateRange />
        <ButtonsOptions />
      </b-col>
    </b-row>
    <b-row class="text-center">
      <b-col cols="12" class="mb-5">
        <Report v-if="view == 'report' && !hidden" />
        <Chart v-if="view == 'chart' && !hidden" />
        <Pie v-if="view == 'pie' && !hidden" />
      </b-col>
    </b-row>
  </div>
</template>

<script>
import ConsultantsList from "./ConsultantsList/ConsultantsList";
import DateRange from "../OptionsFilters/DateRange";
import ButtonsOptions from "../OptionsFilters/ButtonsOptions";
import Report from "../Results/Report";
import Chart from "../Results/Chart";
import Pie from "../Results/Pie";
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      hidden: true
    };
  },
  components: {
    ConsultantsList,
    DateRange,
    ButtonsOptions,
    Report,
    Chart,
    Pie
  },
  computed: {
    ...mapGetters(["getFilters", "getConsultansList"]),
    ...mapActions(["loadingConsultans", "getResult"]),
    view: state => {
      return state.getFilters.url;
    }
  },
  watch: {
    getFilters: function(get) {
      if (
        get.url !== "" &&
        get.dateOne !== "" &&
        get.dateTwo !== "" &&
        get.consultantsListSelected.length > 0
      ) {
        this.hidden = false;
        this.$store.dispatch("getResult", get);
      } else {
        this.hidden = true;
      }
    }
  },
  methods: {},
  mounted() {
    this.loadingConsultans;
  }
};
</script>