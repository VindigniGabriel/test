<template>
  <div class="ex-lib">
    <vue-select-sides
      type="mirror"
      v-model="selected"
      :list="list"
      lang="en_EN"
      placeholder-search-left="List of consultants..."
      placeholder-search-right="Selected consultants..."
    ></vue-select-sides>
  </div>
</template>

<script>
import vueSelectSides from "vue-select-sides";
import { mapMutations, mapGetters, mapState } from "vuex";

export default {
  components: {
    vueSelectSides
  },
  data() {
    return {
      selected: []
    };
  },
  computed: {
    list: state => {
      return state.getConsultansList()
    }
  },
  watch: {
    selected: function(val) {
      this.setConsultantsListSelected(val);
    }
  },
  methods: {
    ...mapGetters(["getConsultansList"]),
    ...mapMutations(["setConsultantsListSelected"])
  }
};
</script>