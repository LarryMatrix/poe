<?php $this->load->view('add_more_country') ?>
<!-- Page content -->
<div class="page-content bg-white">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="container-fluid">
                <div class="page-header-content">
                    <div class="page-title d-flex">
                        <div class="img">
                            <img src="<?= base_url('assets/img/CoatofArms_Lg.png') ?>"/>
                        </div><!--./img -->

                        <div id="content">
                            <h1><?= $this->lang->line('united_republic') ?></h1>
                            <h3 class="d-none d-md-block"><?= $this->lang->line('ministry_of_health') ?></h3>
                            <h4 class="d-block d-sm-none">MoHCDGEC</h4>
                        </div><!--./content -->
                    </div><!--./page-title -->
                </div><!--./page-header-content -->
            </div><!--./container-fluid -->
        </div><!-- /page header -->

        <!-- Content area -->
        <div class="content">
            <!-- Basic card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-uppercase text-center"><?= $this->lang->line('traveller_surveillance_form') ?></h5>
                </div><!--./card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if ($this->session->flashdata('message') != '') {
                                echo '<div class="success_message">' . $this->session->flashdata('message') . '</div>';
                            } ?>

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center; margin-bottom: 10px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>

                            <!-- form -->
                            <form id="regForm" action="<?= site_url('entries/international') ?>" method="post">
                                <input type="hidden" id="base_url" name="base_url" value="<?= base_url() ?>"/>
                                <?php echo form_hidden('form_type', 'INTERNATIONAL'); ?>
                                <div class="tab" id="tab1">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title font-weight-bold"><?= $this->lang->line('traveller_information'); ?></h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_full_name') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?= form_input(['id' => 'name', 'name' => 'name', 'type' => 'text', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_full_name')]) ?>
                                                <span id="errorName" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_age') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?= form_input(['id' => 'age', 'name' => 'age', 'type' => 'number', 'min' => 0, 'max' => 100, 'class' => 'form-control']) ?>
                                                <span id="errorAge" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_sex') ?> <span
                                                            style="color: red;">*</span></label><br/>
                                                <?php
                                                $sex_options = [
                                                    '' => $this->lang->line('lbl_select_sex'),
                                                    'Male' => $this->lang->line('lbl_male'),
                                                    'Female' => $this->lang->line('lbl_female')
                                                ];
                                                echo form_dropdown('sex', $sex_options, set_value('sex'), 'class="form-control" id="sex"'); ?>
                                                <span id="errorSex" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->


                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_nationality') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php
                                                $_options = [];
                                                if (isset($countries) && $countries) {
                                                    foreach ($countries as $country) {
                                                        $_options[$country->code] = $country->name;
                                                    }
                                                }
                                                $_options = ['' => $this->lang->line('lbl_select_nationality')] + $_options;
                                                echo form_dropdown('nationality', $_options, set_value('nationality'), 'class="form-control" id="nationality"'); ?>
                                                <span id="errorNationality" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <?php echo form_hidden('id_type', 'Passport No'); ?>
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_passport') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php echo form_input(['id' => 'passport_number', 'name' => 'passport_number', 'type' => 'text', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_passport')]); ?>
                                                <span id="errorPassportNo" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_transport_means') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php
                                                $_options = [
                                                    '' => $this->lang->line('lbl_select_transport_means'),
                                                    'Flight' => $this->lang->line('lbl_transport_means_flight'),
                                                    'Vehicle' => $this->lang->line('lbl_transport_means_vehicle'),
                                                    'Vessel' => $this->lang->line('lbl_transport_means_vessel')
                                                ];
                                                echo form_dropdown('transport_means', $_options, set_value('transport_means'), 'class="form-control" id="transport_means" onChange="suggest_poe();"'); ?>
                                                <span id="errorTransportMeans" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_transport_means_name') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php echo form_input(['id' => 'transport_name', 'name' => 'transport_name', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_transport_means_name')]); ?>
                                                <span id="errorTransportName" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_arrival_date') ?> <span
                                                            style="color: red;">*</span></label>
                                                <div class="input-group date" data-provide="datepicker"
                                                     id="arrival_date">
                                                    <?php echo form_input(['id' => 'arrival_date', 'name' => 'arrival_date', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_arrival_date')]); ?>
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </div><!--./input group addon -->
                                                </div><!--./input group -->
                                                <span id="errorArrivalDate" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_point_of_entry') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php
                                                $_options = ['' => $this->lang->line('lbl_select_point_of_entry')];
                                                echo form_dropdown('point_of_entry', $_options, set_value('point_of_entry'), 'class="form-control" id="point_of_entry"'); ?>
                                                <span id="errorPointOfEntry" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_seat_no') ?></label>
                                                <?php echo form_input(['id' => 'seat_no', 'name' => 'seat_no', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => $this->lang->line('lbl_write_seat_no')]); ?>
                                                <span id="errorSeatNo" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab" id="tab2">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_purpose_of_visit_tanzania') ?></label>
                                                <?php
                                                $_options = [
                                                    '' => $this->lang->line('lbl_select'),
                                                    'Resident' => $this->lang->line('lbl_purpose_of_visit_resident'),
                                                    'Tourist' => $this->lang->line('lbl_purpose_of_visit_tourist'),
                                                    'Transit' => $this->lang->line('lbl_purpose_of_visit_transit'),
                                                    'Business' => $this->lang->line('lbl_purpose_of_visit_business')
                                                ];
                                                echo form_dropdown('visiting_purpose', $_options, set_value('visiting_purpose'), 'class="form-control"'); ?>
                                                <span style="color: red;"><?= form_error('visiting_purpose'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_other_purpose_of_visit_tanzania') ?></label>
                                                <?php echo form_textarea(['id' => 'other_visiting_purpose', 'name' => 'other_visiting_purpose', 'class' => 'form-control', 'rows' => 3]); ?>
                                                <span style="color: red;"><?= form_error('other_visiting_purpose'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_duration_of_stay_tanzania') ?></label>
                                                <?php echo form_input(['id' => 'duration_stay', 'name' => 'duration_stay', 'type' => 'number', 'min' => 1, 'class' => 'form-control']); ?>
                                                <span id="errorStayDuration" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_employment') ?></label>
                                                <?php
                                                $_options = [
                                                    '' => $this->lang->line('lbl_select_employment'),
                                                    'Government' => $this->lang->line('lbl_employment_government'),
                                                    'Non-Government' => $this->lang->line('lbl_employment_non_government'),
                                                    'Non-Profit' => $this->lang->line('lbl_employment_non_profit'),
                                                    'Studies' => $this->lang->line('lbl_employment_studies'),
                                                    'Business' => $this->lang->line('lbl_employment_business'),
                                                    'Religious' => $this->lang->line('lbl_employment_religious'),
                                                ];
                                                echo form_dropdown('employment', $_options, set_value('employment'), 'class="form-control" id="employment"'); ?>
                                                <span id="errorEmployment" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_other_employment') ?></label>
                                                <?php echo form_input(['id' => 'other_employment', 'name' => 'other_employment', 'class' => 'form-control']); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab" id="tab3">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title"><?= $this->lang->line('lbl_contact_while_in_tanzania') ?></h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_address') ?> </label>
                                                <?php echo form_textarea(['id' => 'address', 'name' => 'address', 'rows' => 3, 'class' => 'form-control']); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_hotel_name') ?> </label>
                                                <?php echo form_input(['id' => 'hotel', 'name' => 'hotel', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_hotel_name')]); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_region') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php
                                                $region_option = [];
                                                if (isset($regions) && $regions) {
                                                    foreach ($regions as $cp) {
                                                        $region_option[$cp->id] = $cp->name;
                                                    }
                                                }
                                                $region_option = ['' => $this->lang->line('lbl_select')] + $region_option;
                                                echo form_dropdown('region_id', $region_option, set_value('region_id'), 'class="form-control" id="region_id" onChange="suggest_districts();"'); ?>
                                                <span id="errorRegion" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_district') ?> </label>
                                                <?php
                                                $district_option = ['' => $this->lang->line('lbl_select')];
                                                echo form_dropdown('district_id', $district_option, set_value('district_id'), 'class="form-control" id="district_id"'); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_street') ?> </label>
                                                <?php echo form_input(['id' => 'street', 'name' => 'street', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_street')]); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_mobile') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php echo form_input(['id' => 'mobile', 'name' => 'mobile', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_mobile')]); ?>
                                                <span id="errorMobile" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_email') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php echo form_input(['id' => 'email', 'name' => 'email', 'type' => 'email', 'class' => 'form-control', 'placeholder' => $this->lang->line('lbl_write_email'), 'onkeyup' => 'this.value = this.value.toLowerCase();']); ?>
                                                <span id="errorEmail" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab" id="tab4">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_country_journey_started') ?> <span
                                                            style="color: red;">*</span></label>
                                                <?php
                                                $_options = [];
                                                if (isset($countries) && $countries) {
                                                    foreach ($countries as $country) {
                                                        $_options[$country->id] = $country->name;
                                                    }
                                                }
                                                $_options = ['' => $this->lang->line('lbl_select')] + $_options;
                                                echo form_dropdown('location_origin', $_options, set_value('location_origin'), 'class="form-control" id="location_origin"'); ?>
                                                <span id="errorCountryOrigin" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title"><?= $this->lang->line('lbl_country_visited') ?></h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row field_wrapper">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_country') ?></label>
                                                <?php
                                                $_options = [];
                                                if (isset($countries) && $countries) {
                                                    foreach ($countries as $country) {
                                                        $_options[$country->id] = $country->name;
                                                    }
                                                }
                                                $_options = ['' => $this->lang->line('lbl_select')] + $_options;
                                                echo form_dropdown('country[]', $_options, set_value('country[]'), 'class="form-control" id="country[]"'); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_location_country') ?></label>
                                                <?php echo form_input(['id' => 'location[]', 'name' => 'location[]', 'class' => 'form-control', 'type' => 'text']); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_date') ?> </label>
                                                <div class="input-group date" data-provide="datepicker"
                                                     id="datepicker">
                                                    <?php echo form_input(['id' => 'date', 'name' => 'date[]', 'class' => 'form-control']); ?>
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </div><!--./input group addon -->
                                                </div><!--./input group -->
                                                <span id="errorDate" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_no_of_days') ?></label>
                                                <?php echo form_input(['id' => 'days', 'name' => 'days[]', 'class' => 'form-control', 'type' => 'number', 'min' => 1]); ?>
                                                <span id="errorDays" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <a href="javascript:void(0);" class="add_button btn btn-info btn-sm"
                                                   title="Add field">
                                                    <?= $this->lang->line('lbl_add_another') ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--./tab -->

                                <div class="tab" id="tab5">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title"><?= $this->lang->line('lbl_experienced_following_conditions') ?></h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <p><?= $this->lang->line('lbl_tick_symptoms'); ?></p>
                                                <?php
                                                $serial = 0;
                                                if (isset($symptoms) && $symptoms) {
                                                    foreach ($symptoms as $symptom) { ?>
                                                        <input type="checkbox" name="symptoms[]"
                                                               id="<?= $symptom->id; ?>"
                                                               value="<?= $symptom->id; ?>" <?= set_checkbox('symptoms[]', $symptom->id); ?>>&nbsp;
                                                        <label for="<?= $symptom->id; ?>"><?= $this->lang->line('lbl_' . $symptom->alias); ?></label>
                                                        <br/>
                                                        <?php
                                                        $serial++;
                                                    }
                                                } ?>
                                                <span id="errorSymptoms" style="color: red;"></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label><?= $this->lang->line('lbl_other_symptoms') ?></label>
                                                <?php echo form_input(['id' => 'other_symptoms', 'name' => 'other_symptoms', 'class' => 'form-control', 'type' => 'text']); ?>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="row" style="overflow:auto;">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-xs" id="prevBtn"
                                                    onclick="nextPrev(-1)"><?= $this->lang->line('lbl_previous') ?>
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-xs" id="nextBtn"
                                                    onclick="nextPrev(1)"><?= $this->lang->line('lbl_next') ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form><!--./form -->
                        </div><!--./col-lg-12-->
                    </div><!--./row -->
                </div><!--./card-body -->
            </div><!-- /basic card -->
        </div><!-- /content area -->
        <?php $this->load->view('validation') ?>

        <script type="text/javascript">
            //disabling past date from datepicker
            let nowDate = new Date();
            let today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

            //arrival date
            $('#arrival_date').datepicker({
                format: 'dd-mm-yyyy',
                startDate: today,
                autoclose: true
            });

            //date
            $('#datepicker').datepicker({
                format: 'dd-mm-yyyy',
                startDate: "-21d",
                endDate: "-1d",
                autoclose: true
            });
        </script>
