
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
              <div class="form-group text-field span-full "
                    id="form-field-currency-currency-name-group">
                <label for="form-field-currency-currency-name" class="control-label">
                        Title            </label>
                <input type="text" name="name" ref="name"             id="form-field-currency-currency-name"
                value=""
                placeholder=""
                class="form-control"
                autocomplete="off"
                maxlength="255"/>
              </div>    
                <div class="form-group text-field span-left " id="form-field-category-name-group">
                  <label for="form-field-category-name" class="control-label">
                  Country            </label>
          
          
                  <multiselect v-model="values" :options="options" :custom-label="nameWithLang"></multiselect>
                </div>    
                <div class="form-group text-field span-right "
                      id="form-field-currency-currency-code-group">
                  <label for="form-field-currency-currency-code" class="control-label"> Code</label>
                      
                      
                  <input
                    type="text"
                    name="currency_code" ref="currency_code"
                    id="form-field-currency-currency-code"
                    value=""
                    placeholder=""
                    class="form-control"
                    autocomplete="off"
                    maxlength="255" />

                  <p class="help-block">Learn more about <a target="_blank" href="https://en.wikipedia.org/wiki/ISO_4217">ISO 4217</a></p>
                </div>
                <div class="form-group radio-field span-left "
                  id="form-field-currency-symbol-position-group">
                  <label for="form-field-currency-symbol-position" class="control-label">Symbol Position</label>
        
        
                <div class="field-radio">
                  <div
                    id="form-field-currency-symbol-position"
                    class="btn-group btn-group-toggle"
                    data-toggle="buttons">
                      <label class="btn btn-light active">
                        <input
                          type="radio"
                          id="form-field-currency-symbol-position-1"
                          name="symbol_position" ref="symbol_positions"
                          value="0" v-model="picked"
                          >Left
                      </label>
                      <label class="btn btn-light ">
                        <input
                          type="radio"
                          id="form-field-currency-symbol-position-2"
                          name="symbol_position" ref="symbol_position"
                          value="1" checked="checked">Right                
                      </label>
                  </div>
                </div>
                </div>    
                <div class="form-group text-field span-right "
                  id="form-field-currency-currency-symbol-group">
                  <label for="form-field-currency-currency-symbol" class="control-label">
                  Symbol</label>
                  <input
                    type="text"
                    name="currency_symbol" ref="currency_symbol"
                    id="form-field-currency-currency-symbol"
                    value=""
                    placeholder=""
                    class="form-control"
                    autocomplete="off"
                    maxlength="255"/>
                </div>    
                <div class="form-group number-field span-left "
                  id="form-field-currency-currency-rate-group">
                  <label for="form-field-currency-currency-rate" class="control-label">
                  Rate</label>
        
        
                  <input
                    type="number"
                    name="currency_rate" ref="currency_rate" 
                    id="form-field-currency-currency-rate"
                    value=""
                    placeholder=""
                    class="form-control"
                    autocomplete="off"
                    pattern="-?\d+(\.\d+)?"        maxlength="255"/>
                </div>    
                <div class="form-group text-field span-right "
                  id="form-field-currency-thousand-sign-group">
                  <label for="form-field-currency-thousand-sign" class="control-label">
                    Thousand Sign</label>
        
                  <input
                    type="text"
                    name="thousand_sign" ref="thousand_sign"
                    id="form-field-currency-thousand-sign"
                    value=""
                    placeholder=""
                    class="form-control"
                    autocomplete="off"
                    maxlength="255"
                  />
                </div>    
                <div class="form-group text-field span-left "
                  id="form-field-currency-decimal-sign-group">
                  <label for="form-field-currency-decimal-sign" class="control-label">
                  Decimal Sign</label>
                  <input
                    type="text"
                    name="decimal_sign" ref="decimal_sign"
                    id="form-field-currency-decimal-sign"
                    value=""
                    placeholder=""
                    class="form-control"
                    autocomplete="off"
                    maxlength="255"
                  />
                </div>    
                <div class="form-group number-field span-right "
                  id="form-field-currency-decimal-position-group">
                  <label for="form-field-currency-decimal-position" class="control-label">Decimal Place</label>
                  <input
                    type="number"
                    name="decimal_position" ref="decimal_position"
                    id="form-field-currency-decimal-position"
                    value=""
                    placeholder=""
                    class="form-control"
                    autocomplete="off"
                    pattern="-?\d+(\.\d+)?" maxlength="255"/>
                </div>
                <div class="form-group switch-field span-full " id="form-field-category-status-group">
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
                      class="field-switch-input" checked="checked" v-model="boolean"
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
          picked:'checked',
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
          axios.get(address ? address : "/api/countries").then(response => {
              this.options = response.data.data;
          });
        },
        deleteImage()
        {
          this.image = null;
          this.image_file = null;
        },
        deletePost(id) {
          axios.delete("/api/currencies/" + id).then(response => {this.$router.push({name:'read_currencies'});
          })
        },
        nameWithLang ({ country_name}) {
          return `${country_name}`
        },
        getPost() {
          axios.get("/api/currencies/" + this.postId)
          .then(response => {
            this.$refs.name.value = response.data.data.currency_name;
            this.$refs.currency_code.value = response.data.data.currency_code;
            this.$refs.symbol_position.value = response.data.data.symbol_position;
            this.$refs.currency_symbol.value = response.data.data.currency_symbol;
            this.$refs.currency_rate.value = response.data.data.currency_rate;
            this.$refs.thousand_sign.value = response.data.data.thousand_sign;
            this.$refs.decimal_sign.value = response.data.data.decimal_sign;
            this.$refs.decimal_position.value = response.data.data.decimal_position;
            this.boolean = response.data.data.status;
            this.values= response.data.data.country_id;
            
          })
          .catch(error => {
          if(error.response.status = 402)
              alert('No data');
              this.$router.push({name:'read'});
            });
        },
        save(text) {
          const formData = new FormData();
          formData.append('_method', 'PUT');
          if(this.values != null)
          {
            formData.append("country_id", this.values.id);
          }
          
          formData.append("name", this.$refs.name.value);
          formData.append("currency_code", this.$refs.currency_code.value);
          formData.append("symbol_position", this.$refs.symbol_position.value);
          formData.append("currency_symbol", this.$refs.currency_symbol.value);
          formData.append("decimal_sign", this.$refs.decimal_sign.value);
          formData.append("decimal_position", this.$refs.decimal_position.value);
          formData.append("currency_rate", this.$refs.currency_rate.value);
          formData.append("thousand_sign", this.$refs.thousand_sign.value);
          formData.append("status", this.boolean);
          axios
            .post("/api/currencies/"+ this.postId, formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
              if(text == 'update')
              {
                this.$router.push({name:'read_currencies'}) 
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
