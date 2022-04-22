<template>
  <div class="container">
    <h5 class="mb-3 text-center">{{ city }}</h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">日時</th>
          <th scope="col">気温</th>
          <th scope="col">天候</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in list" :key="item.dt">
          <td>{{ item.dt_txt }}</td>
          <td>{{ item.main.temp }}&deg;C</td>
          <td>{{ item.weather[0].main }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  created() {
    this.getHours();
  },
  data() {
    return {
      city: null, //地域名
      list: [],
    };
  },
  methods: {
    getHours() {
      axios
        .get("api/hours", {
          params: {
            cityName: this.$route.query.city,
          },
        })
        .then(
          function (response) {
            this.city = response.data.city.name;
            this.list = response.data.list;
          }.bind(this)
        )
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
