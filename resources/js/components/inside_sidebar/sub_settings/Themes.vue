<template>
 <div class="category mb-3">
    <a href="#" class="title collapsed d-flex" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
      <i class="material-icons md-30 online">colorize</i>
      <div class="data ml-2">
        <h5 class="text-dark">Appearance</h5>
        <p class="text-muted">Customize the look of Swipe</p>
      </div>
      <i class="material-icons ml-5">keyboard_arrow_right</i>
    </a>
    <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionSettings">
      <div class="content no-layer mb-4 mt-4">
        <div class="set d-flex">
          <div class="details">
            <h5 class="text-dark">Turn Off Lights</h5>
            <p class="text-muted">The dark mode is applied to core areas of the app that are normally displayed as light.</p>
          </div>
          <label class="switch">
            <input type="checkbox" @toggle="toggleTheme">
            <span class="slider round mode"></span>
          </label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lightsout: false,
      lightson: true
    }
  },
  methods: {
    lightsout() {
      window.location="chat"
    },
    lightson() {
      window.location="home"
    },
    toggleTheme() {
      this.lightsout = this.lightson
    }
  },
}
</script>
