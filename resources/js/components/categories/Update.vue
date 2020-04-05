
    <template>
      <div class="">
      
        <form>
          <div id="toolbar" class="toolbar btn-toolbar ">
            <div class="toolbar-action">
              <button type="submit" @click.prevent="save('save')" class="btn btn-primary block">
                <i class="fa fa-save"></i>Save
              </button>
              <button type="submit" @click.prevent="save('update')" class="btn btn-default block">
                <i class="fa fa-save"></i>Save & close
              </button>
              
              <button 
                  type="button" 
                  @click="deletePost(postId)" 
                  class="btn btn-danger"
              >
                  <i class="fa fa-trash-o "></i>
              </button> 
            </div>
          </div>
          <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]" v-show="successful">
            <span v-if="successful" class="label label-sucess">Published!</span>
          </div>
          <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']" v-show="errors">
            <span v-if="errors.name" class="label label-danger">
              {{ errors.name[0] }}
            </span>
            <span v-if="errors.image" class="label label-danger"> 
              {{ errors.image[0] }} 
            </span>
             <span v-if="errors.permalink_slug" class="label label-danger"> 
              {{ errors.permalink_slug[0] }} 
            </span>
          </div>
          
          <div class="form-widget">
            <div id="form-outside-tabs" class="">
              <div class="form-fields">
                <div class="form-group text-field span-left " id="form-field-category-name-group">
                  <label for="form-field-category-name" class="control-label">
                  Name            </label>
                  <input
                      type="text"
                      name="name" ref="name"
                      
                      value=""
                      placeholder=""
                      class="form-control"
                      autocomplete="off"
                      maxlength="255"/>
                </div>    
                <div
                  class="form-group permalink-field span-right "
                  id="form-field-category-permalink-slug-group">
                  <label for="form-field-category-permalink-slug" class="control-label">
                  Slug            </label>
                    <div class="field-permalink">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">http://localhost/</span>
                            </span>
                            <input
                                type="text" ref="permalink_slug"
                                name="permalink_slug"
                                id="input-slug"
                                class="form-control"
                                value=""/>
                        </div>
                    </div>
                    <p class="help-block">Use ONLY alpha-numeric lowercase characters, _ or - and make sure it is unique GLOBALLY.</p>
                </div>
                <div class="form-group widget-field span-left "id="form-field-category-parent-id-group">
                  <label for="form-field-category-parent-id" class="control-label">
                  Parent            </label>
                    <multiselect v-model="values" :options="options" :custom-label="nameWithLang"></multiselect>     
                </div>
              <div class="form-group widget-field span-right" id="form-field-category-locations-group">    
                <label for="form-field-category-locations" class="control-label">Location(s)</label>
                 <multiselect v-model="value" :options="option" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="name">
                  <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                </multiselect>                  
              </div> 
              <div class="form-group number-field span-left "   id="form-field-category-priority-group">
                  <label for="form-field-category-priority" class="control-label">
                      Priority            </label>
                  <input
                  type="number" ref="priority"
                  name="priority"
                  id="form-field-category-priority"
                  value=""
                  placeholder=""
                  class="form-control"
                  autocomplete="off"
                  pattern="-?\d+(\.\d+)?"        maxlength="255"            />
              </div>

              <div class="form-group switch-field span-right " id="form-field-category-status-group">
                  <label for="form-field-category-status" class="control-label">
                      Status            </label>
                  <input
                  type="hidden" ref="status"
                  name="status"
                  value="0"
                  >
                  <div class="field-switch" data-control="switch">
                      <input
                      type="checkbox"
                      name="status" ref="status"
                      id="form-field-category-status"
                      class="field-switch-input" v-model="boolean"
                      true-value=1
                      false-value=0 >
                      
                      <label
                          class="field-switch-label"
                          for="form-field-category-status"
                          style="width: 120px;"
                      >
                          <span class="field-switch-container">
                              <span class="field-switch-active">
                                  <span class="field-switch-toggle bg-success">Enabled</span>
                              </span>
                              <span class="field-switch-inactive">
                                  <span class="field-switch-toggle bg-danger">Disabled</span>
                              </span>
                          </span>
                      </label>
                  </div>  
              </div>
              <div class="form-group textarea-field span-left " id="form-field-category-description-group">
                  <label for="form-field-category-description" class="control-label">
                      Description            </label>
                  <textarea
                      name="description" ref="description"
                      id="form-field-category-description"
                      autocomplete="off"
                      class="form-control field-textarea"
                      placeholder=""
                      maxlength="255" rows="5">
                  </textarea>
              </div> 
                <div class="form-group  widget-field span-right " id="form-field-category-thumb-group">
                  <label for="form-field-category-thumb" class="control-label">
                      Image            </label>

                  <div class="custom-file mb-3">

                    <input type="file" ref="image" @change="previewImage" name="image" class="custom-file-input" id="image" accept=".jpg,.jpeg,.png">
                    <label class="custom-file-label" >Choose file...</label>
                  </div>
                  <img v-if='image_file' :src="image_file" style='width:20%;'>
                  <a v-if='image_file' class="preview" @click="deleteImage" data-method="delete" data-confirm="Are you sure?"><i class="fa fa-times" style='cursor: pointer;
                      position: absolute;
                      margin-right: 0px;
                      margin-left: 10px;
                      font-size: 15px;
                  '></i></a></img>
                  
                </div>           
              </div>
            </div>
          </div>     
          
        </form>
      </div>
    </template>
    <script>
    
    export default {
      props: {
      postId: {
          type: String,
          required: true
        }
      },
       mounted() {
        this.getPosts();
        this.getPost();
      },
      data() {
        return {
        imageData: "" ,
          value: null,
          boolean:0,
          addre:null,
          values: null,
          image_file:null,
          options: [],
          option: [{ name: 'Vue.js', language: 'JavaScript' },
        { name: 'Rails', language: 'Ruby' },
        { name: 'Sinatra', language: 'Ruby' },
        { name: 'Laravel', language: 'PHP' },
        { name: 'Phoenix', language: 'Elixir' }],
          error: false,
          successful: false,
          errors: []
        };
      },
      methods: {
        getPosts(address) {
        this.addre = address;
          axios.get(address ? address : "/api/categories").then(response => {
              this.options = response.data.data;
          });
        },
        deleteImage()
        {
          this.image = null;
          this.image_file = null;
        },
        deletePost(id) {
          axios.delete("/api/categories/" + id).then(response => {this.$router.push({name:'read'});
          })
        },
        nameWithLang ({ name}) {
          return `${name}`
        },
        getPost() {
          axios.get("/api/categories/" + this.postId)
          .then(response => {
            this.$refs.name.value = response.data.data.name;
            this.$refs.description.value = response.data.data.description;
            this.$refs.permalink_slug.value = response.data.data.permalink_slug;
            this.$refs.priority.value = response.data.data.priority;
            this.boolean = response.data.data.status;
            this.image_file = '/uploads/category/'+response.data.data.image;
            this.values= (response.data.data.parent_name);
          })
          .catch(error => {
          if(error.response.status = 402)
              alert('No data');
              this.$router.push({name:'read'});
            });
        },
        previewImage: function(event) {
            // Reference to the DOM input element
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.imageData = e.target.result;
                    this.image_file = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        },
        save(text) {
          const formData = new FormData();
          formData.append('_method', 'PUT');
          if(this.values != null)
          {
            formData.append("parent_id", this.values.id);
          }
          else
          {
            formData.append("parent_id", this.values);
          }
          formData.append("name", this.$refs.name.value);
          formData.append("description", this.$refs.description.value);
          if(this.$refs.image.files[0])
          {
             formData.append("image", this.$refs.image.files[0]);
          }
          
         else
          {
              formData.append("image", 'none');
          }
          
          formData.append("status", this.boolean);
          formData.append("permalink_slug", this.$refs.permalink_slug.value);
          formData.append("priority", this.$refs.priority.value);
          axios
            .post("/api/categories/"+ this.postId, formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
              if(text == 'update')
              {
                this.$router.push({name:'read'}) 
              }
              
            })
            .catch(error => {
              if (!_.isEmpty(error.response)) {
                if ((error.response.status = 422)) {
                  this.errors = error.response.data.errors;
                  this.successful = false;
                  this.error = true;
                }
              }
            });
        }
      }
    };
    </script>
    <style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
