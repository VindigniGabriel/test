import moment from "moment";

const state = {
    filters: {
        url: "",
        dateOne: "",
        dateTwo: "",
        consultantsListSelected: []
    },
    consultansList: [],
    consultansReport: []
}

const mutations = {
    setConsultantsListSelected(state, payload) {
        let selected = state.consultansList.filter(r => payload.includes(r.value)).map(c => c.id)
        let filters = state.filters
        filters.consultantsListSelected = selected
        state.filters = ""
        state.filters = filters
    },
    setButtonsOptions(state, payload) {
        let filters = state.filters
        filters.url = payload
        state.filters = ""
        state.filters = filters
    },
    setDateOne(state, payload) {
        let filters = state.filters
        filters.dateOne = moment(payload).format('YYYY-MM-DD')
        state.filters = ""
        state.filters = filters
    },
    setDateTwo(state, payload) {
        let filters = state.filters
        filters.dateTwo = moment(payload).endOf('month').format('YYYY-MM-DD')
        state.filters = ""
        state.filters = filters
    },
    setConsultansList(state, payload) {
        state.consultansList = payload
    },
    setConsultansReport(state, payload) {
        state.consultansReport = payload
    }
}

const actions = {
    async loadingConsultans({ commit }) {
        await axios.get('/api/consultans')
            .then(response => {
                commit('setConsultansList', response.data.data)
            })
            .catch(function (error) {
                console.log(error);
            });
    },

    async getResult(context) {
        let url = context.state.filters.url
        let dateOne = context.state.filters.dateOne
        let dateTwo = context.state.filters.dateTwo
        let consultans = context.state.filters.consultantsListSelected
        axios({
            method: 'post',
            url: `/api/consultans/${url}`,
            data: {
                dateOne,
                dateTwo,
                consultans
            }
        })
            .then(response => {
                    console.log(response.data)
                    context.commit('setConsultansReport', response.data)
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

}

const getters = {
        getFilters: state => {
            return state.filters
        },

        getConsultansList: state => {
            return state.consultansList
        },

        getConsultansReport: state => {
            return state.consultansReport
        }
    }

export default {
        state,
        mutations,
        actions,
        getters
    }