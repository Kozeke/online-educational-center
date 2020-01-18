<template>
  <div class="col-12 col-md-10 offset-md-2">
    <form>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Название Курса</label>
        <div class="col-sm-10">
          <input
            type="text"
            class="form-control"
            id="inputEmail3"
            placeholder="Математика"
            v-model="course_name"
          />
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Выберите учителя</label>
        <div class="col-sm-10">
          <select class="form-control" v-model="selected_teacher">
            <option v-for="(teacher, index) in teachers" :key="index">{{ teacher.name }}</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-2">Выберите студентов</div>
        <div class="col-sm-10">
          <div v-for="student in students" :key="student.id" class="form-check">
            <input
              type="checkbox"
              v-model="selected_students"
              :value="student.id"
              class="form-check-input"
              :id="student.id"
            />

            <label class="form-check-label">{{ student.name }}</label>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button @click.prevent="AddCource()" class="btn btn-success">Добавить</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selected_students: [],
      selected_teacher: "",
      course_name: "",
      incr: 0
    };
  },
  computed: {
    students() {
      return this.$store.state.students;
    },
    teachers() {
      return this.$store.state.teachers;
    }
  },
  methods: {
    AddCource() {
      let component = this;
      let data = {
        selected_students: component.selected_students,
        selected_teacher: component.selected_teacher,
        name: component.course_name
      };
      this.$store.dispatch("addCource", data);
    }
  },
  mounted() {
    this.$store.dispatch("getData");
  }
};
</script>
