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
            <span v-if="errors.name" class="label label-danger">
              {{ errors.name[0] }}
            </span>
            <span v-if="errors.image" class="label label-danger"> 
              {{ errors.image[0] }} 
            </span>
            <span v-if="errors.email" class="label label-danger"> 
              {{ errors.email[0] }} 
            </span>
            <span v-if="errors.address_1" class="label label-danger"> 
              {{ errors.address_1[0] }} 
            </span>
            <span v-if="errors.address_1" class="label label-danger"> 
              {{ errors.address_1[0] }} 
            </span>
            <span v-if="errors.city" class="label label-danger"> 
              {{ errors.city[0] }} 
            </span>
            <span v-if="errors.postcode" class="label label-danger"> 
              {{ errors.postcode[0] }} 
            </span>
            <span v-if="errors.country_id" class="label label-danger"> 
              {{ errors.country_id[0] }} 
            </span>
            <span v-if="errors.permalink_slug" class="label label-danger"> 
              {{ errors.permalink_slug[0] }} 
            </span>
            <span v-if="errors.telephone" class="label label-danger"> 
              {{ errors.telephone[0] }} 
            </span>
          </div>
          
          <div class="form-widget">
            <div id="form-primary-tabs" class="primary-tabs" data-control="form-tabs" data-store-name="widget.Locations-form-edit">
              <div class="tab-heading">
                <ul class="form-nav nav nav-tabs">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      href="#primarytab-1"
                      data-toggle="tab"
                    >Location</a>
                  </li>           
                  <li class="nav-item">
                    <a
                        class="nav-link "
                        href="#primarytab-3"
                        data-toggle="tab"
                    >Opening Hours</a>
                  </li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane active" id="primarytab-1">
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
                    <div class="form-group text-field span-left " id="form-field-category-email-group">
                      <label for="form-field-category-email" class="control-label">
                      Email            </label>
              
                      <input
                        type="text"
                        name="email" ref="email"
                        
                        value=""
                        placeholder=""
                        class="form-control"
                        autocomplete="off"
                        maxlength="255"/>
                    </div>    
                    <div
                      class="form-group permalink-field span-right "
                      id="form-field-category-telephone-group">
                      <label for="form-field-category-telephone" class="control-label">
                      Telephone            </label>
                      <div class="field-permalink">
                          <div class="input-group">
                              <input
                                type="text" ref="telephone"
                                name="telephone"
                                id="input-slug"
                                class="form-control"
                                value=""/>
                          </div>
                      </div>
                    </div>
                    
                    <div class="form-group section-field span-full " id="form-field-location-address-group">
                      <div class="field-section">
                        <h5 class="section-title">Address</h5>
                      </div>
                    </div>
                    <div class="form-group text-field span-left " id="form-field-category-address-1-group">
                      <label for="form-field-category-address-1" class="control-label">
                      Address 1            </label>
              
                      <input
                        type="text"
                        name="address_1" ref="address_1"
                        
                        value=""
                        placeholder=""
                        class="form-control"
                        autocomplete="off"
                        maxlength="255"/>
                    </div>    
                    <div
                      class="form-group permalink-field span-right "
                      id="form-field-category-address-2-group">
                      <label for="form-field-category-address-2" class="control-label">
                      Address 2            </label>
                      <div class="field-permalink">
                          <div class="input-group">
                              <input
                                type="text" ref="address_2"
                                name="address_2"
                                id="input-slug"
                                class="form-control"
                                value=""/>
                          </div>
                      </div>
                    </div>
                    <div class="form-group text-field span-left " id="form-field-category-city-group">
                      <label for="form-field-category-city" class="control-label">
                      City            </label>
              
                      <input
                        type="text"
                        name="city" ref="city"
                        
                        value=""
                        placeholder=""
                        class="form-control"
                        autocomplete="off"
                        maxlength="255"/>
                    </div>
                    <div
                      class="form-group permalink-field span-right "
                      id="form-field-category-state-group">
                      <label for="form-field-category-state" class="control-label">
                      State            </label>
                      <div class="field-permalink">
                          <div class="input-group">
                              <input
                                type="text" ref="state"
                                name="state"
                                id="input-slug"
                                class="form-control"
                                value=""/>
                          </div>
                      </div>
                    </div>
                    <div class="form-group text-field span-left " id="form-field-category-postcode-group">
                      <label for="form-field-category-postcode" class="control-label">
                      Postcode            </label>
              
                      <input
                        type="text"
                        name="postcode" ref="postcode"
                        
                        value=""
                        placeholder=""
                        class="form-control"
                        autocomplete="off"
                        maxlength="255"/>
                    </div>    
                    <div class="form-group widget-field span-right "id="form-field-category-parent-id-group">
                      <label for="form-field-category-parent-id" class="control-label">
                      Country            </label>
                        <multiselect v-model="values" :options="options" :custom-label="nameWithLang"></multiselect>      
                    </div>
                    <div class="form-group  widget-field span-left flex-width" id="form-field-category-thumb-group">
                      <label for="form-field-category-thumb" class="control-label">
                          Image            </label>
                      <div class="custom-file mb-3">
                        <input type="file" ref="image" name="image" v-on:change="onFileChange" class="custom-file-input" id="image" accept=".jpg,.jpeg,.png">
                        <label class="custom-file-label" >Choose file...</label>
                        
                      </div>
                    </div>
                    <div class="form-group  widget-field span-left flex-width" id="form-field-category-thumb-group">
                      
                      <div class = "mb-3">
                        <img :src="images" class="img-responsive" style='width:30%'>
                      </div>
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
                  </div>           
                </div>
                <div class="tab-pane " id="primarytab-3">
  <div class="form-fields">
    <div class="form-group section-field span-full " id="form-field-location-opening-type-group">
      <div class="field-section">
        <h5 class="section-title">Opening Hours</h5>
      </div>
    </div>    
    <div class="form-group radio-field span-full " id="form-field-location-options-hours-opening-type-group">
      <div class="field-radio">
        <div id="form-field-location-options-hours-opening-type" class="btn-group btn-group-toggle"
            data-toggle="buttons">
            <label class="btn btn-light ">
            <input type="radio" id="form-field-location-options-hours-opening-type-1" name="Location[options][hours][opening][type]" value="24_7">
                    24/7</label>
            <label class="btn btn-light ">
              <input type="radio" id="form-field-location-options-hours-opening-type-2" name="Location[options][hours][opening][type]"  value="daily">
               Daily
            </label>
            <label class="btn btn-light active">
              <input type="radio" id="form-field-location-options-hours-opening-type-3" name="Location[options][hours][opening][type]" value="flexible" checked="checked">
              Flexible
            </label>
        </div>
      </div>
    </div>    
    <div class="form-group checkbox-field span-full" data-trigger="[name=&#039;Location[options][hours][opening][type]&#039;]" data-trigger-action="show" data-trigger-condition="value[daily]" data-trigger-closest-parent="form"    id="form-field-location-options-hours-opening-days-group">
      <label for="form-field-location-options-hours-opening-days" class="control-label">Days
      </label>
      <div class="field-checkbox">
        <div id="form-field-location-options-hours-opening-days" class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-light ">
            <input type="checkbox" id="checkbox_form-field-location-options-hours-opening-days_1"
              name="Location[options][hours][opening][days][]" value="0">
          Mon</label>
          <label class="btn btn-light active">
            <input type="checkbox" id="checkbox_form-field-location-options-hours-opening-days_2" name="Location[options][hours][opening][days][]" value="1" checked="checked">
          Tue</label>
          <label class="btn btn-light active">
            <input  type="checkbox" id="checkbox_form-field-location-options-hours-opening-days_3"name="Location[options][hours][opening][days][]" value="2" checked="checked">
          Wed</label>
          <label class="btn btn-light active">
            <input type="checkbox" id="checkbox_form-field-location-options-hours-opening-days_4" name="Location[options][hours][opening][days][]" value="3" checked="checked">
            Thu</label>
          <label class="btn btn-light active">
            <input  type="checkbox" id="checkbox_form-field-location-options-hours-opening-days_5" name="Location[options][hours][opening][days][]" value="4" checked="checked">
          Fri</label>
          <label class="btn btn-light active">
            <input type="checkbox" id="checkbox_form-field-location-options-hours-opening-days_6" name="Location[options][hours][opening][days][]" value="5" checked="checked">
          Sat</label>
          <label class="btn btn-light active">
            <input type="checkbox" id="checkbox_form-field-location-options-hours-opening-days_7" name="Location[options][hours][opening][days][]" value="6" checked="checked">
          Sun</label>
        </div>
      </div>
    </div>
    <div class="form-group widget-field span-left flex-width" data-trigger="[name=&#039;Location[options][hours][opening][type]&#039;]" data-trigger-action="show" data-trigger-condition="value[daily]" data-trigger-closest-parent="form"    id="form-field-location-options-hours-opening-open-group">
      <label for="form-field-location-options-hours-opening-open" class="control-label">Open hour </label>
      <div id="datepicker-formoptionshoursopeningopen-options-hours-opening-open" class="control-datepicker">
        <div class="input-group" data-control="clockpicker" data-autoclose="true">
          <input type="text" name="Location[options][hours][opening][open]" id="datepicker-formoptionshoursopeningopen-time-options-hours-opening-open" class="form-control"
          autocomplete="off" value="00:00"/>
          <span class="input-group-prepend">
            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group widget-field span-left flex-width" data-trigger="[name=&#039;Location[options][hours][opening][type]&#039;]" data-trigger-action="show" data-trigger-condition="value[daily]" data-trigger-closest-parent="form"    id="form-field-location-options-hours-opening-close-group">
      <label for="form-field-location-options-hours-opening-close" class="control-label">Close hour </label>
      <div  id="datepicker-formoptionshoursopeningclose-options-hours-opening-close" class="control-datepicker">
        <div class="input-group" data-control="clockpicker" data-autoclose="true">
          <input type="text" name="Location[options][hours][opening][close]" id="datepicker-formoptionshoursopeningclose-time-options-hours-opening-close" class="form-control"autocomplete="off" value="08:35"/>
          <span class="input-group-prepend">
            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
          </span>
        </div>
      </div>
    </div>    
    <div class="form-group partial-field span-full " data-trigger="[name=&#039;Location[options][hours][opening][type]&#039;]" data-trigger-action="show" data-trigger-condition="value[flexible]" data-trigger-closest-parent="form"    id="form-field-location-options-hours-opening-flexible-group">
      <label for="form-field-location-options-hours-opening-flexible" class="control-label">Flexible</label>
      <div class="field-flexible-hours">
        <div class="row">
          <div class="col-sm-7">
            <div class="table-responsive">
              <table class="table table-stripped">
                <thead>
                  <tr>
                      <th></th>
                      <th>Open hour</th>
                      <th>Close hour</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <span>Mon</span>
                      <input  type="hidden" name="Location[options][hours][opening][flexible][0][day]" value="0"/>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input type="text" name="Location[options][hours][opening][flexible][0][open]" class="form-control" autocomplete="off" value="00:00"/>
                        <span class="input-group-prepend">
                          <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][0][close]"
                            class="form-control"
                            autocomplete="off"
                            value="23:59"
                             />
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input
                        type="hidden"
                        name="Location[options][hours][opening][flexible][0][status]"
                        value="0" >
                      <div class="field-switch" data-control="switch">
                        <input
                          type="checkbox"
                          name="Location[options][hours][opening][flexible][0][status]"
                          id="form-field-location-options-hours-opening-flexible-0status"
                          class="field-switch-input"
                          value="1" checked="checked" >
                        <label
                            class="field-switch-label"
                            for="form-field-location-options-hours-opening-flexible-0status" >
                          <span class="field-switch-container">
                              <span class="field-switch-active">
                                  <span class="field-switch-toggle bg-success">Open</span>
                              </span>
                              <span class="field-switch-inactive">
                                  <span class="field-switch-toggle bg-danger">Closed</span>
                              </span>
                          </span>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <span>Tue</span>
                      <input type="hidden" name="Location[options][hours][opening][flexible][1][day]" value="1"/>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                          type="text"
                          name="Location[options][hours][opening][flexible][1][open]"
                          class="form-control"
                          autocomplete="off"
                          value="00:00"
                        />
                        <span class="input-group-prepend">
                          <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][1][close]"
                            class="form-control"
                            autocomplete="off"
                            value="23:59"
                             />
                        <span class="input-group-prepend">
                          <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input
                          type="hidden"
                          name="Location[options][hours][opening][flexible][1][status]"
                          value="0">
                      <div class="field-switch" data-control="switch">
                        <input
                              type="checkbox"
                              name="Location[options][hours][opening][flexible][1][status]"
                              id="form-field-location-options-hours-opening-flexible-1status"
                              class="field-switch-input"
                              value="1" checked="checked">
                          <label class="field-switch-label" for="form-field-location-options-hours-opening-flexible-1status">
                            <span class="field-switch-container">
                              <span class="field-switch-active">
                                  <span class="field-switch-toggle bg-success">Open</span>
                              </span>
                              <span class="field-switch-inactive">
                                  <span class="field-switch-toggle bg-danger">Closed</span>
                              </span>
                            </span>
                          </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <span>Wed</span>
                        <input
                            type="hidden"
                            name="Location[options][hours][opening][flexible][2][day]"
                            value="2"/>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                          type="text"
                          name="Location[options][hours][opening][flexible][2][open]"
                          class="form-control"
                          autocomplete="off"
                          value="00:00"/>
                          <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                          </span>
                      </div>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][2][close]"
                            class="form-control"
                            autocomplete="off"
                            value="23:59"
                             />
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input
                          type="hidden"
                          name="Location[options][hours][opening][flexible][2][status]"
                          value="0">
                      <div class="field-switch" data-control="switch">
                        <input
                            type="checkbox"
                            name="Location[options][hours][opening][flexible][2][status]"
                            id="form-field-location-options-hours-opening-flexible-2status"
                            class="field-switch-input"
                            value="1" checked="checked">
                        <label class="field-switch-label" for="form-field-location-options-hours-opening-flexible-2status"
                        >
                          <span class="field-switch-container">
                            <span class="field-switch-active">
                                <span class="field-switch-toggle bg-success">Open</span>
                            </span>
                            <span class="field-switch-inactive">
                                <span class="field-switch-toggle bg-danger">Closed</span>
                            </span>
                          </span>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <span>Thu</span>
                        <input
                            type="hidden"
                            name="Location[options][hours][opening][flexible][3][day]"
                            value="3"/>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][3][open]"
                            class="form-control"
                            autocomplete="off"
                            value="00:00"
                             />
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][3][close]"
                            class="form-control"
                            autocomplete="off"
                            value="23:59"
                             />
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                        <input
                            type="hidden"
                            name="Location[options][hours][opening][flexible][3][status]"
                            value="0">
                        <div class="field-switch" data-control="switch">
                          <input
                              type="checkbox"
                              name="Location[options][hours][opening][flexible][3][status]"
                              id="form-field-location-options-hours-opening-flexible-3status"
                              class="field-switch-input"
                              value="1" checked="checked">
                          <label
                              class="field-switch-label"
                              for="form-field-location-options-hours-opening-flexible-3status"
                          >
                            <span class="field-switch-container">
                                <span class="field-switch-active">
                                    <span class="field-switch-toggle bg-success">Open</span>
                                </span>
                                <span class="field-switch-inactive">
                                    <span class="field-switch-toggle bg-danger">Closed</span>
                                </span>
                            </span>
                          </label>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <span>Fri</span>
                        <input
                            type="hidden"
                            name="Location[options][hours][opening][flexible][4][day]"
                            value="4"/>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][4][open]"
                            class="form-control"
                            autocomplete="off"
                            value="00:00"
                             />
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                          type="text"
                          name="Location[options][hours][opening][flexible][4][close]"
                          class="form-control"
                          autocomplete="off"
                          value="23:59"
                        />
                        <span class="input-group-prepend">
                          <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input
                          type="hidden"
                          name="Location[options][hours][opening][flexible][4][status]"
                          value="0">
                      <div class="field-switch" data-control="switch">
                        <input
                            type="checkbox"
                            name="Location[options][hours][opening][flexible][4][status]"
                            id="form-field-location-options-hours-opening-flexible-4status"
                            class="field-switch-input"
                            value="1" checked="checked">
                        <label
                            class="field-switch-label"
                            for="form-field-location-options-hours-opening-flexible-4status"
                        >
                          <span class="field-switch-container">
                              <span class="field-switch-active">
                                  <span class="field-switch-toggle bg-success">Open</span>
                              </span>
                              <span class="field-switch-inactive">
                                  <span class="field-switch-toggle bg-danger">Closed</span>
                              </span>
                          </span>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <span>Sat</span>
                        <input
                            type="hidden"
                            name="Location[options][hours][opening][flexible][5][day]"
                            value="5"/>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][5][open]"
                            class="form-control"
                            autocomplete="off"
                            value="00:00"
                             />
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][5][close]"
                            class="form-control"
                            autocomplete="off"
                            value="23:59"
                             />
                        <span class="input-group-prepend">
                            <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <input
                        type="hidden"
                        name="Location[options][hours][opening][flexible][5][status]"
                        value="0" >
                      <div class="field-switch" data-control="switch" >
                        <input
                          type="checkbox"
                          name="Location[options][hours][opening][flexible][5][status]"
                          id="form-field-location-options-hours-opening-flexible-5status"
                          class="field-switch-input"
                          value="1" checked="checked">
                        <label
                            class="field-switch-label"
                            for="form-field-location-options-hours-opening-flexible-5status"
                        >
                          <span class="field-switch-container">
                            <span class="field-switch-active">
                                <span class="field-switch-toggle bg-success">Open</span>
                            </span>
                            <span class="field-switch-inactive">
                                <span class="field-switch-toggle bg-danger">Closed</span>
                            </span>
                          </span>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <span>Sun</span>
                        <input
                            type="hidden"
                            name="Location[options][hours][opening][flexible][6][day]"
                            value="6"/>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                            type="text"
                            name="Location[options][hours][opening][flexible][6][open]"
                            class="form-control"
                            autocomplete="off"
                            value="00:00"
                             />
                        <span class="input-group-prepend">
                          <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="input-group" data-control="clockpicker" data-autoclose="true">
                        <input
                          type="text"
                          name="Location[options][hours][opening][flexible][6][close]"
                          class="form-control"
                          autocomplete="off"
                          value="23:59" />
                        <span class="input-group-prepend">
                          <span class="input-group-icon"><i class="fa fa-clock-o"></i></span>
                        </span>
                      </div>
                    </td>
                    <td>
                        <input
                            type="hidden"
                            name="Location[options][hours][opening][flexible][6][status]"
                            value="0">
                        <div class="field-switch" data-control="switch">
                            <input
                                type="checkbox"
                                name="Location[options][hours][opening][flexible][6][status]"
                                id="form-field-location-options-hours-opening-flexible-6status"
                                class="field-switch-input"
                                value="1" checked="checked">
                            <label
                                class="field-switch-label"
                                for="form-field-location-options-hours-opening-flexible-6status"
                            >
                              <span class="field-switch-container">
                                <span class="field-switch-active">
                                    <span class="field-switch-toggle bg-success">Open</span>
                                </span>
                                <span class="field-switch-inactive">
                                    <span class="field-switch-toggle bg-danger">Closed</span>
                                </span>
                              </span> 
                            </label>
                        </div>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
          boolean:0,
          addre:null,
          images: '',
          values: null,
          options: ['list', 'of', 'options'],
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
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.images = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        nameWithLang ({ country_name}) {
          return `${country_name}`
        },
        create() {
          const formData = new FormData();
          if(this.values != null)
          {
            formData.append("country_id", this.values.id);
          }
          else
          {
            formData.append("country_id", this.values);
          }
          formData.append("name", this.$refs.name.value);
          formData.append("image", this.$refs.image.files[0]);
          formData.append("email", this.$refs.email.value);
          formData.append("telephone", this.$refs.telephone.value);
          formData.append("address_1", this.$refs.address_1.value);
          formData.append("address_2", this.$refs.address_2.value);
          formData.append("city", this.$refs.city.value);
          formData.append("state", this.$refs.state.value);
          formData.append("postcode", this.$refs.postcode.value);
          formData.append("status", this.boolean);
          formData.append("permalink_slug", this.$refs.permalink_slug.value);
          axios
            .post("/api/location", formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
              this.$refs.name.value = "";
              this.$refs.permalink_slug.value="";
              this.$router.push({name:'read_location'});
              
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
