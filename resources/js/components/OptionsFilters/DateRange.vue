<template>
  <b-container>
    <b-row class="my-1">
      <b-col sm="3" class="d-none d-sm-block">
        <b-badge>From</b-badge>
      </b-col>
      <b-col sm="9">
        <div class="form-row">
          <date-picker v-model="dateOne" :config="options"></date-picker>
        </div>
      </b-col>
    </b-row>
    <b-row class="my-1">
      <b-col sm="3" class="d-none d-sm-block">
        <b-badge>To</b-badge>
      </b-col>
      <b-col sm="9">
        <div class="form-row">
          <date-picker v-model="dateTwo" :config="options"></date-picker>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import { mapMutations } from "vuex";
import "bootstrap/dist/css/bootstrap.css";
import datePicker from "vue-bootstrap-datetimepicker";
import "pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css";
import moment from "moment";
export default {
  components: {
    datePicker
  },
  data() {
    return {
      dateOne: "01/2007",
      dateTwo: "",
      options: {
        format: "MM/YYYY",
        viewMode: "months",
        minDate: "2007-01",
        maxDate: "2007-12"
      }
    };
  },
  methods: {
    ...mapMutations(["setDateOne", "setDateTwo"])
  },
  watch: {
    dateOne: function(val) {
      this.setDateOne(val);
    },
    dateTwo: function(val) {
      this.setDateTwo(val);
    }
  }
};
</script>