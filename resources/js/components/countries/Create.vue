<template>
      <div class="">
      
        <form>
          <div id="toolbar" class="toolbar btn-toolbar ">
            <div class="toolbar-action">
              <button type="submit" @click.prevent="create" class="btn btn-primary block">
                <i class="fa fa-save"></i>Save & close
              </button>   
            </div>
          </div>
          <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]" v-show="successful">
            <span v-if="successful" class="label label-sucess">Published!</span>
          </div>
          <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']" v-show="errors">
            <span v-if="errors.country_name" class="label label-danger">
              {{ errors.country_name[0] }}
            </span>
            <span v-if="errors.iso_code_2" class="label label-danger">
              {{ errors.iso_code_2[0] }}
            </span>
            <span v-if="errors.iso_code_3" class="label label-danger">
              {{ errors.iso_code_3[0] }}
            </span>
            <span v-if="errors.priority" class="label label-danger">
              {{ errors.priority[0] }}
            </span>
            
          </div>
          
          <div class="form-widget">
            <div id="form-outside-tabs" class="">
              <div class="form-fields">
                <div class="form-group text-field span-left " id="form-field-category-name-group">
                  <label for="form-field-category-name" class="control-label">
                  Country            </label>
          
          
                  <input
                      type="text"
                      name="mealtime_name" ref="country_name"
                      
                      value=""
                      placeholder=""
                      class="form-control"
                      autocomplete="off"
                      maxlength="255"/>
                </div>    
              <div class="form-group number-field span-right "        id="form-field-country-priority-group">
                <label for="form-field-country-priority" class="control-label">
                            Priority            </label>    
                  <input type="number" name="priority" ref="priority"           id="form-field-country-priority" placeholder=""                   class="form-control" autocomplete="off"                  pattern="-?\d+(\.\d+)?" maxlength="255" />
              </div>
              <div class="form-group text-field span-left "       id="form-field-country-iso-code-2-group">
                <label for="form-field-country-iso-code-2" class="control-label">
                ISO Code 2</label>
        
        
                  <input
                    type="text"
                    name="iso_code_2" ref="iso_code_2"
                    id="form-field-country-iso-code-2"
                    
                    placeholder=""
                    class="form-control"
                    autocomplete="off"
                    maxlength="255"/>

                    <p class="help-block">Learn more about <a target="_blank" href="http://en.wikipedia.org/wiki/ISO_3166-1">ISO Alpha 2 & 3</a></p>
              </div>
              <div class="form-group text-field span-right "        id="form-field-country-iso-code-3-group">
                <label for="form-field-country-iso-code-3" class="control-label">
                 ISO Code 3</label>
                <input
                  type="text"
                  name="iso_code_3" ref="iso_code_3"
                  id="form-field-country-iso-code-3"
                  
                  placeholder=""
                  class="form-control"
                  autocomplete="off"
                  maxlength="255" />
              </div>    
              <div class="form-group textarea-field span-full "
                id="form-field-country-format-group">
                <label for="form-field-country-format" class="control-label">
                Format</label>
        
        
            <textarea
              name="format" ref="format"
              id="form-field-country-format"
              autocomplete="off"
              class="form-control field-textarea"
              placeholder=""
              maxlength="255"            ></textarea>

                    <p class="help-block">Address 1 = {address_1}<br />Address 2 = {address_2}<br />City = {city}<br />Postcode = {postcode}<br />State = {state}<br />Country = {country}</p></div> 
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
      },
       mounted() {
        
      },
      data() {
        return {
          value: null,
          boolean:0,
          addre:null,
          values: null,
          error: false,
          successful: false,
          errors: []
        };
      },
      methods: {
        nameWithLang ({ name}) {
          return `${name}`
        },
        create() {
          const formData = new FormData();
          formData.append("country_name", this.$refs.country_name.value);
          formData.append("status", this.boolean);
          formData.append("iso_code_2", this.$refs.iso_code_2.value);
          formData.append("iso_code_3", this.$refs.iso_code_3.value);
          formData.append("format", this.$refs.format.value);
          formData.append("priority", this.$refs.priority.value);
          axios
            .post("/api/countries", formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
              this.$refs.country_name.value = "";
              this.$refs.iso_code_2.value = "";
              this.$refs.iso_code_3.value = "";
              this.$refs.priority.value = "";
              this.$router.push({name:'read_countrie'});
              
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

    
