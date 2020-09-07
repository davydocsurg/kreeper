<template>
 <div class="category mb-3">
    <a href="#" class="title collapsed d-flex" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
      <i class="material-icons md-30 online">language</i>
      <div class="data ml-2">
        <h5 class="text-dark">Language</h5>
        <p class="text-muted">Select preferred language</p>
      </div>
      <i class="material-icons ml-5">keyboard_arrow_right</i>
    </a>
    <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-parent="#accordionSettings">
      <div class="content layer mb-4 mt-4">
        <div class="language">
          <label for="country" class="dd text-dark">Language</label>
          <select class="custom-select shadow-sm border-dark" id="country" required>
            <option class="text-dark" value="">Select an language...</option>
            <option class="text-dark">English, UK</option>
            <option class="text-dark">English, US</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

</script>
