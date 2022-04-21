<template>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">

      <div class="col" v-for="(city) in cities" :key="city.id">
        <div class="card text-center" style="max-width: 36rem">
          <div class="card-body">
            <h5 class="card-title mb-3">{{ city.name }}</h5>
            <p class="card-text mb-2">気温：{{ city.main.temp }}&deg;C</p>
            <p class="card-text mb-2">{{ city.weather[0].main }}</p>
            <router-link v-bind:to="{ name: 'city.hours' }">
              <button class="btn btn-success">もっと見る</button>
            </router-link>
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
      cities: [],
    };
  },
  methods: {
    getCurrent() {
      axios
        .get("api/cities")
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
