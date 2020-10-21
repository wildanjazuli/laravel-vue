<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h4>Customers</h4>
          </div>
          <div class="col-md-2">
            <router-link class="btn btn-primary w-100" to="/create">+ Add</router-link>
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- menampilkan data ke table -->
            <tr v-for="person in persons" :key="person.id">
              <td style="width:40%">{{person.first_name}}</td>
              <td style="width:40%">{{person.last_name}}</td>
              <td style="width:20%">
                <router-link class="btn btn-warning" :to="'/detail/'+person.id">Update</router-link>
                <button class="btn btn-danger" v-on:click="deleteData(person.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<!-- script js -->
<script>
export default {
  data() {
    return {
      // variable array yang akan menampung hasil fetch dari api
      customers: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/customer").then(response => {
        // mengirim data hasil fetch ke varibale array persons
        this.customers = response.result;
      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://localhost:8000/api/customer/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>