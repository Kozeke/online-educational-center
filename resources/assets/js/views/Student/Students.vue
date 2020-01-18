<template>
  <div class="col-12 col-md-10 offset-md-2">
    <div class="h6 mb-3" v-if="$root.user && $root.user.isAdmin()" style="color:#C6C6C6">курсы</div>
    <div class="row ml-0 mr-0" v-if="$root.user && $root.user.isAdmin()">
      <div style="position:absolute;right:2%;top:-4%">
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Выберите учителя</label>
          <div class="col-sm-10">
            <select class="form-control" v-model="selected_teacher">
              <option v-for="(teacher,index) in teachers" :key="index">{{ teacher.name }}</option>
            </select>
          </div>
        </div>
      </div>
      <div style="position:absolute;right:2%;top:11%">
        <button
          class="btn btn-success"
          data-toggle="modal"
          data-target="#exampleModal"
          @click="download"
        >Скaчать excel</button>
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Почта</th>
            <th scope="col">Выбранные курсы</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(student, index) in students" v-bind:key="index">
            <th scope="row">{{ student.id }}</th>
            <td>{{ student.name }}</td>
            <td>{{ student.phone }}</td>
            <td>{{ student.email }}</td>
            <div v-for="(cources,index) in student.cources" :key="index ">
              <td>{{cources.name}}</td>
              <td>{{cources.user.name}}</td>
            </div>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      searching: "",
      selected_teacher: ""
    };
  },
  methods: {
    getStudents() {
      let data = [this.searching, this.selected_teacher];
      this.$store.dispatch("getStudents", data);
    },
    download() {
      this.$store.dispatch("download");
    }
  },
  mounted() {
    this.getStudents();
  },
  computed: {
    students() {
      return this.$store.state.students_s;
    },
    teachers() {
      return this.$store.state.teachers_s;
    }
  },
  watch: {
    selected_teacher: function() {
      this.getStudents();
    }
  }
};
</script>
