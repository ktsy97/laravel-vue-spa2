<template>
  <div class="container mb-5">
    <!-- セレクトボックス -->
    <div class="d-flex justify-content-center cities-select">
      <select class="form-select" v-on:change="select">
        <option value="0">全国</option>
        <option value="1">北海道</option>
        <option value="2">東北</option>
        <option value="3">関東・甲信</option>
        <option value="4">北陸</option>
        <option value="5">東海</option>
        <option value="6">近畿</option>
        <option value="7">中国</option>
        <option value="8">四国</option>
        <option value="9">九州・沖縄</option>
      </select>
    </div>
    <!-- カード一覧 -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <!-- カード -->
      <div class="col" v-for="city in cities" :key="city.id">
        <div class="l-wrapper_06">
          <div class="city-card card text-center border-0">
            <div class="city-card-body card-body">
              <h5 class="city-card-title card-title mb-3">{{ city.name }}</h5>
              <p class="city-card-text card-text mb-2 text-secondary">
                気温：{{ city.main.temp }}&deg;C
              </p>
              <p class="city-card-text card-text mb-2 text-secondary">
                {{ city.weather[0].main }}
              </p>
              <router-link
                v-bind:to="{ name: 'city.hours', query: { city: city.name } }"
              >
                <button class="btn btn-success">もっと見る</button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    const title = "一覧 | " + process.env.MIX_APP_NAME;
    document.title = title;
    document.querySelector("meta[property='og:title']");
  },
  created() {
    this.getCurrent();
  },
  data() {
    return {
      cities: [],
      val: "",
    };
  },
  methods: {
    select: function (e) {
      this.val = e.target.value;
      this.getCurrent();
    },
    getCurrent() {
      axios
        .get("api/cities", {
          params: {
            area: this.val,
          },
        })
        .then(
          function (response) {
            this.cities = response.data;
          }.bind(this)
        )
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
