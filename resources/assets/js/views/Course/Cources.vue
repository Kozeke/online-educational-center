<template>
  <div class="col-12 col-md-10 offset-md-2">
    <div class="h6 mb-3" v-if="$root.user && $root.user.isAdmin()" style="color:#C6C6C6">курсы</div>
    <div class="row ml-0 mr-0" v-if="$root.user && $root.user.isAdmin()">
      <div style="position:absolute;right:2%;top:10%">
        <button
          class="btn btn-success"
          data-toggle="modal"
          data-target="#exampleModal"
          @click="$router.push({ path: '/addCource' })"
        >Добавить курс</button>
      </div>
      <div style="position:absolute;right:2%;top:-4%">
        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
            v-model="searching"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" @click.prevent="getCources()">Search</button>
        </form>
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Имя Курса</th>
            <th scope="col">Имя учителя</th>
            <th scope="col">Сколько студентов</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cource in cources" :key="cource.id">
            <th scope="row">{{ cource.id }}</th>
            <td>{{ cource.name }}</td>
            <td>{{ cource.user.name }}</td>
            <div v-for="student in cource.tag" :key="student.id">
              <td>{{student.name}}</td>
              <td></td>
            </div>
            <!-- <td>{{cource.students.lenght}}</td> -->
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
      searching: ""
    };
  },
  methods: {
    getCources() {
      this.$store.dispatch("getCources", this.searching);
    }
  },
  mounted() {
    this.getCources();
  },
  computed: {
    cources() {
      return this.$store.state.cources;
    }
  }
};
</script>
