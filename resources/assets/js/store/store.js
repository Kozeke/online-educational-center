import Vuex from "vuex";
import Vue from "vue";
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    cources: "",
    students: "",
    teachers: "",
    students_s: "",
    teachers_s: "",
    teachers_t: ""
  },

  getters: {
    // Here we will create a getter
  },

  mutations: {
    getCources(state, search_text) {
      console.log("getCources");
      axios
        .get("/api/public/cources", {
          params: {
            search_text: search_text ? search_text : ""
          }
        })
        .then(response => {
          // this.showSchedule = true;
          state.cources = response.data;

          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },
    getData(state) {
      console.log("getData");
      axios
        .get("/api/public/getData", {})
        .then(response => {
          // this.showSchedule = true;
          state.students = response.data[1];
          state.teachers = response.data[0];
          console.log(state.students);
          console.log("success");
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },
    addCource(state, data) {
      axios
        .post("/api/public/addCource", data)
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    getStudents(state, data) {
      let searching = data[0];
      let selected_teacher = data[1];
      axios
        .get("/api/public/students", {
          params: {
            search_text: searching ? searching : "",
            selected_teacher: selected_teacher ? selected_teacher : ""
          }
        })
        .then(response => {
          state.students_s = response.data[0];
          state.teachers_s = response.data[1];
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },
    download(state) {
      axios
        .get("/api/public/excel", {})
        .then(response => {
          console.log(response);
        })
        .catch(e => {
          console.log(e);
        });
    },
    getTeachers(state, data) {
      axios
        .get("/api/public/teachers", {
          params: {
            onlyBusy: data
          }
        })
        .then(response => {
          console.log(response);
          state.teachers_t = response.data;
        })
        .catch(e => {
          console.log(e);
        });
    }
  },

  actions: {
    getCources({ commit }, search_text) {
      commit("getCources", search_text);
    },
    getData(context) {
      context.commit("getData");
    },
    addCource({ commit }, data) {
      commit("addCource", data);
    },
    getStudents({ commit }, data) {
      commit("getStudents", data);
    },
    download({ commit }) {
      commit("download");
    },
    getTeachers({ commit }, data) {
      commit("getTeachers", data);
    }
  }
});
