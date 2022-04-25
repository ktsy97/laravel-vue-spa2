<template>
  <div class="container mb-5">
    <div class="d-flex align-items-center mb-2">
      <!-- 都市名 -->
      <h5 class="mb-0">{{ city }}</h5>
      <!-- お気に入りボタン -->
      <div class="like-btn px-3">
        <button class="btn btn-sm btn-outline-danger">お気に入り解除</button>
        <button class="btn btn-sm btn-outline-primary">お気に入り登録</button>
      </div>
    </div>
    <!-- テーブル -->
    <table class="table table-hover table-sm">
      <thead class="table-light">
        <tr>
          <th scope="col" style="width: 50%">日時</th>
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
  mounted() {
    const title = this.$route.query.city + " | " + process.env.MIX_APP_NAME;
    document.title = title;
    document.querySelector("meta[property='og:title']");
  },
  created() {
    this.getHours();
  },
  data() {
    return {
      city: null, //地域名
      list: [],
      result: null, //いいね判定
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
