<template>
<div>
<div id="toolbar" class="toolbar btn-toolbar ">
  <div class="toolbar-action">
    <router-link :to="{ name: 'create_location'}">
      <button type="button" class="btn btn-primary">
          <i class="fa fa-plus"></i> New
      </button>
    </router-link>    
  </div>
</div>
    <div id="posts">
    <b-col lg="3" class="my-1" style='padding-left:0;float:right;'>
          <b-input-group size="sm">
            <b-form-input
              v-model="filter"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>
    <b-table striped hover responsive :items="items" 
      :fields="fields"
      :per-page="perPage"
      :current-page="currentPage"
      :filter="filter"
      :filterIncludedFields="filterOn"
      @filtered="onFiltered"
      >
      <template v-slot:cell(sr)="row">
        {{(row.index)+1}}
      </template>
      
      <template v-slot:cell(actions)="row">
        <router-link :to="{ name: 'update_location', params: { postId : String(row.item.id) } }">
          <button type="button" class="btn">
              <i class="fa fa-pencil"></i>
          </button>
        </router-link>
                     
        <button 
            type="button" v-if='(row.item.id) > 1'
            @click="deletePost(row.item.id)" 
            class="btn"
        >
            <i class="fa fa-trash-o "></i>
        </button>
      </template>
      </b-table>
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table" align="right"
    ></b-pagination>
    </div>
</div>    
</template>
<script>

    export default {
      mounted() {
        this.getPosts();
      },

      data() {
        return {
        perPage: 20,
        currentPage: 1,
        filter: null,
        filterOn: [],
        fields: [
          {
            key: 'sr',
            sortable: true
          },
          {
            key: 'name',
            sortable: true
          },
          {
            key: 'state',
            sortable: true,
          },
          {
            key: 'country_id',
            label: 'Country',
            formatter: (value, key, item) => {
              return value ? value.country_name : ''
            },
            sortable: true,
            sortByFormatted: true,
            filterByFormatted: true
          },
          {
            key: 'status',
            formatter: (value, key, item) => {
              return value == 1 ? 'Enabled' : 'Disabled'
            },
            sortable: true,
            sortByFormatted: true,
            filterByFormatted: true
          },
          {
            key: 'actions',
            label: 'Actions',
            sortable: false
          }
         
        ],
          items: [],
        };
      },

      methods: {
        getPosts(address) {
          axios.get(address ? address : "/api/location").then(response => {
            this.items = response.data.data;
          });
        },
        deletePost(id) {
          axios.delete("/api/location/" + id).then(response => this.getPosts())
        },
        onFiltered(filteredItems) {
          // Trigger pagination to update the number of buttons/pages due to filtering
          this.totalRows = filteredItems.length
          this.currentPage = 1
        },
        navigate(address) {
          this.getPosts(address)
          this.toogleBusy()
        }
      },
      computed: {
      rows() {
        return this.items.length
      }
    }
    };
</script>    