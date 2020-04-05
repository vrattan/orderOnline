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
            <span v-if="errors.mealtime_name" class="label label-danger">
              {{ errors.mealtime_name[0] }}
            </span>
            <span v-if="errors.start_time" class="label label-danger">
              {{ errors.start_time[0] }}
            </span>
            <span v-if="errors.end_time" class="label label-danger">
              {{ errors.end_time[0] }}
            </span>
          </div>
          
          <div class="form-widget">
            <div id="form-outside-tabs" class="">
              <div class="form-fields">
                <div class="form-group text-field span-left " id="form-field-category-name-group">
                  <label for="form-field-category-name" class="control-label">
                  Mealtime Name            </label>
          
          
                  <input
                      type="text"
                      name="mealtime_name" ref="mealtime_name"
                      
                      value=""
                      placeholder=""
                      class="form-control"
                      autocomplete="off"
                      maxlength="255"/>
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
              <div class="form-group widget-field span-left "
                  id="form-field-mealtime-start-time-group">
                <label for="form-field-mealtime-start-time" class="control-label">
                                Start Time            </label>
                    <div id="datepicker-formstarttime-start-time" class="control-datepicker">
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <vue-clock-picker v-model="start_time" name="start_time" input-class="form-control" ref="status" required="true"></vue-clock-picker>
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </div>
              </div> 
                <div class="form-group widget-field span-right "
                  id="form-field-mealtime-start-time-group">
                  <label for="form-field-mealtime-start-time" class="control-label">
                                End Time            </label>
                  <div id="datepicker-formstarttime-start-time" class="control-datepicker">
                    <div class="input-group" data-control="clockpicker" data-autoclose="true">
                      <vue-clock-picker v-model="end_time" name="end_time" input-class="form-control" required="true"></vue-clock-picker>
                      <span class="input-group-prepend">
                          <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                      </span>
                    </div>
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
        this.getPosts();
      },
      data() {
        return {
          value: null,
          start_time:null,
          end_time:null,
          boolean:0,
          addre:null,
          values: null,
          error: false,
          successful: false,
          errors: []
        };
      },
      methods: {
        getPosts(address) {
        this.addre = address;
          axios.get(address ? address : "/api/mealtime").then(response => {
              this.options = response.data.data;
          });
        },
        nameWithLang ({ name}) {
          return `${name}`
        },
        create() {
          const formData = new FormData();
          formData.append("mealtime_name", this.$refs.mealtime_name.value);
          formData.append("status", this.boolean);
          formData.append("start_time", this.start_time);
          formData.append("end_time", this.end_time);
          axios
            .post("/api/mealtime", formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
              this.$refs.mealtime_name.value = "";
              this.end_time = null;
              this.start_time = null;
              this.$router.push({name:'read_meal'});
              
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
    <style>
    .clock-picker__dialog-content
{text-align:center;}
.clock-picker{width:94%;}
@media (max-width: 767.98px)
{
  .clock-picker{width:90%;}
}
    </style>

    
