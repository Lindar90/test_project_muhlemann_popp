<template>
  <div class="card mt-5">
    <div class="card-header">
      Users Import
    </div>
    <div class="card-body">
      <div :class="[`alert-${alert}`, 'alert']" role="alert" v-show="alert" v-text="alertText"></div>

      <h5 class="card-title">
        Please select a csv file to import
      </h5>

      <div class="form-group">
        <label for="file">Import file</label>
        <input class="form-control" id="file" type="file" @change="handleChange($event.target.files[0])">
      </div>

      <a href="#" class="btn btn-primary" @click="importFile">Upload</a>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        formData: null,
        alert: null,
        alertText: ''
      }
    },

    methods: {
      handleChange(file) {
        const formData = new FormData()

        formData.append('file', file);

        this.formData = formData;
      },

      importFile() {
        this.alert = 'warning';
        this.alertText = 'Importing... Please wait for some time...';

        axios.post('/users-import', this.formData).then(({data}) => {
          if (!data.success) {
            this.alert = 'danger';
            this.alertText = data.message;

            return;
          }

          this.alert = 'success';
          this.alertText = 'Successfully Imported!!!';
        });
      }
    }
  }
</script>
