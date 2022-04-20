<template>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card text-center" style="max-width: 36rem">
          <div class="card-body">
            <h5 class="card-title mb-3">東京</h5>
            <p class="card-text mb-2">気温：30&deg;C</p>
            <p class="card-text mb-2">shine</p>
            <button class="btn btn-success">もっと見る</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center" style="max-width: 36rem">
          <div class="card-body">
            <h5 class="card-title mb-3">東京</h5>
            <p class="card-text mb-2">気温：30&deg;C</p>
            <p class="card-text mb-2">shine</p>
            <button class="btn btn-success">もっと見る</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center" style="max-width: 36rem">
          <div class="card-body">
            <h5 class="card-title mb-3">東京</h5>
            <p class="card-text mb-2">気温：30&deg;C</p>
            <p class="card-text mb-2">shine</p>
            <button class="btn btn-success">もっと見る</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card text-center" style="max-width: 36rem">
          <div class="card-body">
            <h5 class="card-title mb-3">東京</h5>
            <p class="card-text mb-2">気温：30&deg;C</p>
            <p class="card-text mb-2">shine</p>
            <button class="btn btn-success">もっと見る</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  created() {
    this.getCurrent();
  },
  data() {
    return {
      city: null, //地域名
      temp: null, //気温
      condition: {
        main: null, //天候名
      },
    };
  },
  methods: {
    getCurrent() {
      axios
        .get("api/cities")
        .then(
          function (response) {
            this.city = response.data.name;
            this.temp = response.data.main.temp;
            this.condition = response.data.weather[0];
          }.bind(this)
        )
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
