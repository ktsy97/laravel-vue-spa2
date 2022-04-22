<template>
  <div class="container mb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
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
