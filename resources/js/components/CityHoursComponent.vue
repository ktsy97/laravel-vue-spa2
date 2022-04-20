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
        <tr>
          <td>2022-4-20</td>
          <td>30&deg;C</td>
          <td>shine</td>
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
        .get("api/hours")
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
