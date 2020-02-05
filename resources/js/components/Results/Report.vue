<template>
  <div>
    <b-card
      :header="report.name"
      header-tag="header"
      v-for="(report, idx) in getConsultansReport"
      :key="idx"
      class="mt-2"
    >
      <b-card-text>
        <b-table small responsive hover :items="report.data">
          <template v-slot:cell(Receita_Líquida)="data">
            <b>{{ formatCurrency(data.value) }}</b>
          </template>
          <template v-slot:cell(Custo_Fixo)="data">
            <b>{{ formatCurrency(data.value) }}</b>
          </template>
          <template v-slot:cell(Comissão)="data">
            <b>{{ formatCurrency(data.value) }}</b>
          </template>
          <template v-slot:cell(Lucro)="data">
            <b class="text-info">{{ formatCurrency(data.value) }}</b>
          </template>
        </b-table>
      </b-card-text>
    </b-card>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import numeral from "numeral";
export default {
  computed: {
    ...mapGetters(["getConsultansReport"])
  },
  methods: {
    formatCurrency($amount) {
      return numeral($amount).format();
    }
  }
};
</script>