<template>
<b-container>
    <b-row class="my-1">
      <b-col sm="3" class="d-none d-sm-block">
        <label>Desde</label>
      </b-col>
      <b-col sm="9">
        <b-form-input type="month" size="sm" v-model="dateOne" min="2007-01" max="2007-12"></b-form-input>
      </b-col>
    </b-row>
    <b-row class="my-1">
      <b-col sm="3" class="d-none d-sm-block">
        <label>a</label>
      </b-col>
      <b-col sm="9">
        <b-form-input type="month" size="sm" v-model="dateTwo" min="2007-01" max="2007-12"></b-form-input>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import { mapMutations } from "vuex";
export default {
  data() {
    return {
      dateOne: "",
      dateTwo: ""
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