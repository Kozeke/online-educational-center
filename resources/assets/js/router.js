import VueRouter from "vue-router";

const Dashboard = require("./views/dashboard/Index.vue");
const Control = require("./views/common/Control.vue");
const Students = require("./views/Student/Students.vue");
const Cources = require("./views/Course/Cources.vue");
const Teachers = require("./views/Teacher/Teachers.vue");
const AddCource = require("./views/Course/AddCource.vue");

const Users = require("./views/users/List.vue");
const User = require("./views/users/Item.vue");
const PermissionDenied = require("./views/system/PermissionDenied.vue");
const NotFound = require("./views/system/NotFound.vue");

const Login = require("./views/common/Login.vue");
const SelectAccount = require("./views/common/SelectAccount.vue");
const ResetPass = require("./views/common/ResetPass.vue");

export default new VueRouter({
  mode: "history",
  base: __dirname,

  routes: [
    {
      name: "login",
      path: "/login",
      component: Login,
      meta: { title: "Авторизация", forVisitors: true }
    },

    {
      name: "select-account",
      path: "/select-account",
      component: SelectAccount,
      meta: { title: "Выберите ученика", forAuth: true }
    },

    {
      name: "reset-pass",
      path: "/reset-pass",
      component: ResetPass,
      meta: { title: "Восстановление пароля" }
    },
    {
      name: "addCource",
      path: "/addCource",
      component: AddCource,
      meta: { title: "Добавить курс" }
    },

    {
      path: "/",
      component: Dashboard,
      meta: { title: "Показатели", forAuth: true }
    },
    {
      name: "dashboard",
      path: "/dashboard",
      component: Dashboard,
      meta: { title: "Показатели", forAuth: true }
    },

    {
      name: "control",
      path: "/control",
      component: Control,
      meta: { title: "Управление", forAuth: true }
    },
    {
      name: "cources",
      path: "/cources",
      component: Cources,
      meta: { title: "Курсы", forAuth: true }
    },
    {
      name: "students",
      path: "/students",
      component: Students,
      meta: { title: "Студенты", forAuth: true }
    },
    {
      name: "teachers",
      path: "/teachers",
      component: Teachers,
      meta: { title: "Учителя", forAuth: true }
    },

    {
      name: "users",
      path: "/control/users",
      component: Users,
      meta: { title: "Пользователи", forAuth: true }
    },
    {
      path: "/control/user/:id",
      name: "user",
      component: User,
      props: true,
      meta: { title: "Пользователь", forAuth: true }
    },

    { path: "/401", component: PermissionDenied },
    { path: "*", component: NotFound }
  ]
});
