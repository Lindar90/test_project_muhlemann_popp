<template>
  <div class="row">
    <div class="col-md-4">
      <div class="card mt-5">
        <div class="card-header">
          Search
        </div>
        <div class="card-body">
          <div :class="[`alert-${alert}`, 'alert']" role="alert" v-show="alert" v-text="alertText"></div>

          <div class="form-group">
            <label for="firstname">First name</label>
            <input class="form-control" id="firstname" type="text" v-model="filters.firstname">
          </div>

          <div class="form-group">
            <label for="lastname">Last name</label>
            <input class="form-control" id="lastname" type="text" v-model="filters.lastname">
          </div>

          <a href="#" class="btn btn-primary" @click="search">FIND</a>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <h3 class="mt-5 text-center" v-if="pagination">
        Page {{ pagination.current_page }} of {{ pagination.last_page }}
      </h3>

      <div class="card mt-3" v-for="user in users" :key="user.id">
        <div class="card-body">
          <div class="row">
            <div class="col-5">
              <table>
                <tr v-for="(field, key) in user" v-if="key !== 'cv'">
                  <td><strong v-text="key"></strong></td>
                  <td v-text="field"></td>
                </tr>
              </table>
            </div>

            <div class="col-7">
              <p v-text="user['cv']"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import UserCard from './UserCard';
  import jQuery from 'jquery';

  export default {
    components: {
      UserCard
    },

    data() {
      return {
        filters: {
          firstname: '',
          lastname: ''
        },
        alert: null,
        alertText: '',
        users: [],
        pagination: null
      };
    },

    methods: {
      search() {
        axios.get(`/users-find/?${jQuery.param(this.filters)}`).then(({data}) => {
          if (!data.success) {
            this.alert = 'danger';
            this.alertText = data.message;

            return;
          }

          // too much data here =))
          this.users = data.data.users.data;
          this.pagination = data.data.users;
        });
      }
    }
  }
</script>
