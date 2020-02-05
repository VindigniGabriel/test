<template>
  <b-row align-h="around">
    <b-col cols="4" v-for="(btn, idx) in buttons" :key="idx">
      <b-button variant="outline-info" @click="activeButton" :id="btn.option">
        <b-icon :icon="btn.icon"></b-icon>
        <b-spinner small type="grow" v-show="buttonSelect == btn.option"></b-spinner>
        <br />
        {{btn.caption}}
      </b-button>
    </b-col>
  </b-row>
</template>

<script>
import { mapMutations, mapGetters } from "vuex";
export default {
  data() {
    return {
      buttonSelect: "",
      buttons: [
        { caption: "Relatório", option: "report", icon: "table" },
        { caption: "Gráfico", option: "chart", icon: "graph-up" },
        { caption: "Pizza", option: "pie", icon: "pie-chart" }
      ]
    };
  },
  computed: {
    ...mapGetters(["getFilters"]),
    select: state => state.buttonSelect
  },
  watch: {
    getFilters: function(get) {
      if (
        get.url !== "" &&
        get.dateOne !== "" &&
        get.dateTwo !== "" &&
        get.consultantsListSelected.length > 0
      ) {
        this.buttonSelect = get.url;
      } else {
        this.buttonSelect = null;
      }
    }
  },
  methods: {
    ...mapMutations(["setButtonsOptions"]),
    activeButton(e) {
      this.setButtonsOptions(e.target.id);
    }
  }
};
</script>