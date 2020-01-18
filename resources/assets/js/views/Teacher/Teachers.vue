<template>
  <div class="col-12 col-md-10 offset-md-2">
    <div class="h6 mb-3" v-if="$root.user && $root.user.isAdmin()" style="color:#C6C6C6">курсы</div>
    <div class="row ml-0 mr-0" v-if="$root.user && $root.user.isAdmin()">
      <div style="position:absolute;right:2%;top:-4%">
        <div>Показать свободных</div>
        <div style="position:absolute;right:100%;top:-3%">
          <input type="checkbox" v-model="onlyBusy" class="form-check-input" />
        </div>
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Почта</th>
            <th scope="col">Курс</th>
            <th scope="col">Студенты</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="teacher in teachers" :key="teacher.id">
            <th scope="row">{{ teacher.id }}</th>
            <td>{{ teacher.user.name }}</td>
            <td>{{ teacher.user.phone }}</td>
            <td>{{ teacher.user.email }}</td>
            <td>{{ teacher.name }}</td>
            <div v-for="student in teacher.tag" :key="student.id">
              <td>{{student.name}}</td>
            </div>

            <!-- <td>{{cource.teachers.lenght}}</td> -->
            <!-- <td>{{cource.teacher[0].name}}</td> -->
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
      onlyBusy: false
    };
  },
  methods: {
    getTeachers() {
      this.$store.dispatch("getTeachers", this.onlyBusy);
    }
  },
  computed: {
    teachers() {
      return this.$store.state.teachers_t;
    }
  },
  mounted() {
    this.getTeachers();
  },
  watch: {
    onlyBusy: function() {
      this.getTeachers();
    }
  }
};
</script>
